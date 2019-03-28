<?php
include "connect.php";
if(isset($_POST['delete2'])){
$id = $_GET['taskid'];

$sql = "DELETE FROM task WHERE TaskID=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header("Location: sort.php");
exit();
}
?>
