<?php
if (isset($_POST['signup'])) {

	require 'connect.php';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['confirmpassword'];


		$sql = "SELECT Username FROM Login WHERE Username=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: index.html?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck  > 0) {
				header("Location: index.html?error=usertaken&mail=".$email);
				exit();
			}
			else {

				$sql = "INSERT INTO Login (Username, Email, Password) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: index.html?error=sqlerror");
					exit();
				}
				else {
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: index.html?signup=success");
					exit();
				}

			}
		}


	mysqli_stmt_close($stmt);
	$conn->close();

}
else {
	header("Location: index.html");
	exit();
}
