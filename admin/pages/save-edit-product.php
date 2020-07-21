<?php
    include "../assets/include/config.php";


    $productimage1 = $_FILES["productimage1"]["name"];
    $productimage2 = $_FILES["productimage2"]["name"];
    $productimage3 = $_FILES["productimage3"]["name"];
    

    move_uploaded_file($_FILES["productimage1"]["tmp_name"],"../assets/img/".$_FILES["productimage1"]["name"]);
    move_uploaded_file($_FILES["productimage2"]["tmp_name"],"../assets/img/".$_FILES["productimage2"]["name"]);
    move_uploaded_file($_FILES["productimage3"]["tmp_name"],"../assets/img/".$_FILES["productimage3"]["name"]);
    
    $sql = "UPDATE products SET category = '{$_POST['category']}', sub_category = '{$_POST['sub_category']}', 
            product_name = '{$_POST['product_name']}', product_company = '{$_POST['product_brand']}', product_price = '{$_POST['product_price']}',
            sale_price = '{$_POST['sale_price']}', product_description = '{$_POST['product_desc']}', product_image1 = '{$productimage1}',
            shipping_charge = '{$_POST['shipping_charges']}', product_availability = '{$_POST['pro_availb']}', product_stock = '{$_POST['stock']}',
            product_image2 = '{$productimage2}', product_image3 = '{$productimage3}'
            WHERE product_id = {$_POST['pro_id']}";

    $result = mysqli_query($con,$sql);

    if($result){
        header("location: {$hostname}/admin/pages/products.php");
    }else{
        echo "Query Failed";
    }



?>