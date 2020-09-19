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
        echo "<div class='screen-window'><form class='new-user' action ='./create_user.php' method='POST'>\n";
        echo "<label for='lastname'>Nom</label>\n";
        echo "<input type='text' name='lastname' class='new-input' autocomplete='off'>\n";
        echo "<label for='firstname'>Prénom</label>\n";
        echo "<input type='text' name='firstname' class='new-input' autocomplete='off'>\n";
        echo "<label for='pseudo'>Pseudo</label>\n";
        echo "<input type='text' name='pseudo' class='new-input' autocomplete='off'>\n";
        echo "<label for='email'>E-mail</label>\n";
        echo "<input type='email' name='email' class='new-input' autocomplete='off'>\n";
        echo "<label for='pwd'>Mot de passe</label>\n";
        echo "<input type='text' name='pwd' class='new-input' autocomplete='off'>\n";
        echo "<button class='btn' type='submit'>Valider</button>\n</form>\n</div>\n";
        ?>
    </div>
    <?php
    include './footer.php';
    ?>
    <script src="./assets/js/jquery-3.2.1.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>