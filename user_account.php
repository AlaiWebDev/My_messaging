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
    include './header-connected.php';
    ?>
    <div class="container">


        <?php
        $user = 'root';
        $password = '';
        try {
            $dbh = new PDO('mysql:host=localhost;
             dbname=dwwm20061_chat; charset=utf8', $user, $password);
            // Activation des erreurs PDO
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $usrConnected = $_COOKIE['CookieUser'];
        $sender = "";
        $sql = "SELECT * FROM chat WHERE pseudo = '$usrConnected' ORDER BY pseudo ASC";
        echo "<div class='screen-window'><h2>Gestion de votre compte</h2><div class='msg-received'>";
        foreach ($dbh->query($sql) as $row) {
            if ($sender===""){
                echo "<br><div class='msg-detail'>";
                echo "<span class='msg-exp'>" . $row['exped'] . "</span>";
                $sender = $row['exped'];
            }
            if ($row['exped'] !== $sender) {
                echo "</div><br><div class='msg-detail'>";
                echo "<span class='msg-exp'>" . $row['exped'] . "</span>";
                echo "<br>";
                echo "<span class='msg-date'>" . " a écrit le " . $row['dates'] . "</span>";
                echo "<br>";
                echo "<span class='msg-txt'>" . $row['messages'] . "</span>";
                $sender = $row['exped'];
            } else {
                echo "<span class='msg-date'>" . " a écrit le " . $row['dates'] . "</span>";
                echo "<br>";
                echo "<span class='msg-txt'>" . $row['messages'] . "</span>";
            }
            
        }
        echo "</div></div></div>";
        if (!isset($row)) {
        echo "<div>Boîte de réception vide</div>";
        echo "</div></div>";
        $dbh = null;}
        ?>
    </div>
    <?php
    include './footer.php';
    ?>

    <script src="./assets/js/main.js"></script>
</body>

</html>