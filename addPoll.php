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

$title = $_POST["title"];
$option1 = $_POST["option1"];
$option2 = $_POST["option2"];
$option3 = $_POST["option3"];
$option4 = $_POST["option4"];

if (!empty($option3) && !empty($option4))
{
	$sql = "INSERT INTO Polls
	(pollName, option1, option2, option3, option4)
	VALUES
	('$title', '$option1','$option2','$option3','$option4')";
}

elseif (!empty($option3) && empty($option4))
{
        $sql = "INSERT INTO Polls
        (pollName, option1, option2, option3)
        VALUES
        ('$title', '$option1','$option2','$option3')";
}
elseif (empty($option3) && empty($option4))
{
        $sql = "INSERT INTO Polls
        (pollName, option1, option2)
        VALUES
        ('$title','$option1','$option2')";
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
