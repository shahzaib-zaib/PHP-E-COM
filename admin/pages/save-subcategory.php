<?php
    include "../assets/include/config.php";

    if(isset($_FILES['fileToUpload'])){
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $exp = explode('.', $file_name);
        $file_ext = end($exp);
        $extensions = array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions) === false)
        {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file";
        }

        if($file_size > 2097152){
            $errors[] = "File size must be 2mb or lower.";
        }
        
        if(empty($errors) == true){
            move_uploaded_file($file_tmp,"../assets/img/".$file_name);
        }else{
            print_r($errors);
            die();
        }
    }

    $category = mysqli_real_escape_string($con, $_POST['category']);
    $subcat_name = mysqli_real_escape_string($con, $_POST['subcategory_name']);
    $subcat_desc = mysqli_real_escape_string($con, $_POST['subcategory_desc']);

    $sql = "SELECT subcategory_name FROM subcategory WHERE subcategory_name = '{$subcat_name}'";
    $result = mysqli_query($con,$sql) or die("Query Failed");

    if(mysqli_num_rows($result) > 0){
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Category name already Exists</p>";
    }else{
        $sql = "INSERT INTO subcategory(categoryid, subcategory_name, subcategory_desc, subcategory_img)
            VALUES({$category}, '{$subcat_name}', '{$subcat_desc}', '{$file_name}')";

    if(mysqli_query($con, $sql)){
        header("location: {$hostname}/admin/pages/sub-category.php");
    }else{
        echo "<div class='alert alert-danger'>Query Failed</div>";
    }
    }

?>