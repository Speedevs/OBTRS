<?php
    include 'dbconnect.php';
    include 'server.php';

	if (!isset($_SESSION['cust_id'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
    }
    else{ //Continue to current page
        header( 'Content-Type: text/html; charset=utf-8' );
    }

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['cust_name']);
		header("location: login.php");
    }

?>


<!DOCTYPE html>
<html lang="en" class="js csstransitions">

<head>
    <title>Bus Ticket Reservation System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link href="assets/css/index.css" type="text/css" rel="stylesheet" />

    <!--link for javascript date&time-->
    <script type="text/javascript" src="assets/js/date&time/jQuery.ptTimeSelect.js"></script>
    <script type="text/javascript" src="assets/js/date&time/jquery-ui-1.8.22.custom.min.js"></script>
    <script type="text/javascript" src="assets/js/date&time/jquery.ui.timepicker.js"></script>
    <script type="text/javascript" src="assets/js/date&time/customDateTime.js"></script>

    <!--link for stylesheet for date&time-->
    <link rel="stylesheet" href="assets/css/date&time/jquery.ptTimeSelect.css" />
    <link rel="stylesheet" href="assets/css/date&time/jquery.ui.timepicker.css" />
</head>

<body>
    <div id="pagewrapper">
        <div id="topbg"></div>
        <div id="systemName">
            <h1>Bus Booking</h1>
        </div>
        <div id="header">
            <div id="mainmenu">
                <header>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="timetable.php">Time Table</a></li>
                        <?php  if (!isset($_SESSION['cust_name'])) {?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                        <?php }?>
                        <?php  if (isset($_SESSION['cust_name'])) {?>
                            <li> <a href="index.php?logout='1'">Logout</a> </li>
                        <?php }?>
                    </ul>
                </header>
            </div>
        </div>

        <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) {?>
                <div class="error success" >
                    <h3 style="color: green;">
                        <?php 
                            echo $_SESSION['success']; 
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php } ?>

        </div>

        <div id="content">
            <h1>Welcome 
                <?php
                    if (isset($_SESSION['cust_id']))
                    {
                        echo $_SESSION['cust_name'];
                    }
                ?>
            </h1>

            <div class="abc">
            <?php include('errors.php'); ?>
                <form id="search_buses_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="has-validation-callback">

                	<label for="journeyFrom" class="required">Journey From</label>
                	<select class="select" name="journeyFrom" id="journeyFrom" style="width:150px;" data-validation="required">
                		<option value="">Select From</option>

                        <?php
                            $sql = "select DISTINCT departure_station from `route_detail`";
                            $run = mysqli_query($db,$sql);

                            if(!$run)
                            	die("Unable to run query".mysqli_error());

                            $rows = mysqli_num_rows($run);

                            if($rows>0){
                            	while($data = mysqli_fetch_object($run)){
                                    echo '<option value="' . $data -> departure_station . '">' . $data -> departure_station . '</option>';
                            	}
                            }
                            else{
                            		echo "No data found <br/>";
                            	}
                        ?>

                	</select>
                    <br>
                    <label for="journeyTo" class="required">Journey To</label>
                    <select class="select" name="journeyTo" id="journeyTo" style="width:150px;" data-validation="required">
                        <option value="">Select To</option>

                            <?php
                                $sql = "select DISTINCT arrival_station from `route_detail`";
                                $run = mysqli_query($db,$sql);

                                if(!$run)
                                	die("Unable to run query".mysqli_error());

                                $rows = mysqli_num_rows($run);

                                if($rows>0){
                                	while($data = mysqli_fetch_object($run)){
                                                echo '<option value="' . $data -> arrival_station . '">' . $data -> arrival_station . '</option>';
                                	}
                                }
                                else{
                                		echo "No data found <br/>";
                                	}
                            ?>

                    </select>
                    <br>
                    <label for="dateofJourney" class="required">Date</label>
                    <input style="width:147px;" name="dateOfJourney" id="dateOfJourney" type="date" class="datepicker_bus_date hasDatepicker" data-validation="required" value="<?php echo date("Y-m-d"); ?>" autocomplete="off">
                    <br />
                    <label></label>
                    <input style="margin:5px 25px 0;" type="submit" name="searchBuses" id="searchBuses" value="Search Buses">

                </form>
            </div>



        </div>



        <!--#contentwrapper-->
        <div class="clear"></div>

        <footer id="footer" class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script><a href="#"> OBTRS</a>. 
                    <br> All Rights Reserved.
                </p>
            </div>
        </footer>
        
    </div>
</body>

</html>
