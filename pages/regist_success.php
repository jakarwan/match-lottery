<?php
	include '../config/config.php';
	
	$SQL = "SELECT * FROM member WHERE Username = '".trim($_POST['txtUsername'])."' ";
	$objQuery = mysqli_query($conn,$SQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult)
	{
		//	echo "Username already exists!";
	}
	else
	{	
		
		$SQL = "INSERT INTO member (Username,Password,f_name,l_name,address,tel) VALUES ('".$_POST["txtUsername"]."', 
		'".$_POST["txtPassword"]."','".$_POST["txtName"]."','".$_POST["txtLastname"]."','".$_POST["txtAddress"]."','".$_POST["txtTel"]."')";
		$objQuery = mysqli_query($conn,$SQL);
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='login.php'>Login page</a>";
		
	}

	mysqli_close($conn);
?>


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

	<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Register</h2>
            <div class="auto-form-wrapper">
            	<div class="form-group">
                  <div class="input-group">
                  	<div>Register Completed!<br><hr>
						<a href='login.php'>Login page</a></div>
                    <div class="input-group-append">
                    </div>
                  </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
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
</body>

</html>