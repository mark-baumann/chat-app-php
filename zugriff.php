<?php

$user = "root";
$password = "usbw";
$host = "localhost";
$dbname = "php_chat";

$db = mysqli_connect($host, $user, $password)
or die("Keine Verbindung!");

mysqli_select_db($db, $dbname);
echo "<script>console.log('Zugriff DB ok...) </script>";

?>