
<?php
	session_start();
	require_once 'conn.php';
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	if(isset($_GET["id"])) {
		$id = $_GET["id"];
	} else if($_SESSION["id"]) {
		$id = $_SESSION["id"];
	}
	
	$res = mysqli_query ($conn, "SELECT * FROM `users` WHERE `id` ='$id'");
	$row = mysqli_fetch_array($res);
		
	if (is_array($row)) {
		$id = $row["id"];
		$first_name = $row["first_name"];
		$last_name = $row["last_name"];
		$email = $row["email"];
		$password = $row["password"];
		$photo = $row["photo"];
		$role_id = $row["role_id"];
	}
?>

<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>LAB 2</title>
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="header">User page</header>
	<h3><img src="assets/img/logo.png" alt="" align="middle"><a class="homepage" href="index.php">TABLE</a></h3>
	<div class= "container">
		<div class="form-container">
			<table cellspacing= "20px" cellpadding= "0"><tr><td widht= "20%" align= "left">
				<?php
					if ($photo) {
						echo '<br></br><img src='.$photo.' width="170" height="235" alt="">';
					}
					if ($_SESSION["id"] == $_GET["id"] || $_SESSION['role_id'] == 1) {
						echo "<form action='upload_image.php' method='post' enctype='multipart/form-data'>
						<input type='hidden' value='$id' name='id' readonly>
						<input type='file' name='fileToUpload' id='fileToUpload'>
						<input class='btn' type='submit' value='Upload Image' name='submit'>
						</form>";
					}
					echo "</td><td>";
						echo "<form action='update.php' id='update' method='post'>";
						if ($_SESSION['role_id'] == 1) {
							echo "<input type='hidden' value='$id' name='id' readonly>
							<input type='text' value='$first_name' name='first_name' required>
							<input type='text' value='$last_name' name='last_name' required>
							<input type='email' value='$email' name='email' required>";
						
							echo "<p>Select role:
							<select class='select' required name='role_id'>";
							if ($role_id == 1) {
								echo "<option>Admin</option>
								<option>User</option>";
							} else if ($role_id == 2) {
								echo "<option>User</option>
								<option>Admin</option>";
							}
							echo "</select></p>";
								
							echo "<input type='text' value='$password' name='password' minlength='6' required>";
							echo "<button class='btn' type='submit'>Edit</button>";
							echo "<a class= 'btn-delete' href='delete_user.php?id=",$row["id"],"'>Delete</a>";
							
						} else if ($_SESSION['id'] == $_GET['id']) {
							echo "<input type='hidden' value='$id' name='id' readonly>
							<input type='text' value='$first_name' name='first_name' required>
							<input type='text' value='$last_name' name='last_name' required>
							<input type='email' value='$email' name='email' required>";
									
							echo "<p>Select role:
								<select class='select' disabled name='role_id'>
								<option>User</option>
								<option>Admin</option>
								</select></p>";
							echo "<input type='text' value='$password' name='password' minlength='6' required>";
							echo "<button class='btn' type='submit'>Edit</button>";
								
						} else {
							echo "<input type='hidden' value='$id' name='id' readonly>
							<input type='text' value='$first_name' name='firstname' disabled>
							<input type='text' value='$last_name' name='lastname' disabled>
							<input type='email' value='$email' name='email'disabled>";
							
							echo "<p>Select role:
							<select class='select' disabled name='role'>
							<option>Admin</option>
							<option>User</option>
							</select></p>";
						}
					?>			
				</form>
			</td></tr></table>
		</div>
	</div>
</body>
</html>