<?php
    include '../dbconnect.php';
    include '../adminfunction.php';

    session_start();

	if (!isset($_SESSION['usr_id']))
    {
        header("location: ../index.php");
    }
    else{ //Continue to current page
        header( 'Content-Type: text/html; charset=utf-8' );
    }

	if (isset($_POST['insert-route'])) {
        $error = false;
        
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
            $query = "INSERT INTO route_detail(
                departure_station,
                arrival_station,
                via_station,
                rent
                ) 
                VALUES(
                    '" . $journeyFrom . "',
                    '" . $journeyTo . "',
                    '" . $viaStation . "',
                    '" . $rent . "'
                )";
            if(mysqli_query($con, $query)) {
                $successmsg = "Successfully Registered!";
                
                $id = mysqli_insert_id($con);

                print '
                <script type="text/javascript">
                    var carnr;        
                    carnr = "'.$id.'"
                    console.log(carnr);
                </script>';
                
                $query1 = "INSERT INTO time_table (
                    route_id, 
                    departure_station, 
                    arrival_station, 
                    via_station, 
                    rent
                    ) 
                    VALUES(
                        '$id', 
                        '$journeyFrom',
                        '$journeyTo',
                        '$viaStation',
                        '$rent'
                    )";
                if(mysqli_query($con, $query1)){
                    $successmsg = "Data Successfully Registered!";
                }
                else{
                    $errormsg = "Error...!";
                }
            }
        }
	}


?>

<!DOCTYPE html>
<html lang="en" class="js csstransitions">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="adminpanel-assets/css/style.css" />
    <link rel="stylesheet" href="adminpanel-assets/css/normalize.css" />
    <script type="text/javascript" src="adminpanel-assets/js/jquery.min.js"></script>

    <script>
        window.onload = function () {
            document.body.setAttribute("class", document.body.getAttribute('class') + " loaded")
        }
    </script>

    <script type="text/javascript" src="adminpanel-assets/js/adminpanel-function.js"></script>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="red" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo"> <a href="#" class="simple-text">
                    Admin Panel
                    </a>
                    <?php
                        if (isset($_SESSION['usr_id'])) { ?>
                            <span data-hover="Welcome">Welcome - &nbsp;<?php echo $_SESSION['usr_name']; ?>
                            <?php } else { ?>
                            <span data-hover="Welcome">Welcome
                                </span>
                    <?php } ?>
                </span>
            </div>
         
         <!-- Side Menu -->
            <?php
                include 'side-menu.php';
            ?>
            
            <div class="sidebar-background" style="background-image: url(../admin/assets/img/sidebar-1.jpg);"></div>
        </div>
        
        <div class="main-panel ps-container ps-theme-default ps-active-y">
            <div class="content">
                <div class="container-fluid">
                    <div class="row" style="margin: 25px 0;">
                        <span class="text-success">
                            <?php if (isset($_SESSION['updated_success_msg'])) {
                                 echo $_SESSION['updated_success_msg']; 
                                 unset($_SESSION['updated_success_msg']);
                                } 
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php if (isset($_SESSION['updated_error_msg'])) {
                                  echo $_SESSION['updated_error_msg'];  
                                  unset($_SESSION['updated_error_msg']);
                                } 
                            ?>
                        </span>
                    </div>

                    <div class="row" style="margin: 25px 0;">
                        <h1 class="text-danger"> Add New Route.</h1>
            <?php
                if (isset( $_SESSION['user_type'] )) {
                    if($_SESSION['user_type'] == 'admin'){
            ?>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="insert_route">
                            <div class="input-group">
                                <label for="journeyFrom" class="required">Journey From</label>
                                <input type="text" name="journeyFrom" placeholder="Journey From" required="required"/>
                            </div>
                            <div class="input-group">
                                <label for="journeyTo" class="required">Journey To</label>
                                <input type="text" name="journeyTo" placeholder="Journey To" required="required" />
                            </div>
                            <div class="input-group">
                                <label for="viaStation" class="required">Via-Station</label>
                                <input type="text" name="viaStation" placeholder="Via-Station" required="required" />
                            </div>
                            <div class="input-group">
                                <label for="fare" class="required">Fare</label>
                                <input type="text" name="fare" placeholder="Fare" required="required" />
                            </div>
                            <div class="input-group" style="display: block;">
                                <input type="submit" name="insert-route" id="insert-route" value="Insert Route">
                                <a href="#" style="margin-left: 10px;">Cancel</a>
                            </div>
                                
                            <br>
                            
                            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

                        </form>
            <?php       
                    }
                }
            ?>
                    </div>
                    
					<div class="row" style="margin: 25px 0;">
                        <table border="0" cellpadding="0" cellspacing="20" style="margin: 5px 0;">

                            <thead style="text-align: left;">
                                <tr>
                                    <th>S.N</th>
                                    <th>Route ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Via Station</th>
                                    <th>Fare</th>
                                    <?php
                                        if (isset( $_SESSION['user_type'] )) {
                                            if($_SESSION['user_type'] == 'admin'){
                                                echo "<th>Action</th>";
                                            }
                                        }
                                    ?>
                                </tr>
                            </thead>

                        <?php

                        $sql = "SELECT * FROM `route_detail`";
                        $run = mysqli_query($con,$sql);

                        if(!$run)
                            die("Unable to run query".mysqli_error($con));

                        $rows = mysqli_num_rows($run);
                        if($rows>0){
                            $sn = 1;
                            while($data = mysqli_fetch_object($run)){
                                echo "<tr><td>".$sn."</td>";
                                echo "<td>".$data -> route_id."</td>";
                                echo "<td>".$data -> departure_station."</td>";
                                echo "<td>".$data -> arrival_station."</td>";
                                echo "<td>".$data -> via_station."</td>";
                                echo "<td>".$data -> rent."</td>";
                                
                                if (isset( $_SESSION['user_type'] )) {
                                    if($_SESSION['user_type'] == 'admin'){
                                        echo "<td><a href = route_edit.php?route_id=".$data -> route_id."> Edit </a> | 
                                        <a href = route_delete.php?route_id=".$data -> route_id."> Delete </a></td>";
                                    }
                                }
                                echo "</tr>";
                                
                                $sn++;
                            }
                        }
                        else{
                                echo "<td colspan='5'> No data found </td><br/>";
                            }
                        ?>
                        </table>

					</div>
                </div>
            </div>

         
            <?php
                include 'footer.php';
            ?>
            
        </div>

    </div>
</body>

</html>
