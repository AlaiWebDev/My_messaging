<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Messaging DWW20061</title>
</head>

<body>
    <?php
    include 'header-connected.php';
    ?>
    <div class="container">
        <?php
        $userconnected = $_GET['user'];
        $user = 'root';
        $password = '';
        try {
            $bdd = new PDO('mysql:host=localhost;
             dbname=dwwm20061_chat; charset=utf8', $user, $password);
            // Activation des erreurs PDO
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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
                    $msg = $msgTxt[0];
                    $msg = trim($msg);
                    $msg = htmlentities($msg);
                    $desti = $dest[$i];
                    $ID_msg = $userconnected . "/" . $desti;
                    $sql = "INSERT INTO chat(ID, pseudo, messages, ID_msg) VALUES ('0', '$desti', '$msg', '$ID_msg')";
                    try {
                        $req = $bdd->prepare($sql);
                        $req->execute();
                    } catch (Exception $e) {
                        echo " Erreur " . $e->getMessage();
                    }
                }
            }
        }
        ?>
    </div>
    <?php
    include 'footer.php';
    ?>

    <script src="./assets/js/main.js"></script>
</body>

</html>