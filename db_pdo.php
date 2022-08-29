<?php

//$servername = "localhost";
//$username = "soloq";
//$password = "yvhLczViRCj3MPA";
//$dbname = "soloq";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flat";

try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

}
?>