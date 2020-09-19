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
        include './function_connect.php';
        $pdo = Database::connect();
        $login = htmlentities(trim($_POST['login']));
        $pwd = $_POST['pwd'];
        $sql = "SELECT ID, pseudo, pwd FROM registration WHERE pseudo = '$login'";
        $sth = $pdo->query($sql);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $found = (empty($result['ID'])) ? false : $result['ID'];
        if ($found === false) {
            $pdo = Database::disconnect();
            header("Location: ./connect_user.php?login=0");
        } else {
            $hash = $result['pwd'];
            if (password_verify($pwd, $hash)) {
                session_start();
                setcookie("CookieUser", $login, time() + 600, "/");
                header("Location: ./account.php");
                exit();
            } else {
                header("Location: ./connect_user.php?login=0");
            }
        }
        $pdo = Database::disconnect();
        ?>
    </div>
    <?php
    include './footer.php';
    ?>

    <script src="./assets/js/main.js"></script>
</body>

</html>