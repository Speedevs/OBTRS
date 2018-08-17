<?php
	session_start();
	$_SESSION['updated_success_msg']="";
	$_SESSION['updated_error_msg']="";

	include '../dbconnect.php';

	if(isset($_POST['update-time-table']))
	{
		global $updated_success_msg, $updated_error_msg, $errormsg;
		$error = false;

		$route_id = $_POST['route_id'];
		
		$departureTime = $_POST['departureTime'];
		$arrivalTime = $_POST['arrivalTime'];

		if (empty($departureTime)) { 
			$error = true;
			array_push($errors, "departureTime is required"); 
		}
		if (empty($arrivalTime)) { 
			$error = true;
			array_push($errors, "arrivalTime is required"); 
		}
	
		if(!$error){
			$sql = "UPDATE `time_table` SET `departure_time`='$departureTime',`arrival_time`='$arrivalTime' WHERE `time_table`.`route_id`='$route_id'";
			$run = mysqli_query($con,$sql);
			
			if(!$run){
				die("data not updated");
			}
			else{
				$_SESSION['updated_success_msg'] = "Time updated successfully";
				header('location:time-table.php');
			}
		}
		else
			$_SESSION['updated_error_msg'] = "Data is empty";
			// header('location:routes.php');
	}
?>