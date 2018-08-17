<?php
	session_start();
	$_SESSION['updated_success_msg']="";
	$_SESSION['updated_error_msg']="";

	include '../dbconnect.php';

	if(isset($_POST['update-bus-type']))
	{
		global $updated_success_msg, $updated_error_msg, $errormsg;
		$error = false;

		$busNo = $_POST['busNo'];
        $busType = $_POST['busType'];
        $totalSeat = $_POST['totalSeat'];
		
		if (empty($busNo)) { 
            $error = true;
            array_push($errors, "busNo is required"); 
        }
        if (empty($busType)) { 
            $error = true;
            array_push($errors, "busType is required"); 
        }
        if (empty($totalSeat)) { 
            $error = true;
            array_push($errors, "totalSeat is required"); 
        }
		if(!$error){
			$sql = "UPDATE `bus_detail` SET `bus_no`='$busNo',`bus_type`='$busType',`total_seat`='$totalSeat' WHERE `bus_detail`.`bus_no`='$busNo'";
			$run = mysqli_query($con,$sql);
			
			if(!$run){
				die("data not updated");
			}
			else{
				$_SESSION['updated_success_msg'] = "Bus-Type updated successfully";
				header('location:bus-type.php');
			}
		}
		else
			$_SESSION['updated_error_msg'] = "Data is empty";
			// header('location:routes.php');
	}
?>