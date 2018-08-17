<?php
	session_start();
	$_SESSION['updated_success_msg']="";
	$_SESSION['updated_error_msg']="";

	include '../dbconnect.php';

	if(isset($_POST['update-route']))
	{
		global $updated_success_msg, $updated_error_msg, $errormsg;
		$error = false;

		$route_id = $_POST['route_id'];
		
		$journeyFrom = $_POST['journeyFrom'];
		$journeyTo = $_POST['journeyTo'];
		$viaStation = $_POST['viaStation'];
		$rent = $_POST['fare'];

		if (empty($journeyFrom)) { 
			$error = true;
			array_push($errors, "journeyFrom is required"); 
		}
		if (empty($journeyTo)) { 
			$error = true;
			array_push($errors, "journeyTo is required"); 
		}
		if (empty($viaStation)) { 
			$error = true;
			array_push($errors, "viaStation is required"); 
		}
		if (empty($rent)) { 
			$error = true;
			array_push($errors, "rent is required"); 
		}
	
		if(!$error){
			$sql = "UPDATE `route_detail` SET `departure_station`='$journeyFrom',`arrival_station`='$journeyTo', `via_station`='$viaStation', `rent`='$rent' WHERE `route_detail`.`route_id`='$route_id'";
			$run = mysqli_query($con,$sql);
			
			if(!$run){
				die("data not updated");
			}
			else{
				$_SESSION['updated_success_msg'] = "Data updated successfully";

				$id = $route_id;
							
				$sql1 = "UPDATE `time_table` SET `departure_station`='$journeyFrom',`arrival_station`='$journeyTo', `via_station`='$viaStation', `rent`='$rent' WHERE `time_table`.`route_id`='$id'";

				if(mysqli_query($con, $sql1)){
                    $_SESSION['updated_success_msg'] = "Data successfully updated of route_id = $id ";
                }
                else{
                    $errormsg = "Error...!";
				}
				
				header('location:routes.php');
			}
		}
		else
			$_SESSION['updated_error_msg'] = "Data is empty";
			// header('location:routes.php');
	}
?>