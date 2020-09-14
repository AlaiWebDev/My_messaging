<?php
    if (isset($_COOKIE['CookieUser'])){
        setcookie("CookieUser", '', time() - 600, "/");
        header("Location: ./connect_user.php");
    }else header("Location: ./connect_user.php");
    
?>