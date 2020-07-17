<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">User Avatar</h2>
              <div class="tm-avatar-container">
                <img src="../assets/img/avatar.png" alt="Avatar" class="tm-avatar img-fluid mb-4" />
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

                include "../assets/include/config.php";
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE User_id = {$user_id}";
                $result = mysqli_query($con, $sql) or die ("Query Faild.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){

                ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" class="tm-signup-form row">
                <div class="form-group col-lg-6">
                  <label for="name">Account Name</label>
                  <input type="hidden" name="user_id" class="form-control validate" value="<?php echo $row['User_id']; ?>" />
                  <input id="name" name="username" type="text" class="form-control validate" value="<?php echo $row['Username']; ?>" required />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email">Account Email</label>
                  <input id="email" name="email" type="email" class="form-control validate" value="<?php echo $row['Email']; ?>" required />
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
                  <input id="phone" name="phone" type="tel" class="form-control validate" value="<?php echo $row['Phone']; ?>" required />
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Account Role</label>
                  <select class="custom-select" name="role" value="<?php echo $row['Role']; ?>">
                  <?php

                        if($row['Role'] == 1){
                            echo "<option value='1' selected>Admin</option>
                                    <option value='2'>Editor</option>
                                    <option value='3'>Seller</option>";

                        }elseif($row['Role'] == 2){
                            echo "<option value='1'>Admin</option>
                                    <option value='2' selected>Editor</option>
                                    <option value='3'>Seller</option>";
                        }else{
                            echo "<option value='1'>Admin</option>
                                    <option value='2'>Editor</option>
                                    <option value='3' selected>Seller</option>";
                        }

                    ?>
                  </select>
                </div>
                <div class="col-12">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <button type="submit" name="save" class="btn btn-primary btn-block text-uppercase" >
                    Update Profile
                  </button>
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
<?php include "../parts/footer.php" ?>

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
                <input id="name" name="username" type="text" class="form-control validate" />
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
                <select class="custom-select" name="role" value="<?php echo $row['Role']; ?>">
                  <?php

                        if($row['Role'] == 1){
                            echo "<option value='1' selected>Admin</option>
                                    <option value='2'>Editor</option>
                                    <option value='3'>Seller</option>";

                        }elseif($row['Role'] == 2){
                            echo "<option value='1'>Admin</option>
                                    <option value='2' selected>Editor</option>
                                    <option value='3'>Seller</option>";
                        }else{
                            echo "<option value='1'>Admin</option>
                                    <option value='2'>Editor</option>
                                    <option value='3' selected>Seller</option>";
                        }

                    ?>
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