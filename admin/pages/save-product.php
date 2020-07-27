<?php
  
  if(isset($_POST['submit'])){
    include "../assets/include/config.php";

    $sabCat_id = mysqli_real_escape_string($con, $_POST['cat_id']);
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
    $date = date("d M Y");
    $productimage1 = $_FILES["productimage1"]["name"];
    $productimage2 = $_FILES["productimage2"]["name"];
    $productimage3 = $_FILES["productimage3"]["name"];

    //for getting product id
    $query=mysqli_query($con,"select max(product_id) as pid from products");

    $result = mysqli_fetch_array($query);
    
  //   $productid = $result['pid']+1;
  //   $dir = "../assets/img/$productid";
  // if(!is_dir($dir)){
  //     mkdir("../assets/img/".$productid);
  //   }

    move_uploaded_file($_FILES["productimage1"]["tmp_name"],"../assets/img/products/".$_FILES["productimage1"]["name"]);
    move_uploaded_file($_FILES["productimage2"]["tmp_name"],"../assets/img/products/".$_FILES["productimage2"]["name"]);
    move_uploaded_file($_FILES["productimage3"]["tmp_name"],"../assets/img/products/".$_FILES["productimage3"]["name"]);

    $sql1 = "INSERT INTO products(category,sub_category,product_name,product_company,product_price,sale_price,product_description,product_image1,shipping_charge,product_availability,posting_date,product_stock,product_image2,product_image3)
               VALUES('$category', '$subCategory', '$productName', '$productBrand', '$productPrice', '$salePrice', '$productDesc', '$productimage1', '$shippingCharges', '$proAvailb', '$date', '$stock','$productimage2','$productimage3');";

    $sql .= "UPDATE subcategory SET products = products + 1 WHERE sub_id = {$sabCat_id}";
      
      if(mysqli_multi_query($con, $sql1)){
        header("location: {$hostname}/admin/pages/products.php");
      }else{
          echo "<div class='alert alert-danger'>Query Failed</div>";
      }

  }


?>