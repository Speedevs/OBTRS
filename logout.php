<?php
session_start();

if(isset($_SESSION['cust_id'])) {
	session_destroy();
	unset($_SESSION['cust_id']);
	unset($_SESSION['cust_name']);
	header("location: login.php");
} else {
	header("Location: index.php");
}
?>