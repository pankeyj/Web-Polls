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

$sql = "SELECT * FROM Polls";
$result = $conn->query($sql);

echo "Hello";

while($row = $result->fetch_assoc()) {
echo "
  <label>" . $row["pollName"] . "</label>
  <form class='submitPoll' action='submitPoll.php' method='POST'>
  <input class='inputButton' type='radio'>" . $row["option1"] . "<br>
  <input class='inputButton' type='radio'>" . $row["option2"] . "<br>";
  
  if (!is_null($row["option3"]))
  {
  echo "<input class='inputButton' type='radio'>" . $row["option3"] . "<br>";
  }
  if( !is_null($row["option4"]))
  {
  echo "<input class='inputButton' type='radio'>" . $row["option4"] . "<br>";
  }

  echo "
  <input type='submit' id=" . $row["id"] . " value='Submit'>
  <input type='hidden' name=user>
  </form>
  <p>Submitted By: " .$row["username"] . "</p><br>";
  }
$conn->close();

?>
