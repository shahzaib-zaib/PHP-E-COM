<?php

include "config.php";

$post_id = $_GET['id'];
$sql = "SELECT post.post_id, post.title, post.description,post.post_img,
category.category_name, post.category FROM post 
LEFT JOIN category ON post.category = category.category_id
LEFT JOIN user ON post.author = user.user_id
WHERE post.post_id = {$post_id}";

$result = mysqli_query($con, $sql) or die ("Query Faild.");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {

?>

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Edit Category</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="index.php?page=save-edit-category" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <input id="name" name="cat_id" type="hidden" class="form-control validate" value="<?php echo $row['category_id']; ?>" required />
              </div>
              <div class="form-group mb-3">
                <label for="name" >Category Name </label>
                <input id="name" name="category_name" type="text" class="form-control validate" value="<?php echo $row['category_name']; ?>" required />
              </div>
              <div class="form-group mb-3">
                <label for="category_desc" >Description</label>
                <textarea name="category_desc" class="form-control validate" rows="5" required ><?php echo $row['category_desc'] ?></textarea>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
            <div class="tm-product-img-dummy mx-auto">
                <img  src="assets/img/<?php echo $row['category_img']; ?>" height="240px">
                <input type="hidden" name="old_image" value="<?php echo $row['category_img']; ?>">
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