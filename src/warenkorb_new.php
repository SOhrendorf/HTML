

<?php

class cart{
    
    //Initialisiert die Klasse, muss in jeder Seite ausgeführt werden.
    public function initial_cart()
    {
        
        $cart = array();
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart']=$cart;
        } 

    }
    
    //Fügt einen Artikel in das Array ein
    public function insertArtikel($pID)
    {
        
        $Artikel = array($pID);
        $cart = $_SESSION['cart'];
        array_push($cart, $Artikel);
        $_SESSION['cart'] = $cart;
        
    }
    
    //Gibt Alle Artikel des Array in einer Tabelle aus.
    public function getcart()
    {
        $Array = $_SESSION['cart'];
        echo"<table width='50%'>
            <thead>
            <tr>
                <th>Produktname</th>
                <th>Preis</th>
                <th>Bild</th>
            </tr>
            </thead>";

        for($i = 0 ; $i < count($Array); $i++)
        {
            $innerArray = $Array[$i];
                
            // Create connection
            $connection = new mysqli("127.0.0.1", "q2", "geheim", "q2_andrewtateshop");
            //daten von der datenbank lesen
            $sql = "SELECT * FROM produkt WHERE ID = $innerArray[0]"; 
            $result = $connection->query($sql); //suche ausführen und speichern
            //alle Zeilen
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[preis] $row[waehrung]</td>
                        <td><img src='../$row[bild]' width='50' height='50'/></td>
                    </tr>
                    ";
            }
        }
        
        echo "</table>";
    }
    
    
    // Löscht den Waren Korb
    public function undo_cart()
    {
        $_SESSION['cart'] = array();
    }
    
    
    //Gibt einen Datensatz Zurück
    public function get_cartValue_at_Point($n)
    {
        
        $Array = $_SESSION['cart'];            
        return $Array[$n];
        
    }
    
    //Entfernt ein Artikel am Point n
    public function delete_cartValue_at_Point($point)
    {
        $Array = $_SESSION['cart'];
        unset($Array[$point]);
    }
    
    //Gibt die Anzahl der Artikel zurück
    public function get_cart_count()
    {
        return count($_SESSION['cart']);
    }
}

?>