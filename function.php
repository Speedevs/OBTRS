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

	// if (isset($_GET['logout'])) {
	// 	session_destroy();
    //     unset($_SESSION['cust_id']);
    //     unset($_SESSION['cust_name']);
    //     header("Location: index.php");
    // }
    

// REGISTER USER
function register(){
    $error = false;
    
    global $con, $errormsg, $successmsg, $name_error, $email_error, $password_error, $confirmPassword_error;
    
    //check if form is submitted
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $signupEmail= mysqli_real_escape_string($con, $_POST['signupEmail']);
    $signupPassword = mysqli_real_escape_string($con, $_POST['signupPassword']);
    $confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);
    $signupAddress = mysqli_real_escape_string($con, $_POST['signupAddress']);
    $signupCity = mysqli_real_escape_string($con, $_POST['signupCity']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $contactNo = mysqli_real_escape_string($con, $_POST['contactno']);

    if($signupPassword != $confirmPassword) {
        $error = true;
        $errormsg = "Password and Confirm Password doesn't match";
    }
    
    if (!$error) {
        $query = "INSERT INTO customer(
            username,
            password,
            address,
            city,
            gender,
            contact_no,
            email
            ) 
            VALUES(
                '" . $username . "', 
                '" . md5($signupPassword) . "', 
                '" . $signupAddress . "', 
                '" . $signupCity . "', 
                '" . $gender . "', 
                '" . $contactNo . "', 
                '" . $signupEmail . "'
            )";
        if(mysqli_query($con, $query)) {
            $successmsg = "Successfully Registered!";
        }
        else{
            $errormsg = "Error...!";
        } 
    }else {
            $errormsg = "Error in registering...Please try again later!";
        }
}

// LOGIN USER
function login(){
    
    global $con, $signinEmail, $signinPassword, $signinErrormsg;
    
    //check if form is submitted
    if (isset($_POST['submit-signin'])) {
        $signinEmail = mysqli_real_escape_string($con, $_POST['signinEmail']);
        $signinPassword = mysqli_real_escape_string($con, $_POST['signinPassword']);
        
        $signinPassword = md5($signinPassword);
        $query = "SELECT * FROM customer WHERE email='$signinEmail' AND password='$signinPassword)'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['cust_id'] = $row['customer_id'];
            $_SESSION['cust_name'] = $row['username'];
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            $signinErrormsg = "Incorrect Email or Password!!!";
        }
    }
}
?>