<?php
	SESSION_START();
	include("../inc/database.class.php");
	include("user.class.php");
	
	$dbOb = new Database("grademe");
	$userOb = new User();
	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$firstName = $_REQUEST['first'];
	$lastName = $_REQUEST['last'];
	$isTeach = $_REQUEST['teach'];
	$email = $_REQUEST['email'];
	
	if (isset($_REQUEST['gender'])) {
		$gender = $_REQUEST['gender'];
	}
	else {
		$gender = 'U';
	}
	
	
	if ($isTeach == 0) {
		//$username, $password, $firstName, $lastName, $isTeach, $email, $gender
		$dbOb->addStudLogin($username, $password, $isTeach);
		$dbOb->addStudentRecord($username, $firstName, $lastName, $email, $gender);
	}
	else {
		//$username, $password, $firstName, $lastName, $isTeach
		$dbOb->addTeachLogin($username, $password, $isTeach);
		$dbOb->addTeachRecord($username, $firstName, $lastName, $email, $gender);
	}
	
	$_SESSION['username'] = $username;
	$_SESSION['isTeach'] = $isTeach;
	$_SESSION['first_name'] = $firstName;
	$_SESSION['last_name'] = $lastName;
	$_SESSION['email'] = $email;
	
	header("Location: ../");