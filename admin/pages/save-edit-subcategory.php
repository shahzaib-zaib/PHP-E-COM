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

    $sql = "UPDATE subcategory SET subcategory_name = '{$_POST['subcategory_name']}',subcategory_desc='{$_POST['subcategory_desc']}',subcategory_img='{$file_name}'
    WHERE sub_id = {$_POST['sub_id']}";

    $result = mysqli_query($con,$sql);

    if($result){
        header("location: {$hostname}/admin/pages/sub-category.php");
    }else{
        echo "Query Failed";
    }

?>