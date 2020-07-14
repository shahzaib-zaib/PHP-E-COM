<?php

    include "assets/include/config.php";
    if($_SESSION["user_role"] == '0'){
        header("Location: {$hostname}/admin/index.php?page=home");
    }

    $userid = $_GET['id'];

    $sql = "DELETE FROM user WHERE User_id = {$userid}";

    if(mysqli_query($con, $sql)){
        header("Location: {$hostname}/admin/index.php?page=accounts");
    }else{
        echo "<p style='color:red; margin: 10px 0'>Can\'t Delete the User Record</p>";
    }

    mysqli_close($con);

?>