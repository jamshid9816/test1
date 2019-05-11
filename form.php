<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CREATE STUDENT</title>
</head>
<body>
	<form action="create.php" method="post" enctype="multipart/form-data">
		Enter student name:<input type="text" name="firstname" placeholder="Enter student name"><br>
		Enter student lastname:<input type="text" name="lastname" placeholder="Enter student lastname"><br>
		Enter student email:<input type="email" name="email" placeholder="Enter student email"><br>
		Enter student address:<input type="text" name="address" placeholder="Enter student address"><br>
		Enter student degree:<input type="number" name="degree" placeholder="Enter student degree"><br>
		<input type="file" name="fileuploads[]" multiple="multiple"><br>
		<input type="submit" name="submit" value="CREATE STUDENT">
	</form>
</body>
</html>