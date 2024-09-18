<?php

include "../classes/database.php";
include "../classes/set.php";
include "../classes/sessie.php";
// Hier word ervoor gezorgd dat de website extra beveiligd word
$sessie = Sessie::vindActieveSessie();
if ($sessie == null) {
    header("beheer.php");
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
$blog->delete();
// je word hier geredirect naar de admin pagina
header("Location: beheer.php");