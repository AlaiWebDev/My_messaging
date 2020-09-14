<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    include './head.php';
    ?>
</head>

<body>
    <?php
    include './header.php';
    ?>
    <div class="container">
        <?php
        echo "<div class='screen-window'>\n";
        echo "<h2>Connexion à votre compte</h2>\n";
        echo "<form class='inputs' action ='./valid_account.php' method='POST'>\n";
        echo "<label for='login'>Login</label>\n";
        echo "<input type='text' id='login' name='login' class='login-input' autofocus autocomplete='off'>\n";
        echo "<label for='login'>Password</label>\n";
        echo "<input type='password' id='pwd' name='pwd' class='login-input' autocomplete='off'>\n";
        echo "<button type='submit' id='btn-connect'>Connexion</button><br>";
        echo "\n<span>Pas encore inscrit ? Cliquez <a href='./registration.php'>ici</a></span>\n";
            if((isset($_GET['login'])) && ($_GET['login'] === "NOK")){
                echo "<span id='log-unknown'>Pseudo ou mot de passe inconnu</span>\n</form>\n</div>";
            }else {
                echo "</form>\n</div>";
            }
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
    <script src="./assets/js/main.js"></script>
</body>
</html>