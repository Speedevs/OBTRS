<?php
    include 'dbconnect.php';
    include 'server.php';
    
	if (isset($_SESSION['cust_name']))
    {
        header("location: index.php");
    }
    else{ //Continue to current page
        header( 'Content-Type: text/html; charset=utf-8' );
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
    <link href="assets/css/normalize.css" type="text/css" rel="stylesheet" />
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
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </header>
            </div>
        </div>


        <div id="content">
            <div class="row" style="margin: 25px 0;">
                <h1> Time Table.</h1>
                <table border="0" class="busdataarea" cellpadding="0" cellspacing="20" style="width:100%; margin: 0; float:none; padding: 20px 10px;">

                    <thead style="text-align: left;">
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Via Station</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                            <th>Fare</th>
                        </tr>
                    </thead>

                    <?php

                    $sql = "SELECT * FROM `time_table`";
                    $run = mysqli_query($db,$sql);

                    if(!$run)
                        die("Unable to run query".mysqli_error($db));

                    $rows = mysqli_num_rows($run);
                    if($rows>0){
                        while($data = mysqli_fetch_object($run)){
                            echo "<td>".$data -> departure_station."</td>";
                            echo "<td>".$data -> arrival_station."</td>";
                            echo "<td>".$data -> via_station."</td>";
                            
                            if(empty($data -> departure_time)){
                                $departure_time = "--:-- AM";
                            }else{
                                $departure_time = date('h:i A', strtotime($data -> departure_time));
                            }
                            echo "<td>".$departure_time."</td>";

                            if(empty($data -> arrival_time)){
                                $arrival_time = "--:-- PM";
                            }else{
                                $arrival_time = date('h:i A', strtotime($data -> arrival_time));
                            }
                            echo "<td>".$arrival_time."</td>";

                            echo "<td>".$data -> rent."</td></tr>";
                        }
                    }
                    else{
                            echo "<td colspan='5'> No data found </td><br/>";
                        }
                    ?>
                </table>

            </div>
        </div>

        <!--#contentwrapper-->
        <div class="clear"></div>
        <div id="footer">
            Copyright © OBTRS 2018.<br> All Rights Reserved.
        </div>
    </div>



</body>
</html>