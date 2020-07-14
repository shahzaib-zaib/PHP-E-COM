<?php

    if(isset($_POST['submit'])){
        include "assets/include/config.php";

        $categoryid = mysqli_real_escape_string($con,$_POST['$cat_id']);
        $catname = mysqli_real_escape_string($con,$_POST['cat_name']);
        $sql = "UPDATE category SET category_name = '{$catname}' WHERE category_id = '{$categoryid}'";

        if(mysqli_query($con, $sql)){
            header("location:category.php");
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
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label for="name" >Category Name </label>
                <input id="name" name="category_name" type="text" class="form-control validate" required />
              </div>
              <div class="form-group mb-3">
                <label for="category_desc" >Description</label>
                <textarea name="category_desc" class="form-control validate" rows="5" required ></textarea>
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
            <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Update Product</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>