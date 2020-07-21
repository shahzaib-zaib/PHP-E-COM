<?php

$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
    

    $sql = "UPDATE products set category = '$category', subCategory='$subcat', productName='$productname', 
    productCompany='$productcompany',productPrice='$productprice',productDescription='$productdescription',
    shippingCharge='$productscharge',productAvailability='$productavailability',productPriceBeforeDiscount='$productpricebd' 
    WHERE product_id = {$_POST['pro_id']}";
    
    $result = mysqli_query($con,$sql);

    if($result){
        header("location: {$hostname}/admin/pages/products.php");
    }else{
        echo "Query Failed";
    }

    }


?>