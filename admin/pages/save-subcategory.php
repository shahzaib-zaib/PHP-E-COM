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

        $new_name = time() . "-" . basename($file_name);
        $target = "../assets/img/subcategories/" . $new_name;

        if($file_size > 2097152){
            $errors[] = "File size must be 2mb or lower.";
        }
        
        if(empty($errors) == true){
            move_uploaded_file($file_tmp, $target);
        }else{
            print_r($errors);
            die();
        }
    }

    $category = mysqli_real_escape_string($con, $_POST['category']);
    $subcat_name = mysqli_real_escape_string($con, $_POST['subcat_name']);
    $subcat_desc = mysqli_real_escape_string($con, $_POST['subcat_desc']);
    $date = date("d M Y");

    
    $sql = "INSERT INTO subcategory(categoryid, subcategory_name, subcategory_desc, upload_date, subcategory_img)
        VALUES({$category}, '{$subcat_name}', '{$subcat_desc}', '{$date}', '{$new_name}');";

    $sql .= "UPDATE category SET subcategory = subcategory + 1 WHERE category_id = {$category}";
        

    if(mysqli_multi_query($con, $sql)){
        header("location: {$hostname}/admin/pages/sub-category.php");
    }else{
        echo "<div class='alert alert-danger'>Query Failed</div>";
    }

?>