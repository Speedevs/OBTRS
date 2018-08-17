		
<!DOCTYPE html>
<html lang="en" class="js csstransitions">

<head>
    <title>Bus Ticket Reservation System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css" />
   
<body>

<?php
	session_start();

	include_once 'dbconnect.php';
	include 'adminfunction.php';
?>
	
	<div id="signin">
		<h1>sign-in</h1>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform" class="signin-form">
                    <div class="input-container">
                        <input type="email" name="signinEmail" placeholder="Email" class="input-field" id="signinEmail" autocomplete="off" required>
                        <label for="signinEmail" class="floating">Email</label>
                        <div class="input-field-shadow"></div>
                    </div>
                    <div class="input-container">
                        <input type="password" name="signinPassword" placeholder="Password" class="input-field" id="signinPassword" required>
                        <label for="signinPassword" class="floating">Password</label>
                        <div class="input-field-shadow"></div>
                    </div>
                    <div class="submit-container">
                        <input type="submit" name="submit-signin" value="Sign In" class="submit-btn">
                        <div class="submit-btn-shadow"></div>
                    </div>
                    <span class="text-danger"><?php if (isset($signinErrormsg)) { echo $signinErrormsg; } ?></span>
                </form>
<!--
                <footer class="forget-footer">
                    <div class="signin-forget"> <a href="#" id="forget-button">Forget Your Password ?</a> </div>
                    <div class="create-account"> <a href="#" id="create-button">Create New Account</a> </div>
                </footer>
-->
            </div>
	        <div id="signup">
				<h1>sign-up</h1>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform" class="signup-form">
                    <div class="input-container">
                        <input type="text" name="username" placeholder="Username" class="input-field" id="username" required="required" />
                        <label for="username" class="floating">Username</label>
                        <div class="input-field-shadow"></div>
                    </div>
                    <div class="input-container">
                        <input type="email" name="signupEmail" placeholder="Email" class="input-field" id="signupEmail" autocomplete="off" required>
                        <label for="signupEmail" class="floating">Email</label>
                        <div class="input-field-shadow"></div>
                    </div>
                    <div class="input-container">
                        <input type="password" name="signupPassword" placeholder="Password" class="input-field" id="signupPassword" required>
                        <label for="signupPassword" class="floating">Password</label>
                        <div class="input-field-shadow"></div>
                    </div>
                    <div class="input-container">
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" class="input-field" id="confirmPassword" required>
                        <label for="confirmPassword" class="floating">Confirm Password</label>
                        <div class="input-field-shadow"></div>
                    </div>
                    <div class="submit-container">
                        <input type="submit" name="submit-signup" value="Sign Up" class="submit-btn">
                        <div class="submit-btn-shadow"></div>
                    </div>
                      <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                    <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
<!--
                    <footer> 
						<a href="#" id="have-account">I have an Account</a> 
					</footer>
-->
                </form>
            </div>
	
	</body>
	</html>
	