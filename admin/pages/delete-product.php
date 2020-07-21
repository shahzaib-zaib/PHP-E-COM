<?php

    include "../assets/include/config.php";

    $product_id = $_GET['pid'];

    $sql1 = "SELECT * FROM products WHERE product_id = {$product_id}";
    $result = mysqli_query($con, $sql1) or die("Query Failed : Select");
    $row = mysqli_fetch_assoc($result);

    unlink("../assets/img/".$row['product_image1']);
    unlink("../assets/img/".$row['product_image2']);
    unlink("../assets/img/".$row['product_image3']);


    $sql = "DELETE FROM Products WHERE product_id = {$product_id}";


    if(mysqli_multi_query($con, $sql)){
        header("location: {$hostname}/admin/pages/products.php");
    }else{
        echo "<p style='color:red; margin: 10px 0'>Can\'t Delete the Product</p>";
    }

?>