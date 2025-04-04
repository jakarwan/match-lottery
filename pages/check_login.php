<?php
	session_start();
	include '../config/config.php';
	$username = $_POST['txtUsername'];
	$password = $_POST['txtPassword'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$SQL = "SELECT * FROM member WHERE Username = '".mysqli_real_escape_string($conn,$username)."' 
	and Password = '".mysqli_real_escape_string($conn,$hashed_password)."'";
	$objQuery = mysqli_query($conn,$SQL);
	$objResult = mysqli_fetch_array($objQuery);
	print_r($objResult);
	if(!$objResult)
	{
			//echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["m_id"] = $objResult["m_id"];
			$_SESSION["status"] = $objResult["status"];

			session_write_close();
			
			if($objResult["status"] == "USER")
			{
				header("location:../index");
			}
			else
			{
				echo  '<div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">Close X</a>
                <p><strong>Alerta!</strong></p>
                Email or password wrong! Please try again!.
            </div>';
			}
	}
	mysqli_close($conn);
?>