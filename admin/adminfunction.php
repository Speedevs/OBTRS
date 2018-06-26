<?php
include_once 'dbconnect.php';


	// call the register() function if submit-signup button is clicked
	if (isset($_POST['submit-signup'])) {
		register();
	}

	// call the login() function if submit-signin button is clicked
	if (isset($_POST['submit-signin'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['usr_id']);
        unset($_SESSION['usr_name']);
		header("location: ../index.php");
	}

function register(){
    $error = false;
    
    global $con, $errormsg, $successmsg, $name_error, $email_error, $password_error, $confirmPassword_error;
    
    //check if form is submitted
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $signupEmail= mysqli_real_escape_string($con, $_POST['signupEmail']);
    $signupPassword = mysqli_real_escape_string($con, $_POST['signupPassword']);
    $confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);

    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($signupEmail,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($signupPassword) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($signupPassword != $confirmPassword) {
        $error = true;
        $confirmPassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        $query = "INSERT INTO admin(username,password,email) VALUES('" . $username . "', '" . md5($signupPassword) . "', '" . $signupEmail . "')";
        if(mysqli_query($con, $query)) {
            $successmsg = "Successfully Registered!";
        } 
    }else {
            $errormsg = "$confirmPassword_error,$password_error,$email_error,$name_error";
        }
}

function login(){
    
    global $con, $signinEmail, $signinPassword, $signinErrormsg;
    
    //check if form is submitted
    if (isset($_POST['submit-signin'])) {

        $signinEmail = mysqli_real_escape_string($con, $_POST['signinEmail']);
        $signinPassword = mysqli_real_escape_string($con, $_POST['signinPassword']);
        $query = "SELECT * FROM admin WHERE email = '" . $signinEmail. "' and password = '" . md5($signinPassword) . "'";
        $result = mysqli_query($con, $query);

        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['usr_id'] = $row['admin_id'];
            $_SESSION['usr_name'] = $row['username'];
            header("Location: redirect.php");
        } else {
            $signinErrormsg = "Incorrect Email or Password!!!";
        }
    }
}

?>