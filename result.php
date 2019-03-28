<?php
session_start();
	require 'connect.php';
	require 'task.php';
	?>
	<!DOCTYPE html>
	<html>
	<head>
  <link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/style3.css">
<style>
body{padding-left:25px;
padding-right: 25px;}</style>
</head>
<?php
// https://stackoverflow.com/questions/470617/how-do-i-get-the-current-date-and-time-in-php/471406#471406
	$date = date("Y-m-d",time());
	if (isset($_SESSION['UserID'])) {
		echo '<div><center><h1 style="width: 100%; text-align: center; top: 0; text-size: ">Task Manager</h1>';
					echo '<br><br><nav><form action="logout.php" style="display: inline-block; float:left;" method="post">
					<button type="submit" class="butt" name="logout">Logout</button>
				</form>
				<form style="display: inline-block;" method="post"><input type="text" name="search" class="field" placeholder="Project Name">
<button type="submit" class="task butt" name="result">Search</button></form>
<form action="sort.php" style="display: inline-block;float:right;" method="post">
<button type="submit" class="task butt" name="sort">Sort by Priority</button></form>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="loggedin.php">ADD TASK</a></nav></center></div>';

echo '<section>
<!--for demo wrap-->
<h1>TASK DETAILS</h1>
<div class="tbl-header">
	<table cellpadding="0" cellspacing="0" border="0">
		<thead>
			<tr>
			   <th>Task ID</th>
			   <th>Project Name</th>
			   <th>Project Summary</th>
			   <th>Project Description</th>
			   <th>Priority</th>
			   <th>Progress</th>
			   <th>Due Date</th>
			   </tr>  </thead>';
				 ?>
		     </table>
		   </div>

<?php
$sql = "SELECT * FROM task ORDER BY Due";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// output data of each row?>

		<div class="tbl-content">
				<table cellpadding="0" cellspacing="0" border="0">

					<?php
    while($row = mysqli_fetch_assoc($result)) {

			  echo '
				      <tbody>
							<tr>
			   <td>', $row["TaskID"], '</td>
			   <td>', $row["Project_Name"], '</td>
			   <td>', $row["Summary"], '</td>
			   <td>', $row["Description"], '</td>
			   <td>', $row["Priority"], '</td>
			   <td>', $row["Progress"], '</td>
			   <td>', $row["Due"], '</td>
			   </tr></tbody>

	 </section>';
 }?></table>
</div><?php
} else {
    echo "0 results";
}
echo '</table>';

if(isset($_POST['result'])) {
	$search = $_POST['search'];
	echo ' <br><br>';
	echo '<section>
	<!--for demo wrap-->
	<h1>SEARCH RESULTS</h1>
	<div class="tbl-header">
		<table cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
				   <th>Task ID</th>
				   <th>Project Name</th>
				   <th>Project Summary</th>
				   <th>Project Description</th>
				   <th>Priority</th>
				   <th>Progress</th>
				   <th>Due Date</th>
					 <th>Edit</th>
				   <th>Delete</th>
				   </tr>  </thead>';
					 ?>
			     </table>
			   </div>

			   <?php
	if ($stmt = $conn->prepare("SELECT TaskID, Project_Name, Summary, Description, Priority, Progress, Due FROM task WHERE Project_Name = ? ORDER BY Due")) {
		  $stmt->bind_param("s", $search);
		   $stmt->execute();
		   $result = $stmt->get_result();
			 echo '<table>';
		   while ($myrow = $result->fetch_assoc()) {

				 if ($myrow['Progress'] == "Done") {
				   echo '
			   <tr style="border: 2px solid green;">
			   <td style="border: 2px solid green;">', $myrow['TaskID'], '</td>
			   <td style="border: 2px solid green;">', $myrow['Project_Name'], '</td>
			   <td style="border: 2px solid green;">', $myrow['Summary'], '</td>
			   <td style="border: 2px solid green;">', $myrow['Description'], '</td>
			   <td style="border: 2px solid green;">', $myrow['Priority'], '</td>
			   <td style="border: 2px solid green;">', $myrow['Progress'], '</td>
			   <td style="border: 2px solid green;">', $myrow['Due'], '</td>
			   <td style="border: 2px solid green;">', '<form action="edit.php?taskid='.$myrow['TaskID'].'" method="post"><button style ="width: 100%;" type="submit" class="task" name="edit">Edit</button></form></td>
			   <td style="border: 2px solid green;">', '<form action="delete.php?taskid='.$myrow['TaskID'].'" method="post"><button style ="width: 100%;" type="submit" class="task" name="delete">Delete</button></form></td>
			   </tr>';

			   }
			   else if ($date > $myrow['Due']) {
				   echo '
			   <tr style="border: 2px solid red;">
			   <td style="border: 2px solid red;">', $myrow['TaskID'], '</td>
			   <td style="border: 2px solid red;">', $myrow['Project_Name'], '</td>
			   <td style="border: 2px solid red;">', $myrow['Summary'], '</td>
			   <td style="border: 2px solid red;">', $myrow['Description'], '</td>
			   <td style="border: 2px solid red;">', $myrow['Priority'], '</td>
			   <td style="border: 2px solid red;">', $myrow['Progress'], '</td>
			   <td style="border: 2px solid red;">', $myrow['Due'], '</td>
			   <td style="border: 2px solid red;">', '<form action="edit.php?taskid='.$myrow['TaskID'].'" method="post"><button style ="width: 100%;" type="submit" class="task" name="edit">Edit</button></form></td>
			   <td style="border: 2px solid red;">', '<form action="delete.php?taskid='.$myrow['TaskID'].'" method="post"><button style ="width: 100%;" type="submit" class="task" name="delete">Delete</button></form></td>
			   </tr>';
			   }
			   else {
				   echo'
				   <tr style="border: 1px solid black;">
			   <td style="border: 1px solid black;">', $myrow['TaskID'], '</td>
			   <td style="border: 1px solid black;">', $myrow['Project_Name'], '</td>
			   <td style="border: 1px solid black;">', $myrow['Summary'], '</td>
			   <td style="border: 1px solid black;">', $myrow['Description'], '</td>
			   <td style="border: 1px solid black;">', $myrow['Priority'], '</td>
			   <td style="border: 1px solid black;">', $myrow['Progress'], '</td>
			   <td style="border: 1px solid black;">', $myrow['Due'], '</td>
			   <td style="border: 1px solid black;">', '<form action="edit.php?taskid='.$myrow['TaskID'].'" method="post"><button style ="width: 100%;" type="submit" class="task" name="edit">Edit</button></form></td>
			   <td style="border: 1px solid black;">', '<form action="delete.php?taskid='.$myrow['TaskID'].'" method="post"><button style ="width: 100%;" type="submit" class="task" name="delete">Delete</button></form></td>
			   </tr>';
			   }
		   }

		    /*http://php.net/manual/en/mysqli.prepare.php*/
}
}
echo '</table>';
}
else{
					header("Location: index.html");
					exit();
				}
