<?php 
require_once 'db/db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id=$_POST['id'];
	$sql = "DELETE FROM students WHERE id='$id'";
		if (mysqli_query($conn, $sql)) {
		    echo "record deleted successfully";
		    header("Location: http://crcr.cr/index.php");
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	
}


 ?>