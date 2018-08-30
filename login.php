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
                        <li><a href="timetable.php">Time Table</a></li>
                        <!-- <li><a href="login.php">Login</a></li> -->
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </header>
            </div>
        </div>
        <div id="content">
            <div class="abc">
                <?php
                    if (!isset($_SESSION['cust_id']))
                    {
                        echo "<h2>You Must Login To Book Ticket or </br><a href='timetable.php'>Click Here</a> to view available route.</h2>";
                    }
                ?>

                <div id="signin">
                    <h1>Sign-In</h1>
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform" class="signin-form">
                        <span class="text-danger">
                            <?php include('errors.php'); ?>
                        </span>
                        
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" >
                        </div>
                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" name="password">
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn" name="login_user">Login</button>
                        </div>
                        <p>
                            Not yet a member? <a href="register.php">Sign up</a>
                        </p>
                    </form>
                </div>
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