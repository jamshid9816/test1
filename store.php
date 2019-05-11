<?php
require_once 'db/db_connect.php';


$firstnameErr = $lastnameErr = $emailErr = $addressErr = $degreeErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $firstname = test_input($_POST["firstname"]);
	  $lastname = test_input($_POST["lastname"]);
	  $email = test_input($_POST["email"]);
	  $address = test_input($_POST["address"]);
	  $degree = test_input($_POST["degree"]);
	  $id = $_POST['id'];


	      if (empty($firstname)) {
		    $firstnameErr = "Name is required";
		  } elseif (empty($lastname)) {
		  	$lastnameErr = "Lastname is required";
		  } elseif (empty($email)) {
		  	$emailErr = "Email is required";
		  } elseif (empty($address)) {
		  	$addressErr = "Address is required";
		  } elseif(empty($degree)){
		  	$degreeErr = "Degree is required";
		  }
   $sql = "UPDATE  students SET firstname='$firstname' , lastname='$lastname' , email='$email' , adress='$adress' , degree='$degree' WHERE id='$id'";
		if (mysqli_query($conn, $sql)) {
		    echo "update successfully";
		    header("Location: http://crcr.cr");
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

}

echo $firstnameErr, $lastnameErr, $emailErr, $addressErr, $degreeErr;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>