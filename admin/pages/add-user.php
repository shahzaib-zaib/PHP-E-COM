<?php include "assets/include/header.php"; 
    

    if(isset($_POST['save'])){
        include "config.php";

        $fname = mysqli_real_escape_string($con,$_POST['fname']);
        $lname = mysqli_real_escape_string($con,$_POST['lname']);
        $user = mysqli_real_escape_string($con,$_POST['user']);
        $password = mysqli_real_escape_string($con,md5($_POST['password']));
        $role = mysqli_real_escape_string($con,$_POST['role']);

    $sql = "SELECT username FROM user WHERE username = '{$user}'";
    $result = mysqli_query($con,$sql) or die("Query Failed");

    if(mysqli_num_rows($result) > 0){
        echo "<p style='color:red;text-align:center;margin: 10px 0;'>Username already Exists</p>";
    }else{
        $sql1 = "INSERT INTO user (first_name, last_name, username, password, role)
        VALUES('{$fname}','{$lname}','{$user}','{$password}','{$role}')";

    if(mysqli_query($con,$sql1)){
        header("location:users.php");
    }
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
              <form action="<?php $_SERVER['PHP_SELF']; ?>" class="tm-signup-form row">
                <div class="form-group col-lg-6">
                  <label for="name">Account Name</label>
                  <input id="name" name="name" type="text" class="form-control validate" />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Account Email</label>
                  <input id="email" name="email" type="email" class="form-control validate" />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">Password</label>
                  <input id="password" name="password" type="password" class="form-control validate" />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">Re-enter Password</label>
                  <input id="password2" name="password2" type="password" class="form-control validate" />
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Phone</label>
                  <input id="phone" name="phone" type="tel" class="form-control validate" />
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Account Role</label>
                  <select class="custom-select">
                    <option value="0">Select account</option>
                    <option value="1">Admin</option>
                    <option value="2">Editor</option>
                    <option value="3">Seller</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <button type="submit" class="btn btn-primary btn-block text-uppercase" >
                    Save Profile
                  </button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>