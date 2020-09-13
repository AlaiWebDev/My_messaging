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
    include 'header.php';
    ?>
    <div class="container">
        <?php
        $dsn = 'mysql:dbname=dwwm20061_chat;host=localhost';
        $user = 'root';
        $password = '';
        try {
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        $login = $_POST['login'];
        $pwd = $_POST['pwd'];
        $sql = "SELECT ID, pseudo, pwd FROM registration WHERE pseudo = '$login'";
        $sth = $dbh->query($sql);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $found = (empty($result['ID'])) ? false : $result['ID'];
        
        if ($found === false) {
            $dbh = null;
            header("Location: connect_user.php?login=NOK");
            
        } else {
            $hash = $result['pwd'];
            if (password_verify($pwd, $hash)) {
                header("Location: mail.php?login=$login");
            exit();
            } else {
                header("Location: connect_user.php?login=NOK");
            }
        }
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>

    <script src="./assets/js/main.js"></script>
</body>

</html>