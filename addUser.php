<?php
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
	echo "Connection Error>";
}
else
{
	echo "Connected succesfully";
}

$username = $_POST["username"];
$password = $_POST["password"];


$sql = "INSERT INTO Users
	(username, password)
	VALUES
	('$username', '$password')";

echo "Code " . $sql;
if($conn->query($sql) == TRUE)
{
	echo "Entry Updated <br>";

}
else
{
	echo "Error updating the table<br>";
}

?>
