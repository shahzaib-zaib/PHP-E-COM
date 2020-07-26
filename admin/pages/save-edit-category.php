<?php

    include "../assets/include/config.php";

    if(empty($_FILES['new-image']['name'])){
        $file_name = $_POST['old_image'];
    }else{
        $errors = array();

        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp = $_FILES['new-image']['tmp_name'];
        $file_type = $_FILES['new-image']['type'];
        $file_ext = end(explode('.', $file_name));
        $extensions = array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions) === false)
        {
            $errors[] = "This extension file not allowed, Please choose a JPG or PNG file";
        }

        $new_name = time() . "-" . basename($file_name);
        $target = "../assets/img/" . $new_name;
        $image_name = $new_name;

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

    $sql = "UPDATE category SET category_name = '{$_POST['category_name']}',category_desc='{$_POST['category_desc']}',category_img='{$image_name}'
    WHERE category_id = {$_POST['cat_id']}";

    $result = mysqli_query($con,$sql);

    if($result){
        header("location: {$hostname}/admin/pages/category.php");
    }else{
        echo "Query Failed";
    }

?>