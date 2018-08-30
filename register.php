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
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </header>
            </div>
        </div>

        <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['reg_success'])) {?>
                <div class="error success" >
                    <h3 style="color: green;">
                        <?php 
                            echo $_SESSION['reg_success']; 
                            unset($_SESSION['reg_success']);
                        ?>
                    </h3>
                </div>
            <?php } ?>

        </div>

        <div id="content">
            <div class="abc">
                <div id="signup">
                    <h1>Sign-Up</h1>
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform" class="signup-form">
                        <?php include('errors.php'); ?>

                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" name="username" required>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="input-group">
                            <label>Confirm password</label>
                            <input type="password" name="confirm_password" required>
                        </div>
                        <div class="input-group">
                            <label>Address</label>
                            <input type="text" name="address" required>
                        </div>
                        <div class="input-group">
                            <label>City</label>
                            <input type="text" name="city" required>
                        </div>
                        <div class="input-group">
                            <label>Gender</label>
                            <input type="radio" name="gender" value="male" required checked> Male<br>
                            <input type="radio" name="gender" value="female"> Female<br>
                        </div>
                        <div class="input-group">
                            <label for="contact_no">Phone:</label>
                            <input type="tel" id="phone" name="contact_no" placeholder="123-456-7890" required />
                        </div>

                        <div class="input-group">
                            <button type="submit" class="btn" name="reg_user">Register</button>
                        </div>
                        <p>
                            Already a member? <a href="login.php">Sign in</a>
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