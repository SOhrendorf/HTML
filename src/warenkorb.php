<!doctype html>
<html lang="de">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../stylesheet.css">
        <title>
            Seepferdchen Shop
        </title>
    </head>

    <body>
        <img src="../bILDER_SRC/walkurelogo.png" alt="logo">
        <table>
            <tr>
                <th id="tb1">
                        <a href="../index.php">Startseite</a>
                </th>
                <th id="tb1">
                        <a href="impressum.html">Impressum</a>
                </th>
                <th id="tb1">
                    <a href="warenkorb.php?id=-1">Warekorb leeren</a>
                </th>    
            </tr>
        </table>
        <h2>Ihr Warenkorb:</h2>
        <?php
            $pID = $_GET['id'];

            //Klasse Warenkorb laden
            // Die Session Starten
            session_start();

            // Die Klasse Includieren
            include_once 'warenkorb_new.php';

            // Eine Neue Instanz der Klasse cart erstellen
            $cart = new cart();

            // Prüfen ob der Warenkorb besteht
            $cart->initial_cart();

            //$cart->undo_cart();
            if($pID != NULL){
                if($pID == -1){
                    $cart->undo_cart();
                    header("location: /simon/src/warenkorb.php");
                }else{
                $cart->insertArtikel($pID);
                header("location: /simon/src/warenkorb.php");
                }
            }
            $cart->getcart();

        ?>
        <button type="button" onclick="seepferd()">Kaufen</button>
    </body>
</html>
<script>
    function seepferd(){
        window.location = "warenkorb.php?id=-1";
        window.location = "gekauft.php";
        
    }
</script>