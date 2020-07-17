<?php include "../parts/header.php"; ?>

<div class="container mt-5">
  <form action="save-user.php" method ="POST" enctype="multipart/form-data">
    <div class="row tm-content-row">
      <div class="tm-block-col tm-col-avatar">
          <div class="tm-bg-primary-dark tm-block tm-block-avatar">
            <h2 class="tm-block-title">New Avatar</h2>
            <div class="tm-avatar-container">
              <img src="../assets/img/avatar.png" alt="Avatar" class="tm-avatar img-fluid mb-4" />
              <a href="#" class="tm-avatar-delete-link">
                <i class="far fa-trash-alt tm-product-delete-icon"></i>
              </a>
            </div>
            <div class="custom-file mt-3 mb-3">
              <input id="fileInput" type="file" name="fileToUpload" style="display:none;" />
              <input type="button" type="file" name="fileToUpload" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" onclick="document.getElementById('fileInput').click();" />
            </div>
          </div>
      </div>
      <div class="tm-block-col tm-col-account-settings">
          <div class="tm-bg-primary-dark tm-block tm-block-settings">
            <h2 class="tm-block-title">Account Settings</h2>
            <div class="tm-signup-form row">
              <div class="form-group col-lg-6">
                <label for="name">Account Name</label>
                <input id="name" name="user_name" type="text" class="form-control validate" />
              </div>
              <div class="form-group col-lg-6">
                <label for="email">Account Email</label>
                <input id="email" name="user_email" type="email" class="form-control validate" />
              </div>
              <div class="form-group col-lg-6">
                <label for="password">Password</label>
                <input id="password" name="user_password" type="password" class="form-control validate" />
              </div>
              <div class="form-group col-lg-6">
                <label for="password2">Re-enter Password</label>
                <input id="password2" name="user_password2" type="password" class="form-control validate" />
              </div>
              <div class="form-group col-lg-6">
                <label for="phone">Phone</label>
                <input id="phone" name="user_phone" type="tel" class="form-control validate" />
              </div>
              <div class="form-group col-lg-6">
                <label for="phone">Account Role</label>
                <select class="custom-select" name="role">
                  <option value="0">Select account</option>
                  <option value="1">Admin</option>
                  <option value="2">Editor</option>
                  <option value="3">Seller</option>
                </select>
              </div>
              <div class="col-12">
                <label class="tm-hide-sm">&nbsp;</label>
                <button type="submit" name="save" class="btn btn-primary btn-block text-uppercase" >
                  Save Profile
                </button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </form>
</div>
<?php include "../parts/footer.php" ?>