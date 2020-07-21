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

    // $sql = "UPDATE post SET title='{$_POST['post_title']}',description='{$_POST['postdesc']}',category={$_POST['category']},post_img='{$file_name}'
    // WHERE post_id={$_POST['post_id']}";

    $sql = "UPDATE user SET Username = '{$_POST['user_name']}',Email='{$_POST['user_email']}',Role='{$_POST['role']}',Phone='{$_POST['user_phone']}',User_img='{$file_name}'
    WHERE User_id = {$_POST['user_id']}";

    $result = mysqli_query($con,$sql);

    if($result){
        header("location: {$hostname}/admin/pages/accounts.php");
    }else{
        echo "Query Failed";
    }

?>