<?php

$pid = intval($_GET['pid']);// product id

if(isset($_POST['submit']))
{
	$productName = mysqli_real_escape_string($con, $_POST['product_name']);
    $productBrand = mysqli_real_escape_string($con, $_POST['product_brand']);
    $productDesc = mysqli_real_escape_string($con, $_POST['product_desc']);
    $productPrice = mysqli_real_escape_string($con, $_POST['product_price']);
    $salePrice = mysqli_real_escape_string($con, $_POST['sale_price']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $subCategory = mysqli_real_escape_string($con, $_POST['sub_category']);
    $proAvailb = mysqli_real_escape_string($con, $_POST['pro_availb']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
    $shippingCharges = mysqli_real_escape_string($con, $_POST['shipping_charges']);
    $productimage1 = $_FILES["productimage1"]["name"];
    $productimage2 = $_FILES["productimage2"]["name"];
    $productimage3 = $_FILES["productimage3"]["name"];
    
    $sql1 = "INSERT INTO products(category,sub_category,product_name,product_company,product_price,sale_price,product_description,product_image1,shipping_charge,product_availability,product_stock,product_image2,product_image3)
               VALUES('$category', '$subCategory', '$productName', '$productBrand', '$productPrice', '$salePrice', '$productDesc', '$productimage1', '$shippingCharges', '$proAvailb', '$stock','$productimage2','$productimage3')";

    $sql = "UPDATE products set category = '$category', sub_category = '$subCategory', product_name = '$productName', 
    product_company = '$productBrand', product_price = '$productPrice', product_description = '$productDesc',
    shipping_charge = '$shippingCharges', product_availability = '$proAvailb', productPriceBeforeDiscount = '$productpricebd' 
    WHERE product_id = {$_POST['pro_id']}";
    
    $result = mysqli_query($con,$sql);

    if($result){
        header("location: {$hostname}/admin/pages/products.php");
    }else{
        echo "Query Failed";
    }

    }


?>