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
    <main>
        <?php
        include './function_connect.php';
        $pdo = Database::connect();
        $usrConnected = $_COOKIE['CookieUser'];
        $types = $_COOKIE['userTyp'];
        echo "<h2>Gestion des comptes utilisateurs</h2>";
        echo "<form class='admin-users' method='post'>";
        echo "<div class=admin-user-list>";
        echo "<label for='usr-select'>Sélection utilisateur</label>";
        echo "<select name='usr' id='usr-select' onfocus='this.size=10;' onblur='this.size=0;' 
        onchange='this.size=1; this.blur();'>";
        echo "<option id='choice' value=''>Sélection utilisateur </option>";
        $index = 0;
        foreach ($pdo->query("SELECT * FROM registration WHERE pseudo <> '$usrConnected' ORDER BY pseudo ASC") as $row) {
            echo "<option value='" . $row['pseudo'] . "'>" . $row['pseudo'] . "</option>";
            //$usersArray[$index] = array($row['pseudo'] => array($row['nom'],$row['prenom'],$row['email']));
            $userArray[$index] = ['pseudo' => [$row['pseudo'], 'nom' => $row['nom'], 'prenom' => $row['prenom'], 'email' => $row['email']]];
            $index++;
        }
        echo "</select>";
        echo "</div>";
        echo "<button class='btnShowUserItems' type='submit'>Afficher détails</button>";
        /*for ($i = 0; $i < count($userArray); $i++) {
            //print_r($userArray[$i]);
            echo "<br>";
            print_r($userArray[$i]['pseudo']);
        }*/
        $user = "";
        ?>
        <?php
        print_r($user);
        if (isset($_POST['usr'])){
            $user=$_POST['usr'];
            $sth = $pdo->prepare("SELECT * FROM registration WHERE pseudo = '$user'");
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            echo "<div class='admin-users-datas' id='users-datas'>";
            echo "<span>NOM : " . $result['nom'] . "</span>";
            echo "<input name='nom' type='text' value='" . $result['nom'] . "'>";
            echo "<span>PRENOM : " . $result['prenom'] . "</span>";
            echo "<input name='prenom'  type='text' value='" . $result['prenom'] . "'>";
            echo "<span>EMAIL: " . $result['email'] . "</span>";
            echo "<input name='email'  type='text' value='" . $result['email'] . "'>";
            echo "<span class='btnShowUserItems' onclick'='./update_account.php''>Mettre à jour</span>";
            echo "<span class='btnShowUserItems' onclick='f=window.open('index.php','fenetre','width=800, height=600, top=30, left=50')'>Supprimer le compte</span>";
            function popup(){
                echo"";
            }
            echo "</div>";
            echo "</form>";
            echo "<script>document.querySelector('.admin-users-datas').style.display='flex';</script>";
        }
        ?>
    </main>
    <?php
    include './footer.php';
    ?>
</body>

</html>