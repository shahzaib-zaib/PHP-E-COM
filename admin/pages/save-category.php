<?php
    include "assets/include/config.php";

    if(isset($_FILES['fileToUpload'])){
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = end(explode('.', $file_name));
        $extensions = array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions) === false)
        {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file";
        }

        if($file_size > 2097152){
            $errors[] = "File size must be 2mb or lower.";
        }
        
        if(empty($errors) == true){
            move_uploaded_file($file_tmp,"upload/".$file_name);
        }else{
            print_r($errors);
            die();
        }
    }

    session_start();
    $categoryName = mysqli_real_escape_string($con, $_POST['category_name']);
    $categoryDesc = mysqli_real_escape_string($con, $_POST['category_desc']);
    $date = date("d M Y");


    $sql = "INSERT INTO category(category_name, category_desc, creation_date, category_img)
            VALUES('{$title}', '{$description}', {$category}, '{$date}', {$author}, '{$file_name}');";

    $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";

    if(mysqli_multi_query($con, $sql)){
        header("location: {$hostname}/admin/post.php");
    }else{
        echo "<div class='alert alert-danger'>Query Failed</div>";
    }
?>