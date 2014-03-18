<?php

$host = "localhost";
$user = "root";
$pass = "password";
$dbname = "dbname";

$connessione = mysql_connect($host, $user, $pass) or die("Connessione non riuscita: " . mysql_error());
mysql_select_db($dbname, $connessione);


$row = 1;
if (($handle = fopen("cap.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data);
    echo "<p> $num fields in line $row: <br /></p>\n";
    $row++;
    for ($c=0; $c < $num; $c++) {
      $query_1 = "INSERT INTO shipping_tablerate (website_id,dest_country_id,dest_zip,condition_name,condition_value,price,cost) VALUES (1,'IT','".$data[$c]."','package_weight','0.0010','9.0','9.0')";
      mysql_query($query_1);

      echo $data[$c] . "<br />\n";
    }
  }
  fclose($handle);
}

mysql_close($connessione);
?>
