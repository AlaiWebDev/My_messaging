<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include './includes/head.php';
    include './includes/check_session.php';
    ?>
</head>

<body>
    <?php
    include_once './includes/header_connected.php';
    ?>
    <div class="container">
        <?php
        //$_POST['usr'] = $usrConnected;
        include './includes/database.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        $types = $_COOKIE['userTyp'];
        echo "<form class='screen-window' action='./send_message.php?typ=$types' method='post'>";
        echo "<div class='chat-window'>";
        echo "<h4>Destinataire(s)</h4>";
        echo "<div class='user-list' id='user-liste'>";
        if (isset($_GET['dest'])) {
            echo "<input type='text' readonly name='recipientsOK[]'" . " value='" . $_GET['dest'] . "' class='senders cx-active'><br>";
        } else {
            foreach ($pdo->query("SELECT * FROM registration WHERE pseudo <> '$usrConnected'") as $row) {
                echo "<input type='text' readonly name='recipients'" . " value='" . $row['pseudo'] . "' class='senders' onclick='selectDest()'><br>";
            }
        }
        $pdo = Database::disconnect();
        ?>
        </div><span id="arrow-top">&#x25B2;</span><span id="arrow-bot">&#x25BC;</span><div class="msg-window" autofocus>
        <textarea name="txtmessage" placeholder="Saisissez votre message..." autofocus></textarea>
        </div></div>
        <button class="btn">ENVOYER</button>
        </form>
        
    </div>
    <?php
    include './includes/footer.php';
    ?>
</body>

</html>