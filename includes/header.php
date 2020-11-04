<header>
<img id="logo" src="./assets/img/YouneedAlain.png" alt="YouNeedMe">
<navbar>
<h1><span id="afpa">AFPA</span>&nbsp;<span id="promo">DWWM20061</span>&nbsp;Messaging by <span id="me">&nbsp;Alain ORLUK</span></h1>
<?php
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
$dateTimeZone = new DateTimeZone('Europe/Paris');
$dateTime = new DateTime('now', $dateTimeZone);
$today = strftime("%A %d %B %Y ") . $dateTime->format('H\hi');
echo "<span id='date-jour'>" . strftime("%A %d %B %Y") . "</span>";
?>
<a href ="./connect_user.php" id="navbar-connect">CONNEXION</a>       
</navbar>      
</header> 


    
    
