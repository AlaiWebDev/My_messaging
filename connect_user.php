<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">

<head>
    <?php
    include './includes/head.php';
    ?>
</head>

<body>
    <?php
    include './includes/header.php';
    ?>
    <div class="container">
        <div class="screen-window">
            <h2>Connexion à votre compte</h2>
            <form class="inputs" action="./valid_account.php" method="POST">
                <label for="login">Login</label>
                <input type="text" id="login" name="login" class="login-input" autofocus autocomplete="off">
                <label for="login">Password</label>
                <input type="password" id="pwd" name="pwd" class="login-input" autocomplete="off">
                <button type="submit" class="btn">Connexion</button><br>
                <span>Pas encore inscrit ? Cliquez <a href="./registration.php">ici</a></span>
                <?php
                //var_dump($_GET['session']);
                //var_dump($_GET['login']);

                if ((isset($_GET['login'])) && ($_GET['login'] == 0)) {
                    echo "<span id='log-unknown'>Pseudo ou mot de passe inconnu</span></form></div>";
                } else {
                    if ((isset($_GET['session'])) && ($_GET['session'] == 0)) {
                        echo $_GET['session'];
                        echo "<span id='log-unknown'>Votre session a expiré. Merci de vous reconnecter</span></form></div>";
                    } else
                        echo "</form></div>";
                }
                ?>
        </div>
        <?php
        include './includes/footer.php';
        ?>
</body>

</html>