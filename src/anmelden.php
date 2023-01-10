<html>
    <title>
        Anmelden
    </title>
    <body>
        zurück zur: 
        <a href="../index.html">Startseite</a>
    </body>
    <form method="post" action="anmelden.php">
        <input type="text" size="20" name="user"/>
        <input type="password" size="20" name="pass"/>
        <input type="submit" value="Anmelden" name="okbutton"/>
    </form>
    <?php
        if (isset($_POST['okbutton'])) {
            echo "<h3>";
            echo $_POST['user'];
            echo "</h3>";
            echo "<h3>Wir freuen uns, Dich zu sehen!</h3>";
            echo "Dein sehr sicheres Passwort ist: ".$_POST['pass'];
        }
    ?>
</html>
