<?php
// date du jour
echo $date = date("d/m/Y");
// tableau des jours de la semaine
$joursem = array('dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam');
// extraction des jour, mois, an de la date
list($jour, $mois, $annee) = explode('/', $date);
// calcul du timestamp
$timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
// affichage du jour de la semaine
echo $joursem[date("w",$timestamp)];
?>