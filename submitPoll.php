<?php
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
	echo "Connection Error>";
}

$pollId = $_POST["pollId"];
$username = $_POST["name"];
$choice = $_POST["choice"];

$sql = "INSERT INTO Votes
	(pollId, username, choice)
	VALUES
	(" . $pollId . ",'" . $username . "'," . $choice . ")";

echo $sql;
if($conn->query($sql) == TRUE)
{
	echo "Vote submitted\n";
}
else
{
	echo "Your vote could not be recorded\n";
}

?>
