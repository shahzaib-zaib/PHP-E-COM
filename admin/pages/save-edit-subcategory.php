<?php

    include "../assets/include/config.php";

    if(empty($_FILES['new-image']['name'])){
        $image_name = $_POST['old_image'];
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

        if($file_size > 2097152){
            $errors[] = "File size must be 2mb or lower.";
        }
        if($file_size > 2097152){
            $errors[] = "File size must be 2mb or lower.";
        }

        $new_name = time() . "-" . basename($file_name);
        $target = "../assets/img/subcategories/" . $new_name;
        $image_name = $new_name;
        
        if(empty($errors) == true){
            move_uploaded_file($file_tmp,$target);
        }else{
            print_r($errors);
            die();
        }
    }

    $sql = "UPDATE subcategory SET categoryid = '{$_POST['category']}', subcategory_name = '{$_POST['subcategory_name']}', subcategory_desc='{$_POST['subcategory_desc']}',subcategory_img='{$image_name}'
    WHERE sub_id = {$_POST['sub_id']};";

    if($_POST['old_category'] != $_POST['category']){
        $sql .= "UPDATE category SET subcategory = subcategory - 1 WHERE category_id = {$_POST['old_category']};";
        $sql .= "UPDATE category SET subcategory = subcategory + 1 WHERE category_id = {$_POST['category']};";

    }

    $result = mysqli_multi_query($con,$sql);

    if($result){
        header("location: {$hostname}/admin/pages/sub-category.php");
    }else{
        echo "Query Failed";
    }

?>