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

            <?php
                include 'side-menu.php';
            ?>
            
            <div class="sidebar-background" style="background-image: url(../admin/assets/img/sidebar-1.jpg);"></div>
        </div>
        <div class="main-panel ps-container ps-theme-default ps-active-y">
            <div class="content">
                <div class="container-fluid">
                    <div class="row" style="margin: 25px 0;">
                        <h1 class="text-danger"> Client Booking.</h1>

                        <table border="0" cellpadding="0" cellspacing="20" style="margin: 5px 0;">
                            <thead style="text-align: left;">
                                <tr>
                                    <th>S.N</th>
                                    <th>Client</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Date</th>
                                    <th>Total Fare</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>

                            <?php

                            $sql = "SELECT 
                                book_detail.route_id, 
                                book_detail.journey_date, 
                                book_detail.customer_id,
                                customer.customer_id, 
                                customer.username, 
                                payment.customer_id,
                                payment.total_rent,
                                payment.owner_name,
                                time_table.route_id,
                                time_table.departure_station,
                                time_table.arrival_station  
                                FROM 
                                `book_detail`,
                                `customer`,
                                `payment`,
                                `time_table` 
                                WHERE 
                                book_detail.customer_id = payment.customer_id = customer.customer_id  AND book_detail.route_id = time_table.route_id";
                            $run = mysqli_query($con,$sql);

                            if(!$run)
                            die("Unable to run query".mysqli_error($con));

                            $rows = mysqli_num_rows($run);
                            if($rows>0){
                                $sn = 1;
                                while($data = mysqli_fetch_object($run)){
                                    echo "<tr><td>".$sn."</td>";
                                    
                                    echo "<td>".$username = $data -> owner_name."</td>";
                                    echo "<td>".$data -> departure_station."</td>";
                                    echo "<td>".$data -> arrival_station."</td>";
                                    echo "<td>".$data -> journey_date."</td>";
                                    echo "<td>".$data -> total_rent."</td>";
                                    
                                    $sn++;
                                }
                            }
                            else{
                                echo "<td colspan='5'> No data found </td><br/>";
                            }

                            
                            ?>
                            </table>

                    </div>
                </div>
            </div>
            
            <?php
                include 'footer.php';
            ?>
            
        </div>
    </div>

</body>

</html>
