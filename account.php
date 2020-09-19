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
        //$_POST['usr'] = $usrConnected;
        include './function_connect.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        echo "<form class='screen-window'>";
        echo "<div class='chat-window'>";
        foreach ($pdo->query("SELECT * FROM chat WHERE pseudo = '$usrConnected' AND checked = 0") as $row) {
            echo "<script>newMessage()</script>";
        }

        if (!isset($row)) {
            echo "<h4 class='empty'>Pas de nouveau message</h4>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "</div></form>";
        }
        $pdo = Database::disconnect();
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
    <script type="text/javascript" src="./assets/js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="./assets/js/jquery.scrollTo-min.js"></script>

</body>

</html>