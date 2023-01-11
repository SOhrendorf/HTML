<?php
        //Stammvariabeln für DB
        $servername = "127.0.0.1";
        $username = "simon";
        $password = "himbeerkuchen";
        $db = "q2_shop";

        //Verbindung aufbauen
        $connection = new mysqli($servername, $username, $password, $db);

         // Check connection
         if ($connection->connect_error){
            die("Connection failed: " . $conn->connect_error);     
        }


    $vorname = "";
    $name = "";
    $email = "";
    $passwort = "";
    $ort = "";
    $plz = "";
    $strasse = "";
    $hausnummer = "";

    $errorMessage = "";
    $succesMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //checken ob daten übertragen wurden
        $vorname = $_POST["vorname"]; //wenn es klappt daten übertragen 
        $name = $_POST["name"];
        $email = $_POST["email"];
        $passwort = $_POST["passwort"];
        $ort = $_POST["ort"];
        $plz = $_POST["plz"];
        $strasse = $_POST["strasse"];
        $hausnummer = $_POST["hausnummer"];

        do{ 
            if (empty($vorname) || empty($name) || empty($email) || empty($passwort) || empty($ort) || empty($plz) || empty($strasse) || empty($hausnummer)){
                $errorMessage = "Alle Felde müssen ausgefüllt sein";
                break;
            } //wenn ein feld leer ist error message

            //einen kunden in die datenbank eintragen
            $sql = "INSERT INTO benutzer (vorname, name, email, passwort, ort, plz, strasse, hausnummer) " .
                    "VALUES ('$vorname', '$name', '$email', '$passwort', '$ort', '$plz', '$strasse', '$hausnummer')";

            $result = $connection->query($sql); //query ausführen
            
            if(!$result){ //ggf. fehler anzeigen
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }

            $vorname = "";
            $name = "";
            $email = "";
            $passwort = "";
            $ort = "";
            $plz = "";
            $strasse = "";
            $hausnummer = "";

            $succesMessage = "Kunde wurde hinzugefügt";

            header("location: /tools/admin.php"); //wenn es funktioniert hat den user zur seite zurückschicken
            exit;

        } while (false);
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
        </P>
        zurück zur:
        <a href="../index.php">Startseite</a>

        <h1>Kunden Anlegen</h1>

        <?php
            if(!empty($errorMessage)){ //fehlermeldung wenn es schiefgeht
                echo"
                    <strong> $errorMessage </strong>
                    <button type ='button' data-bs-dismiss='alert' aria-label='Close'></button>
                ";
            }
        ?> 
        
        <form method="post"> <!--Eingabefelder -->
            <label>Vorname</label>
            <input type="text" name="vorname" value="<?php echo $vorname; ?>">
            <br>
            <label>Nachname</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <br>
            <label>E-Mail</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <br>
            <label>Passwort</label>
            <input type="text" name="passwort" value="<?php echo $passwort; ?>">
            <br>
            <label>Ort</label>
            <input type="text" name="ort" value="<?php echo $ort; ?>">
            <br>
            <label>PLZ</label>
            <input type="text" name="plz" value="<?php echo $plz; ?>">
            <br>
            <label>Straße</label>
            <input type="text" name="strasse" value="<?php echo $strasse; ?>">
            <br>
            <label>Straßennummer</label>
            <input type="text" name="hausnummer" value="<?php echo $hausnummer; ?>">
            <br>

            <?php
                if(!empty($succesMessage)){ //meldung wenn es geklappt hat
                 echo"
                    <strong> $succesMessage </strong>
                    <button type ='button' data-bs-dismiss='alert' aria-label='Close'></button>
                 ";
                }
            ?>
            

            <button type="submit">Abschicken</button>
        </form>
    </body>
    <p>
    <!---<img src="../bILDER_SRC/bepett.png" width ="30%" height="30%"> <br>--->
    
    <h1>Bei uns sind sie sicher</h1>
</html>
