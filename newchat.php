<?php
<<<<<<< HEAD
session_start();
=======
>>>>>>> dd9b008510b415e3c4f82302210f0dbde581ffae

error_reporting(E_ALL);

include('zugriff.php');

$user = $_GET['user'];
<<<<<<< HEAD
echo "Du chattest mit".$user;
$nick = $_GET['nick'];
//echo $nick;

$user = mysqli_real_escape_string($db, $_GET['user']);
$nick = mysqli_real_escape_string($db, $_GET['nick']);



$_SESSION["nick"] = $nick;


$sql = "CREATE TABLE `".$nick.$user."` (
    id INT(6) AUTO_INCREMENT,
    nick TEXT,
    eintrag TEXT,
    uhrzeit Text,
    datum TEXT,
     PRIMARY KEY (id)
    );";

mysqli_query($db, $sql);


$sql = "CREATE TABLE `".$user.$nick."` (
    id INT(6) AUTO_INCREMENT,
    nick TEXT,
=======
echo $user;
$nick = $_GET['nick'];
echo $nick;

$name = mysqli_real_escape_string($db, $_GET['user']);
$name2 = mysqli_real_escape_string($db, $_GET['nick']);






$sql = "CREATE TABLE `".$name.$name2."` (
    id INT(6) AUTO_INCREMENT,
>>>>>>> dd9b008510b415e3c4f82302210f0dbde581ffae
    eintrag TEXT,
    uhrzeit Text,
    datum TEXT,
     PRIMARY KEY (id)
    );";

mysqli_query($db, $sql);


echo '<link rel="stylesheet" href="style.css">';

date_default_timezone_set('Europe/Amsterdam');
$heute = date("d.m.Y",time());

<<<<<<< HEAD
//echo $nick;
=======
echo $nick;
>>>>>>> dd9b008510b415e3c4f82302210f0dbde581ffae

echo ' 
 <form action="" method="post"> 
    <table border="0"> 
        <tr> ';
//Falls ein Nick eingegeben wurde, diesen als default in die Textbox setzen
if(!empty($_POST['nick'])){
    $akt_nick = $_POST['nick'];
<<<<<<< HEAD
    //echo $akt_nick;
   
=======
>>>>>>> dd9b008510b415e3c4f82302210f0dbde581ffae
}
else{
    $akt_nick='';
};
    
echo ' 
            <th>Nachricht:</th><td><input type="text" name="eintrag" value="" id="textbox">&nbsp;<input type="submit" name="eintragen" value="Senden!" id="button">&nbsp;</td> 
    </table> ';


<<<<<<< HEAD
   
=======

>>>>>>> dd9b008510b415e3c4f82302210f0dbde581ffae


    if(isset($_POST['eintragen'])){ 

        if(empty($_POST['eintrag'])){ 
            echo '<script>alert("Bitte Nick UND Message eingeben")</script>'; 
        }else{ 
            //Variablen definieren und mit "POST" Daten füllen (Mit htmlspecialchars filtern, Apostrophe maskieren..) 
<<<<<<< HEAD
            //$nick = addslashes(htmlspecialchars($_SESSION['nickname']));
            $eintrag = addslashes(htmlspecialchars($_POST['eintrag'])); 
            $uhrzeit = date("H:i",time());
            $datum = date("d.m.Y",time());
            $nick = addslashes(htmlspecialchars($_SESSION['nick'])); 
            

             $sql = "INSERT INTO `".$nick.$user."`
             (nick, eintrag, uhrzeit, datum) VALUES 
             ('$nick', '$eintrag', '$uhrzeit', '$datum');";
            mysqli_query($db, $sql); 

            $sql = "INSERT INTO `".$user.$nick."`
             (nick, eintrag, uhrzeit, datum) VALUES 
             ('$nick', '$eintrag', '$uhrzeit', '$datum');";
            mysqli_query($db, $sql);

=======
            $eintrag = addslashes(htmlspecialchars($_POST['eintrag'])); 
            $uhrzeit = date("H:i",time());
            $datum = date("d.m.Y",time());
        
            

             $sql = "INSERT INTO `".$name.$name2."`
             (eintrag,uhrzeit, datum) VALUES 
             ('$eintrag', '$uhrzeit', '$datum');";
            mysqli_query($db, $sql); 
>>>>>>> dd9b008510b415e3c4f82302210f0dbde581ffae
            } 
        
        }

        echo '<div id="chat_fenster" >';
<<<<<<< HEAD
      
        //Nur die Einträge von heute auslesen
    
           $abfrage = mysqli_query($db, "SELECT mark1mark2.eintrag, mark1mark2.uhrzeit, mark2mark1.eintrag, mark2mark1.uhrzeit, mark1mark2.nick, mark2mark1.nick FROM mark1mark2 JOIN mark2mark1 ON mark1mark2.id=mark2mark1.id ORDER BY mark1mark2.uhrzeit and mark2mark1.uhrzeit;");

=======
        #echo $name.$name2;
        //Nur die Einträge von heute auslesen
    
          #$abfrage = mysqli_query($db, "SELECT mark1mark2.eintrag, mark1mark2.uhrzeit, mark2mark1.eintrag, mark2mark1.uhrzeit FROM mark1mark2 JOIN mark2mark1 ON mark1mark2.id=mark2mark1.id;");
/*
>>>>>>> dd9b008510b415e3c4f82302210f0dbde581ffae
          if (!$abfrage) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
<<<<<<< HEAD
       
        //echo $_SESSION["name2"];
      
        
          while($row = mysqli_fetch_assoc($abfrage)) 
          { 
              echo $row['nick'];
              echo $row['eintrag']."<br>"; 
          }
        
=======
        

        
          while($row = mysqli_fetch_assoc($abfrage)) 
          { 
           # echo $row['eintrag']."<br>"; 
           echo $row['eintrag'];
          }
          */
>>>>>>> dd9b008510b415e3c4f82302210f0dbde581ffae
echo '</div>';


?>