<?php
    session_start();
    define('SECURE', true);
        //Stammvariabeln für DB
        $servername = "127.0.0.1";
        $username = "q2";
        $password = "geheim";
        $db = "q2_andrewtateshop";

        //Verbindung aufbauen
        $connection = new mysqli($servername, $username, $password, $db);

         // Check connection
         if ($connection->connect_error){
            die("Connection failed: " . $conn->connect_error);     
        }

    $errorMessage = "";
    $succesMessage = "";

    //Abmelden
    if(isset($_GET['logout']))
    {
        if(isset($_SESSION['user_id']))
        {
            $_SESSION = array();
            session_destroy();
        }
    
        header('location: anmelden.php');
        exit();
    }

    //Anmelden
   if(isset($_POST['send'])){
    $user_email = trim(htmlspecialchars($_POST['user_email']));
    $peper = "gretz4350th78T/e05";
    $user_password = $_POST['user_password'].$peper;

    $query = $connection->query("SELECT `passwort`,`ID` FROM `benutzer` WHERE `email` = '".$_POST['user_email']."'");
    $dbpass = $query->fetch_assoc();
 
        if(password_verify($user_password, $dbpass['passwort'])){//gibt es genau einen Eintarg in der DB mit den Daten
            $_SESSION['user_id'] =  $dbpass['ID']; //ID in Coockies speichern
            header('location: user_interface.php'); //weiter in Internen Bereich
            exit();
        }
        else{
            $error = 'Ihre Anmeldedaten sind nicht korrekt. Bitte wiederholen Sie Ihre Eingabe.';
        }
   }else{
       $error = NULL;
       $user_email = NULL;
   }

?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <link rel="stylesheet" href="../stylesheet.css">
        <title>
          Anmelden
        </title>
    </head>
    
    <body>
        <img src="../bILDER_SRC/walkurelogo.png" onclick="window.location ='../index.php'" alt="logo">
        <h1>
			Anmeldung
		</h1>
        <table>
            <tr>
                <th id="tb1">
                        <a href="../index.php">Startseite</a>
                </th>
                <th id="tb1">
                        <a href="impressum.html">Impressum</a>
                </th>
                <th id="tb1">
                    <a href="anmelden.php">Anmelden</a>
                </th>    
            </tr>
        </table>
        </P>

        <?php
            if(!empty($errorMessage)){ //fehlermeldung wenn es schiefgeht
                echo"
                    <strong> $errorMessage </strong>
                    <button type ='button' data-bs-dismiss='alert' aria-label='Close'></button>
                ";
            }

        echo $error;
        ?> 
        
        <h2>Kunden anmelden</h2>
        <form action="anmelden.php" method="post">
            <label>Email</label>
            <input type="text" placeholder="Email" name="user_email">
            <br>
            <label>Passwort</label>
            <input type="password" placeholder="Passwort" name="user_password">
            <br>

            <?php
                if(!empty($succesMessage)){ //meldung wenn es geklappt hat
                 echo"
                    <strong> $succesMessage </strong>
                    <button type ='button' data-bs-dismiss='alert' aria-label='Close'></button>
                 ";
                }
            ?>

            <input type="submit" name="send" value="Anmelden"></button><br>
        </form>

        <p><a href= "regestrieren.php"> Noch kein Benuter? Hier neu regestrieren</a></p>

    </body>
    <p>
    <img src="../bILDER_SRC/bepett.png" width ="30%" height="30%"> <br>
    
    <h1>Bei uns sind sie sicher</h1>
</html>


