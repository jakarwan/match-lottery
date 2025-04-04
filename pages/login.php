<?php
include '../config/config.php';
session_start();
// if(isset($_POST['txtUsername']) && isset($_POST['txtPassword'])){
// 	$rs = mysqli_query($conn,"SELECT * FROM users WHERE username ='".$_POST['txtUsername']."' AND password ='".$_POST['txtPassword']."'" );
// 	$num = mysqli_num_rows($rs);
// 	$row = mysqli_fetch_array($rs);
// 	if ($num>0) {
// 			$_SESSION["users"] = $row["username"];
// 			$_SESSION["name"] = $row["user_name"];
// 			$_SESSION["date"] = $row["date"];
//       $_SESSION["phone"] = $row["phone"];
//       $_SESSION["status"] = $row["status"];
// 				if($row['image'] != null){
// 					$_SESSION["pic"] = $row["image"];
// 				}else{
// 					$_SESSION["pic"] = "../images/faces/face1.jpg";
// 				}
// 			header('refresh: 0.1;index.php');
// 	}else{
// 		echo '<script>alert("ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด \nไม่สามารถเข้าระบบได้");</script>';
// 	}		
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Lotto</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <form method="post">
    <?php
    if (isset($_POST['submit'])) {
      $username = $_POST["txtUsername"];
      $password = trim($_POST['txtPassword']);
      // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      #$rs = mysqli_query($conn,"SELECT * FROM users WHERE username ='".$_POST['txtUsername']."' AND password ='".$_POST['txtPassword']."'" );
      // $sql = mysqli_query($conn,"SELECT * FROM users WHERE username ='".$_POST['txtUsername']."'" );
      $sql = "SELECT * FROM users WHERE Username = '" . mysqli_real_escape_string($conn, $username) . "' AND password ='" . mysqli_real_escape_string($conn, $password) . "' ";
      $rs = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($rs);


      if ($num > 0) {
        $row = mysqli_fetch_array($rs);
        // if (password_verify($password, $row['password'])) {
        $_SESSION["users"] = $row["username"];
        $_SESSION["name"] = $row["user_name"];
        $_SESSION["date"] = $row["date"];
        $_SESSION["phone"] = $row["phone"];
        $_SESSION["status"] = $row["status"];
        $_SESSION["userId"] = $row["user_id"];
        $_SESSION["isActive"] = $row["isActive"];
        // $_SESSION["online"] = $row["online"];
        // $sqlOnlinechk = "SELECT * FROM users WHERE user_id = '" . $_SESSION["userId"] . "' ";
        // $querychk = $conn->query($sqlOnlinechk);
        // $chkonline = mysqli_fetch_array($querychk);
        // if ($chkonline["online"] == 1) {
        //   echo '<script type="text/javascript">Swal.fire("Error!","มีการล็อกอินเข้าระบบซ้อนกัน","error").then(function() {
        //     window.location = "login";
        // });</script>';
        //   // $sqlOnline = "UPDATE users SET online = 0 WHERE user_id = '" . $_SESSION["userId"] . "' ";
        //   // $query = $conn->query($sqlOnline);
        //   session_destroy();
        //   // exit;
        // } else {
        //   header('refresh: 0;index');
        // }
        $sqlOnline = "UPDATE users SET online = 1 WHERE user_id = '" . $_SESSION["userId"] . "' ";
        $query = $conn->query($sqlOnline);
        if ($row["status"] == 0) {
          $_SESSION["status"] = 'User';
        } else if ($row["status"] == 1) {
          $_SESSION["status"] = 'Admin';
        } else {
          session_destroy();
        }
        if ($_SESSION["isActive"] == 0) {
          echo '<script type="text/javascript">Swal.fire("Error!","เกิดข้อผิดพลาดกรุณาติดต่อแอดมินเพื่อใช้บริการ FB:Jakarwan Borkaew","error").then(function() {
                window.location = "login.php";
            });</script>';
          exit;
          session_destroy();
        }
        
        if ($row['image'] != null) {
          $_SESSION["pic"] = $row["image"];
        } else {
          $_SESSION["pic"] = "../images/faces/face1.jpg";
        }
        header('refresh: 0;index.php');
        // }
        //  else {
        //   echo '<script>alert("ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด \nไม่สามารถเข้าระบบได้");</script>';
        // }
      } else {
        echo '<script type="text/javascript">Swal.fire("ไม่สามารถเข้าระบบได้!","ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด!","warning");</script>';
      }
    }
    ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <div class="form-group">
                  <label class="label">ชื่อผู้ใช้</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="ชื่อผู้ใช้" id="txtUsername" name="txtUsername" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">รหัสผ่าน</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" id="txtPassword" name="txtPassword" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary submit-btn btn-block">เข้าสู่ระบบ</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> จดจำรหัสผ่าน
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">ลืมรหัสผ่าน</a>
                </div>
                <!-- <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                </div> -->
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">ยังไม่มีชื่อผู้ใช้งานเพื่อเข้าสู่ระบบ ?</span>
                  <a href="register" class="text-black text-small">สมัครสมาชิก</a>
                </div>

              </div>
              <ul class="auth-footer">
                <li>
                  <a href="#">Conditions</a>
                </li>
                <li>
                  <a href="#">Help</a>
                </li>
                <li>
                  <a href="#">Terms</a>
                </li>
              </ul>
              <p class="footer-text text-center">copyright © 2021 Bootstrapdash. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <!-- endinject -->
  </form>
</body>

</html>