<?php
	session_start();
	include '../dbconnect.php';
	$_SESSION['updated_success_msg']="";
	$_SESSION['updated_error_msg']="";
	
	if(isset($_GET['route_id']))
	{
		$id = $_GET['route_id'];
		
		$sql = "DELETE from `route_detail`, `time_table` USING route_detail INNER JOIN time_table WHERE route_detail.route_id = $id AND time_table.route_id = $id";
		$run = mysqli_query($con,$sql);
		
		if(!$run)
		{
			die("Unable to delete".mysqli_error($con));
		}
		else{
			$_SESSION['updated_success_msg'] = "Data successfully Deleted of route_id = $id ";
			header('location:routes.php');
		}
	}
?>