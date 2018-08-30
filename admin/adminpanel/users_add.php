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

    // variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	if (isset($_POST['create_user'])) {
        global $con, $errors;

		$username    =  $_POST['username'];
        $email       =  $_POST['email'];
        $user_type = $_POST['user_type'];
		$password_1  =  $_POST['password_1'];
		$password_2  =  $_POST['password_2'];

		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
        }
        if (empty($user_type)) { 
			array_push($errors, "User type is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		if (count($errors) == 0) {
            $password = md5($password_1);
            $query = "INSERT INTO admin (username, password, email,  user_type) 
                        VALUES('$username', '$password', '$email', '$user_type' )";
            mysqli_query($con, $query);

            $_SESSION['user_success']  = "New user successfully created!!";
            header('location: users.php');
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
            <div class="sidebar-wrapper ps-container">
                <ul class="nav">
                    <li>
                        <a href="index.php">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="booking.php">
                            Booking
                        </a>
                    </li>
                    <li>
                        <a href="time-table.php">
                            Time-table
                        </a>
                    </li>
                    <li>
                        <a href="routes.php"> 
                            Routes
                        </a>
                    </li>
                    <li>
                        <a href="bus-type.php">
                            Bus-type
                        </a>
                    </li>
                    <li>
                        <a href="users.php" class="active">
                            Users
                        </a>
                    </li>
                <?php  if (isset($_SESSION['usr_id'])) {?>
                    <li>
                        <a href="../logout.php">
                            <p>Logout</p>
                        </a>
                    </li>
                <?php }?>    
                </ul>
            </div>
            
            <div class="sidebar-background" style="background-image: url(../admin/assets/img/sidebar-1.jpg);"></div>
        </div>
        <div class="main-panel ps-container ps-theme-default ps-active-y">
            <div class="content">
                <div class="container-fluid">
                <div style="margin: 25px 15px;">
                        <h1 class="text-danger"> Add New User.</h1>
                        <?php include('errors.php'); ?>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width: 250px;">
                            <div class="input-group">
                                <label>Username</label>
                                <input type="text" name="username" placeholder="Username" reqiured>
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" reqiured>
                            </div>
                            <div class="input-group">
                                <label>User type</label>
                                <select name="user_type" id="user_type" required style="width: 100%; padding: 2px;">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label>Password</label>
                                <input type="password" name="password_1">
                            </div>
                            <div class="input-group">
                                <label>Confirm password</label>
                                <input type="password" name="password_2">
                            </div>
                            <div class="input-group">
                                <input type="submit" class="btn" name="create_user" value="+ Create user"/> 
                            </div>
                            
                                <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

                            </div>
                        </form>
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
