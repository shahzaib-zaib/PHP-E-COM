<?php
    if(isset($_POST['save'])){
        include "assets/include/config.php";

        $cat = mysqli_real_escape_string($con,$_POST['cat']);

        $sql = "SELECT category_name FROM category WHERE category_name = '{$cat}'";
        $result = mysqli_query($con,$sql) or die("Query Failed");

        if(mysqli_num_rows($result) > 0){
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>Category name already Exists</p>";
        }else{
            $sql1 = "INSERT INTO category (category_name)
            VALUES('{$cat}')";

        if(mysqli_query($con,$sql1)){
            header("location:index.php?page=category");
        }
        }
    }
?>
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
            <form action="save-category.php" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label for="name" >Category Name </label>
                <input id="name" name="cat" type="text" class="form-control validate" required />
              </div>
              <div class="form-group mb-3">
                <label for="catdesc" >Description</label>
                <textarea class="form-control validate" rows="3" required ></textarea>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
            <div class="tm-product-img-dummy mx-auto">
              <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();" ></i>
            </div>
            <div class="custom-file mt-3 mb-3">
              <input id="fileInput" type="file" name="fileToUpload" style="display:none;" />
              <input type="button" type="file" name="fileToUpload" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" onclick="document.getElementById('fileInput').click();" />
            </div>
          </div>
          <div class="col-12">
            <button type="submit" name="save" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>