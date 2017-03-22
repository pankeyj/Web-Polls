<?php
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
        echo "Connection Error\n";
}
else
{
        echo "Connected succesfully\n";
}

$username = $_POST["username"];
$password = $_POST["password"];
$sql = "SELECT * FROM Users WHERE username ='"  . $username . "' AND password='" . $password . "'";


$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row["username"];

echo "\n ". $sql . "\n";

if(!is_null($row["username"]))
{
	echo "Valid credentials";
}
else
{
	echo "Failed to login";
}
$conn->close();

?>
