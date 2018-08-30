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
    <script type="text/javascript" src="adminpanel-assets/js/jquery.min.js"></script>

    <script>
        window.onload = function () {
            document.body.setAttribute("class", document.body.getAttribute('class') + " loaded")
        }

    </script>

    <script type="text/javascript" src="adminpanel-assets/js/adminpanel-function.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="red" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo"> 
                <a href="index.php" class="simple-text">
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

            <?php
                include 'side-menu.php';
            ?>
            
            <div class="sidebar-background" style="background-image: url(../admin/assets/img/sidebar-1.jpg);"></div>
        </div>
        <div class="main-panel ps-container ps-theme-default ps-active-y">
            <div class="dashboard-content content">
                <div cl ass="container-fluid">
                    <div style="margin: 25px 15px;">
                        <h1 class="text-danger"> Dashboard.</h1>
                    </div>
                    <a href='route.php' class="row">
                        <?php
                            $query = "SELECT COUNT(*) FROM `route_detail` ";
                            $result = mysqli_query($con, $query);
                            if($result) {
                                $count = mysqli_fetch_array($result);
                                echo "<h1> $count[0] - Route.</h1>";
                            }
                        ?>
                    </a>
                    <a href='booking.php' class="row">
                        <?php
                            $query = "SELECT COUNT(*) FROM `book_detail`  ";
                            $result = mysqli_query($con, $query);
                            if($result) {
                                $count = mysqli_fetch_array($result);
                                echo "<h1> $count[0] - Booking.</h1>";
                            }
                        ?>
                    </a>
                </div>
                <div cl ass="container-fluid">
                    <a href='customer.php' class="row">
                        <?php
                            $query = "SELECT COUNT(*) FROM `customer` ";
                            $result = mysqli_query($con, $query);
                            if($result) {
                                $count = mysqli_fetch_array($result);
                                echo "<h1> $count[0] Customer.</h1>";
                            }
                        ?>
                    </a>
                    <a href='users.php' class="row">
                        <?php
                            $query = "SELECT COUNT(*) FROM `admin` ";
                            $result = mysqli_query($con, $query);
                            if($result) {
                                $count = mysqli_fetch_array($result);
                                echo "<h1> $count[0] Admin.</h1>";
                            }
                        ?>
                    </a>
                    
                </div>
            </div>
            
            <?php
                include 'footer.php';
            ?>
            
        </div>
    </div>

</body>

</html>
