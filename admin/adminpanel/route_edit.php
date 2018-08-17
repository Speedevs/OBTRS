<?php
	include '../dbconnect.php';
	
	session_start();
	
	if (!isset($_SESSION['usr_id']))
    {
        header("location: ../index.php");
    }
    else{ //Continue to current page
        header( 'Content-Type: text/html; charset=utf-8' );
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
        <div class="sidebar-wrapper ps-container">
            <ul class="nav">
                <li>
                    <a href="index.php">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="schedule.php">
                        Schedule
                    </a>
                </li>
                <li>
                    <a href="booking.php">
                        Booking
                    </a>
                </li>
                <li>
                    <a href="time-table.php">
                        Time-table
                    </a>
                </li>
                <li>
                    <a href="routes.php" class="active"> 
                        Routes
                    </a>
                </li>
                <li>
                    <a href="bus-type.php">
                        Bus-type
                    </a>
                </li>
                <li>
                    <a href="setting.php">
                        Settings
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        Users
                    </a>
                </li>
            <?php  if (isset($_SESSION['usr_id'])) {?>
                <li>
                    <a href="../logout.php">
                        <p>Logout</p>
                    </a>
                </li>
            <?php }?>    
            </ul>
        </div>
            
            <div class="sidebar-background" style="background-image: url(../admin/assets/img/sidebar-1.jpg);"></div>
        </div>
        
        <div class="main-panel ps-container ps-theme-default ps-active-y">
            <div class="content">
                <div class="container-fluid">
                    <div class="row" style="margin: 25px 0;">
                    <h1 class="text-danger"> Update Route.</h1>
						<?php
							$route_id = $_GET['route_id'];
							$sql = "SELECT * FROM `route_detail` WHERE route_id='$route_id'";
							$result = mysqli_query($con,$sql);

							if(!$result){
								die("Unable to run the query".mysqli_error($con));
							}

							while($row=mysqli_fetch_object($result)){?>
								<form action="route_update.php" method="post">
									<input type="hidden" value="<?php echo $route_id;?>" name="route_id"/>
                                    
                                    <div class="input-group">
                                        <label for="journeyFrom" class="required">Journey From</label>
                                        <input type="text" name="journeyFrom" placeholder="Journey From" value='<?php echo "$row->departure_station";?>' required="required" />
                                    </div>

                                    <div class="input-group">
                                        <label for="journeyTo" class="required">Journey To</label>
                                        <input type="text" name="journeyTo" placeholder="Journey To" value='<?php echo "$row->arrival_station";?>' required="required" />
                                    </div>

                                    <div class="input-group">
                                        <label for="viaStation" class="required">Via-Station</label>
                                        <input type="text" name="viaStation" placeholder="Via-Station" value='<?php echo "$row->via_station";?>' required="required" />
                                    </div>

                                    <div class="input-group">
                                        <label for="fare" class="required">Fare</label>
                                        <input type="text" name="fare" placeholder="Fare" value='<?php echo "$row->rent";?>' required="required" />
                                    </div>

                                    <div class="input-group">
                                        <input type="submit" name="update-route" value="Update Route">
                                        <a href="routes.php" style="margin-left: 10px;">cancel</a>
                                    </div>

                                    <br>

									<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
									<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

								</form>
							<?php
							}
						?>

						
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
