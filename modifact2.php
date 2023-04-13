<?php
session_start();

if(!isset($_SESSION["type"])=="a"){
    header("Location:index.php");
}
include("connexion/config.php");
$codeAct=$_POST["code"];
$dateActivite =$_POST["dateAct"];
$codeEtatAct=$_POST["codeEtat"];
$RDVact=$_POST["rdv"];
$prixAct=$_POST["prix"];
$debutAct=$_POST["debut"];


$recupDuree=$bdd->prepare("SELECT * FROM animation WHERE CODEANIM=:code");
$recupDuree->execute(array(
    "code"=>$codeAct
));

$duree=$recupDuree->fetch();
$dureeAnim=$duree["DUREEANIM"];


$heure1=substr($debutAct,0,2); //  Prend les 2 premiers chiffres


$minute=substr($debutAct,3,2);// Part des : et prends les deux chiffres suivants


$heureDebut=$heure1*60;


$heureDebut=$heureDebut+$minute;

$fin=date('G:i', mktime(0,$heureDebut+$dureeAnim));

var_dump($fin);

$modif_act=$bdd->prepare('UPDATE activite SET  CODEETATACT= :CodeEtat, HRRDVACT= :RDV, PRIXACT= :prix, HRDEBUTACT= :debut, HRFINACT= :fin, NOMRESP= :nom, PRENOMRESP= :prenom WHERE CODEANIM= :codee AND DATEACT=:dateAct');
$modif_act->execute(array(
    "CodeEtat"=>$codeEtatAct,
    "RDV"=>$RDVact,
    "prix"=>$prixAct,
    "debut"=>$debutAct,
    "fin"=>$fin,
    "nom"=>$_SESSION['nomUtilisateur'],
    "prenom"=>$_SESSION['prenomUtilisateur'],
    "codee"=>$codeAct,
    "dateAct"=>$dateActivite,

));
header("location:essai.php");


?>
