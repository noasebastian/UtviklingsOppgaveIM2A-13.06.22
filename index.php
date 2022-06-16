<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ansatte</title>
    <style>
    
      .dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  margin-top:20px;
  position: relative;
  display: inline-block;
}
 
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
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
                    $brukerid = $row['Brukerid'];
                    
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
                    echo "<div class = 'ansattbox1'>";
                    echo "<h5> Brukerid: </h5>";
                    echo "<h5> $brukerid </h5>";
                   echo "</div>";
                   echo      "<div class='dropdown'>"; // Dropdown meny'en
                   echo            "<button class='dropbtn'>Bytt Avdeling</button>";
                   echo            "<div class='dropdown-content'>";
                   echo                "<form action='/dropdown.php' method='get'>" ;
                   echo                     "<input type='radio' id='nord' name='avdeling' value='Nord'>"; // Sender hvilken avdeling som brukeren velger
                   echo                     "<label for='nord'>Nord</label><br>";
                   echo                     "<input type='radio' id='øst' name='avdeling' value='Øst'>";
                   echo                     "<label for='øst'>Øst</label><br>";
                   echo                     "<input type='radio' id='vest' name='avdeling' value='Vest'>";
                   echo                     "<input type='hidden' name='bruker' value='$brukerid'>"; // Sender brukerens id
                   echo                     "<label for='vest'>Vest</label><br>";
                   echo                "<input type='submit' value='Submit'>" ;
                   echo                "</form>";
                   echo            "</div>";
                   echo        "</div>";

                    echo "</div>";
                    echo "</div>";
                    
                }
              } else {
                echo "0 results";
              }
               
             
               ?>
                

             <?php  ?>
             
        </div> 
        <div id="bot">
          <div class="bot1">
              <h1>Legg til Medlem.</h1>  <!-- Skjema for og legge til folk til SQL databasen -->
            <form action="/Send.php" method="get">  <!-- hvor den skal sende verdiene og hvilken metode den skal bruke -->
            <label for="fname">Fornavn:</label>
            <input type="text"  name="fname" required><br>
            <label for="lname">Etternavn:</label>
            <input type="text"  name="lname" required><br> <!-- viktig og ha required slik at all info kommer inn i databasen -->
            <label for="mobil">Mobil:</label>
            <input type="number" id="mobil" name="mobil" required><br>
            <label for="jobbtelefon">Jobbtelefon:</label>
            <input type="number" id="jobbtelefon" name="jobbtelefon" required><br>
            <label for="epost">Epost:</label>
            <input type="text" id="epost" name="epost" required><br>
            <label for="stilling">Stilling:</label>
            <input type="text" id="stilling" name="stilling" required><br>
            <input type='radio' id='nord' name='avdeling' value='Nord' require>
            <label for='nord'>Nord</label><br>
            <input type='radio' id='øst' name='avdeling' value='Øst' require>
            <label for='øst'>Øst</label><br>
            <input type='radio' id='vest' name='avdeling' value='Vest'require>
            <label for='vest'>Vest</label><br>
            <input type="submit" value="Submit"> <!-- submit knappen  (alle vet hva den gjør) -->
            </form>
          </div>
          <div class="bot1">
            <h1>Rediger medlem info</h1> <!-- hvor man redigerer brukerens informasjon -->
            <form action="/Edit.php" method="get">
            <select id='brukerid' name='brukerid'>
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
              $sql = "SELECT Brukerid, Fornavn, Etternavn FROM table1"; // Hva vi skal hente
              $result = $conn->query($sql); // Henter resultatet
              $conn->close(); // Lukke tilkoblingen til SQL server  
            while($row = $result->fetch_assoc()) {
              $fornavn = $row['Fornavn'];
              $etternavn = $row['Etternavn'];
              $brukerid =$row['Brukerid'];
              

            echo "<option value='$brukerid'>$fornavn - $etternavn</option>"; // Lager liste med alle ansatte!
            } 
            ?>   
            </select>
            <br>
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
            <input type='radio' id='nord' name='avdeling' value='Nord' require>
            <label for='nord'>Nord</label><br>
            <input type='radio' id='øst' name='avdeling' value='Øst' require>
            <label for='øst'>Øst</label><br>
            <input type='radio' id='vest' name='avdeling' value='Vest'require>
            <label for='vest'>Vest</label><br>
            <input type="submit" value="Submit">
            </form>
            </div>
            <div class="bot1">
            <h1>Slett medlemer</h1> <!-- Sletter medlemer -->
            <form action="/Del.php" method="get"> 
            <label for="brukerid">Brukerid:</label>
            <input type="text"  name="brukerid" required><br> 
            <input type="submit" value="Submit">
            </form>
            </div>
            </div>     
    </div>
 
    <!--Skrever av mesterkoderen LORD NOA ødelegeren av python, beseireren av PHP, Kongen av alle kodespråk som har verdi. -->
</body>
</html>