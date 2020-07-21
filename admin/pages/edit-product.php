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
              <?php

                $pro_id = $_GET['pid'];
                $sql = "SELECT products.*,category.category_name,subcategory.subcategory_name 
                from products join category on category.category_id = products.category join 
                subcategory on subcategory.sub_id = products.sub_category
                WHERE products.product_id = {$pro_id}";
        
                $result = mysqli_query($con, $sql) or die ("Query Faild.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {
              ?>
                <form action="save-product.php" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                    <label for="name">Product Name</label>
                    <input id="name" name="" type="hidden" class="form-control validate" value="<?php echo $row['product_id']; ?>" required />
                    <input id="name" name="product_name" type="text" class="form-control validate" value="<?php echo $row['product_name']; ?>" required />
                  </div>
                  <div class="form-group mb-3">
                    <label for="name">Product Brand</label>
                    <input id="name" name="product_brand" type="text" class="form-control validate" value="<?php echo $row['product_company']; ?>" required />
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control validate" name="product_desc" rows="3" required ><?php echo $row['product_description']; ?></textarea>
                  </div>
                  <div class="row">
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label for="stock">Product Price</label>
                      <input id="stock" name="product_price" type="text" class="form-control validate" value="<?php echo $row['product_price']; ?>" required/>
                    </div>
                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label for="stock">Sale Price</label>
                      <input id="stock" name="sale_price" type="text" class="form-control validate" value="<?php echo $row['sale_price']; ?>" required/>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="category">Category</label>
                    <select class="custom-select tm-select-accounts" name="category" onChange="getSubcat(this.value);" id="category">
                      <option selected>Select category</option>
                      <?php
                          include "../assets/include/config.php";
                          $sql1 = "SELECT * FROM category";
                          $result1 = mysqli_query($con,$sql1) or die("Query Failed");

                          if(mysqli_num_rows($result1) > 0){
                              while($row1 = mysqli_fetch_assoc($result1)){
                                  if ($row['category']  == $row1['category_id']) {
                                      $selected = "selected";
                                  } else {
                                      $selected = "";
                                  }
                                  
                                  echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
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
                      <input id="stock" name="stock" type="text" class="form-control validate" value="<?php echo $row['product_stock']; ?>" required/>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="name">Product Shipping Charge</label>
                    <input id="name" name="shipping_charges" type="text" class="form-control validate" value="<?php echo $row['shipping_charge']; ?>" required />
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <img  src="../assets/img/<?php echo $row['product_image1']; ?>" height="240px">
                  <input type="hidden" name="old_image" value="<?php echo $row['product_image1']; ?>">
                </div>
                <div class="custom-file mt-2 mb-5">
                  <input id="fileInput" type="file" name="new-image" style="display:none;" />
                  <input type="button" name="old_image" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 1" onclick="document.getElementById('fileInput').click();" />
                </div>
                <div class="tm-product-img-dummy mx-auto">
                  <img  src="../assets/img/<?php echo $row['product_image2']; ?>" height="240px">
                  <input type="hidden" name="old_image" value="<?php echo $row['product_image2']; ?>">
                </div>
                <div class="custom-file mt-2 mb-5">
                  <input id="fileInput2" type="file" name="new-image" style="display:none;" />
                  <input type="button" name="old_image" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 2" onclick="document.getElementById('fileInput2').click();" />
                </div>
                <div class="tm-product-img-dummy mx-auto">
                  <img  src="../assets/img/<?php echo $row['product_image3']; ?>" height="240px">
                  <input type="hidden" name="old_image" value="<?php echo $row['product_image3']; ?>">
                </div>
                <div class="custom-file mt-2 mb-5">
                  <input id="fileInput3" type="file" name="new-image" style="display:none;" />
                  <input type="button" name="old_image" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE 3" onclick="document.getElementById('fileInput3').click();" />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </div>
            </form>
            <?php
                }
                  }else{
                      echo "Result Not Found";
                  }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "../parts/footer.php" ?>
</body>
</html>