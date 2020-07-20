<?php
  
  if(isset($_POST['submit'])){
    include "../assets/include/config.php";

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
    $productimage1=$_FILES["productimage1"]["name"];
    $productimage2=$_FILES["productimage2"]["name"];
    $productimage3=$_FILES["productimage3"]["name"];

    //for getting product id
    $query=mysqli_query($con,"select max(product_id) as pid from products");

    $result = mysqli_fetch_array($query);
    $productid = $result['pid']+1;
    $dir = "../assets/img/$productid";
  if(!is_dir($dir)){
      mkdir("../assets/img/".$productid);
    }

    move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
    move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
    move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);

    $sql1 = "INSERT INTO products(category,sub_category,product_name,product_company,product_price,sale_price,product_description,product_image1,shipping_charge,product_availability,posting_date,product_stock)
               VALUES('$category', '$subcat', '$productname', '$productcompany', '$productprice', '$productpricebd', '$productdescription', '$productscharge', '$productavailability', '$stock','$productimage1')";
      
      if(mysqli_query($con, $sql1)){
        header("location: {$hostname}/admin/pages/products.php");
      }else{
          echo "<div class='alert alert-danger'>Query Failed</div>";
      }

  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script>
    function getSubcat(val) {
      $.ajax({
      type: "POST",
      url: "get_subcat.php",
      data:'cat_id='+val,
      success: function(data){
        $("#subcategory").html(data);
      }
      });
    }
</script>
</head>
<body>
<?php include "../parts/header.php" ?>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="save-product.php" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                    <label for="name">Product Name</label>
                    <input id="name" name="product_name" type="text" class="form-control validate" required />
                  </div>
                  <div class="form-group mb-3">
                    <label for="name">Product Brand</label>
                    <input id="name" name="product_brand" type="text" class="form-control validate" required />
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control validate" name="product_desc" rows="3" required ></textarea>
                  </div>
                  <div class="row">
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label for="stock">Product Price</label>
                      <input id="stock" name="product_price" type="text" class="form-control validate" required/>
                    </div>
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label for="stock">Sale Price</label>
                      <input id="stock" name="sale_price" type="text" class="form-control validate" required/>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="category">Category</label>
                    <select class="custom-select tm-select-accounts" name="category" onChange="getSubcat(this.value);" id="category">
                      <option selected>Select category</option>
                      <?php
                              include "../assets/include/config.php";
                              $sql = "SELECT * FROM category";
                              $result = mysqli_query($con,$sql) or die("Query Failed");

                              if(mysqli_num_rows($result) > 0){
                                  while($row = mysqli_fetch_assoc($result)){
                                      echo "<option  value='{$row['category_id']}'>{$row['category_name']}</option>";
                                  }
                              }
                      ?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="category">Sub Category</label>
                    <select class="custom-select tm-select-accounts" name="sub_category" id="subcategory">
                      
                    </select>
                  </div>
                  <div class="row">
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label for="category">Product Availability</label>
                      <select class="custom-select tm-select-accounts" name="pro_availb" id="category">
                        <option selected>Select Availability</option>
                        <option value="In Stock">In Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                      </select>
                    </div>
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label for="stock">Units In Stock</label>
                      <input id="stock" name="stock" type="text" class="form-control validate" required/>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="name">Product Shipping Charge</label>
                    <input id="name" name="shipping_charges" type="text" class="form-control validate" required />
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();" ></i>
                </div>
                <div class="custom-file mt-2 mb-5">
                  <input id="fileInput" type="file" name="productimage1" style="display:none;" />
                  <input type="button" name="productimage1" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 1" onclick="document.getElementById('fileInput').click();" />
                </div>
                <div class="tm-product-img-dummy mx-auto">
                  <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();" ></i>
                </div>
                <div class="custom-file mt-2 mb-5">
                  <input id="fileInput" type="file" name="productimage2" style="display:none;" />
                  <input type="button" name="productimage2" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 2" onclick="document.getElementById('fileInput').click();" />
                </div>
                <div class="tm-product-img-dummy mx-auto">
                  <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();" ></i>
                </div>
                <div class="custom-file mt-2 mb-5">
                  <input id="fileInput" type="file" name="productimage3" style="display:none;" />
                  <input type="button" name="productimage3" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 3" onclick="document.getElementById('fileInput').click();" />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "../parts/footer.php" ?>
</body>
</html>
