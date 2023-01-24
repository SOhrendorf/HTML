<!doctype html>
<html lang="de">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stylesheet.css">
        <title>
            Seepferdchen Shop
        </title>
    </head>

    <body>
        <img src="bILDER_SRC/walkurelogo.png" alt="logo">
        <table>
            <tr>
                <th id="tb1">
                        <a href="index.php">Startseite</a>
                </th>
                <th id="tb1">
                        <a href="src/impressum.html">Impressum</a>
                </th>
                <th id="tb1">
                    <a href="src/warenkorb.php">Warenkorb</a>
                </th>
                <?php
                    session_start();
                    $user_id = $_SESSION['user_id'];
                    if(!isset($user_id)){
                        echo "<th id='tb1'><a href='src/anmelden.php'>Anmelden</a></th>";
                    }else{
                        echo "<th id='tb1'><a href='src/user_interface.php'>User Interface</a></th>";
                    };
                ?>    
            </tr>
        </table>
            
        <br>
        <table width='50%'>
            <thead>
                <tr>
                    <th>Produktname</th>
                    <th>Preis</th>
                    <th>Bild</th>
                    <th>Kaufen</th>
                </tr>
            </thead>
        </table>
        <tbody>
        <?php 
        
            //gucken ob die datenbank erreichbar ist
            $servername = "127.0.0.1"; //ipadresse
            $username = "q2"; //username
            $password = "geheim"; //password
            $db = "q2_andrewtateshop"; //datenbankname

            // Create connection
            $connection = new mysqli($servername, $username, $password, $db);

            // Check connection
            if ($connection->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }

            //daten von der datenbank lesen
            $sql = "SELECT * FROM produkt"; 
            $result = $connection->query($sql); //suche ausführen und speichern

            //suche überprüfen
            if (!$result) {
                die("Invalid query: " . $connection->error);
            }
            //daten von der datenbank lesen und ausgeben
            while($row = $result->fetch_assoc()){
                echo "
                <table width='54%'>
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[preis] $row[waehrung]</td>
                        <td><img src='$row[bild]' width='50' height='50'/></td>
                        <td> <a href='src/warenkorb.php?id=$row[ID]'> Kaufen</a></td>
                    </tr>
                </table>
                ";
            }

        ?>
        </tbody>
    </body>
</html>