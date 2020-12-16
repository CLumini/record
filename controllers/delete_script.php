<?php
require "../src/connexion_bdd.php";

$disc_id = $_GET['disc_id'];

$db = connexion_base();

								//suppression de l'image


$requeteImg= $db->prepare('SELECT disc_picture from disc WHERE disc_id ='.$disc_id);
$requeteImg->execute();
$fetch_img = $requeteImg->fetch();
$img= $fetch_img["disc_picture"];

//On supprime le fichier (s'il existe)

$file="C:/wamp/www/record/assets/img/".$img."";

if(file_exists($file))
{
    unlink($file);
}

$requeteImg->closeCursor();


$requete =$db->prepare("DELETE from disc WHERE disc_id= :disc_id");

$requete->execute(array(":disc_id"=>$disc_id));


$requete->closeCursor();

header("Location: ../index.php");
exit;

