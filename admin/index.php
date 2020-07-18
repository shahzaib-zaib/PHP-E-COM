<?php
    include "assets/include/config.php";

    session_start();

    if(isset($_SESSION["username"])){
        header("Location: {$hostname}/admin/dashboard.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Shahzaib Online Shopping</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="assets/css/templatemo-style.css">
</head>
<body>
    <div class="container tm-mt-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control validate" id="username" value="" required />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control validate" id="password" value="" required />
                  </div>
                  <div class="form-group mt-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block text-uppercase"> Login </button>
                  </div>
                  <button class="mt-5 btn btn-primary btn-block text-uppercase">
                    Forgot your password?
                  </button>
                </form>

                <?php
                    if(isset($_POST['login'])){
                        include "assets/include/config.php";
                        $username = mysqli_real_escape_string($con, $_POST['username']);
                        $password = md5($_POST['password']);

                    $sql = "SELECT User_id, Username, Role FROM user WHERE Username = '{$username}' AND Password = '{$password}'";
                    $result = mysqli_query($con, $sql) or die("Query Failed");

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            session_start();
                            $_SESSION["username"] = $row['Username'];
                            $_SESSION["admin_id"] = $row['User_id'];
                            $_SESSION["user_role"] = $row['Role'];

                            header("Location: {$hostname}/admin/pages/dashboard.php");

                        }
                    }else{
                        echo '<div class="alert-dander">Username and Password are not match</div>';
                    }
                    }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>
</html>