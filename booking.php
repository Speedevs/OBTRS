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

    $query = "SELECT * FROM `book_detail` WHERE `journey_date` like '$dateOfJourney' AND `route_id`='$selected_route_id'";
    $result = mysqli_query($db,$query) or die('Error: '.mysql_error ());
    while($row = mysqli_fetch_assoc($result)) {
        $choice = $row['choice'];
        echo "Seat Choice " .$choice."<br>";
        $explode_choice = explode(',', $row['choice']);
        print_r($explode_choice);
        echo "<br>";
        $ccount = count($explode_choice);
        echo $ccount." Seat Occupied. <br> ";
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
            <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
            <pre>    
</pre>

            <div id="page_conten">
                <h2 style="font-size:1.2em;"> Choose seats by clicking the corresponding seat in the layout below:</h2>
                <div class="busdataarea">
                    <label><b>Booking Date : </b></label>
                    <label>
                        <?php
                            echo ($dateOfJourney = $_SESSION['dateOfJourney']);
                        ?>
                    </label><br>
                    <label><b>Bus Number : </b></label><label>...</label>
                </div>
            </div>


            <form action="#" method="post">
                
                <!-- <input type="number" name="noofseat" placeholder="Journey From" required="required"/>
                <br>

                <label for="chooseSeat" class="required">Choose Seat:</label>
                <input type="text" name="chooseSeat" placeholder="10" required="required" />
                <br> -->

                <div id="area">
                    <div class="noofseat">
                        <label for="noofseat" class="required">No. of Seats:</label>
                    </div>
                    <div id="print" style="text-align:center; color: #d14">
                        <?php
                            if (isset($_POST['insert'])) {
                                if(!empty($_POST['chooseSeat'])) {
                                    $checked_arr = $_POST['chooseSeat'];
                                    $count = count($checked_arr);
                                    echo "There are ".$count." checkboxe(s) are checked. ";
                                    $checked_array = implode(',', $_POST['chooseSeat']);
                                    echo($checked_array);

                                    $dateOfJourney = $_SESSION['dateOfJourney'];
                                    $date=date("Y-m-d");
                                   
                                    $query = "INSERT INTO `book_detail` (`seat_no`, `route_id`, `journey_date`, `booking_date`, `rent`, `bus_type`, `choice`) 
                                    VALUES ('8', '12', '$dateOfJourney', '$date', '900', 'Deluxe', '$checked_array')";
                                    $result = mysqli_query($db,$query);

                                    if(!$result)
                                        die("Unable to run query");
                                }
                            }
                        ?>
                        
                    </div>
                    <div id="holder">
                        <ul id="place">
                            <?php
                                $dateOfJourney = $_SESSION['dateOfJourney'];
                                $selected_route_id = $_SESSION['selected_route_id'];

                                    $query = "SELECT * FROM `book_detail` WHERE `journey_date`='$dateOfJourney' AND `route_id`='$selected_route_id'";
                                    $result = mysqli_query($db,$query);

                                    if(!$result)
                                        die("Unable to run query".mysqli_error());

                                    while($row = mysqli_fetch_assoc($result)) {

                                            $explode_choice = explode(',', $row['choice']);
                                            print_r($explode_choice);
                                            echo "<br>";
                                    }

                                    echo "<br>";
                                    
                                    //Query for booked seats
                                    $k = array();
                                    $setnumber = mysqli_query($db,("SELECT choice FROM book_detail WHERE `journey_date`='$dateOfJourney' AND `route_id`='$selected_route_id'"));
                                        while($row= mysqli_fetch_array($setnumber))
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

                            ?>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div id="holder" style="margin-top: 200px;">
                        <ul id="place">
                            <li class="seat row-0 col-0" id="b_seat" seatno="1" style="top:0px; left:0px">
                                <a title="1"> 1 </a>
                                <input name="chooseSeat" value="1" type="checkbox">
                            </li>
                            <li class="seat row-0 col-1" seatno="2" style="top:40px; left:0px">
                                <a title="2"> 2 </a>
                                <input name="chooseSeat" value="2" type="checkbox">
                            </li>
                            <li class="seat row-1 col-0" seatno="3" style="top:0px; left:40px">
                                <a title="3"> 3 </a>
                                <input name="chooseSeat" value="3" type="checkbox">
                            </li>
                            <li class="seat row-1 col-1" seatno="4" style="top:40px; left:40px">
                                <a title="4"> 4 </a>
                                <input name="chooseSeat" value="4" type="checkbox">
                            </li>
                            
                            <li class="seat row-1 col-3" seatno="5" style="top:120px; left:40px">
                                <a title="5"> 5 </a>
                                <input name="chooseSeat" value="5" type="checkbox">
                            </li>
                            <li class="seat row-1 col-4" seatno="6" style="top:160px; left:40px">
                                <a title="6"> 6 </a>
                                <input name="chooseSeat" value="6" type="checkbox">
                            </li>
                            <li class="seat row-2 col-0" seatno="7" style="top:0px; left:80px"><a title="7"> 7 </a>
                                <input name="chooseSeat" value="7" type="checkbox"></li>
                            <li class="seat row-2 col-1" seatno="8" style="top:40px; left:80px"><a title="8"> 8 </a>
                                <input name="chooseSeat" value="8" type="checkbox"></li>
                            
                            <li class="seat row-2 col-3" seatno="9" style="top:120px; left:80px"><a title="9"> 9 </a>
                                <input name="chooseSeat" value="9" type="checkbox"></li>
                            <li class="seat row-2 col-4" seatno="10" style="top:160px; left:80px"><a title="10"> 10 </a>
                                <input name="chooseSeat" value="10" type="checkbox"></li>
                            <li class="seat row-3 col-0" seatno="11" style="top:0px; left:120px"><a title="11"> 11 </a>
                                <input name="chooseSeat" value="11" type="checkbox"></li>
                            <li class="seat row-3 col-1" seatno="12" style="top:40px; left:120px"><a title="12"> 12 </a>
                                <input name="chooseSeat" value="12" type="checkbox"></li>
                            
                            <li class="seat row-3 col-3" seatno="13" style="top:120px; left:120px"><a title="13"> 13 </a>
                                <input name="chooseSeat" value="13" type="checkbox"></li>
                            <li class="seat row-3 col-4" seatno="14" style="top:160px; left:120px"><a title="14"> 14 </a>
                                <input name="chooseSeat" value="14" type="checkbox"></li>
                            <li class="seat row-4 col-0" seatno="15" style="top:0px; left:160px"><a title="15"> 15 </a>
                                <input name="chooseSeat" value="15" type="checkbox"></li>
                            <li class="seat row-4 col-1" seatno="16" style="top:40px; left:160px"><a title="16"> 16 </a>
                                <input name="chooseSeat" value="16" type="checkbox"></li>
                            
                            <li class="seat row-4 col-3" seatno="17" style="top:120px; left:160px"><a title="17"> 17 </a>
                                <input name="chooseSeat" value="17" type="checkbox"></li>
                            <li class="seat row-4 col-4" seatno="18" style="top:160px; left:160px"><a title="18"> 18 </a>
                                <input name="chooseSeat" value="18" type="checkbox"></li>
                            <li class="seat row-5 col-0" seatno="19" style="top:0px; left:200px"><a title="19"> 19 </a>
                                <input name="chooseSeat" value="19" type="checkbox"></li>
                            <li class="seat row-5 col-1" seatno="20" style="top:40px; left:200px"><a title="20"> 20 </a>
                                <input name="chooseSeat" value="20" type="checkbox"></li>
                            
                            <li class="seat row-5 col-3" seatno="21" style="top:120px; left:200px"><a title="21"> 21 </a>
                                <input name="chooseSeat" value="21" type="checkbox"></li>
                            <li class="seat row-5 col-4" seatno="22" style="top:160px; left:200px"><a title="22"> 22 </a>
                                <input name="chooseSeat" value="22" type="checkbox"></li>
                            <li class="seat row-6 col-0" seatno="23" style="top:0px; left:240px"><a title="23"> 23 </a>
                                <input name="chooseSeat" value="23" type="checkbox"></li>
                            <li class="seat row-6 col-1" seatno="24" style="top:40px; left:240px"><a title="24"> 24 </a>
                                <input name="chooseSeat" value="24" type="checkbox"></li>
                            
                            <li class="seat row-6 col-3" seatno="25" style="top:120px; left:240px"><a title="25"> 25 </a>
                                <input name="chooseSeat" value="25" type="checkbox"></li>
                            <li class="seat row-6 col-4" seatno="26" style="top:160px; left:240px"><a title="26"> 26 </a>
                                <input name="chooseSeat" value="26" type="checkbox"></li>
                            <li class="seat row-7 col-0" seatno="27" style="top:0px; left:280px"><a title="27"> 27 </a>
                                <input name="chooseSeat" value="27" type="checkbox"></li>
                            <li class="seat row-7 col-1" seatno="28" style="top:40px; left:280px"><a title="28"> 28 </a>
                                <input name="chooseSeat" value="28" type="checkbox"></li>
                            <li class="seat row-11 col-3" style="top:120px; left:280px;" seatno="29">
                                <a title="29">29</a>
                                <input name="chooseSeat" value="29" type="checkbox">
                            </li>
                            <li class="seat row-11 col-4" style="top:160px; left:280px;" seatno="30">
                                <a title="30">30</a>
                                <input name="chooseSeat" value="30" type="checkbox">
                            </li>
                            <li class="seat row-12 col-0" style="top:0px; left:320px;" seatno="31">
                                <a title="31">31</a>
                                <input name="chooseSeat" value="31" type="checkbox">
                            </li>
                            <li class="seat row-12 col-1" style="top:40px; left:320px;" seatno="32">
                                <a title="32">32</a>
                                <input name="chooseSeat" value="32" type="checkbox">
                            </li>
                            <li class="seat row-12 col-2" style="top:80px; left:320px;" seatno="33">
                                <a title="33">33</a>
                                <input name="chooseSeat" value="33" type="checkbox">
                            </li>
                            <li class="seat row-12 col-3" style="top:120px; left:320px;" seatno="34">
                                <a title="34">34</a>
                                <input name="chooseSeat" value="34" type="checkbox">
                            </li>
                            <li class="seat row-12 col-4" style="top:160px; left:320px;" seatno="35">
                                <a title="35">35</a>
                                <input name="chooseSeat" value="35" type="checkbox">
                            </li>
                        </ul>
                    </div>
                </div>

                <input style="margin:5px 25px 0;" type="submit" name="insert" id="insert" value="Insert">
                <a href="#">cancel</a>
                    
                <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
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
