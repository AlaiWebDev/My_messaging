<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Messaging DWWM20061</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class="container">

        

        <?php
        echo "<div class='login-window'>\n";
        echo "<h2>Connexion à votre compte</h2>\n";
        echo "<form class='inputs' action ='valid_account.php' method='POST'>\n";
        echo "<label for='login'>Login</label>\n";
        echo "<input type='text' id='login' name='login' class='login-input' autocomplete='off'>\n";
        echo "<label for='login'>Password</label>\n";
        echo "<input type='password' id='pwd' name='pwd' class='login-input' autocomplete='off'>\n";
        //echo "<a href='valid_account.php' id='btn-connect'>Connexion</a><br>";
        echo "<button type='submit' id='btn-connect'>Connexion</button><br>";
        echo "\n<span>Pas encore inscrit ? Cliquez <a href='registration.php'>ici</a></span>\n";
        if (isset($_GET['login']) && ($_GET['login'] === "NOK")){
            echo "<span id='log-unknown'>Pseudo ou mot de passe inconnu</span>\n</form>\n</div>";
        }else{
            echo"</form>\n</div>";
        }
        $dsn = 'mysql:dbname=dwwm20061_chat;host=localhost';
        $user = 'root';
        $password = '';
        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>

    <script src="./assets/js/main.js"></script>
</body>

</html>