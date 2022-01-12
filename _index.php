<?php

include ('zugriff.php');

echo '<link rel="stylesheet" href="style.css">';

date_default_timezone_set('Europe/Amsterdam');
$heute = date("d.m.Y",time());

echo 'Marks Group Chat '.$heute;

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
    
echo '<th>Nickname:</th><td><input type="text" name="nick" value="'.$akt_nick.'" id="textbox1"></td></tr>                 
        <tr> 
            <th>Nachricht:</th><td><input type="text" name="eintrag" value="" id="textbox">&nbsp;<input type="submit" name="eintragen" value="Senden!" id="button">&nbsp;</td> 
        </tr> 
    </table> ';





    if(isset($_POST['eintragen'])){ 

        if(empty($_POST['nick']) or empty($_POST['eintrag'])){ 
            echo '<script>alert("Bitte Nick UND Message eingeben")</script>'; 
        }else{ 
            //Variablen definieren und mit "POST" Daten füllen (Mit htmlspecialchars filtern, Apostrophe maskieren..) 
            $nick = addslashes(htmlspecialchars($_POST['nick'])); 
            $eintrag = addslashes(htmlspecialchars($_POST['eintrag'])); 
            $uhrzeit = date("H:i",time());
            $datum = date("d.m.Y",time());
        
            

             $sql = "INSERT INTO tb_chat
             (nick,eintrag,uhrzeit, datum) VALUES 
             ('$nick', '$eintrag', '$uhrzeit', '$datum');";


        //Nick + Eintrag + datum+uhrzeit in die Datenbank schreiben 
            mysqli_query($db, $sql); 
            } 
        
        }


//alle Teilnehmer von heute ausgeben
echo "<form action = '' metod='post'>";

echo '<div id="teilnehmer_fenster" >';
        echo '<h2>Heute im Chat:</h2>';
        //Nur die Teilnehmer von heute auslesen
          $abfrage = mysqli_query($db,"SELECT DISTINCT nick FROM tb_chat WHERE datum LIKE '$heute'"); 
          while($row = mysqli_fetch_array($abfrage,MYSQLI_ASSOC)) 
          { 
            $user = $row['nick'];
            echo "<button type='submit' name='$user' value='$user'>$user</button>"; 


            if (isset($_POST[$user])) {

                header('Location: ./newchat.php');
            
            }

            

            



          }
echo '</div>';
echo "</form>";





        echo '<div id="chat_fenster" >';
        
        //Nur die Einträge von heute auslesen
          $abfrage = mysqli_query($db,"SELECT * FROM tb_chat WHERE datum LIKE '$heute';"); 
          while($row = mysqli_fetch_array($abfrage,MYSQLI_ASSOC)) 
          { 
            echo '<div id ="nick_und_message"><span style="color:red">'.$row['nick'].':</span><span style ="color:black">'.$row['eintrag'].'</span></div>
            <div id = "uhrzeit"><span style ="color:green">'.$row['uhrzeit'].'</span></div><br>'; 
          }
echo '</div>';



?>