<?php
session_start();
if (isset($_SESSION['UserID'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="css/style3.css">
<title>Form</title>

<!-- https://www.youtube.com/watch?v=uzwUBDQfpkU -->
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

<div class="wrapper">
	<div class="content">
		<h1>ENTER TASK DETAILS</h1>
		<div class="hra"></div>
<form action="task.php" method="POST">
<div class="field-projectname">

<input type="text" class="field" name="projectname" placeholder="PROJECT NAME" required>

</div>
<div class="field-summary innactive">

<input type="text" class="field" name="summary" placeholder="SUMMARY" required>

</div>
<div class="field-description innactive">

<input type="text" class="field" name="description" placeholder="DESCRIPTION">

</div>
<div class="field-priority innactive">
<div class="boom">PRIORITY</div></br>
<input type="radio" class="check" name = "priority" value="1-Highest" onclick="func();">HIGHEST
<input type="radio" class="check" name = "priority" value="2-High" onclick="func();">HIGH
<input type="radio" class="check" name = "priority" value="3-Medium" onclick="func();">MEDIUM
<input type="radio" class="check" name = "priority" value="4-Low" onclick="func();">LOW
<input type="radio" class="check" name = "priority" value="5-Lowest" onclick="func();">LOWEST

</div>
<div class="field-progress innactive">
<div class="boom">PROGRESS</div></br>
<input type="radio" class="check" name= "progress" value="To do" onclick="func2();">TO DO
<input type="radio" class="check" name= "progress" value="Doing" onclick="func2();">DOING
<input type="radio" class="check" name= "progress" value="Done" onclick="func2();">DONE

</div>
<div class="field-due innactive">
<div class="boom">DUE DATE</div></br>
<input id="date" type="date" class="field" name="due" min="2019-03-22">

</div>
<div class="field-finish innactive">
<button class="butt" type="submit" name="task" value="Check">Create a Task</button>
</div>
</form>
<div class="kukur">
<form action="logout.php" method="post">
<button class="butt" type="submit" name="logout">Logout</button>
</form></div>
<br>
<a href="result.php">View result</a>
<?php
}else{
header("Location: signin.php");
exit();
}
?>
</div>
</div>

</body>
</html>
