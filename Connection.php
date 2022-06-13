
<?php
$servername = "localhost"; // IP på SQL server
$username = "root"; // Brukernavn
$password = ""; // Superbra Passord
$dbname = "myDB"; // Database Navn

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); // Hvis tilkoblingen feilet
}

$sql = "SELECT Brukerid, Fornavn, Etternavn, Bilde, Mobil, Jobbtelefon, Epost, Stilling, Avdeling FROM table1"; // Hva vi skal hente
$result = $conn->query($sql); // Henter resultatet



$conn->close(); // Lukke tilkoblingen til SQL server
?>