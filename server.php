<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);


		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		if ($password != $confirm_password) {
			array_push($errors, "The two passwords do not match");
		}

		// first check the database to make sure 
		// a user does not already exist with the same username and/or email
		$user_check_query = "SELECT * FROM customer WHERE username='$username' OR email='$email' LIMIT 1";
		$result = mysqli_query($db, $user_check_query);
		$user = mysqli_fetch_assoc($result);
		
		if ($user) { // if user exists
			if ($user['username'] === $username) {
				array_push($errors, "Username already exists");
			}

			if ($user['email'] === $email) {
				array_push($errors, "email already exists");
			}
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO customer (
				username,
				password,
				address,
				city,
				gender,
				contact_no,
				email
				) 
				VALUES(
					'$username',
					'$password',
					'$address',
					'$city',
					'$gender',
					'$contact_no',
					'$email'
				)";

			if(mysqli_query($db, $query)) {
				$_SESSION['reg_success'] = "Successfullly Register";
			}
			else{
				array_push($errors, "Error...!");
			} 

		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				if ($row = mysqli_fetch_array($results)) {
					$_SESSION['cust_id'] = $row['customer_id'];
					$_SESSION['cust_name'] = $row['username'];	
					$_SESSION['success'] = "You are now logged in";
					header('location: index.php');
				} 
			}else {
				array_push($errors, "Wrong email/password combination");
			}

		}
	}

?>