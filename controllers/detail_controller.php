<?php
require "../src/connexion_bdd.php";

$disc_id = $_GET['disc_id'];

$db = connexion_base();

$requete = "SELECT disc_id, disc_picture, disc_title, artist.artist_name, artist.artist_id, disc_year, disc_label, disc_genre, disc_price FROM disc
join artist on artist.artist_id = disc.artist_id
WHERE artist.artist_id=disc.artist_id && disc_id= $disc_id";
$query = $db->prepare($requete);
$query->execute();
$disc= $query->fetchAll(PDO::FETCH_ASSOC);

if (!$query)
{
$tableauErreur = $db->errorInfo();
echo $tableauErreur[2];
die("Erreur dans la requête");
}

if ($query->rowCount() == 0)
{
die("La table est vide");
}

foreach ($disc as $disc) {
    $artist= $disc["artist_name"];
    $title = $disc["disc_title"];
    $artist_id = $disc["artist_id"];
    $picture = $disc["disc_picture"];
    $date = $disc["disc_year"];
    $label = $disc["disc_label"];
    $type = $disc["disc_genre"];
    $price= $disc["disc_price"];
}


$query->closeCursor();



