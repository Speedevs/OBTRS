<?php
	session_start();
	include '../dbconnect.php';
	$_SESSION['updated_success_msg']="";
	$_SESSION['updated_error_msg']="";
	
	if(isset($_GET['admin_id']))
	{
		$admin_id = $_GET['admin_id'];
		
		$sql = "DELETE FROM `admin` WHERE `admin_id`='$admin_id'";
		$run = mysqli_query($con,$sql);
		
		if(!$run)
		{
			die("Unable to delete".mysqli_error($con));
		}
		else{
			$_SESSION['updated_success_msg'] = "Data successfully Deleted ";
			header('location: users.php');
		}
	}
?>