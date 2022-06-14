<?php
$brukerid = $_GET['brukerid']; // Henter id'en på brukeren vi skal redigere infoen til
$fornavn = $_GET['fname']; // henter variablene fra index.php
$etternavn = $_GET['lname'];
$mobil = $_GET['mobil'];
$jobbtelefon = $_GET['jobbtelefon'];
$epost = $_GET['epost'];
$stilling = $_GET['stilling'];
$avdeling = $_GET['avdeling'];

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

$sql = "UPDATE table1 SET Fornavn = '$fornavn', Etternavn = '$etternavn', Mobil = '$mobil', Jobbtelefon = '$jobbtelefon' , Epost = '$epost' , Stilling = '$stilling' , Avdeling = '$avdeling' WHERE Brukerid='$brukerid'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>