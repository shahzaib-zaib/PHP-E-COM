<?php

    include "../assets/include/config.php";

    $category_id = $_GET['id'];

    $sql1 = "SELECT * FROM category WHERE category_id = {$category_id}";
    $result = mysqli_query($con, $sql1) or die("Query Failed : Select");
    $row = mysqli_fetch_assoc($result);

    unlink("../assets/img/categories/".$row['category_img']);


    $sql = "DELETE FROM category WHERE category_id = {$category_id}";


    if(mysqli_query($con, $sql)){
        header("location: {$hostname}/admin/pages/category.php");
    }else{
        echo "<p style='color:red; margin: 10px 0'>Can\'t Delete the Category</p>";
    }

?>