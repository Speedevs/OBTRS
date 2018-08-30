<?php
	session_start();
	$_SESSION['updated_success_msg']="";
	$_SESSION['updated_error_msg']="";

	include '../dbconnect.php';

	if(isset($_POST['update-users']))
	{
		global $updated_success_msg, $updated_error_msg, $errormsg;
		$error = false;

		$admin_id = $_POST['admin_id'];
        $user_type = $_POST['user_type'];
		
		if (empty($user_type)) { 
            $error = true;
            array_push($errors, "user_type is required"); 
        }
		if(!$error){
			$sql = "UPDATE `admin` SET `user_type`='$user_type' WHERE `admin`.`admin_id`='$admin_id'";
			$run = mysqli_query($con,$sql);
			
			if(!$run){
				die("data not updated");
			}
			else{
				$_SESSION['updated_success_msg'] = "Data successfully";
				header('location:users.php');
			}
		}
		else
			$_SESSION['updated_error_msg'] = "Data is empty";
			// header('location:routes.php');
	}
?>