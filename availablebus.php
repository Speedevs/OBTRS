<?php
    include 'dbconnect.php';
    include 'server.php';


	if (!isset($_SESSION['cust_id']))
    {
        header("location: ../index.php");
    }
    else{ //Continue to current page
        header( 'Content-Type: text/html; charset=utf-8' );
    }

    $dateOfJourney = $_SESSION['dateOfJourney'];
    $selected_route_id = $_SESSION['selected_route_id'];

    $query = "SELECT * FROM `book_detail`, `bus_detail` WHERE `journey_date` like '$dateOfJourney' AND `route_id`='$selected_route_id'";
    $result = mysqli_query($db,$query) or die('Error: '.mysql_error ());
    $no_of_rows = mysqli_num_rows($result);
    if($no_of_rows>0){
        while($row = mysqli_fetch_assoc($result)) {
            $choice = $row['choice'];
            echo "Seat Choice " .$choice."<br>";
            $explode_choice = explode(',', $row['choice']);
            $ccount = count($explode_choice);
            echo $ccount." Seat Occupied. <br>";

            $total_seat = $row['total_seat'];
            echo "total seat: " .$total_seat."<br>";
        }
    }


?>

<!DOCTYPE html>
<html dir="">

<head>
    <title>Bus Reservation System</title>
    <meta charset="utf-8">
    <meta name="fragment" content="!">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="assets/css/index.css" type="text/css" rel="stylesheet" />

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
                        <?php  if (isset($_SESSION['cust_name'])) {?>
                            <li> <a href="index.php?logout='1'">Logout</a> </li>
                        <?php }?>
                    </ul>
                </header>
            </div>
        </div>
        <div></div>
        <div></div>
        <div></div>

        <div id="content">
            <div id="bodyhead">
                <h1>Available Buses</h1>
            </div>
            <form action="booking.php" method="post">
                <div class="busdataarea">
                    <label><b>Booking Date :</b></label>
                    <label>
                        <?php 
                            echo ($dateOfJourney = $_SESSION['dateOfJourney']);
                            // $time = strtotime($_POST['dateFrom']);
                            // if ($time) {
                            // $new_date = date('Y-m-d', $time);
                            // echo $new_date;
                            // } else {
                            // echo 'Invalid Date: ' . $_POST['dateFrom'];
                            // // fix it.
                            // }
                        ?> 
                    </label>
                </div>
                <div class="row" style="margin: 25px 0;">
                    <table border="0" cellpadding="0" cellspacing="20" style="margin: 5px 0;">

                        <thead style="text-align: left;">
                            <tr>
                                <th>From</th>
                                <th>To</th>
                                <th>Via Station</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th>Fare</th>
                                <th>Available</th>
                            </tr>
                        </thead>

                    <?php

                        $sql = "select * from `time_table`";
                        $run = mysqli_query($db,$sql);

                        if(!$run)
                            die("Unable to run query".mysqli_error());

                        $rows = mysqli_num_rows($run);
                        if($rows>0){
                            while($data = mysqli_fetch_assoc($run)){

                                $departure_station = $data['departure_station'];
                                $arrival_station = $data['arrival_station'];

                                $journeyFrom = $_SESSION['journeyFrom'];
                                $journeyTo = $_SESSION['journeyTo']; 
                                $dateOfJourney = $_SESSION['dateOfJourney'];

                                if(($journeyFrom == $departure_station) && ($journeyTo == $arrival_station)){
                                    echo "<td>".$data['departure_station']."</td>";
                                    echo "<td>".$data['arrival_station']."</td>";
                                    echo "<td>".$data['via_station']."</td>";
                                    echo "<td>".date('h:i A', strtotime($data['departure_time']))."</td>";
                                    echo "<td>".date('h:i A', strtotime($data['arrival_time']))."</td>";
                                    echo "<td>".$data['rent']."</td>";
                                        $query2 = "SELECT
                                            `journey_date`,
                                            COUNT(*) AS COUNT
                                            FROM
                                                book_detail
                                            WHERE
                                                `journey_date` = '$dateOfJourney' 
                                            AND `route_id`='$selected_route_id'
                                            GROUP BY 
                                                journey_date 
                                            HAVING
                                                COUNT(*) < 35";
                                        $result2 = mysqli_query($db,$query2) or die('Error: '.mysql_error ());
                                        while($row = mysqli_fetch_assoc($result2)) {
                                            $count = $row['COUNT'];
                                            if ($count < "32") {
                                                // echo $row['journey_date'].": <font color= 'red'>".$row['COUNT']."</font><br>";
                                                $availableNo = 32 - $count;
                                                echo "<td>".$availableNo." Seat</td>";
                                            } else {
                                                echo "<td> Not Available </td>";
                                            }
                                        }
                                    echo "<td><input type='submit' name='bookNow' value='Book Now'>";
                                }
                                else{
                                    echo "</table> No data available in table.";
                                }
                            }
                        }
                        else{
                                echo "No data found <br/>";
                            }
                    ?>
                    </table>

                </div>
            </form>

            <table border="0" cellpadding="0" cellspacing="20" style="margin: 5px 0;">

                <thead style="text-align: left;">
                    <tr>
                        <th>From</th>
                        <th>To</th>
                        <th>Via Station</th>
                        <th>Fare</th>
                        <th>Route Id</th>
                    </tr>
                </thead>
                <?php

                    $route_sql = "select * from `route_detail`";
                    $route_run = mysqli_query($db,$route_sql);

                    if(!$route_run)
                        die("Unable to run query".mysqli_error());

                    $no_rows = mysqli_num_rows($route_run);
                    if($no_rows>0){
                        while($data = mysqli_fetch_assoc($route_run)){

                            $departure_station = $data['departure_station'];
                            $arrival_station = $data['arrival_station'];

                            $journeyFrom = $_SESSION['journeyFrom'];
                            $journeyTo = $_SESSION['journeyTo']; 
                            $dateOfJourney = $_SESSION['dateOfJourney'];

                            if(($journeyFrom == $departure_station) && ($journeyTo == $arrival_station)){
                                echo "<td>".$data['departure_station']."</td>";
                                echo "<td>".$data['arrival_station']."</td>";
                                echo "<td>".$data['via_station']."</td>";
                                echo "<td>".$data['rent']."</td>";
                                echo "<td>".$data['route_id']."</td>";
                            }
                        }
                    }
                    echo "Session Route Id : ".$_SESSION['selected_route_id'];
                ?>
            </table>

        </div>

        <!--#contentwrapper-->
        <div class="clear"></div>
        <div id="footer">
            Copyright © 2018.<br> All Rights Reserved.
        </div>
    </div>
</body>

</html>
