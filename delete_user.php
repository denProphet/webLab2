<?php
	session_start();

	require_once 'conn.php';
	
	$id = $_GET["id"];
	
	echo"$id";
	
	$res = mysqli_query ($conn, "DELETE FROM `users` WHERE `id` = '$id'")
	or die("Ошибка " . mysqli_error($conn)); ;
	
	if ($id == $_SESSION["id"]) {
		require_once 'sign_out.php';
	}
	header("Location: index.php");
?>