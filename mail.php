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
    include_once './header_connected.php';
    ?>
    <div class="container">
        <?php
        //$_POST['usr'] = $usrConnected;
        include './function_connect.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        echo "<form class='screen-window' action='./send_message.php' method='post'>";
        echo "<div class='chat-window'>";
        echo "<h4>Destinataire(s)</h4>";
        echo "<div class='user-list' id='user-liste'>";
        foreach ($pdo->query("SELECT * FROM registration WHERE pseudo <> '$usrConnected'") as $row) {
            echo "<input type='text' readonly name='recipients'" . " value='" . $row['pseudo'] . "' class='senders' onclick='selectDest()'><br>";
        }
        echo "</div><span id='arrow-top'>&#x25B2;</span><span id='arrow-bot'>&#x25BC;</span><div class='msg-window' autofocus>";
        echo "<textarea name='txtmessage' placeholder='Saisissez votre message...' autofocus></textarea>";
        echo "</div></div>";
        echo "<button class='btn'>ENVOYER</button>";
        echo "</form>";
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
    
    
</body>

</html>