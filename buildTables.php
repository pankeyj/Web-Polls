<?php
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
	echo "Connection Error";
}

echo "Connected successfully";

$sql = "CREATE TABLE Polls (
id INT PRIMARY KEY,
pollName VARCHAR(100),
option1 VARCHAR(50),
option2 VARCHAR(50),
option3 VARCHAR(50),
option4 VARCHAR(50)
)";

if ($conn->query($sql) == TRUE)
{
	echo "Table created";
}
else
{
	echo "Error creating table";
}

?>
