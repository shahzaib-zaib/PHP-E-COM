<?php    

    if(isset($_POST['save'])){
        include "assets/include/config.php";

        $username = mysqli_real_escape_string($con,$_POST['username']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        //$password = mysqli_real_escape_string($con,md5($_POST['password']));
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $role = mysqli_real_escape_string($con,$_POST['role']);

        $sql = "UPDATE user SET username = '{$username}', Email = '{$emai}', Phone = '{$phone}', Role = '{$role}' WHERE user_id = '{$userid}'";

        if(mysqli_query($con,$sql)){
            header("location:index.php?page=accounts");
        }

    }

?>
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">New Avatar</h2>
              <div class="tm-avatar-container">
                <img src="assets/img/avatar.png" alt="Avatar" class="tm-avatar img-fluid mb-4" />
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <button class="btn btn-primary btn-block text-uppercase">
                Add New Photo
              </button>
            </div>
        </div>
        <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
              <?php

                include "assets/include/config.php";
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE user_id = {$user_id}";
                $result = mysqli_query($con, $sql) or die ("Query Faild.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){

                ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" class="tm-signup-form row">
                <div class="form-group col-lg-6">
                  <label for="name">Account Name</label>
                  <input id="name" name="username" type="text" class="form-control validate" />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Account Email</label>
                  <input id="email" name="email" type="email" class="form-control validate" />
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Phone</label>
                  <input id="phone" name="phone" type="tel" class="form-control validate" />
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
                  <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase" >
                    Save Profile
                  </button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>