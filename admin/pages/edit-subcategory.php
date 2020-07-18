<?php include "../parts/header.php" ?>
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Add Category</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
          <?php

                include "../assets/include/config.php";

                $subcat_id = $_GET['id'];
                $sql = "SELECT category.category_id, category.category_name, category.category_desc, category.category_img
                 FROM subcategory WHERE sub_id = {$subcat_id}";

                $result = mysqli_query($con, $sql) or die ("Query Faild.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){

            ?>
            <form action="save-subcategory.php" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="category">Category</label>
                    <select class="custom-select tm-select-accounts" name="category" id="category">
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
                      <label for="name">Subcategory Name</label>
                      <input id="name" name="subcategory_name" type="text" class="form-control validate" required />
                  </div>
                  <div class="form-group mb-3">
                    <label for="category_desc" >Description</label>
                    <textarea name="subcategory_desc" class="form-control validate" rows="5" required ></textarea>
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
                  <button type="submit" name="save" class="btn btn-primary btn-block text-uppercase">Add Category Now</button>
                </div>
            </form>
            <?php
                    }
                }
            ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "../parts/footer.php" ?>