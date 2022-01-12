<?php



include('zugriff.php');

$user = $_GET['user'];
echo $user;
$nick = $_GET['nick'];
echo $nick;

$name = mysqli_real_escape_string($db, $_GET['user']);
$name2 = mysqli_real_escape_string($db, $_GET['nick']);


include('zugriff.php');



$sql = "CREATE TABLE `".$name.$name2."` (
    id INT(6),
    nick TEXT,
    eintrag TEXT,
    uhrzeit Text,
    datum TEXT
    );";

mysqli_query($db, $sql);





?>