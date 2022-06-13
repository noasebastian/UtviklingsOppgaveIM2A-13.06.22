<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT Brukerid, Fornavn, Etternavn, Bilde, Mobil, Jobbtelefon, Epost, Stilling, Avdeling FROM table1';
   mysql_select_db('mydb');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   ## while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
   ##   echo "EMP ID :{$row['emp_id']}  <br> ".
   ##      "EMP NAME : {$row['emp_name']} <br> ".
   ##      "EMP SALARY : {$row['emp_salary']} <br> ".
   ##      "--------------------------------<br>";
   ##}
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>