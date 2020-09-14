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
    include './header.php';
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
            header("Location: ./connect_user.php?login=NOK");
        } else {
            $hash = $result['pwd'];
            if (password_verify($pwd, $hash)) {
                //ob_start();
                //setcookie("CookieUser", $cookie_user, $cookie_value, time() + 600, "/");
                //ob_end_flush();
                setcookie("CookieUser", $login, time() + 600, "/");
                header("Location: ./account.php");
                exit();
            } else {
                header("Location: ./connect_user.php");
            }
        }
        $dbh = null;
        ?>
    </div>
    <?php
    include './footer.php';
    ?>

    <script src="./assets/js/main.js"></script>
</body>

</html>