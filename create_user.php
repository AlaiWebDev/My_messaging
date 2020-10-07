<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include './includes/head.php';
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
    include './includes/header.php';
    ?>
    <div class="container">
        <?php
        include './includes/database.php';
        $pdo = Database::connect();
        $lastname = htmlentities(trim($_POST['lastname']));
        $firstname = htmlentities(trim($_POST['firstname']));
        $firstname = ucfirst(trim($firstname));
        $lastname = strtoupper($lastname);
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $options = [
            'cost' => 12,
        ];
        $pwd = $_POST['pwd'];
        $pwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        $sql = ("SELECT * FROM registration WHERE  email = '$email'");
        $sth = $pdo->query($sql);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $found = (empty($result['ID'])) ? false : $result['ID'];
        if ($found == false) {
            $sql = ("SELECT * FROM registration WHERE  pseudo = '$pseudo'");
            $sth = $pdo->query($sql);
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            $found = (empty($result['ID'])) ? false : $result['ID'];
            if ($found == false) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sql = "INSERT INTO registration(ID, nom, prenom, pseudo, email, pwd, types, register_date) VALUES ('0', '$lastname', '$firstname', '$pseudo', '$email', '$pwd', '1', '$today')";
                $sth = $pdo->query($sql);
                echo "<script>document.getElementById('message').innerText='Félicitations ! Votre compte a été créé. Vous pouvez vous connecter.'</script>";
                echo "<script>document.getElementById('linkModal').click();</script>";
                $pdo = Database::disconnect();
            }else {echo "<script>document.getElementById('message').innerText='Votre email n\'est pas valide'</script>";
                echo "<script>document.getElementById('close').href='./registration.php';</script>";
                echo "<script>document.getElementById('linkModal').click();</script>";
                $pdo = Database::disconnect();}
            } else {
                echo "<script>document.getElementById('message').innerText='Ce pseudo est déjà pris.'</script>";
                echo "<script>document.getElementById('close').href='./registration.php';</script>";
                echo "<script>document.getElementById('linkModal').click();</script>";
                $pdo = Database::disconnect();
            }
        } else {
            echo "<script>document.getElementById('message').innerText='Cette adresse email est déjà associée à un compte. Choisissez-en une autre ou connectez-vous au compte concerné.'</script>";
            echo "<script>document.getElementById('close').href='./registration.php';</script>";
            echo "<script>document.getElementById('linkModal').click();</script>";
            $pdo = Database::disconnect();
        }
        ?>
    </div>
    <?php
    include './includes/footer.php';
    ?>
    

</body>

</html>