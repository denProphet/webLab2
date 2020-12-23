<?php
	session_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>LAB 2</title>
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="header">ТАБЛИЦА ПОЛЬЗОВАТЕЛЕЙ</header>
	<h3><img src="assets/img/logo.png" alt="" align="middle"><a class="homepage" href="index.php">TABLE</a></h3>
	<?php
		if($_SESSION['first_name']) {
			$first_name = $_SESSION['first_name'];
			echo "<a class='button2' href='user_page.php'>$first_name</a>
			<a class='button1' href='sign_out.php'>Sign Out</a>";
		} else {
			echo "<a class='button1' href='sign_up.php'>Sign Up</a>
			<a class='button2' onclick='openForm()'>Sign In</a>";
		}
	?>
	
	<div class="form-popup" id="myForm">
		<form action="sign_in.php" class="form-container" method="post">
			<h1>SIGN IN</h1>
			<?php if ($_SESSION["message"]) {
				echo"<p>" .$_SESSION["message"]. "</p>";
				unset($_SESSION["message"]);
			}?>
			<label for="email"><b>Email</b></label>
			<input type="email" placeholder="Your email" name="email" required>
			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Your password" name="password" minlength="6" required>
			<button type="submit" class="btn">Sign In</button>
			<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		</form>
	</div>
	
	
	<div class="container">
		<?php
			require_once 'conn.php';
			
			echo "<table cellspacing= '0'cellpadding= '0' border= '1' width='100%' >
			<tr><th>#</th><th>First name</th><th>Last name</th><th>Email</th><th>Role</th></tr>";
			
			$res = mysqli_query($conn, "SELECT * FROM `users` JOIN `role` WHERE users.role_id = role.role_id");

			if (!$res) {
				printf("Error: %s\n", mysqli_error($conn));
				exit();
			}

            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
				
                echo '<tr>';
                    echo '<td><a class= "user-id" href="user_page.php?id=',$row['id'],'">',$row['id'],'</a></td>';
					echo'<td><img src="'.$row['photo'].'" height="240" alt=""></td>';
                    echo '<td>'.$row['first_name'].'</td>';
                    echo '<td>'.$row['last_name'].'</td>';
                    echo '<td>'.$row['email'].'</td>';
					echo '<td>'.$row['title'].'</td>'; 
                echo '</tr>';
            }
			echo "</table>";
			if ($_SESSION["id"] == 1) {
				echo '<p><a class= "btn" href= "sign_up.php">Add User</a></p>';
			}
		?>
	</div>
	
	<script src="assets/js/sign_in.js"></script>
</body>
</html>