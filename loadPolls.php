<?php
$conn = new mysqli('cis.gvsu.edu', 'pankeyj', 'pankeyj8613', 'pankeyj');
if($conn->connect_errno)
{
        echo "Connection Error>";
}

$sql = "SELECT * FROM Polls";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
echo "
  <div id='poll" . $row["id"] . "'>
  <label>" . $row["pollName"] . "</label>
  <form class='submitPoll' name='group" . $row["id"] . "'  onsubmit='vote(event, this.id)' id='" . $row["id"] . "' method='POST'>
  <input class='inputButton' name='group" . $row["id"] . "' type='radio' value='1'>" . $row["option1"] . "<br>
  <input class='inputButton' name='group" . $row["id"] . "' type='radio' value='2'>" . $row["option2"] . "<br>";
  
  if (!is_null($row["option3"]))
  {
  echo "<input class='inputButton' name='group" . $row["id"] . "' type='radio' value='3'>" . $row["option3"] . "<br>";
  }
  if( !is_null($row["option4"]))
  {
  echo "<input class='inputButton'  name='group" . $row["id"] . "'type='radio' value='4'>" . $row["option4"] . "<br>";
  }

  echo "
  <input type='submit' value='Submit'>
  
  </form>
  <p>Submitted By: " .$row["username"] . "</p><br>
  </div>";
  }
$conn->close();

?>
