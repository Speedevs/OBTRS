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
                    <li class="active">
                        <a href="index.php">
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./schedule.php">
                            <p>Schedule</p>
                        </a>
                    </li>
                    <li>
                        <a href="./booking.php">
                            <p>Booking</p>
                        </a>
                    </li>
                    <li>
                        <a href="./buses.php">
                            <p>Buses</p>
                        </a>
                    </li>
                    <li>
                        <a href="./routes.php">
                            <p>Routes</p>
                        </a>
                    </li>
                    <li>
                        <a href="./bus-type.php">
                            <p>Bus-type</p>
                        </a>
                    </li>
                    <li>
                        <a href="./setting.php">
                            <p>Settings</p>
                        </a>
                    </li>
                    <li>
                        <a href="./users.php">
                            <p>Users</p>
                        </a>
                    </li>
                    <li>
                        <a href="../logout.php">
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-background" style="background-image: url(../admin/assets/img/sidebar-1.jpg);"></div>
        </div>
        <div class="main-panel ps-container ps-theme-default ps-active-y">
            <div class="content">
                <div class="container-fluid">
                    <div class="row"> </div>
                </div>
            </div>
        </div>
        <!--
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right"> ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script><a href="#">Team</a>, made with love </p>
            </div>
        </footer>
-->
    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
</body>

</html>
