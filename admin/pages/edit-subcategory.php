<?php include "../parts/header.php" ?>
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Edit Subcategory</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
          <?php

                include "../assets/include/config.php";

                  $subcat_id = $_GET['cid'];

                  $sql = "SELECT subcategory.sub_id, subcategory.subcategory_name,
                  subcategory.subcategory_desc,subcategory.creationDate,subcategory.subcategory_img,
                  category.category_name,subcategory.categoryid FROM subcategory 
                  LEFT JOIN category ON subcategory.categoryid = category.category_id
                  WHERE subcategory.sub_id = {$subcat_id}";
                  
                  $result = mysqli_query($con, $sql) or die ("Query Faild.");
                  if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)) {

            ?>
            <form action="save-edit-subcategory.php" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="category">Category</label>
                    <select class="custom-select tm-select-accounts" name="category" id="category">
                      <option selected>Select category</option>
                      <?php
                          include "../assets/include/config.php";
                          $sql1 = "SELECT * FROM category";
                          $result1 = mysqli_query($con,$sql1) or die("Query Failed");

                          if(mysqli_num_rows($result1) > 0){
                              while($row1 = mysqli_fetch_assoc($result1)){
                                  if ($row['categoryid']  == $row1['category_id']) {
                                      $selected = "selected";
                                  } else {
                                      $selected = "";
                                  }
                                  
                                  echo "<option {$selected} value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                              }
                          }
                      ?>
                    </select>
                    <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>" id="">
                  </div>
                  <div class="form-group mb-3">
                      <label for="name">Subcategory Name</label>
                      <input id="name" name="sub_id" type="hidden" class="form-control validate" value="<?php echo $row['sub_id']; ?>" required />
                      <input id="name" name="subcategory_name" type="text" class="form-control validate" value="<?php echo $row['subcategory_name']; ?>" required />
                  </div>
                  <div class="form-group mb-3">
                    <label for="category_desc" >Description</label>
                    <textarea name="subcategory_desc" class="form-control validate" rows="5" required ><?php echo $row['subcategory_desc']; ?></textarea>
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                  <div class="tm-product-img-dummy mx-auto">
                  <img  src="../assets/img/<?php echo $row['subcategory_img']; ?>" height="240px">
                <input type="hidden" name="old_image" value="<?php echo $row['subcategory_img']; ?>">
                  </div>
                  <div class="custom-file mt-3 mb-3">
                    <input id="fileInput" type="file" name="new-image" style="display:none;" />
                    <input type="button" type="hidden" name="old_image" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" onclick="document.getElementById('fileInput').click();" />
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" name="save" class="btn btn-primary btn-block text-uppercase">Edit subCategory</button>
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