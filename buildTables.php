<?php
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
	echo "Connection Error";
}
else
{
	echo "connected successfully";
}
$sql = "DROP TABLE Polls";
if ($conn->query($sql) == TRUE)
{
	echo "Table Dropped";
}

$sql = "DROP TABLE Users";
if ($conn->query($sql) == TRUE)
{
        echo "Table Dropped";
}



$sql = "CREATE TABLE Polls (
id INT PRIMARY KEY AUTO_INCREMENT,
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

$sql = "CREATE TABLE Users (
username VARCHAR(50) PRIMARY KEY,
password VARCHAR(50)
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
