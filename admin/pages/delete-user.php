<?php

    include "../assets/include/config.php";

    $user_id = $_GET['id'];

    $sql1 = "SELECT * FROM user WHERE User_id = {$user_id}";
    $result = mysqli_query($con, $sql1) or die("Query Failed : Select");
    $row = mysqli_fetch_assoc($result);

    unlink("../assets/img/user".$row['user_img']);


    $sql = "DELETE FROM user WHERE User_id = {$user_id}";


    if(mysqli_query($con, $sql)){
        header("location: {$hostname}/admin/pages/accounts.php");
    }else{
        echo "<p style='color:red; margin: 10px 0'>Can\'t Delete the User Account</p>";
    }

?>