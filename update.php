<?php

	require_once 'conn.php';
	
	if(isset($_POST['first_name']) || isset($_POST['last_name']) || isset($_POST['password'])){
	 
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query ="UPDATE `users` SET `first_name`='$first_name', `last_name`='$last_name', `password`='$password'  WHERE id='$id'";
		$result = mysqli_query($conn, $query) or die("Ошибка " . mysqli_error($conn)); 
	 
		if(!$result)
			echo "<span>Данные не обновлены</span>";
	}
	
	mysqli_close($conn);
	header("Location: user_page.php");
?>