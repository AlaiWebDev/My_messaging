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
    $userconnected = $_COOKIE['CookieUser'];
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
        $array = array_keys($_POST);
        $OKString = "OK";
        foreach ($array as $value) {
            $msgTxt = $_POST['txtmessage'];
            $dest = $_POST['recipientsOK'];
            if ($value === "recipientsOK") {
                for ($i = 0; $i < count($dest); $i++) {
                    $msg = $msgTxt;
                    $msg = trim($msg);
                    $msg = htmlentities($msg);
                    $desti = $dest[$i];
                    $sql = "INSERT INTO chat(ID, pseudo, messages, dates, exped, checked) VALUES ('0', '$desti', '$msg', '$today', '$userconnected', FALSE)";
                    try {
                        $req = $dbh->prepare($sql);
                        $req->execute();
                    } catch (Exception $e) {
                        echo " Erreur " . $e->getMessage();
                    }
                }
            }
        }
        $dbh = null;
        ?>
    </div>
    <?php
    include './footer.php';
    ?>

    <script src="./assets/js/main.js"></script>
</body>

</html>