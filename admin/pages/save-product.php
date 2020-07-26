<?php
  
  if(isset($_POST['submit'])){
    include "../assets/include/config.php";

    $productName = mysqli_real_escape_string($con, $_POST['product_name']);
    $productBrand = mysqli_real_escape_string($con, $_POST['product_brand']);
    $productDesc = mysqli_real_escape_string($con, $_POST['product_desc']);
    $productPrice = mysqli_real_escape_string($con, $_POST['product_price']);
    $salePrice = mysqli_real_escape_string($con, $_POST['sale_price']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $subCategory = mysqli_real_escape_string($con, $_POST['subcategory']);
    $proAvailb = mysqli_real_escape_string($con, $_POST['pro_availb']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
    $shippingCharges = mysqli_real_escape_string($con, $_POST['shipping_charges']);
 

    $sql1 = "INSERT INTO products(category,sub_category,product_name,product_company,product_price,sale_price,product_description,product_image1,shipping_charge,product_availability,product_stock,product_image2,product_image3)
               VALUES('$category', '$subCategory', '$productName', '$productBrand', '$productPrice', '$salePrice', '$productDesc', '$productimage1', '$shippingCharges', '$proAvailb', '$stock','$productimage2','$productimage3');";

    $sql .= "UPDATE subcategory SET products = products + 1 WHERE sub_id = {$subCategory}";
      
      if(mysqli_multi_query($con, $sql1)){
        header("location: {$hostname}/admin/pages/products.php");
      }else{
          echo "<div class='alert alert-danger'>Query Failed</div>";
      }

  }


?>