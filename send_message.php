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
    $types = $_COOKIE['userTyp'];
    include './header_connected.php';
    ?>
    <div class="container">
        <?php
        include './function_connect.php';
        $pdo = Database::connect();
        $array = array_keys($_POST);
        $OKString = "OK";
        foreach ($array as $value) {
            $msgTxt = htmlentities(trim($_POST['txtmessage']));
            $dest = $_POST['recipientsOK'];
            if ($value == "recipientsOK") {
                for ($i = 0; $i < count($dest); $i++) {
                    $msg = $msgTxt;
                    $desti = $dest[$i];
                    $sql = "INSERT INTO chat(ID, pseudo, messages, dates, exped, checked) VALUES ('0', '$desti', '$msg', '$today', '$userconnected', FALSE)";
                    try {
                        $req = $pdo->prepare($sql);
                        $req->execute();
                    } catch (Exception $e) {
                        echo " Erreur " . $e->getMessage();
                    }
                }
            }
        }
        $pdo = Database::disconnect();
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
</body>

</html>