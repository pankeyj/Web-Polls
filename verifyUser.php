<?php
$reponse = array();
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
        $response['message'] = "Connection error";
}
else
{
        $response['message'] = "Connection successful";
}

$username = $_POST["username"];
$password = $_POST["password"];
$sql = "SELECT * FROM Users WHERE username ='"  . $username . "' AND password='" . $password . "'";


$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(!is_null($row["username"]))
{
	$response['success'] = true;
	$response['name'] = $username;
}
else
{
	$response['success'] = false;
	$response['name'] = null;
}
$conn->close();

exit(json_encode($response));
