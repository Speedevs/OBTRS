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
                    <a href="bus-type.php">
                        Bus-type
                    </a>
                </li>
                <li>
                    <a href="users.php" class="active">
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
                        <h1 class="text-danger"> Update User.</h1>
						<?php
							$admin_id = $_GET['admin_id'];
							$sql = "SELECT * FROM `admin` WHERE admin_id='$admin_id'";
							$result = mysqli_query($con,$sql);

							if(!$result){
								die("Unable to run the query".mysqli_error($con));
                            }

							while($row=mysqli_fetch_object($result)){?>
								<form action="users_update.php" method="post">
									<input type="hidden" value="<?php echo $admin_id;?>" name="admin_id"/>
                                    
                                    <div class="input-group">
                                        <label>User type</label>
                                        <select name="user_type" id="user_type" required style="width: 300px; padding: 4px;">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>

                                    <div class="input-group" style="display: inline-block;">
                                        <input type="submit" name="update-users"value="Update User">
                                        <a href="users.php" style="margin-left: 10px;">Cancel</a>
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
