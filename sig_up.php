
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="padding-top: 3rem;">
<header class="header">Sing Up</header>
<h3><img src="assets/img/logo.png" alt="" align="middle"><a class="homepage" href="index1.php">TABLE</a></h3>

	<div class="form-popup" id="myForm">
		<form action="add_user.php" id="signup" method="post">
			<h1>SIGN IN</h1>
			<label for="firsrname"><b>First Name</b></label>
			<input type="text" placeholder="Your first name" name="firstname" required>
			<label for="lastname"><b>Last Name</b></label>
			<input type="text" placeholder="Your last name" name="lastname" required>
			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Your password" name="password" minlength="6" required>
			<button type="submit" class="btn">Sign In</button>
		<button class="btn" type="submit">Sign Up</button>
	</form>
	</div>


</body>
</html>