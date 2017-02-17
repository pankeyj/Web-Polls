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
  <form class='results'>
  <input class='inputButton' type='radio'>" . $row["option1"] . "<br>
  <input class='inputButton' type='radio'>" . $row["option2"] . "<br>
  <input class='inputButton' type='radio'>" . $row["option3"] . "<br>
  <input class='inputButton' type='radio'>" . $row["option4"] . "<br>
  </form>"; 

  }
$conn->close();

?>
