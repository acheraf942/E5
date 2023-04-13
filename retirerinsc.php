<?php
session_start();

if(!isset($_SESSION["type"])){
    header("Location:index.php");
}

$_SESSION["desinscription"]="Désinscription réussi";

include("connexion/config.php");

$idInscription = $_GET["NOINSCRIP"];
$dateJour= date("Y-m-d");


$InsertDateAnnule =$bdd->prepare("UPDATE inscription SET DATEANNULE =:DateJour WHERE NOINSCRIP =:idInscrip");
$InsertDateAnnule->execute(array(
    "DateJour"=>$dateJour,
    "idInscrip"=>$idInscription,
));

header("Location:".$_SERVER['HTTP_REFERER']);


?>