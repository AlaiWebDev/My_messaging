<?php
$usrConnected = $_COOKIE['CookieUser'];
echo "<header>";
echo "<img id='logo' src='./assets/img/YouneedAlain.png' alt='YouNeedMe'>";
echo "<navbar>";
echo "<h1><span id='afpa'>AFPA</span>&nbsp;<span id='promo'>DWWM20061</span>&nbsp;Messaging by <span id='me'>&nbsp;Alain ORLUK</span></h1>";
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
$dateTimeZone = new DateTimeZone('Europe/Paris');
$dateTime = new DateTime('now', $dateTimeZone);
$today = strftime("%A %d %B %Y ") . $dateTime -> format('H\hi');
echo "<span id='date-jour'>" . strftime("%A %d %B %Y") . "<br>Connecté en tant que<span id='account-connected'> " . $usrConnected . "</span></span>";//"<br>" . $dateTime -> format('H\hi') . "</span>";
//echo "<span >Connecté en tant que " . $usrConnected . "</span>";//"<br>" . $dateTime -> format('H\hi') . "</span>";
echo "<a href ='./close_session.php' id='navbar-connect' class='cx-active'>DECONNEXION</a>";       
echo "</navbar>"; 

echo "<a href ='./user_account.php' id='user-account' class='cx-active'>Mon compte</a>";         
//echo "<a href ='user_account.php' id='user-account' class='cx-active'>Mon compte</a>";         
echo "</header>";

