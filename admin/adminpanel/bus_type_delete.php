<?php
	session_start();
	include '../dbconnect.php';
	$_SESSION['updated_success_msg']="";
	$_SESSION['updated_error_msg']="";
	
	if(isset($_GET['bus_no']))
	{
		$bus_no = $_GET['bus_no'];
		
		$sql = "DELETE FROM `bus_detail` WHERE `bus_no`='$bus_no'";
		$run = mysqli_query($con,$sql);
		
		if(!$run)
		{
			die("Unable to delete".mysqli_error($con));
		}
		else{
			$_SESSION['updated_success_msg'] = "Data successfully Deleted of bus_no = $bus_no ";
			header('location:bus-type.php');
		}
	}
?>