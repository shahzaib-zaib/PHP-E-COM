<?php include "../parts/header.php" ?>
<div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-lg-9">
        
      </div>
      <div class="col-lg-3 mb-5">
        <a href="add-user.php" class="btn btn-primary btn-block text-uppercase" >
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
      <?php
          include "assets/include/config.php";
          
          $sql = "SELECT * FROM user";
          $result = mysqli_query($con, $sql) or die ("Query Faild.");
          if(mysqli_num_rows($result) > 0){

        
    ?>
    <!-- row -->
    <div class="row tm-content-row">
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="tm-block-col tm-col-avatar">
          <div class="tm-bg-primary-dark tm-block tm-block-avatar">
            <div class="row">
              <div class="form-group col-lg-6">
              <h2 class="tm-block-title"><?php echo $row['Username']; ?></h2>
              </div>
              <div class="form-group col-lg-6" style="color: #840606; text-align: right; font-weight: 700 !important;">
                <h6><?php 
                                
                      if($row['Role'] == 1){
                          echo "Admin";
                      }elseif($row['Role'] == 2){
                          echo "Editor";
                      }else {
                        echo "Seller";
                      }

                    ?>
                </h6>
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
                <a href='update-user.php?id=<?php echo $row["user_id"] ?>' class="btn btn-primary btn-block text-uppercase" > Update Account </a>
              </div>
              <div class="form-group col-lg-6">
                <a href='delete-user.php?id=<?php echo $row["user_id"] ?>' class="btn btn-primary btn-block text-uppercase" > Delete Account </a>
              </div>
            </div>
            
          </div>
        </div>
      <?php } ?>
    </div>
    <?php } ?>
</div>
<?php include "../parts/footer.php" ?>
