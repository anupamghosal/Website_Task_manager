<?php
session_start();
include "connect.php";
$id = $_GET['taskid'];
if (isset($_SESSION['UserID'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="css/style2.css">
<title>Form Animation</title>
<script>
function func ()
{
	var priority = document.getElementsByName("priority");
	if(priority[0].checked)
	{
		var val = priority[0].value;
		alert(val);
	}

	else if(priority[1].checked)
	{
		var val = priority[1].value;
		alert(val);
	}

	else if(priority[2].checked)
	{
		var val = priority[2].value;
		alert(val);
	}

	else if(priority[3].checked)
	{
		var val = priority[3].value;
		alert(val);
	}

	else if(priority[4].checked)
	{
		var val = priority[4].value;
		alert(val);
	}
}

function func2 ()
{
	var progress = document.getElementsByName("progress");
	if(progress[0].checked)
	{
		var val2 = progress[0].value;
		alert(val2);
	}

	else if(progress[1].checked)
	{
		var val2 = progress[1].value;
		alert(val2);
	}

	else if(progress[2].checked)
	{
		var val2 = progress[2].value;
		alert(val2);
	}
}
</script>
</head>
<body>
<form method="POST">
<div class="field-projectname">
<i class="far fa-arrow-alt-circle-right"></i>
<input type="text" name="projectname" placeholder="Project Name" required>
<i class="far fa-arrow-alt-circle-right"></i>
</div>
<div class="field-summary innactive">
<i class="far fa-arrow-alt-circle-right"></i>
<input type="text" name="summary" placeholder="Summary" required>
<i class="far fa-arrow-alt-circle-right"></i>
</div>
<div class="field-description innactive">
<i class="far fa-arrow-alt-circle-right"></i>
<input type="text" name="description" placeholder="Description">
<i class="far fa-arrow-alt-circle-right"></i>
</div>
<div class="field-priority innactive">
<i class="far fa-arrow-alt-circle-right"></i>
<input type="radio" name = "priority" value="1-Highest" onclick="func();">Highest
<input type="radio" name = "priority" value="2-High" onclick="func();">High
<input type="radio" name = "priority" value="3-Medium" onclick="func();">Medium
<input type="radio" name = "priority" value="4-Low" onclick="func();">Low
<input type="radio" name = "priority" value="5-Lowest" onclick="func();">Lowest
<i class="far fa-arrow-alt-circle-right"></i>
</div>
<div class="field-progress innactive">
<i class="far fa-arrow-alt-circle-right"></i>
<input type="radio" name= "progress" value="To do" onclick="func2();">To Do
<input type="radio" name= "progress" value="Doing" onclick="func2();">Doing
<input type="radio" name= "progress" value="Done" onclick="func2();">Done
<i class="far fa-arrow-alt-circle-right"></i>
</div>
<div class="field-due innactive">
<i class="far fa-arrow-alt-circle-right"></i>
<input type="date" name="due">
<i class="far fa-arrow-alt-circle-right"></i>
</div>
<div class="field-finish innactive">
<button type="submit" name="update" value="Check">Update Task</button>
</div>
</form>
<form action="logout.php" method="post">
<button type="submit" name="logout">Logout</button>
</form>
<a href="result.php">View result</a>
<?php
}else{
	header("Location: signin.php");
	exit();
}
if (isset($_POST['update'])) {
	$project = $_POST['projectname'];
	$summary = $_POST['summary'];
	$description = $_POST['description'];
	$priority = $_POST['priority'];
	$progress = $_POST['progress'];
	$due = $_POST['due'];

	// Prepare and bind
	$stmt = $conn->prepare("UPDATE task SET Project_Name=?, Summary=?, Description=?, Priority=?, Progress=?, Due=? WHERE TaskID=?");
	$stmt->bind_param("sssssss", $project, $summary, $description, $priority, $progress, $due, $id);

	// execute
	$stmt->execute();
	$stmt->close();


header("Location: result.php");
exit();

}
?>
<!--https://www.youtube.com/watch?v=wc5k2AMPED0-->
<script src="js/app.js"></script>
</body>
</html>
