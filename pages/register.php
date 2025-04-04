

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register Lotto</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />

</head>

<body>
  <form method="post">
<?php
include '../config/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register Lotto</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <form method="post">
    <?php 
    if (!empty($_POST['txtUsername']) && !empty($_POST['txtPassword']) && !empty($_POST['txtName']) && !empty($_POST['txtTel'])) {
      $rs = mysqli_query($conn, "SELECT * FROM users WHERE username ='" . $_POST["txtUsername"] . "'");
      $num = mysqli_num_rows($rs);
      if ($num > 0) {
        echo '<script type="text/javascript">Swal.fire("เกิดข้อผิดพลาด!","มีชื่อผู้ใช้ในระบบแล้ว!","warning");</script>';
      } else {
        // $id = "";
        $name = addslashes($_POST["txtName"]);
        $users = addslashes($_POST["txtUsername"]);
        $pass = addslashes($_POST["txtPassword"]);
        // $options = array("cost"=>4);
        // $hashed_password = password_hash($pass, PASSWORD_BCRYPT,$options);
        $date = date('Y-m-d');
        $phone = addslashes($_POST["txtTel"]);
        // $imgnull = "";
        // $status = "users";
        $sql = "INSERT INTO users VALUES(NULL,'" . $name . "','" . $users . "','" . $pass . "','" . $date . "','" . $phone . "','',0,0,0)";
        // if (password_verify($pass, $hashed_password)) {
        if (mysqli_query($conn, $sql)) {
          // echo '<script>alert("สมัครสมาชิกเรียบร้อยแล้ว");</script>';
          echo '<script type="text/javascript">Swal.fire("สำเร็จ!","สมัครสมาชิกสำเร็จ!","success").then(function() {
            window.location = "login";
        });</script>';
        } else {
        //   echo '<script type="text/javascript">Swal.fire("เกิดข้อผิดพลาด!","สมัครสมาชิกไม่สำเร็จ!","warning").then(function() {
        //     window.location = "login";
        // });</script>';
        }
      // }
      }
    }
    ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4">สมัครสมาชิก</h2>
              <div class="auto-form-wrapper">
                <div class="form-group">
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
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="รหัสผ่าน" id="txtPassword" name="txtPassword" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm-Password" id="txtConPassword" name="txtConPassword" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="ชื่อ-สกุล" id="txtName" name="txtName" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="วันเกิด 1998-12-13" id="txtdate" name="txtdate" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="สกุล" id="txtLastname" name="txtLastname" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="ที่อยู่" id="txtAddress" name="txtAddress" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div> -->
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="เบอร์โทรศัพท์" id="txtTel" name="txtTel" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> I agree to the terms
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">สมัครสมาชิก</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">พร้อมเข้าใช้งานระบบแล้ว ?</span>
                  <a href="login" class="text-black text-small">เข้าสู่ระบบ</a>
                </div>

              </div>
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