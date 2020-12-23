<?php
	$target_dir = "public/images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		$path = $target_dir.$_FILES["fileToUpload"]["name"];
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $path)) {
			require_once 'conn.php';
			$id = $_POST['id'];
			echo $id;
			$sql ="UPDATE `users` SET `photo` = '$path' WHERE id='$id'";
			if (!mysqli_query($conn, $sql)) {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	header("Location: user_page.php?id=".$_POST['id']."");
?>