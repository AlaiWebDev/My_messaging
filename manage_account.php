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
    include_once './header_connected.php';
    ?>
    <div class="container">
        <?php
        include './function_connect.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        echo "<form class='screen-window' action='./update_account.php' method='post'>";
        echo "<h2>Mes informations</h2>";
            foreach ($pdo->query("SELECT * FROM registration WHERE pseudo = '$usrConnected'") as $row) {
                echo "<span class='acc_infos'>NOM : " . $row['nom'] . "</span><br>";
                echo "<span class='acc_infos'>PRENOM : " . $row['prenom'] . "</span><br>";
                echo "<span class='acc_infos'>EMAIL : " . $row['email'] . "</span><br>";
                echo "<p><a href ='./update_account.php' class='btn'>Modifier mon mot de passe</a></p>";
            }
        echo "</div>";
        echo "</form>";
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
</body>

</html>