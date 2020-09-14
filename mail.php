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
        echo "<form class='screen-window' action='./send_message.php' method='post'>";
        echo "<div class='chat-window'>";
        echo "<h4>Destinataire(s)</h4>";
        echo "<div class='user-list'>";
        foreach ($dbh->query("SELECT * FROM registration WHERE pseudo <> '$usrConnected'") as $row) {
            echo "<input type='text' readonly name='recipients'" . " value='" . $row['pseudo'] . "' class='senders' onclick='selectDest()'><br>";
        }
        echo "</div><div class='msg-window' autofocus>";
        echo "<textarea name='txtmessage' placeholder='Saisissez votre message...' autofocus></textarea>";
        echo "</div></div>";
        echo "<button id='btn-send'>ENVOYER</button>";
        echo "</form>";
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
    
</body>

</html>