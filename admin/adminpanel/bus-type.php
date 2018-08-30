<?php
    include_once '../dbconnect.php';

    session_start();

	if (!isset($_SESSION['usr_id']))
    {
        header("location: ../index.php");
    }
    else{ //Continue to current page
        header( 'Content-Type: text/html; charset=utf-8' );
    }

	if (isset($_POST['insert-bus'])) {
        $error = false;

        $busNo = $_POST['busNo'];
        $busType = $_POST['busType'];
        $totalSeat = $_POST['totalSeat'];

        if (empty($busNo)) { 
            $error = true;
            array_push($errors, "busNo is required"); 
        }
        if (empty($busType)) { 
            $error = true;
            array_push($errors, "busType is required"); 
        }
        if (empty($totalSeat)) { 
            $error = true;
            array_push($errors, "totalSeat is required"); 
        }
        if(!$error){
            $query = "INSERT INTO `bus_detail`(bus_no, bus_type, total_seat) VALUES('". $busNo. "', '". $busType. "', '". $totalSeat. "' )";
            if(mysqli_query($con, $query)) {
                $successmsg = "Successfully Registered!";
            }
            else{
                $errormsg = "Error...!";
            }
        }

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

            <!-- Side Menu -->
            <?php
                include 'side-menu.php';
            ?>
            
            <div class="sidebar-background" style="background-image: url(../admin/assets/img/sidebar-1.jpg);"></div>
        </div>

        <div class="main-panel ps-container ps-theme-default ps-active-y">
            <div class="content">
                <div class="container-fluid">
                    <div class="row" style="margin: 25px 0;">
                        <span class="text-success">
                            <?php if (isset($_SESSION['updated_success_msg'])) {
                                    echo $_SESSION['updated_success_msg']; 
                                    unset($_SESSION['updated_success_msg']);
                                } 
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php if (isset($_SESSION['updated_error_msg'])) {
                                    echo $_SESSION['updated_error_msg'];  
                                    unset($_SESSION['updated_error_msg']);
                                } 
                            ?>
                        </span>
                    </div>
                    <div class="row" style="margin: 25px 0;">
                        <h1 class="text-danger"> Bus Type.</h1>
            <?php
                if (isset( $_SESSION['user_type'] )) {
                    if($_SESSION['user_type'] == 'admin'){
            ?>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="bus_type">
                            
                            <div class="input-group">
                                <label for="busNo" class="required">Bus No</label>
                                <input type="text" name="busNo" placeholder="BA2KA2894" required="required"/>
                            </div>
                            
                            <div class="input-group">
                                <label for="busType" class="required">Bus Type</label>
                                <input type="text" name="busType" placeholder="Deluxe" required="required"/>
                            </div>
                            
                            <div class="input-group">
                                <label for="totalSeat" class="required">Total Seat</label>
                                <input type="text" name="totalSeat" placeholder="32" required="required"/>
                            </div>

                            <div class="input-group" style="display: block;">
                                <input type="submit" name="insert-bus"value="Insert Bus Type">
                                <a href="bus-type.php" style="margin-left: 10px;">Cancel</a>
                            </div>    

                            <br>
 
                            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

                        </form>
            <?php       
                    }
                }
            ?>
					</div>
                    <div class="row" style="margin: 25px 0;">
                        <table border="0" cellpadding="0" cellspacing="20" style="margin: 5px 0;">

                            <thead style="text-align: left;">
                                <tr>
                                    <th>Bus No.</th>
                                    <th>Bus Type</th>
                                    <th>Total Seat</th>
                                    <?php
                                        if (isset( $_SESSION['user_type'] )) {
                                            if($_SESSION['user_type'] == 'admin'){
                                                echo "<th>Action</th>";
                                            }
                                        }
                                    ?>
                                </tr>
                            </thead>

                        <?php

                            $sql = "SELECT * from `bus_detail`";
                            $run = mysqli_query($con,$sql);

                            if(!$run)
                                die("Unable to run query".mysqli_error());

                            $rows = mysqli_num_rows($run);
                            if($rows>0){
                                while($data = mysqli_fetch_object($run)){
                                    echo "<td>".$data -> bus_no."</td>";
                                    echo "<td>".$data -> bus_type."</td>";
                                    echo "<td>".$data -> total_seat."</td>";

                                    if (isset( $_SESSION['user_type'] )) {
                                        if($_SESSION['user_type'] == 'admin'){
                                            echo "<td><a href = bus_type_edit.php?bus_no=".$data -> bus_no."> Edit </a> | 
                                            <a href = bus_type_delete.php?bus_no=".$data -> bus_no."> Delete </a></td>";
                                        }
                                    }
                                    echo "</tr>";
                                    
                                }
                            }
                            else{
                                    echo "No data found <br/>";
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
