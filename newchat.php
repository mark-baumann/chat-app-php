<?php

error_reporting(E_ALL);

include('zugriff.php');

$user = $_GET['user'];
echo $user;
$nick = $_GET['nick'];
echo $nick;

$name = mysqli_real_escape_string($db, $_GET['user']);
$name2 = mysqli_real_escape_string($db, $_GET['nick']);






$sql = "CREATE TABLE `".$name.$name2."` (
    id INT(6) AUTO_INCREMENT,
    eintrag TEXT,
    uhrzeit Text,
    datum TEXT,
     PRIMARY KEY (id)
    );";

mysqli_query($db, $sql);


echo '<link rel="stylesheet" href="style.css">';

date_default_timezone_set('Europe/Amsterdam');
$heute = date("d.m.Y",time());

echo $nick;

echo ' 
 <form action="" method="post"> 
    <table border="0"> 
        <tr> ';
//Falls ein Nick eingegeben wurde, diesen als default in die Textbox setzen
if(!empty($_POST['nick'])){
    $akt_nick = $_POST['nick'];
}
else{
    $akt_nick='';
};
    
echo ' 
            <th>Nachricht:</th><td><input type="text" name="eintrag" value="" id="textbox">&nbsp;<input type="submit" name="eintragen" value="Senden!" id="button">&nbsp;</td> 
    </table> ';





    if(isset($_POST['eintragen'])){ 

        if(empty($_POST['eintrag'])){ 
            echo '<script>alert("Bitte Nick UND Message eingeben")</script>'; 
        }else{ 
            //Variablen definieren und mit "POST" Daten füllen (Mit htmlspecialchars filtern, Apostrophe maskieren..) 
            $eintrag = addslashes(htmlspecialchars($_POST['eintrag'])); 
            $uhrzeit = date("H:i",time());
            $datum = date("d.m.Y",time());
        
            

             $sql = "INSERT INTO `".$name.$name2."`
             (eintrag,uhrzeit, datum) VALUES 
             ('$eintrag', '$uhrzeit', '$datum');";
            mysqli_query($db, $sql); 
            } 
        
        }

        echo '<div id="chat_fenster" >';
        #echo $name.$name2;
        //Nur die Einträge von heute auslesen
    
          #$abfrage = mysqli_query($db, "SELECT mark1mark2.eintrag, mark1mark2.uhrzeit, mark2mark1.eintrag, mark2mark1.uhrzeit FROM mark1mark2 JOIN mark2mark1 ON mark1mark2.id=mark2mark1.id;");
/*
          if (!$abfrage) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        

        
          while($row = mysqli_fetch_assoc($abfrage)) 
          { 
           # echo $row['eintrag']."<br>"; 
           echo $row['eintrag'];
          }
          */
echo '</div>';


?>