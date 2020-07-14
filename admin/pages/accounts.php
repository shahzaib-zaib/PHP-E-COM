<div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-lg-9">
        
      </div>
      <div class="col-lg-3 mb-5">
        <a href="index.php?page=add-user" class="btn btn-primary btn-block text-uppercase" >
          Add Account
        </a>
      </div>
    </div>
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <h2 class="tm-block-title">List of Accounts</h2>
            <p class="text-white">Accounts</p>
            <select class="custom-select" name="role">
              <option value="0">Select account</option>
              <option value="1">Admin</option>
              <option value="2">Editor</option>
              <option value="3">Seller</option>
            </select>
        </div>
        </div>
    </div>
    <!-- row -->
    <div class="row tm-content-row">
        <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <div class="row">
                <div class="form-group col-lg-6">
                <h2 class="tm-block-title">Username</h2>
                </div>
                <div class="form-group col-lg-6" style="color: #840606; text-align: right; font-weight: 700 !important;">
                <h6>Admin</h6>
                </div>
              </div>
              <div class="tm-avatar-container">
                <img src="assets/img/avatar.png" alt="Avatar" class="tm-avatar img-fluid mb-4" />
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <a href="" class="btn btn-primary btn-block text-uppercase" > Update Account </a>
                </div>
                <div class="form-group col-lg-6">
                  <a href="" class="btn btn-primary btn-block text-uppercase" > Delete Account </a>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>