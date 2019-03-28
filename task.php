<?php
if (isset($_POST['task'])) {
	
	require 'connect.php';
	
	$project = $_POST['projectname']; 
	$summary = $_POST['summary'];
	$description = $_POST['description'];
	$priority = $_POST['priority'];
	$progress = $_POST['progress'];
	$due = $_POST['due'];
	
	
	if(empty($project) || empty($summary) || empty($description) || empty($priority) || empty($progress) || empty($due)){
		header("Location: loggedin.php?error=emptyfields");
		exit();
	}
	
	else {
		// Prepare and bind
		$stmt = $conn->prepare("INSERT INTO task (Project_Name, Summary, Description, Priority, Progress, Due) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $project, $summary, $description, $priority, $progress, $due);

		// execute
		$stmt->execute();
		$stmt->close();
		// Send back to Sign up page and url indicates that sign up was successful
		header("Location: loggedin.php");
		exit();
	}
		
		
}
