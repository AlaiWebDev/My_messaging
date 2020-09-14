<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include './head.php';
    include './check_session.php';
    ?>
</head>

<body>
    <?php
    include_once './header-connected.php';
    ?>
    <div class="container">
        <?php
        //$_POST['usr'] = $usrConnected;
        $dsn = 'mysql:dbname=dwwm20061_chat;host=localhost';
        $user = 'root';
        $password = '';
        try {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        $usrConnected = $_COOKIE['CookieUser'];
        echo "<form class='screen-window'>";
        echo "<div class='chat-window'>";
        foreach ($dbh->query("SELECT * FROM chat WHERE pseudo = '$usrConnected' AND checked = FALSE") as $row){
            echo "<script>newMessage()</script>";

        }
        echo "</div>";
        echo "</form>";
        if (!isset($row)) {
        echo "<div>Pas de nouveau message</div>";
        echo "</div>";
        echo "</form>";
        }
        $dbh = null;
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
    
</body>

</html>