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
        <img src="../bILDER_SRC/walkurelogo.png" onclick="window.location ='../index.php'" alt="logo">
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

            session_start();
            $SD = $_SESSION['SD'];
            $pID = $_GET['id'];
            
            $SDr = random_int(1,10);
            $SD += $SDr;
            $_SESSION['SD'] = $SD;

            //Klasse Warenkorb laden

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
                    $_SESSION['SD'] = 0;
                    header("location: /simon/src/warenkorb.php");
                }else{
                    $cart->insertArtikel($pID);
                    header("location: /simon/src/warenkorb.php");
                }
            }
            $cart->getcart();
            if($cart->get_cart_count() != 0){
            echo "Sie kaufen für $SD SD ein";
            }
        ?>
        <br>
        <button type="button" onclick="seepferd()">Kaufen</button>


    </body>
</html>
<script>

    function seepferd(){
        window.location = "warenkorb.php?id=-1";
        window.location = "gekauft.php";
        
    }
</script>