<?php 
require_once 'db_connect.php';
require_once '../vendor/fzaninotto/faker/src/autoload.php';
$faker = Faker\Factory::create();


for ($i=0; $i <=100; $i++) { 

   $sql = "INSERT INTO students VALUES (null, '$faker->name', '$faker->name', '$faker->email','$faker->address' ,'$faker->randomDigit')";
	    if (mysqli_query($conn, $sql)) {
            echo "New records created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
}


?>