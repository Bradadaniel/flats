<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flat";


    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (!empty($_POST['search'])) {
    $stmt = $connect->prepare("SELECT * FROM products WHERE type LIKE ? OR price LIKE ?");
    $stmt->execute([
        "%" . $_POST['search'] . "%", "%" . $_POST['search'] . "%"
    ]);
    $result = $stmt->fetchAll();
}


?>
