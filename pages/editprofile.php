<?php
session_start();
include '../config/config.php';
CheckLogin();


// if (mysqli_query($conn, $sql)) {
//   echo '<script>alert("แก้ไขข้อมูลแล้ว")</script>';
//   //echo $sql;
//   //  header( "refresh: 0.1;index.php");
// } else {
//   //echo $sql;
//   echo '<script>alert("แก้ไขข้อมูลไม่ได้")</script>';
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lotto</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../vendors/icheck/skins/all.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
</head>

<body>
  <form method="post" id="form1" enctype="multipart/form-data">
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <?php
      include 'navbar/navbar.php';
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php
        include 'navbar/navbarLeft.php';
        ?>
        <!-- partial -->
        <?php
        $rs = mysqli_query($conn, "SELECT * FROM users WHERE username='" . $_SESSION['users'] . "'");
        $num = mysqli_num_rows($rs);
        $row = mysqli_fetch_array($rs);

        $password = $row["password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if (!empty($_POST)) {
          $pic = "";
          if (is_uploaded_file($_FILES['files']['tmp_name'])) {
            move_uploaded_file($_FILES['files']['tmp_name'], "imgpf/" . $_FILES['files']['name']);
            $pic .= "imgpf/" . $_FILES['files']['name'];
            $_SESSION["pic"] = $pic;
          }
          if ($_POST["txtpass"] != null) {
            $password = $_POST["txtpass"];
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = '" . $password . "',user_name = '" . $_POST["txtname"] . "',phone = '" . $_POST["txtphone"] . "',image = '".$pic."' WHERE user_id LIKE '" . $_POST["txtC_id"] . "'";
            if (mysqli_query($conn, $sql)) {
              echo '<script type="text/javascript">Swal.fire("สำเร็จ!","แก้ไขโปรไฟล์เรียบร้อยแล้ว!","success").then(function() {
                window.location = "editprofile.php";
            });</script>';
            } else {
              echo '<script type="text/javascript">Swal.fire("เกิดข้อผิดพลาด!","ไม่สามารถแก้ไขโปรไฟล์ได้!","error")</script>';
            }
          } else {
            $sql = "UPDATE users SET user_name = '" . $_POST["txtname"] . "',phone = '" . $_POST["txtphone"] . "',image = '".$pic."' WHERE user_id='" . $_POST["txtC_id"] . "'";
            if (mysqli_query($conn, $sql)) {
              echo '<script type="text/javascript">Swal.fire("สำเร็จ!","แก้ไขโปรไฟล์เรียบร้อยแล้ว!","success").then(function() {
                window.location = "editprofile.php";
            });</script>';
            } else {
              echo '<script type="text/javascript">Swal.fire("เกิดข้อผิดพลาด!","ไม่สามารถแก้ไขโปรไฟล์ได้!","error")</script>';
            }
          }
        }
        ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4>ข้อมูลส่วนตัว</h4>
                    <!-- <p class="card-description">
                      Edit Profile
                    </p> -->

                    <div class="form-group">
                      <label for="exampleInputName1">ชื่อผู้ใช้</label>
                      <input type="text" class="form-control" id="txtusername" name="txtusername" placeholder="ชื่อผู้ใช้" disabled="disabled" value="<?= $row['username'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">รหัสผ่าน</label>
                      <input type="password" class="form-control" id="txtpass" name="txtpass" placeholder="รหัสผ่าน">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">ชื่อ</label>
                      <input type="text" class="form-control" id="txtname" name="txtname" placeholder="ชื่อ" value="<?= $row['user_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">เบอร์โทรศัพท์</label>
                      <input type="text" class="form-control" id="txtphone" name="txtphone" placeholder="เบอร์โทรศัพท์" value="<?= $row['phone'] ?>">
                    </div>
                    <div class="form-group">
                      <label>รูปโปรไฟล์</label>
                      <!-- <input type="file" name="img[]" class="file-upload-default"> -->
                      <div class="input-group col-xs-12">
                        <!-- <input type="file" class="form-control" id="files" name="files" placeholder="รูปโปรไฟล์" value="">   -->
                        <input type="file" class="form-control file-upload-info" id="files" name="files" placeholder="Upload Image">
                        <!-- <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span> -->
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleTextarea1">Textarea</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
                    </div> -->
                    <button type="submit" class="btn btn-success mr-2">บันทึก</button>
                    <input type="hidden" name="txtC_id" id="txtC_id" value="<?= $row["user_id"] ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php
          include 'navbar/footer.php';
          ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <script src="../vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
  </form>
</body>

</html>