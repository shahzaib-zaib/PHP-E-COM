<?php

    include "../assets/include/config.php";

    $subcat_id = $_GET['cid'];
    $cat_id = $_GET['catid'];

    $sql1 = "SELECT * FROM subcategory WHERE sub_id = {$subcat_id}";
    $result = mysqli_query($con, $sql1) or die("Query Failed : Select");
    $row = mysqli_fetch_assoc($result);

    unlink("../assets/img/subcategories/".$row['subcategory_img']);


    $sql = "DELETE FROM subcategory WHERE sub_id = {$subcat_id};";
    
    $sql .= "UPDATE category SET subcategory = subcategory - 1 WHERE category_id = {$cat_id}";


    if(mysqli_multi_query($con, $sql)){
        header("location: {$hostname}/admin/pages/sub-category.php");
    }else{
        echo "<p style='color:red; margin: 10px 0'>Can\'t Delete the Category</p>";
    }

?>