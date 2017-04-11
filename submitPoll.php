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

$sql = "SELECT COUNT(*) AS 'count'
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


$sql = "SELECT COUNT(*) AS 'count'
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


$sql = "SELECT COUNT(*) AS 'count'
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

$total = $count1 + $count2 + $count3 + $count4;
$p1 = 400 * round($count1/$total,2);
$p2 = 400 * round($count2/$total,2);
$p3 = 400 * round($count3/$total,2);
$p4 = 400 * round($count4/$total,2);
echo "
<h5> Result </h5>
<table>
<tr>
<td><b>A</b></td>
<td>
<img src='poll.png'
width='" . $p1 . "' height='30' align='left'>
</td>
<td>
" . round($p1/4,2) ."%
</td>
</tr>
<tr>
<td><b>B</b></td>
<td>
<img src='poll.png'
width='" . $p2 . "' height='30' align='left'>
</td>
<td>
" . round($p2/4,2) . "%
</td>
</tr>
<tr>
<td><b>C</b></td>
<td>
<img src='poll.png'
width='" . $p3 . "' height='30' align='left'>
</td>
<td>
" . round($p3/4,2) ."%
</td>
</tr>
<tr>
<td><b>D</b></td>
<td>
<img src='poll.png'
width='" . $p4 . "' height='30' align='left'>
</td>
<td>
" . round($p4/4,2) . "%
</td>
</tr>
</table>";


?>
