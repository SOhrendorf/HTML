<?php
        session_start();
        $user_id = $_SESSION['user_id'];
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

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //checken ob daten übertragen wurden
        $name = $_POST["name"]; //wenn es klappt daten übertragen 
        $preis = $_POST["preis"];
	$waehrung = $_POST["waehrung"];
        $bild = $_POST["bild"];

        do{ 
            if (empty($name) || empty($preis) || empty($waehrung) || empty($bild)){
                $errorMessage = "Alle Felde müssen ausgefüllt sein";
                break;
            } //wenn ein feld leer ist error message

            //einen kunden in die datenbank eintragen
            $sql = "INSERT INTO produkt (name, preis, waehrung, bild, fk_verkaeuferID) " .
                    "VALUES ('$name', '$preis', '$waehrung', '$bild', '$user_id')";

            $result = $connection->query($sql); //query ausführen
            
            if(!$result){ //ggf. fehler anzeigen
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }

            $succesMessage = "Produkt wurde hinzugefügt";

            header("location: /simon/src/user_interface.php"); //wenn es funktioniert hat den user zur seite zurückschicken
            exit;

        } while (false);
    }

?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <link rel="stylesheet" href="../stylesheet.css">
        <title>
          Produkt erg�nzen
        </title>
    </head>
    
    <body>
        <h1>
			Neues Produkt hinzufügen
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
                    <a href="user_interface.php">Übersicht</a>
                </th>    
            </tr>
        </table>
        </P>

        <h2>Produkt hinzufügen</h2>

        <?php
            if(!empty($errorMessage)){ //fehlermeldung wenn es schiefgeht
                echo"
                    <strong> $errorMessage </strong>
                    <button type ='button' data-bs-dismiss='alert' aria-label='Close'></button>
                ";
            }
        ?> 
        
        <form method="post"> <!--Eingabefelder -->
            <label>Name</label>
            <input type="text" placeholder="Name" name="name">
            <br>
            <label>Preis</label>
            <input type="text" placeholder="Preis" name="preis">
            <br>
	    <label>W&auml;hrung</label>
	    <input type="text" placeholder="W&auml;hrung" name="waehrung">
	    <br>
            <label>Bild</label>
            <input type="text" placeholder="Bild" name="bild">
            <br>

            <?php
                if(!empty($succesMessage)){ //meldung wenn es geklappt hat
                 echo"
                    <strong> $succesMessage </strong>
                    <button type ='button' data-bs-dismiss='alert' aria-label='Close'></button>
                 ";
                }
            ?>

            <button type="submit">Hinzufügen</button>
        </form>
    </body>
    <p>
    <img src="../bILDER_SRC/bepett.png" width ="30%" height="30%"> <br>
</html>