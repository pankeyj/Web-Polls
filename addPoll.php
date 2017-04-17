<?php
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
	echo "Connection Error>";
}
else
{
	echo "Connected sy";
}
$title = $conn->real_escape_string($_POST["title"]);
$option1 = $conn->real_escape_string($_POST["option1"]);
$option2 = $conn->real_escape_string($_POST["option2"]);
$option3 = $conn->real_escape_string($_POST["option3"]);
$option4 = $conn->real_escape_string($_POST["option4"]);
$username = $_POST["user"];
echo "<br>";
if (!empty($option3) && !empty($option4))
{
	$sql = "INSERT INTO Polls
	(pollName, option1, option2, option3, option4, username)
	VALUES
	('$title', '$option1','$option2','$option3','$option4', '$username')";
}
elseif (!empty($option3) && empty($option4))
{
        $sql = "INSERT INTO Polls
        (pollName, option1, option2, option3, username)
        VALUES
        ('$title', '$option1','$option2','$option3', '$username')";
}
elseif (empty($option3) && empty($option4))
{
        $sql = "INSERT INTO Polls
        (pollName, option1, option2, username)
        VALUES
        ('$title','$option1','$option2', '$username')";
}
else
{
	echo "Unable to add poll <br>";
}
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
