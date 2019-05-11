<?php 
require_once 'db/db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id=$_POST['id'];
$sql = "SELECT * FROM students WHERE id='$id'";

$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		    echo "<form action='store.php' method='post'>";
		    $row = mysqli_fetch_assoc($result);
			
			echo "Enter student name:<input type='text' name='firstname' value='".$row['firstname']."'><br>";
			echo "Enter student lastname:<input type='text' name='lastname' value='".$row['lastname']."'><br>";
			echo "Enter student email:<input type='email' name='email' value='".$row['email']."'><br>";
			echo "Enter student address:<input type='text' name='address' value='".$row['adress']."'<br>";
			echo "Enter student degree:<input type='number' name='degree' value='".$row['degree']."'><br>";
			echo "<input type='hidden' value='".$id."' name='id'>";
			echo "<input type='submit' name='submit' value='UPDATE'>";
			echo "</form>";
		} 
	
}


 ?>