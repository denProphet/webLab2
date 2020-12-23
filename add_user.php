<?php
	
	session_start();
	
	require_once 'conn.php';

	$first_name = $_POST["firstname"];
	$last_name = $_POST["lastname"];
	$password = $_POST["password"];
	$confpassword = $_POST["confpassword"];
	$email = $_POST["email"];
	if($_POST["role"] == "Admin") {
		$role_id = 1;
	} else {
		$role_id = 2;
	}
	if ($password === $confpassword) {
		$sql = "INSERT INTO `users` (`first_name`, `last_name`, `password`, `email`, `role_id`) 
		VALUES ('$first_name', '$last_name', '$password', '$email', '$role_id')";
		if (!mysqli_query($conn, $sql)) {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		header('Location: index.php');
	} else {
		$_SESSION["message"] = "Пароли не совпадают!";
		header('Location: sign_up.php');
	}
?>