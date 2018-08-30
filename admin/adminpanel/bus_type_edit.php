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
                <!-- <li>
                    <a href="schedule.php">
                        Schedule
                    </a>
                </li> -->
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
                    <a href="routes.php"> 
                        Routes
                    </a>
                </li>
                <li>
                    <a href="bus-type.php" class="active">
                        Bus-type
                    </a>
                </li>
                <!-- <li>
                    <a href="setting.php">
                        Settings
                    </a>
                </li> -->
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
                        <h1 class="text-danger"> Update Bus Type.</h1>
						<?php
							$bus_no = $_GET['bus_no'];
							$sql = "SELECT * FROM `bus_detail` WHERE bus_no='$bus_no'";
							$result = mysqli_query($con,$sql);

							if(!$result){
								die("Unable to run the query".mysqli_error($con));
                            }

							while($row=mysqli_fetch_object($result)){?>
								<form action="bus_type_update.php" method="post">
									<input type="hidden" value="<?php echo $bus_no;?>" name="bus_no"/>
                                    
                                    <div class="input-group">
                                        <label for="busNo" class="required">Bus No</label>
                                        <input type="text" name="busNo" placeholder="BA2KA2894" value='<?php echo "$row->bus_no";?>' required="required"/>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="busType" class="required">Bus Type</label>
                                        <input type="text" name="busType" placeholder="Deluxe" value='<?php echo "$row->bus_type";?>' required="required"/>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="totalSeat" class="required">Total Seat</label>
                                        <input type="text" name="totalSeat" placeholder="32" value='<?php echo "$row->total_seat";?>' required="required"/>
                                    </div>

                                    <div class="input-group" style="display: inline-block;">
                                        <input type="submit" name="update-bus-type"value="Update Bus Type">
                                        <a href="bus-type.php" style="margin-left: 10px;">Cancel</a>
                                    </div>    
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
