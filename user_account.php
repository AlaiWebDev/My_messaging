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
    include './header_connected.php';
    ?>
    <div class="container">
        <?php
        include './function_connect.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        $sender = "";
        $sql = "SELECT * FROM chat WHERE pseudo = '$usrConnected' ORDER BY pseudo ASC, exped ASC";
        echo "<div class='screen-window'><h2>Boîte de réception</h2><div class='msg-received'>";
        foreach ($pdo->query($sql) as $row) {
            if ($sender === "") {
                echo "<br><div class='msg-detail'>";
                echo "<span class='msg-exp'>" . $row['exped'] . "</span>";
                $sender = $row['exped'];
            }
            if ($row['exped'] !== $sender) {
                /*echo "<button class='btn-answer' onclick=location.href='mail.php?" . $row['exped'] . "'>Répondre</button></div><br><div class='msg-detail'>";*/
                echo "<button class='btn-answer' onclick=" . "'location.href=\"mail.php?dest=" . $sender . "\"'>Répondre</button></div><br><div class='msg-detail'>";
                echo "<span class='msg-exp'>" . $row['exped'] . "</span>";
                echo "<br>";
                echo "<span class='msg-date'>" . " a écrit le " . $row['dates'] . "</span>";
                echo "<br>";
                echo "<span class='msg-txt'>" . $row['messages'] . "</span><br>";
                $sender = $row['exped'];
            } else {
                echo "<span class='msg-date'>" . " a écrit le " . $row['dates'] . "</span>";
                echo "<br>";
                echo "<span class='msg-txt'>" . $row['messages'] . "</span><br>";
            }
        }
        if (!isset($row)) {
            echo "</div><a href ='./mail.php' class='btn-new'>Nouveau message</a>;</div>";
        } else {
            echo "<button class='btn-answer' onclick=" . "'location.href=\"mail.php?dest=" . $row['exped'] . "\"'>Répondre</button></div><br></div><a href ='./mail.php' class='btn-new'>Nouveau message</a>;</div>";
        }
        $sql = "UPDATE chat SET checked = 1 WHERE pseudo = '$usrConnected' AND checked = 0";
        $pdo->query($sql);
        $pdo = Database::disconnect();
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
    <script src="./assets/js/main.js"></script>
</body>

</html>