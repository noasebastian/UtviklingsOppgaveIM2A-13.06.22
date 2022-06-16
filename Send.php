<?php
$fornavn = $_GET['fname']; // henter variablene fra index.php
$etternavn = $_GET['lname'];
$mobil = $_GET['mobil'];
$jobbtelefon = $_GET['jobbtelefon'];
$epost = $_GET['epost'];
$stilling = $_GET['stilling'];
$avdeling = $_GET['avdeling'];
$bilde = "bilder/$etternavn.jpg";

$servername = "localhost"; // IP på SQL server
$username = "root"; // Brukernavn
$password = ""; // Superbra Passord
$dbname = "myDB"; // Database Navn

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// setter variablene inn i tabellen
$sql = "INSERT INTO table1 (Fornavn, Etternavn, Mobil, Jobbtelefon, Epost, Stilling, Avdeling,Bilde) 
VALUES ('$fornavn', '$etternavn', '$mobil','$jobbtelefon','$epost','$stilling','$avdeling','$bilde')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); // lukker tilkoblingen









?>


