<?php
session_start();

include("connexion/config.php");
$dateAct=$_GET["DATEACT"];
$code=$_GET["CODEANIM"];
$dateAnnule=date("Y-m-d");
$DateAnnuleAct=$bdd->prepare("UPDATE activite SET DATEANNULEACT= :dateAnnule, CODEETATACT= :etat WHERE DATEACT=:dateact AND CODEANIM=:code");
$DateAnnuleAct->execute(array(
    "dateAnnule"=>$dateAnnule,
    "etat"=>"A3",
    "dateact"=>$dateAct,
    "code"=>$code
));
header("Location:".$_SERVER['HTTP_REFERER']);



?>