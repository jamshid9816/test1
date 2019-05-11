<?php
require_once 'db/db_connect.php';
$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo "<table>";
    echo "<tr><th>ID</th> <th>Firstname</th> <th>Lastname</th> <th>Email</th> <th>Address</th> <th>Degree</th><th>images</th><th>Actions</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>";
        echo $row['id'];
        echo "</td>";
        echo "<td>";
        echo $row['firstname'];
        echo "</td>";
        echo "<td>";
        echo $row['lastname'];
        echo "</td>";
        echo "<td>";
        echo $row['email'];
        echo "</td>";
        echo "<td>";
        echo $row['adress'];
        echo "</td>";
        echo "<td>";
        echo $row['degree'];
        echo "</td>";
        echo "<td>";
        echo $row['images'];
        echo "</td>";
        echo "<td>";
        echo "<form action='delete.php' method='post'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'>";
        echo "<input type='submit' value='delete'>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'>";
        echo "<input type='submit' value='update'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


?>