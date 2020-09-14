<!DOCTYPE html>
<html lang="fr">

<head>
<?php
    include './head.php';
    ?>
</head>

<body>
    <div id="oModal" class="oModal">
        <div class="header">
            <div>
                <a href="#fermer" title="Fermer la fenêtre" id="close">X</a>
                <h2>Messaging DWW20061</h2>
            </div>
            <section>
                <p id="message"></p>
            </section>
            <div class="cf">
            </div>
        </div>
    </div>
    <a href="#oModal" id="linkModal">Ouvrir le popup</a>
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
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $firstname = trim($firstname);
        $firstname = ucfirst(trim($firstname));
        $firstname = htmlentities($firstname);
        $lastname = trim($lastname);
        $lastname = strtoupper($lastname);
        $lastname = htmlentities($lastname);
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $options = [
            'cost' => 12,
        ];
        $pwd = $_POST['pwd'];
        $pwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        $sql = ("SELECT * FROM registration WHERE  email = '$email'");
        $sth = $dbh->query($sql);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $found = (empty($result['ID'])) ? false : $result['ID'];
        if ($found === false) {
            $sql = ("SELECT * FROM registration WHERE  pseudo = '$pseudo'");
            $sth = $dbh->query($sql);
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            $found = (empty($result['ID'])) ? false : $result['ID'];
            if ($found === false) {
                $sql = "INSERT INTO registration(ID, nom, prenom, pseudo, email, pwd, types) VALUES ('0', '$lastname', '$firstname', '$pseudo', '$email', '$pwd', '1')";
                $sth = $dbh->query($sql);
                echo "<script>document.getElementById('message').innerText='Félicitations ! Votre compte a été créé. Vous pouvez vous connecter.'</script>";
                echo "<script>document.getElementById('linkModal').click();</script>";
                $dbh = null;
            } else {
                echo "<script>document.getElementById('message').innerText='Ce pseudo est déjà pris.'</script>";
                echo "<script>document.getElementById('close').href='./registration.php';</script>";
                echo "<script>document.getElementById('linkModal').click();</script>";
                $dbh = null;
            }
        } else {
            echo "<script>document.getElementById('message').innerText='Cette adresse email est déjà associée à un compte. Choisissez-en une autre ou connectez-vous au compte concerné.'</script>";
                echo "<script>document.getElementById('close').href='./registration.php';</script>";
                echo "<script>document.getElementById('linkModal').click();</script>";
            $dbh = null;
        }
        ?>

    </div>

    <?php
    include './footer.php';
    ?>
    <script src="./assets/js/jquery-3.2.1.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>