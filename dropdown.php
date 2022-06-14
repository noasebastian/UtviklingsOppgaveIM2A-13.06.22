<?php 
$brukerid = $_GET['bruker']; // Henter Brukerid
$avdeling = $_GET['avdeling']; // Henter hvilken avdeling brukeren skal byttes til



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE table1 SET Avdeling = '$avdeling' WHERE Brukerid='$brukerid'"; // Oppdaterer hvilken avdeling brukeren har

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>