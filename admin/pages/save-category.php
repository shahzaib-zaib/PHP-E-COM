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

    $categoryName = mysqli_real_escape_string($con, $_POST['category_name']);
    $categoryDesc = mysqli_real_escape_string($con, $_POST['category_desc']);

    $sql = "SELECT category_name FROM category WHERE category_name = '{$categoryName}'";
    $result = mysqli_query($con,$sql) or die("Query Failed");

    if(mysqli_num_rows($result) > 0){
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Category name already Exists</p>";
    }else{
        $sql = "INSERT INTO category(category_name, category_desc, category_img)
            VALUES('{$categoryName}', '{$categoryDesc}', '{$file_name}')";

    if(mysqli_query($con, $sql)){
        header("location: {$hostname}/admin/pages/category.php");
    }else{
        echo "<div class='alert alert-danger'>Query Failed</div>";
    }
    }
    
?>