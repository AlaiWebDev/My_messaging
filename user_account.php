<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Messaging DWW20061</title>
</head>

<body>
    <?php
    include 'header-connected.php';
    ?>
    <div class="container">
        <h2>Gestion de votre compte</h2>
        <?php
        foreach ($dbh->query("SELECT * FROM chat WHERE pseudo <> '$usrConnected'") as $row) {
            echo "<div class='userMsgList'></div><br>";
            }
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>

    <script src="./assets/js/main.js"></script>
</body>

</html>