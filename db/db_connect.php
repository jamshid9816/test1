<?php 
$server = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'test_crud';


$conn = mysqli_connect($server, $user, $pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	echo "Success!!!";
}


?>