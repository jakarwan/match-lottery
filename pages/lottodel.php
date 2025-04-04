<?php
session_start();
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


</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php
        include 'navbar/navbar.php';
        if($_SESSION['status'] != 'Admin') {
            echo '<script type="text/javascript">Swal.fire("Error!","ไม่มีสิทธิ์เข้าใช้งานในหน้านี้","error").then(function() {
                window.location = "lottonumber";
            });</script>';
        }
        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php
            include 'navbar/navbarLeft.php'
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row flex-grow">
                                <div class="col-12">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <h4 class="text-white mb-4">เลือกลบล็อตเตอรี่</h4>
                                            <form class="forms-sample" action="lottodel" method="get" id="submitSearch">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-5 col-sm-6 col-md-4">
                                                                    <label for="installmentsearch" class="text-white">งวดที่</label>
                                                                    <select class="form-control form-control-xl" id="installmentsearch" name="installmentsearch">
                                                                        <option value="0">เลือก</option>
                                                                        <?php
                                                                        // $ins = $_POST["installment"];
                                                                        for ($i = 1; $i < 25; $i++) {
                                                                            $_SESSION["installment"] = $i;
                                                                        ?>

                                                                            <option <?= (!empty($_COOKIE["installmentsearch"]) ? ($_COOKIE["installmentsearch"] == $i  ? 'selected' : '') : '')  ?> id="<?php echo $i ?>" value="<?php echo $i ?>"><?php echo $i ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-7 col-sm-6 col-md-4">
                                                                    <label for="installment" class="text-white">วันที่</label>
                                                                    <input <?= (!empty($_COOKIE["datelottosearch"]) ? ($_COOKIE["datelottosearch"] == $i) : '')  ?> type="date" class="form-control form-control-xl" id="datelottosearch" name="datelottosearch" value="<?php echo $_COOKIE['datelottosearch'] ?>">
                                                                </div>
                                                                <!-- <div class="col-12">
                                                                    <label class="mt-4">เลขล็อตเตอรี่</label>
                                                                    <input type="text" class="form-control col-4" id="lottosearch" name="lottosearch" placeholder="เลขล็อตเตอรี่" onkeypress="submitSearch()" autofocus>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" id="del" class="btn btn-danger mr-2" onkeypress="submitSearch()">ลบข้อมูล</button>
                                            </form>
                                            <div class="row flex-grow">
                                                <?php
                                                include '../config/config.php';
                                                CheckLogin();
                                                $lottosearch = null;
                                                if (!empty($_GET)) {
                                                    // $lottosearch = $_GET["lottosearch"];

                                                    $datesearch = $_GET["datelottosearch"];
                                                    $installmentsearch = $_GET["installmentsearch"];
                                                    if ($_GET["installmentsearch"] != 0 and $_GET["datelottosearch"] == null) {
                                                        $sqlcheck = "SELECT * FROM lotto_number WHERE installment='" . $installmentsearch . "' ";
                                                        $rs = mysqli_query($conn, $sqlcheck);
                                                        $num = mysqli_num_rows($rs);
                                                        if ($num > 0) {
                                                            $sql = "DELETE FROM lotto_number WHERE installment='" . $installmentsearch . "' AND user_id='" . $_SESSION["userId"] . "' ";
                                                            // echo 'ลบตามงวด';
                                                        } else {
                                                            echo '<script type="text/javascript">Swal.fire("Fail!","You clicked the button!","error")</script>';
                                                        }
                                                    } else if ($_GET["installmentsearch"] && $_GET["datelottosearch"]) {
                                                        $sqlcheck = "SELECT * FROM lotto_number WHERE installment='" . $installmentsearch . "' AND date='" . $datesearch . "' AND user_id='" . $_SESSION["userId"] . "' ";
                                                        $rs = mysqli_query($conn, $sqlcheck);
                                                        $num = mysqli_num_rows($rs);
                                                        if ($num > 0) {
                                                            $sql = "DELETE FROM lotto_number WHERE installment='" . $installmentsearch . "' AND date='" . $datesearch . "' AND user_id='" . $_SESSION["userId"] . "' ";
                                                            // echo 'ลบตามงวด+วันที่';
                                                        } else {
                                                            echo '<script type="text/javascript">Swal.fire("Fail!","You clicked the button!","error")</script>';
                                                        }
                                                    } else if ($_GET["datelottosearch"] != null) {
                                                        $sqlcheck = "SELECT * FROM lotto_number WHERE date='" . $datesearch . "' ";
                                                        $rs = mysqli_query($conn, $sqlcheck);
                                                        $num = mysqli_num_rows($rs);
                                                        if ($num > 0) {
                                                            $sql = "DELETE FROM lotto_number WHERE date='" . $datesearch . "' AND user_id='" . $_SESSION["userId"] . "' ";
                                                            // echo 'ลบตามวันที่';
                                                        } else {
                                                            echo '<script type="text/javascript">Swal.fire("Fail!","You clicked the button!","error")</script>';
                                                        }
                                                    } else {
                                                        echo '<script type="text/javascript">Swal.fire("Fail!","You clicked the button!","error")</script>';
                                                    }

                                                    // $result = $conn->query($sql);
                                                    // $rowcount = mysqli_num_rows($result);

                                                    if (mysqli_query($conn, $sql)) {
                                                        echo '<script type="text/javascript">Swal.fire("สำเร็จ!","ลบข้อมูลสำเร็จแล้ว").then(function() {
                                                            window.location = "lottodel";
                                                        });</script>';
                                                    } else {
                                                        echo '<script type="text/javascript">Swal.fire("เกิดข้อผิดพลาด!","ลบข้อมูลไม่สำเร็จ!","error").then(function() {
                                                            window.location = "lottodel";
                                                        });</script>';
                                                    }
                                                }
                                                // echo "<div class='col-12 mt-4 alert alert-primary'>";
                                                // echo "<div class='text-center'>";
                                                // echo "<span>เลขตรงกัน $rowcount รายการ</span>";
                                                // echo "</div>";
                                                // echo "</div>";
                                                // echo $rowcount;
                                                // print_r($result);
                                                // if ($rowcount > 0) {
                                                //while ($row = mysqli_fetch_array($result)) {
                                                // print_r($row);

                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021
                            <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                            <i class="mdi mdi-heart text-danger"></i>
                        </span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script>
        $('#installmentsearch').on('change', function() {
            // alert('test');
            const d = new Date();
            d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = 'installmentsearch' + "=" + $('#installmentsearch').val() + ";" + expires + ";path=/";
        })

        $('#datelottosearch').on('change', function() {
            // console.log(document.getElementById("datelotto").value);
            const d = new Date();
            d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = 'datelottosearch' + "=" + $('#datelottosearch').val() + ";" + expires + ";path=/";
        })

        function submitSearch() {
            //let len = document.getElementById("del").value.length;
            if (document.getElementById("submitSearch").submit()) {
                setTimeout(function() {
                    document.getElementById("submitSearch").submit();
                }, 100);
            } else {
                return false;
            }
        }
    </script>
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
</body>

</html>