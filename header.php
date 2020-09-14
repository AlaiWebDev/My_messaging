<?php
echo "<header>";
echo "<img id='logo' src='./assets/img/YouneedAlain.png' alt='YouNeedMe'>";
echo "<navbar>";
echo "<h1><span id='afpa'>AFPA</span>&nbsp;<span id='promo'>DWWM20061</span>&nbsp;Messaging by <span id='me'>&nbsp;Alain ORLUK</span></h1>";
$dateTimeZone = new DateTimeZone('Europe/Paris');
$dateTime = new DateTime('now', $dateTimeZone);
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
echo "<span id='date-jour'>" . strftime("%A %d %B %Y") . "</span>";//"<br>" . $dateTime -> format('H\hi') . "</span>";
echo "<a href ='./connect_user.php' id='navbar-connect'>CONNEXION</a>";       
echo "</navbar>";        
echo "</header>";   
?>

    
    
