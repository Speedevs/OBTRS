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
            <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
            <pre>    
</pre>

            <div id="page_conten">
                <h2 style="font-size:1.2em;"> Choose seats by clicking the corresponding seat in the layout below:</h2>
                <div class="busdataarea">
                    <div class="buswrapper">
                        <label>
                            <b>Booking Date : </b>
                        </label>
                        <label>
                            <?php
                                echo ($dateOfJourney = $_SESSION['dateOfJourney']);
                            ?>
                        </label>
                    </div>
                    <!-- <div class="buswrapper">
                        <label>
                            <b>Bus Number : </b>
                        </label>
                        <label>
                            <?php
                                echo ('...');
                            ?>
                        </label>
                    </div> -->
                    <div class="buswrapper">
                        <label>
                            <b>From : </b>
                        </label>
                        <label>
                            <?php
                                echo ($journeyFrom = $_SESSION['journeyFrom']);
                            ?>
                        </label>
                    </div>
                    <div class="buswrapper">
                        <label>
                            <b>To : </b>
                        </label>
                        <label>
                            <?php
                                echo ($journeyTo = $_SESSION['journeyTo']);
                            ?>
                        </label>
                    </div>
                </div>
            </div>


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div id="area">
                    <p>Please Select Seat</p>
                    <div id="holder">
            
                        <ul id="place">
                            <?php
                                $dateOfJourney = $_SESSION['dateOfJourney'];
                                $selected_route_id = $_SESSION['selected_route_id'];

                                
                                $query = "SELECT choice FROM `book_detail` WHERE `journey_date`='$dateOfJourney' AND `route_id`='$selected_route_id'";
                                $result = mysqli_query($db,$query);
                                
                                if(!$result)
                                    die("Unable to run query".mysqli_error());

                                $no_rows = mysqli_num_rows($result);
                                if($no_rows>0){
                                    while($row = mysqli_fetch_assoc($result)) {
                                            $explode_choice = explode(',', $row['choice']);
                                            // print_r($explode_choice);
                                            // echo "<br>";
                                    }

                                    echo "<br>";
                                    
                                    //Query for booked seats
                                    $k = array();
                                        
                                    while($row= mysqli_fetch_array($result))
                                        {
                                            $k[] = $row['choice'];
                                            print_r($k);
                                            echo "<br>";
                                        }
                                        
                                        $ais = array("A","B","E","C","D");
                                        $aisle = array("E1","E2","E3","E4","E5","E6","E7","E8","E9");


                                        echo "<table>";
                                        foreach($ais as $i){
                                            echo "<tr>";
                                            for($r=1;$r<=8;$r++){
                                                $seatno = $i.$r;
                                                if(in_array($seatno,$k)){
                                                    $seat = '<input type="checkbox" disabled="disabled" value="'.$seatno.'" name="chooseSeat[]" style="width:18px; height:18px;  position: relative;" onclick="getSum();" >';
                                                }elseif(!in_array($seatno,$aisle)){
                                                    $seat = '<input type="checkbox" value="'.$seatno.'" name="chooseSeat[]" style="width:16px; height:18px; position: relative; " >';
                                                }else{
                                                    $seat = "&nbsp;";
                                                }
                                                if(in_array($seatno,$explode_choice)){
                                                    $seat = '<input type="checkbox" disabled="disabled" checked value="'.$seatno.'" name="chooseSeat[]" style="width:18px; height:18px; position: relative;" >';
                                                }
                                                echo "<td>$seat</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                }else{
                                    $k = array();
                                        
                                    while($row= mysqli_fetch_array($result))
                                        {
                                            $k[] = $row['choice'];
                                            print_r($k);
                                            echo "<br>";
                                        }
                                        
                                        $ais = array("A","B","E","C","D");
                                        $aisle = array("E1","E2","E3","E4","E5","E6","E7","E8","E9");


                                        echo "<table>";
                                        foreach($ais as $i){
                                            echo "<tr>";
                                            for($r=1;$r<=8;$r++){
                                                $seatno = $i.$r;
                                                if(in_array($seatno,$k)){
                                                    $seat = '<input type="checkbox" disabled="disabled" value="'.$seatno.'" name="chooseSeat[]" style="width:18px; height:18px;  position: relative;" onclick="getSum();" >';
                                                }elseif(!in_array($seatno,$aisle)){
                                                    $seat = '<input type="checkbox" value="'.$seatno.'" name="chooseSeat[]" style="width:16px; height:18px; position: relative; " >';
                                                }else{
                                                    $seat = "&nbsp;";
                                                }
                                                echo "<td>$seat</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                }
                                    

                            ?>
                        </ul>
                    </div>
                    <div class="submit-container" style="display: inline-block; margin-top: 10px;">
                        <input style="margin:0;" type="submit" name="insert_seat" id="insert" value="Insert">
                    </div>

                    <div style="margin-top: 10px;"> 
                        <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                    </div>
                </div>
            </form>
        </div>

        <!--#contentwrapper-->
        <div class="clear"></div>

        <div id="footer">
            Copyright © 2018.<br> All Rights Reserved.
        </div>
    </div>
</body>

</html>
