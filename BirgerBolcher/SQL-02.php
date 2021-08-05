<?php
include 'dbconnect.php';

$sql = "SELECT BolcheID, Name, vaegtgram, Smagssurhed, Smagsstyrke, Smagstype, Raavareprisoere  FROM bolcher";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["BolcheID"]. " - Name: " . $row["Name"]. " - Vægt(Gram): " . $row["vaegtgram"]. " - Smagssurhed: ". $row["Smagssurhed"]. " - Smagsstyrke: ". $row["Smagsstyrke"]. " - Smagstype: ". $row["Smagstype"]. " - Pris: ". $row["Raavareprisoere"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>