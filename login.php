<?php

if(isset($_POST['signin'])) {
	
	require 'connect.php';
	
	$mailuid = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($mailuid) || empty($password)){
		header("Location: signin.php?error=emptyfields");
		exit();
	}
	else {
		$sql = "SELECT * FROM Login WHERE Username=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: signin.php?error=sqlerror");
			exit();
		}
		else {
			
			mysqli_stmt_bind_param($stmt, "s", $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($password, $row['Password']);
				if ($pwdCheck == false){
					header("Location: signin.php?error=wrongpwd");
					exit();
				}
				else if ($pwdCheck == true) {
					session_start();
					$_SESSION['UserID'] = $row['UserID'];
					$_SESSION['Username'] = $row['Username'];
					
					header("Location: loggedin.php?login=success");
					exit();
				}
				else {
					header("Location: signin.php?error=wrongpwd");
					exit();
				}
			}
			else {
				header("Location: signin.php?error=nouser");
				exit();
			}
			
		}
	}
	
}
else {
	header("Location: signin.php");
	exit();
}