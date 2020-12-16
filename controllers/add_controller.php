<?php
require "../src/connexion_bdd.php";

$db = connexion_base();

$requete= "Select artist_name, artist_id From artist";
$query = $db->prepare($requete);
$query->execute();
$artist= $query->fetchAll(PDO::FETCH_ASSOC);


$query->closeCursor();
