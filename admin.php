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
    include_once './includes/header_connected.php';
    ?>
    <main>

        <?php

        include './includes/database.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        $types = $_COOKIE['userTyp'];
        echo "<h2>Gestion des comptes utilisateurs</h2>";
        echo "<div class='manage-acc'>";
        echo "<form class='admin-users' method='post'>";
        echo "<div class=admin-user-list>";
        echo "<label for='usr-select'>Sélection utilisateur</label>";
        echo "<select name='usr' id='usr-select' onfocus='this.size=10;' onblur='this.size=0;' 
        onchange='this.size=1; this.blur();'>";
        echo "<option id='choice' value=''>Sélection utilisateur </option>";
        $index = 0;
        foreach ($pdo->query("SELECT * FROM registration WHERE pseudo <> '$usrConnected' ORDER BY pseudo ASC") as $row) {
            echo "<option value='" . $row['pseudo'] . "'>" . $row['pseudo'] . "</option>";
            $userArray[$index] = ['pseudo' => [$row['pseudo'], 'nom' => $row['nom'], 'prenom' => $row['prenom'], 'email' => $row['email']]];
            $index++;
        }
        Database::disconnect();
        echo "</select>";
        echo "</div>";
        echo "<input name='submit' class='btnShowUserItems' type='submit' value='Afficher détails'></input>";
        $user = "";
        ?>
        <?php
        if (isset($_POST['usr']) && isset($_POST['submit'])) {
            $pdo = Database::connect();
            $user = $_POST['usr'];
            $sth = $pdo->prepare("SELECT * FROM registration WHERE pseudo = '$user'");
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            Database::disconnect();
            echo "<form method='post'>";
            echo "<div class='admin-users-datas' id='users-datas'>";
            echo "<span>PSEUDO : " . $result['pseudo'] . "</span>";
            echo "<input name='pseudo' type='text' value='" . $result['pseudo'] . "'>";
            echo "<span>NOM : " . $result['nom'] . "</span>";
            echo "<input name='nom' type='text' value='" . $result['nom'] . "'>";
            echo "<span>PRENOM : " . $result['prenom'] . "</span>";
            echo "<input name='prenom'  type='text' value='" . $result['prenom'] . "'>";
            echo "<span>EMAIL: " . $result['email'] . "</span>";
            echo "<input name='email'  type='text' value='" . $result['email'] . "'>";
            echo "<input type='submit' name='update' class='btnShowUserItems' value='Mettre à jour'></input>";
            echo "<button name='delete' onclick='return showForm()' class='btnShowUserItems'>Supprimer le compte</button>";
        }

        if (isset($_POST['update'])) {
            $user = $_POST['pseudo'];
            $nom = htmlentities(trim($_POST['nom']));
            $prenom = htmlentities(trim($_POST['prenom']));
            $email = $_POST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $pdo = Database::connect();
                $sth = $pdo->prepare("UPDATE registration
                SET nom = '$nom', prenom = '$prenom', email = '$email' WHERE pseudo = '$user'");
                $sth->execute();
                $pdo = Database::disconnect();
                $pdo = Database::connect();
                $sth = $pdo->prepare("SELECT * FROM registration WHERE pseudo = '$user'");
                $sth->execute();
                $result = $sth->fetch(PDO::FETCH_ASSOC);
                Database::disconnect();
                echo "<div class='admin-users-datas'>";
                echo "<span>NOM : " . $result['pseudo'] . "</span>";
                echo "<input name='pseudo' readonly type='text' value='" . $result['pseudo'] . "'>";
                echo "<span>NOM : " . $result['nom'] . "</span>";
                echo "<input name='nom' type='text' value='" . $result['nom'] . "'>";
                echo "<span>PRENOM : " . $result['prenom'] . "</span>";
                echo "<input name='prenom'  type='text' value='" . $result['prenom'] . "'>";
                echo "<span>EMAIL: " . $result['email'] . "</span>";
                echo "<input name='email'  type='text' value='" . $result['email'] . "'>";
                echo "<input type='submit' name='update' class='btnShowUserItems' value='Mettre à jour'></input>";
                echo "<button onclick='return showForm()' name='delete' class='btnShowUserItems'>Supprimer le compte</button>";
                $successMessage = "Les modifications ont été enregistrées";
            } else $errorMessage = "Votre email n'est pas valide";
        }
        echo "<div class='checkpwd none' id='pwdconfirm'>";
        echo "<h4>Entrez votre mot de passe ADMINISTRATEUR pour confirmer la suppression</h4>";
        echo "<input name='adminpwd' type='password'></input><br>";
        echo "<button name='confirm' class='btn' type='submit'>VALIDER</button>";
        echo "</form>";
        if (isset($_POST['confirm'])){
            echo "<script>alert('test,$usrConnected')</script>";
            // echo "<script>alert('test,$usrConnected,$mdpadmin,$mdpsaisie')</script>";
            $pdo = Database::connect();
                $sth = $pdo->prepare("SELECT * FROM registration WHERE pseudo = '$usrConnected'");
                $sth->execute();
                $result = $sth->fetch(PDO::FETCH_ASSOC);
                $mdpsaisie=$_POST['adminpwd'];
                $mdpadmin = $result['pwd'];
                echo "<script>alert('test,$usrConnected,$mdpadmin,$mdpsaisie')</script>";
                Database::disconnect();
                print_r(password_verify($_POST['adminpwd'], $result['pwd']));
            if (password_verify($mdpsaisie, $mdpadmin)) {
            $pdo = Database::connect();
                $sth = $pdo->prepare("DELETE FROM registration WHERE pseudo = '$user'");
                $sth->execute();
                $pdo = Database::disconnect();
                // header("location:./admin.PHP");
            }else{
            }
        }else{
            
        }
        
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<script>document.querySelector('.admin-users-datas').style.display='flex';</script>";
        ?>
        <?php
        ?>
    
    </main>
    <?php
    include './includes/footer.php';
    ?>
</body>

</html>