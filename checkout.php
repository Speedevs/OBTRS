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
            <h1>Checkout</h1>
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
                <div class="buswrapper">
                    <label>
                        <b>Seat No. : </b>
                    </label>
                    <label>
                        <?php
                            echo ($selected_seat = $_SESSION['selected_seat']);
                        ?>
                    </label>
                </div>
                <div class="buswrapper">
                    <label>
                        <b>No. of Seat : </b>
                    </label>
                    <label>
                        <?php
                            echo ($selected_no_of_seat = $_SESSION['selected_no_of_seat']);
                        ?>
                    </label>
                </div>
                <div class="buswrapper">
                    <label>
                        <b>Total Amount : </b>
                    </label>
                    <label>
                        <?php
                        $route_rent = $_SESSION['route_rent'];

                        $total_rent = $route_rent * $selected_no_of_seat;
                            echo "$selected_no_of_seat*$route_rent = Rs $total_rent";
                        ?>
                    </label>
                </div>
            </div>
                
            <div id="passenger_info_m">
                <h3 style="margin-bottom:10px; margin-top:10px">Passenger Information form</h3>
                <div id="passenger_info">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <?php include('errors.php'); 

                        $selected_route_id = $_SESSION['selected_route_id'];
                        ?>

                        <input name="selected_route_id" value="<?php echo $selected_route_id;?>" type="hidden">

                        <input name="selected_seat" value="<?php echo $selected_seat;?>" type="hidden">
                        <input name="journey_date" value="<?php echo $dateOfJourney;?>" type="hidden">
                        <input name="booking_date" type="hidden" value="<?php echo $_SESSION['book_date'] ?>">
                        <input name="selected_no_of_seat" value="<?php echo $selected_no_of_seat;?>" type="hidden">
                        <input name="route_rent" value="<?php echo $route_rent;?>" type="hidden">
                        <input name="total_rent" value="<?php echo $total_rent;?>" type="hidden">


                        <?php

                            $query = "SELECT * FROM customer";
                            $results = mysqli_query($db, $query);
                            
                            if ($row = mysqli_fetch_array($results)) {
                                $cust_email = $row['email'];
                                $cust_address = $row['address'];
                                $cust_contact_no = $row['contact_no'];
                            }
                        ?>

                        <input type="hidden" name="customer_id" value="<?php echo $_SESSION['cust_id'];?>">

                        <div class="input-group">
                            <label>Your Full Name</label>
                            <input type="text" name="cust_fullname" required>
                        </div>

                        <input type="hidden" name="email" value="<?php echo $cust_email?>"/>
                        <input type="hidden" name="address" value="<?php echo $cust_address?>"/>
                        <input type="hidden" name="contact_no" value="<?php echo $cust_contact_no?>" />

                        <div class="input-group">
                            <label>Payment method</label>
                            <select name="payment_method">
                                <option value="cash" selected>Cash</option>
                                <option value="creditcard" disabled="disabled">Credit card</option>
                                <option value="paypal" disabled="disabled">Paypal</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label>Current Phone No</label>
                            <input type="text" name="current_phone_no" required>
                        </div>
                        <div class="input-group">
                            <label>Bus Type</label>
                                <select class="select" name="bus_type">
                                        <?php
                                            $sql = "SELECT * from `bus_detail`";
                                            $run = mysqli_query($db,$sql);

                                            if(!$run)
                                                die("Unable to run query".mysqli_error($db));

                                            $rows = mysqli_num_rows($run);

                                            if($rows>0){
                                                while($data = mysqli_fetch_object($run)){
                                                            echo '<option value="' . $data -> bus_type . '">' . $data -> bus_type . '</option>';
                                                }
                                            }
                                            else{
                                                    echo "No data found <br/>";
                                                }
                                        ?>

                                </select>
                        </div>

                        <div class="input-group">
                            <input type="submit" name="confirm_booking" value="Confirm" />
                        </div>
                        <div style="margin-top: 10px;"> 
                        <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                    </div>
                                                
                    </form>
                </div>
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
