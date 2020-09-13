<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Messaging DWW20061</title>
</head>

<body>
    <?php
    $usrConnected = $_GET['login'];
    //if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    if (isset($_GET['login']) && ($_GET['login'] !== "")) {
        //include 'header-connected.php';
        include 'header-connected.php';
    } else {
        include 'header.php';
    }
    ?>
    <div class="container">
        <?php
        
        $_POST['usr'] = $usrConnected;
        $dsn = 'mysql:dbname=dwwm20061_chat;host=localhost';
        $user = 'root';
        $password = '';
        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        if (isset($_GET['login']) && ($_GET['login'] !== "")) {
            //$nameIndex = 0;
            echo "<form class='chat-window' action='send_message.php?user=$usrConnected' method='post'><h4>Destinataire(s)</h4><div class='user-list'>";
            foreach ($dbh->query("SELECT * FROM registration WHERE pseudo <> '$usrConnected'") as $row) {
            echo "<input type='text' readonly name='recipients'" . "value='" . $row['pseudo'] . "' class='senders' onclick='selectDest()'><br>";
            }
            echo "</div><div class='msg-window' autofocus>";
            echo"<textarea name='txtmessage' placeholder='Saisissez votre message...' autofocus></textarea>";
            echo "</div>";
            echo "<button id='btn-send'>ENVOYER</button>";
            echo "</form>";
        } else {
            $dbh = null;
            echo "<div class='chat-window'><h5>VOUS DEVEZ VOUS CONNECTER POUR UTILISER L'APPLICATION</h5></div>";
        }
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>
    <script src="./assets/js/main.js"></script>
</body>

</html>