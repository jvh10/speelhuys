<?php

include "../classes/connectie.php";
include "../classes/sets.php";
include "../classes/session.php";
// Hier word ervoor gezorgd dat de website extra beveiligd word
$session = Session::findActivesession();
if ($session == null) {
    header ("Location: beheerAdmin.php");
    exit;
}
// hier word het id opgehaald 
$id = $_GET['id'];
// de blog word hier opgehaald volgens het id, als de blog niet gevonden kan worden dan komt er een foutmelding
$set = Set::find($id);

if ($set == null) {
    echo "Geen set gevonden.";
    exit;
}
// de blog word hier gedelete
$set->delete();
// je word hier geredirect naar de admin pagina
header ("Location: beheerAdmin.php");