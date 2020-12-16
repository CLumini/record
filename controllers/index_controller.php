<?php
require "src/connexion_bdd.php";

$db = connexion_base();

// Pagination

if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}


$requete = "SELECT COUNT(disc_id) AS nb_disc FROM disc";

$query = $db->prepare($requete);
$query->execute();
$result = $query->fetch();

$nb_disc = (int) $result['nb_disc'];

$perPage = 6;
$pages = ceil($nb_disc / $perPage);

$first = ($currentPage * $perPage) - $perPage;

//requete liste

$requete = "SELECT disc_id, disc_picture, disc_title, artist.artist_name, disc_year, disc_label, disc_genre FROM disc 
            join artist on artist.artist_id = disc.artist_id 
            WHERE artist.artist_id=disc.artist_id order by disc_year DESC LIMIT :first, :perPage";
$query = $db->prepare($requete);
$query->bindValue(":first", $first, PDO::PARAM_INT);
$query->bindValue(":perPage", $perPage, PDO::PARAM_INT);

$query->execute();

$disc=$query->fetchAll(PDO::FETCH_ASSOC);

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


$query->closeCursor();
