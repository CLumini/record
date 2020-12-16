<?php
function connexion_base(){
    if(($_SERVER['SERVER_NAME']=="localhost") || ($_SERVER['SERVER_NAME']=="127.0.0.1")) {
        $host = "localhost";
        $login = "root";
        $password = "";
        $base = "record";
    }

    if($_SERVER['SERVER_NAME']=="dev.amorce.org")
    {
        $host= "localhost";
        $login="clumini";
        $password="cl20104";
        $base="clumini";
    }

    try {
        $db= new PDO("mysql:host=".$host.";charset=utf8;dbname=".$base, $login, $password);
        return $db;
    }
    catch(Exception $e){
        echo"Erreur : ".$e->getMessage()."<br>";
        echo"No : ".$e->getCode()."<br>";
        die("Connexion au serveur impossible.");
    }
}

