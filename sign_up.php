<?php
	session_start();
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="header">РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЯ</header>
	<h3><img src="assets/img/logo.png" alt="" align="middle"><a class="homepage" href="index.php">TABLE</a></h3>

	<div class="container">
		<?php
			error_reporting(E_ERROR | E_WARNING | E_PARSE);
			if ($_SESSION['message']) {
				echo "<p class= 'message'>".$_SESSION['message']."</p>";
			}
			unset($_SESSION["message"]);
		?>
		<div class="form-container">
			<form action="add_user.php" id="sigup" method="post">
								
				<input type="text" placeholder="Your first name" name="firstname" required>

				<input type="text" placeholder="Your last name" name="lastname" required>
				
				<input type="email" placeholder="Your email" name="email" required>
											
					<p>Select role:
						<select class="select" required name="role">
						<option>User</option>
						<option>Admin</option>
						</select></p>
			
					<input type="password" placeholder="Your password" name="password" minlength="6" required>
				
					<input type="password" placeholder="Confirm password" name="confpassword" minlength="6" required>
				<button class="btn" type="submit">Sign Up</button>
			</form>
		</div>
	</div>

</body>
</html>