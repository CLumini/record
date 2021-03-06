<?php
require "../src/connexion_bdd.php";
$db=connexion_base();




function valid_donnees($donnees)//fonction qui permet d'éviter toute injection de code (extraction de balises ou de slashes)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

$title = valid_donnees($_POST["title"]);
$label = valid_donnees($_POST["label"]);
$date = valid_donnees($_POST["date"]);
$type = valid_donnees($_POST["type"]);
$price = valid_donnees($_POST["price"]);
$artist_id= valid_donnees($_POST["artist"]);

if(!empty($title)
    && !empty($label)
    && !empty($date)
    && !empty($type)
    && !empty($price))
{

// récupération de l'extension du fichier

$extension = substr(strrchr($_FILES["fichier"]["name"],"."),1);

$picture= $title.".".$extension;


/*						Upload du fichier + Erreurs	et Sécurité*/


if($_FILES["fichier"]["error"]>0)
{
    echo"Erreur, votre, fichier n'a pas été importé";
}

$aMimeTypes= array("image/gif", "image/jpg", "image/jpeg", "image/pjpeg", "image/png","image/x-png", "image/tiff");
$finfo= finfo_open(FILEINFO_MIME_TYPE);
$mimetype= finfo_file($finfo, $_FILES["fichier"]["tmp_name"]);

finfo_close($finfo);

if(in_array($mimetype, $aMimeTypes))
{
    move_uploaded_file($_FILES["fichier"]["tmp_name"],"C:/wamp/www/record/assets/img/".$picture);
}
else
{
    echo"type de fichier ,non autorisé";
}





$req_ajout="INSERT INTO disc (disc_title, disc_label, disc_year, disc_price, disc_genre, disc_picture, artist_id ) VALUES (:disc_title, :disc_label, :disc_year, :disc_price, :disc_genre, :disc_picture, :artist_id)" ;
$requete = $db->prepare($req_ajout);

$requete->execute(array(
    "disc_title"=>$title,
    "disc_label"=>$label,
    "disc_year"=>$date,
    "disc_price"=>$price,
    "disc_genre"=>$type,
    "disc_picture"=>$picture,
    "artist_id"=>$artist_id
));

$requete->closeCursor();



header("Location: ../index.php?form=formOk");
exit;
}
else {
    if ( !preg_match("\d{4}$", $date)
        || !preg_match("\d$", $price)) {
        header("Location: ../views/form_add.php?form=formErreurRegExp");
        exit;
    } else {
        header("Location: ../views/form_add.php?form=formErreurEmpty");
        exit;
    }
}

