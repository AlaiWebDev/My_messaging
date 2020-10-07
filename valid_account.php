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
    include './includes/header.php';
    ?>
    <div class="container">
        <?php
        include './includes/database.php';
        $pdo = Database::connect();
        $login = htmlentities(trim($_POST['login']));
        $pwd = $_POST['pwd'];
        $sql = "SELECT ID, pseudo, pwd, types FROM registration WHERE pseudo = '$login'";
        $sth = $pdo->query($sql);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $found = (empty($result['ID'])) ? false : $result['ID'];
        if ($found == false) {
            $pdo = Database::disconnect();
            header("Location: ./connect_user.php?login=0");
        } else {
            $types = $result['types'];
            $hash = $result['pwd'];
            
            if (password_verify($pwd, $hash)) {
                session_start();
                if ($types == 0) {
                    setcookie("CookieUser", $login, time() + 3000, "/");
                    setcookie("userTyp", $types, time() + 3000, "/");
                    
                }
                else{
                    setcookie("CookieUser", $login, time() + 1200, "/");
                    setcookie("userTyp", $types, time() + 3000, "/");
                }
                header("Location: ./account.php?typ=$types");
                exit();
            } else {
                header("Location: ./connect_user.php?login=0");
            }
        }
        $pdo = Database::disconnect();
        ?>
    </div>
    <?php
    include './includes/footer.php';
    ?>
    
</body>

</html>