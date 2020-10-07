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
    <main>
        <?php
        include './includes/database.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        $types = $_COOKIE['userTyp'];
        $sth = $pdo->prepare("SELECT * FROM registration WHERE pseudo = '$usrConnected'");
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $pdo = Database::disconnect();
        echo "<h2>Modification du mot de passe de connexion</h2>";
        echo "<form method='post'>";
        echo "<div class='change-pwd'>";
        echo "<input name='pwd' type='text' placeholder='Mot de passe actuel'></input>";
        echo "<input name='pwd1' type='text' placeholder='Nouveau mot de passe'></input>";
        echo "<input name='pwd2' type='text' placeholder='Nouveau mot de passe'></input>";
        echo "<button name='confirm'>VALIDER</button>";
        
        if (isset($_POST['confirm'])) {
            if ($_POST['pwd1'] == $_POST['pwd2']) {
                $hash = $result['pwd'];
                $pwd = $_POST['pwd'];
                $newpwd = $_POST['pwd1'];
                if (password_verify($pwd, $hash)) {
                    $options = [
                        'cost' => 12,
                    ];
                    $newpwd = password_hash($newpwd, PASSWORD_BCRYPT, $options);
                    $pdo = Database::connect();
                    $sth = $pdo->prepare("UPDATE registration SET pwd = '$newpwd' WHERE pseudo = '$usrConnected'");
                    $sth->execute();
                    $pdo = Database::disconnect();
                    echo "<p>Votre mot de passe a bien été modifié</p>";
                }else{
                echo "<p>Mot de passe actuel incorrect</p>";
                }
            }else{
                echo "<p><strong>Les 2 mots de passe ne correspondant pas</strong></p>";
            }
        }
        echo "</div>";
        echo "</form>";
        ?>
        <?php
        ?>
    </main>
    <?php
    include './includes/footer.php';
    ?>
</body>

</html>