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
	echo "Vote submitted\n";
}
else
{
	echo "Your vote could not be recorded\n";
	echo "<br>";
	echo $sql;
}

$response = array();

$sql = "SELECT COUNT(*)
	FROM Votes
	WHERE pollId = " . $pollId . " AND choice = 1";
$result = $conn->_query($sql);
$row = $result->fetch_assoc();
$count1 = $row['count'];


$sql = "SELECT COUNT(*)
        FROM Votes
        WHERE pollId = " . $pollId . " AND choice = 2";
$result = $conn->_query($sql);
$row = $result->fetch_assoc();
$count2 = $row['count'];



$sql = "SELECT COUNT(*)
        FROM Votes
        WHERE pollId = " . $pollId . " AND choice = 3";
$result = $conn->_query($sql);
$row = $result->fetch_assoc();
$count3 = $row['count'];



$sql = "SELECT COUNT(*)
        FROM Votes
        WHERE pollId = " . $pollId . " AND choice = 4";
$result = $conn->_query($sql);
$row = $result->fetch_assoc();
$count4 = $row['count'];


$response['choice1'] = $count1;
$response['choice2'] = $count2;
$response['choice3'] = $count3;
$response['choice4'] = $count4;


echo "\n\n"
echo $count1;
echo "HELLO WORLD";
echo $response;

?>
