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


	if (isset($_POST['add_user'])) {
        
		header('location: users_add.php');				
			
    }
    
    
    // return user array from their id
	function getUserById($id){
		global $con;
		$query = "SELECT * FROM `admin` WHERE admin_id=" . $id;
		$result = mysqli_query($con, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
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
                        <h1 class="text-danger"> User.</h1>
            <?php
                if (isset( $_SESSION['user_type'] )) {
                    if($_SESSION['user_type'] == 'admin'){
            ?> 
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width: 250px;">
                            <div class="input-group">
                                    <input type="submit" class="btn" name="add_user" value="+ Add user"/> 
                                </div>
                                
                                    <span class="text-success">
                                        <?php 
                                            if (isset($successmsg)) { echo $successmsg; } 
                                            if (isset( $_SESSION['user_success'] )) { echo  $_SESSION['user_success'] ; }
                                        ?>
                                    </span>
                                <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

                                </div>
                        </form>
            <?php       
                    }
                }
            ?>

                        <table border="0" cellpadding="0" cellspacing="20" style="margin: 5px 0;">

                            <thead style="text-align: left;">
                                <tr>
                                    <th>S.N</th>
                                    <th>Username</th>
                                    <th>Type</th>
                                    <th>User Type</th>
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

                                $sql = "SELECT * FROM `admin`";
                                $run = mysqli_query($con,$sql);

                                if(!$run)
                                    die("Unable to run query".mysqli_error($con));

                                $rows = mysqli_num_rows($run);
                                if($rows>0){
                                    $sn = 1;
                                    while($data = mysqli_fetch_object($run)){
                                        echo "<tr><td>".$sn."</td>";
                                        echo "<td>".$data -> username."</td>";
                                        echo "<td>".$data -> email."</td>";
                                        echo "<td>".$data -> user_type."</td>";

                                        if (isset( $_SESSION['user_type'] )) {
                                            if($_SESSION['user_type'] == 'admin'){
                                                echo "<td><a href = users_edit.php?admin_id=".$data -> admin_id."> Edit </a> | 
                                                <a href = users_delete.php?admin_id=".$data -> admin_id."> Delete </a></td>";
                                            }
                                        }
                                        echo "</tr>";
                                        
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
    </div>

</body>

</html>
