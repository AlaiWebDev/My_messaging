<?php
$usrConnected = $_COOKIE['CookieUser'];
$types = $_COOKIE['userTyp'];
echo "<header>";
echo "<img id='logo' src='./assets/img/YouneedAlain.png' alt='YouNeedMe'>";
echo "<navbar>";
echo "<h1><span id='afpa'>AFPA</span>&nbsp;<span id='promo'>DWWM20061</span>&nbsp;Messaging by <span id='me'>&nbsp;Alain ORLUK</span></h1>";
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
$dateTimeZone = new DateTimeZone('Europe/Paris');
$dateTime = new DateTime('now', $dateTimeZone);
$today = strftime("%A %d %B %Y ") . $dateTime->format('H\hi');
if ($types == 0) {
    echo "<span id='date-jour'>" . strftime("%A %d %B %Y") . "<br><span id='txt-uncapitalize'>Connecté en tant que Administrateur</span></span>";
    echo "<input type='hidden' id='ap'>";
} else {
    echo "<span id='date-jour'>" . strftime("%A %d %B %Y") . "<br><span id='txt-uncapitalize'>Connecté en tant que <br><span id='account-connected'>" . $usrConnected  . "</span></span></span>";
}
echo "<a href ='./manage_account.php?typ=$types' id='navbar-connect' class='cx-active'>Gérer mon compte</a>";
echo "<a href ='./user_account.php?typ=$types' id='user-account' class='cx-active'>Boîte de réception</a>";
echo "<a href ='./close_session.php' id='navbar-connect' class='cx-active'>DECONNEXION</a>";
echo "</navbar>";
echo "</header>";
