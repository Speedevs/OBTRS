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
    <link href="assets/css/seat.css" type="text/css" rel="stylesheet" />

    <style>
        form label {
            width: 140px;
        }
    </style>

</head>

<body>

<?php
if (!isset($_SESSION['total_rent']))
{
    header("location: index.php");
}
else{ //Continue to current page
    header( 'Content-Type: text/html; charset=utf-8' );
}

?>

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
                        <?php }?>
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
            <h1>My Tickets</h1>

            <div class="content" style="text-align:center;">
                <!-- notification message -->
                <?php if (isset($_SESSION['booking_success'])) {?>
                    <div class="text success" >
                        <h3 style="color: green;">
                            <?php 
                                echo $_SESSION['booking_success']; 
                                unset($_SESSION['booking_success']);
                            ?>
                        </h3>
                    </div>
                <?php } ?>

            </div>
                
            <div class="busdataarea" style="margin: 20px 0 0; float:none; padding: 20px 10px;">
                <table border="0" cellpadding="0" cellspacing="20" style="margin: 5px 0; position: relative; margin: 0 auto; width: auto;">

                    <thead style="text-align: left;">
                        <tr>
                            <th>Bus Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Journey Date</th>
                            <th>Booking Date</th>
                            <th>Seat No.</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                            <th>Total Fare</th>
                        </tr>
                    </thead>
                    <?php

                        $journeyFrom = $_SESSION['journeyFrom'];
                        $journeyTo = $_SESSION['journeyTo']; 

                        $sql = "SELECT * from `time_table` WHERE departure_station = '$journeyFrom' AND arrival_station = '$journeyTo'";
                        $run = mysqli_query($db,$sql);

                        if(!$run)
                            die("Unable to run query".mysqli_error($db));

                        $no_rows = mysqli_num_rows($run);
                        if($no_rows>0){
                            while($data = mysqli_fetch_assoc($run)){

                                $departure_station = $data['departure_station'];
                                $arrival_station = $data['arrival_station'];

                                
                                $dateOfJourney = $_SESSION['dateOfJourney'];
                                $selected_seat = $_SESSION['selected_seat'];
                                $booking_date = $_SESSION['booking_date'];
                                $total_rent = $_SESSION['total_rent'];

                                if(($journeyFrom == $departure_station) && ($journeyTo == $arrival_station)){
                                    echo "<td>".$data['departure_station']."-".$data['arrival_station']."</td>";
                                    echo "<td>".$data['departure_station']."</td>";
                                    echo "<td>".$data['arrival_station']."</td>";
                                    echo "<td>".$dateOfJourney."</td>";
                                    echo "<td>".$booking_date."</td>";
                                    echo "<td>".$selected_seat."</td>";

                                    if(empty($data['departure_time'])){
                                        $departure_time = "--:-- AM";
                                    }else{
                                        $departure_time = date('h:i A', strtotime($data['departure_time']));
                                    }
                                    echo "<td>".$departure_time."</td>";
    
                                    if(empty($data['arrival_time'])){
                                        $arrival_time = "--:-- PM";
                                    }else{
                                        $arrival_time = date('h:i A', strtotime($data['arrival_time']));
                                    }

                                    echo "<td>".$arrival_time."</td>";
                                    echo "<td>".$total_rent."</td>";
                                }
                                else if(($journeyFrom != $departure_station) && ($journeyTo != $arrival_station)) {
                                    echo ("No data available in table.");
                                    $sql = "SELECT * from `time_table` WHERE departure_station = '$journeyFrom' AND arrival_station = '$journeyTo'";
                                    $run = mysqli_query($db,$sql);}
                            }
                        }
                        else{
                            echo "<td colspan='5'> No data found </td> <br/>";
                        }
                    ?>
                </table>
            </div>
                
        </div>
        
        <!--#contentwrapper-->
        <div class="clear"></div>
        
        <div id="footer">
            Copyright © 2018.<br> All Rights Reserved.
        </div>
    </div>
</body>

</html>
