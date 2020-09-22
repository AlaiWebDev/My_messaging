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
        echo "<form class='screen-window'>";
        echo "<div class='chat-window'>";
        foreach ($pdo->query("SELECT * FROM chat WHERE pseudo = '$usrConnected' AND checked = 0") as $row) {
            echo "<script>newMessage()</script>";
        }
            echo "<h4 class='empty'>Bienvenue " . $usrConnected . "</h4>";
            /*$sql = "SELECT types FROM registration WHERE pseudo = '$usrConnected'";*/
            $sql = $pdo->prepare("SELECT types FROM registration WHERE pseudo = '$usrConnected'");
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if ($result['types'] == 0){
            echo "<a href ='./mail.php' class='btn-admin'>Administrer les comptes</a>";
            }
            echo "</div>";
            print_r($_GET['typ']);
            echo "</form>";
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