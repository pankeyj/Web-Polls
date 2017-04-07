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


if($conn->query($sql) == TRUE)
{
	
}
else
{
	
}



$sql = "SELECT COUNT(*) AS 'count'
	FROM Votes
	WHERE pollId = " . $pollId . " AND choice = 1";



$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(is_null($row['count']))
{
	$count1 = 0;
}
else
{
	$count1 = $row['count'];
}

$sql = "SELECT COUNT(*)
        FROM Votes
        WHERE pollId = " . $pollId . " AND choice = 2";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(is_null($row['count']))
{
	$count2 = 0;
}
else
{
	$count2 = $row['count'];
}


$sql = "SELECT COUNT(*)
        FROM Votes
        WHERE pollId = " . $pollId . " AND choice = 3";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(is_null($row['count']))
{
	$count3 = 0;
}
else
{
	$count3 = $row['count'];
}


$sql = "SELECT COUNT(*)
        FROM Votes
        WHERE pollId = " . $pollId . " AND choice = 4";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(is_null($row['count']))
{
	$count4 = 0;
}
else
{
	$count4 = $row['count'];
}
$response = Array();
$response[1] = $count1;
$response[2] = $count2;
$response[3] = $count3;
$response[4] = $count4;

echo json_encode($response);

?>
