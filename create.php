<?php
require_once 'db/db_connect.php';
$total=count($_FILES['fileuploads']['name']);
$status=1;

$firstnameErr = $lastnameErr = $emailErr = $addressErr = $degreeErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $firstname = test_input($_POST["firstname"]);
	  $lastname = test_input($_POST["lastname"]);
	  $email = test_input($_POST["email"]);
	  $address = test_input($_POST["address"]);
	  $degree = test_input($_POST["degree"]);



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


		  for ($i=0; $i <$total ; $i++) { 
	$tmppath=$_FILES['fileuploads']['tmp_name'][$i];


	if ($tmppath != "") 
	{
		$newfile="yuklamalar/".$_FILES['fileuploads']['name'][$i];
			$images[$i] = $newfile;
		$kengaytma=strtolower(pathinfo($newfile,PATHINFO_EXTENSION));

		if($kengaytma != "jpg" && $kengaytma != "png" && $kengaytma != "jpeg"
		&& $kengaytma != "gif" ) 
		{
	   	 	echo "<p style='color red; font-size:20px;'>bu yerga faqat jpg  jpeg gif png fayillarni yuklashingiz mumkin. sizning ".$i."-fayilingiz bu kengaytmalarga to`g`ri kelmaydi</p>";
	    	$status = 0;
		}

		if (file_exists($newfile)) 
		{
			echo "<p style='color red; font-size:20px;'>Sizning ".$i."inchi fayilingiz oldindan mavjud</p>";
			$status=0;
		}
			if ($status==0) 
			{
				echo "xatoliiiiiiik vaha havaha";
			}

			else
			{
				if (move_uploaded_file($tmppath, $newfile)) 
				{
					echo $i."-sizning fayllaringiz yuklandi <br>";
				}
				else
				{
					echo $i."inchi fayl yuklanmadi boshqatdan urinib ko`ring";
				}
			}

		


	}
	$images_json = json_encode($images);
}
   $sql = "INSERT INTO students VALUES (null, '$firstname', '$lastname', '$email', '$address', '$degree' , '$images_json')";
		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
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