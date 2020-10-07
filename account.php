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
    include './includes/header_connected.php';
    ?>
    <div class="container">
        <?php
        include './includes/database.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        $types = $_COOKIE['userTyp'];
        echo "<form class='screen-window'>";
        echo "<div class='chat-window'>";
        foreach ($pdo->query("SELECT * FROM chat WHERE pseudo = '$usrConnected' AND checked = 0") as $row) {
            echo "<script>newMessage()</script>";
        }
            echo "<h4 class='empty'>Bienvenue " . $usrConnected . "</h4>";
            $sql = $pdo->prepare("SELECT types, pwd FROM registration WHERE pseudo = '$usrConnected'");
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $types = $result['types'];
            $pwd = $result['pwd'];
            if ($result['types'] == 0){
            echo "<a href ='./admin.php?typ=$types' class='btn-admin'>Administrer les comptes</a>";
            }
            echo "</div>";
            echo "</form>";
        $pdo = Database::disconnect();
        ?>
    </div>
    <?php
    include './includes/footer.php';
    ?>
    <script type="text/javascript" src="./assets/js/jquery-3.2.1.js"></script>
    

</body>

</html>