<?php
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
        echo "Connection Error>";
}
$usr = $_REQUEST["usr"];
$sql = "SELECT * FROM Polls WHERE username = '" . $usr . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
$sql2 = "SELECT COUNT(*) AS 'count'
        FROM Votes
        WHERE pollId = " . $row["id"] . " AND choice = 1";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
if(is_null($row2['count']))
{
        $count1 = 0;
}
else
{
        $count1 = $row2['count'];
}
$sql2 = "SELECT COUNT(*) AS 'count'
        FROM Votes
        WHERE pollId = " . $row["id"] . " AND choice = 2";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
if(is_null($row2['count']))
{
        $count2 = 0;
}
else
{
        $count2 = $row2['count'];
}
$sql2 = "SELECT COUNT(*) AS 'count'
        FROM Votes
        WHERE pollId = " . $row["id"] . " AND choice = 3";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
if(is_null($row2['count']))
{
        $count3 = 0;
}
else
{
        $count3 = $row2['count'];
}
$sql2 = "SELECT COUNT(*) AS 'count'
        FROM Votes
        WHERE pollId = " . $row["id"] . " AND choice = 4";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
if(is_null($row2['count']))
{
        $count4 = 0;
}
else
{
        $count4 = $row2['count'];
}
echo "
  <h4> Voting Results </h4>
  <div id='poll" . $row["id"] . "'>
  <label>" . $row["pollName"] . "</label>
  <table>
  <tr>
  <td class='resultsTable'>" . $row["option1"] . "</td>
  <td><b>VOTES=" . $count1 . "</b></td>
  </tr>
  <td class='resultsTable'>" . $row["option2"] . "</td>
  <td><b>VOTES=" . $count2 . "</b></td>
  </tr>";
  
  $bool3 = 0;
  if (!is_null($row["option3"]))
  {
    $bool3 = 1;
    echo " <td class='resultsTable'>" . $row["option1"] . "</td>
  <td><b>VOTES=" . $count3 . "</b></td>
  </tr>";
  }
  $bool4 = 0;
  if( !is_null($row["option4"]))
  {
    $bool4 = 1;
  echo "
  <td class='resultsTable'>" . $row["option4"] . "</td>
  <td><b>VOTES=" . $count4 . "</b></td>
  </tr>";
  }
  echo "
  </table>
  </div>";
$total = $count1 + $count2 + $count3 + $count4;
$p1 = 400 * round($count1/$total,2);
$p2 = 400 * round($count2/$total,2);
$p3 = 400 * round($count3/$total,2);
$p4 = 400 * round($count4/$total,2);
echo "
<h5> Graphic </h5>
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
</tr>";

if($bool3 == 1)
{
echo "
<tr>
<td><b>C</b></td>
<td>
<img src='poll.png'
width='" . $p3 . "' height='30' align='left'>
</td>
<td>
" . round($p3/4,2) ."%
</td>
</tr>";
}

if($bool4 == 1)
{
echo"
<tr>
<td><b>D</b></td>
<td>
<img src='poll.png'
width='" . $p4 . "' height='30' align='left'>
</td>
<td>
" . round($p4/4,2) . "%
</td>
</tr>";
}
echo"
</table>
<br><br>";
    
  }
$conn->close();
?>
