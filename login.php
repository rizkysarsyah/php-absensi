<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a class="navbar-brand" href="index.php?page=<?php echo $_SESSION['level']; ?>">Absensi</a>
            </a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <?php include 'alert.php'; ?>
                <?php 
                error_reporting(0);
                if(isset($_POST['login'])) 
                {
                  include_once 'config/database.php';

                  $username = strip_tags($_POST['username']);
                  $password = ($_POST['password']);
                  try {
                    $sql = "SELECT * FROM pegawai WHERE username = :username AND password = :password";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->execute();

                    $count = $stmt->rowCount();
                    if($count == 1) {
                      $_SESSION['username'] = $username;

                      header("Location: index.php");
                      return;
                  }else{
                      echo " <div class='alert alert-danger alert-dismissible' id='myAlert'>
                      <strong>Gagal!</strong>Mohon untuk login kembali.
                      </div>";
                  }
              }
              catch(PDOException $e) {
                echo $e->getMessage();
            }


        }
        ?>
        <form method="POST" action="config/login_cek.php">
            <div class="form-group">
                <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Sign in</button>
        </form>
    </div>
    <div class="card-footer bg-white p-0  ">
        <div class="card-footer-item card-footer-item-bordered">
            <a href="#" class="footer-link">Create An Account</a></div>
            <div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Forgot Password</a>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>