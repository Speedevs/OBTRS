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
            <h1>Booking Details</h1>
            <div class="busdataarea">
                        <label><b>Booking Date : </b></label><label>2018-07-01</label><br>
                        <label><b>Bus Number : </b></label><label>NA6890</label><br>
                        <label><b>Number of Seat : </b></label><label>1</label><br>
                        <label><b>Total Amount : </b></label><label>750</label>
            </div>
            <div id="timeOutBooking" style="text-align:center; color: #d14"></div>

            <form action="#" method="post">

                <input name="selecting_s" id="selecting_s" value="" type="hidden">
                <input name="book_date" id="seat_book_date" value="2018-07-01" type="hidden">
                <input name="book_journeyNo" id="seat_book_journeyNo" value="BCA057002" type="hidden">
                <input name="book_busNo" id="seat_book_busNo" value="NA6890" type="hidden">
                <input name="book_numberOfSeat" id="seat_book_numberOfSeat" value="49" type="hidden">
                <input name="book_price" id="seat_book_price" value="750" type="hidden">
                <input name="book_total_ammount" id="seat_book_price" value="750" type="hidden">


                
                <div id="passenger_info_m">
                    <h3 style="margin-bottom:10px; margin-top:10px">Passenger Information form</h3>
                    <div id="passenger_info">
                    </div>
                </div>
                
            </form></div>
        
        <!--#contentwrapper-->
        <div class="clear"></div>
        
        <div id="footer">
            Copyright © 2018.<br> All Rights Reserved.
        </div>
    </div>
</body>

</html>
