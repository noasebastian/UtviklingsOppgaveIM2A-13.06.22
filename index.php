<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ansatte</title>
</head>
<body>
    <?php
     include 'Connection.php'; // Inkluderer PHP filen for tilkobling
      ?>
    <div id="TopDiv">
        <div id="titel">
            <h1>Ansatte</h1>
        </div>
        <div id="ansatte">
             <?php
             $div1 = "<div>";
             $div2 = "</div>";
             
             if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { // Henter verdiene i array-et
                    $image = $row['Bilde'];
                    $stilling = $row['Stilling'];
                    $fornavn = $row['Fornavn'];
                    $etternavn = $row['Etternavn'];
                    $mobil = $row['Mobil'];
                    $jobbtelefon = $row['Jobbtelefon'];
                    $epost = $row['Epost'];
                    $avdeling = $row['Avdeling']; 
                     echo "<div class='border'>"; // Lager ny div
                    echo "<div class ='ansattbox'> ";
                    echo  "<div class='bilde'>";
                    echo"<img src=\"$image\" width=\"100px\" height=\"100px\"\/>";
                    echo "</div>";
                     echo "<div class = 'ansattbox1'>";
                      echo   "<h4>Stilling:</h4>";
                     echo "<h4> $stilling </h4>";
                     echo "</div>";
                     echo "<div class = 'ansattbox1'>";
                      echo   "<h4>Navn:</h4>";
                     echo "<h4> $fornavn </h4>";
                     echo "<h4> - $etternavn </h4>"; 
                   echo   "</div>";
                   echo   "<div class = 'ansattbox1'>";
                     echo    "<h4>Mobiltelefon: </h4>";
                     echo "<h4> $mobil </h4>";
                     echo "</div>";
                     echo "<div class = 'ansattbox1'>";
                     echo  "<h4>Jobbtelefon:</h4>";
                     echo "<h4> $jobbtelefon </h4>";
                     echo "</div>";
                     echo "<div class = 'ansattbox1'>";
                         echo "<h4>Epost:</h4>";
                         echo "<h4> $epost </h4>";
                     echo "</div>" ;
                     echo "<div class = 'ansattbox1'>";
                     echo "<h4>Avdeling:</h4>";
                     echo "<h4> $avdeling </h4>";
                    echo "</div>" ;
                    echo "</div>";
                    echo "</div>";
                }
              } else {
                echo "0 results";
              }
               
             
               ?>
                

             <?php  ?>
        </div>
            <form action="/Send.php" method="get">
            <label for="fname">Fornavn:</label>
            <input type="text"  name="fname" required><br>
            <label for="lname">Etternavn:</label>
            <input type="text"  name="lname" required><br>
            <label for="mobil">Mobil:</label>
            <input type="number" id="mobil" name="mobil" required><br>
            <label for="jobbtelefon">Jobbtelefon:</label>
            <input type="number" id="jobbtelefon" name="jobbtelefon" required><br>
            <label for="epost">Epost:</label>
            <input type="text" id="epost" name="epost" required><br>
            <label for="stilling">Stilling:</label>
            <input type="text" id="stilling" name="stilling" required><br>
            <label for="avdeling">Avdeling:</label>
            <input type="text" id="avdeling" name="avdeling" required><br>
            <input type="submit" value="Submit">
            </form>
    </div>
 
    
</body>
</html>