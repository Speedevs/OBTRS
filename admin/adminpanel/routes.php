<?php
    include_once '../dbconnect.php';
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
		$journeyFrom = $_POST['journeyFrom'];
		$journeyTo = $_POST['journeyTo'];
		$viaStation = $_POST['viaStation'];
		$rent = $_POST['rent'];

		$query = "INSERT INTO route_detail(departure_station,arrival_station,via_station,rent) VALUES('" . $journeyFrom . "', '" . $journeyTo . "', '" . $viaStation . "', '" . $rent . "')";
		if(mysqli_query($con, $query)) {
			$successmsg = "Successfully Registered!";
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
    <script>
        window.onload = function () {
            document.body.setAttribute("class", document.body.getAttribute('class') + " loaded")
        }

    </script>
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
            <div class="sidebar-wrapper ps-container">
                <ul class="nav">
                    <li><a href="index.php"><span class="menu-dashboard">&nbsp;</span>Dashboard</a></li>
                    <li><a href="schedule.php"><span class="menu-schedule">&nbsp;</span>Schedule</a></li>
                    <li><a href="booking.php"><span class="menu-reservations">&nbsp;</span>Bookings</a></li>
                    <li><a href="buses.php"><span class="menu-buses">&nbsp;</span>Buses</a></li>
                    <li class="active"><a href="routes.php"><span class="menu-routes">&nbsp;</span>Routes</a></li>
                    <li><a href="bus-type.php"><span class="menu-bus-types">&nbsp;</span>Bus Types</a></li>
                    <li><a href="#"><span class="menu-options">&nbsp;</span>Settings</a></li>
                    <li><a href="#"><span class="menu-users">&nbsp;</span>Users</a></li>
                    <li><a href="../logout.php"><span class="menu-logout">&nbsp;</span>Logout</a></li>
                </ul>
            </div>
            <div class="sidebar-background" style="background-image: url(../admin/assets/img/sidebar-1.jpg);"></div>
        </div>
        <div class="main-panel ps-container ps-theme-default ps-active-y">
            <div class="content">
                <div class="container-fluid">
                    <div class="row" style="margin: 25px 0;">
						<form id="search_buses_form" action="#" method="post" class="has-validation-callback">

						<label for="journeyFrom" class="required">Journey From</label>
						<input type="text" name="journeyFrom" placeholder="journeyFrom"/>
						<br>

						<label for="journeyTo" class="required">Journey To</label>
						<input type="text" name="journeyTo" placeholder="journeyTo" required="required" />
						<br>

						<label for="via-station" class="required">Via-Station</label>
						<input type="text" name="viaStation" placeholder="Via-Station" required="required" />
						<br>

						<label for="rent" class="required">Rent</label>
						<input type="text" name="rent" placeholder="Rent" required="required" />
						<br>

						<input style="margin:5px 25px 0;" type="submit" name="insert-route" id="insert-route" value="Insert Route">
                        <a href="#">cancel</a>
                            
                        <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                        <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

					</form>
					</div>
					<div class="row" style="margin: 25px 0;">
						

<table border="0" cellpadding="0" cellspacing="20" style="margin: 5px 0;">

    <thead style="text-align: left;">
        <tr>
            <th>Route ID</th>
            <th>Departure Station</th>
            <th>Arrival Station</th>
            <th>Via Station</th>
            <th>Rent</th>
        </tr>
    </thead>

<?php

$sql = "select * from `route_detail`";
$run = mysqli_query($con,$sql);

if(!$run)
	die("Unable to run query".mysqli_error());

$rows = mysqli_num_rows($run);
if($rows>0){
	while($data = mysqli_fetch_object($run)){
		echo "<td>".$data -> route_id."</td>";
        echo "<td>".$data -> departure_station."</td>";
        echo "<td>".$data -> arrival_station."</td>";
        echo "<td>".$data -> via_station."</td>";
        echo "<td>".$data -> rent."</td>";

        echo "<td><a href = delete.php?id=".$data -> route_id."> delete </a> | 
        <a href = edit.php?id=".$data -> route_id."> edit </a></td></tr>";
	}
}
else{
		echo "No data found <br/>";
	}
?>
</table>

					</div>
                </div>
            </div>

             <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right"> ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script><a href="#"> Team</a>, made with <span class="heart">❤</span> </p>
                </div>
            </footer>

        </div>

    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="adminpanel-assets/js/adminpanel-function.js"></script>
</body>

</html>
