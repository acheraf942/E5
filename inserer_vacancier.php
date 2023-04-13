<?php
session_start();
  include("connexion/config.php");
  $dateact=$_POST["DATEACT"];
  $code=$_POST["CODEANIM"];
 $user=$_POST["vacancier"];
 $dateInscip= date("Y-m-d");
//  *****************************verif si le vacancier est inscript****************************

 $verif=$bdd->prepare("SELECT * FROM inscription WHERE DATEACT=:dateact AND CODEANIM=:code AND USER=:user AND DATEANNULE IS NULL "); //AND DATEANNULE IS NULL enlever cette ligne si une personne ne peux pas ce réinscrire si il c déja inscript et qui a annuler sont inscription
 $verif->execute(array(
  "dateact"=>$dateact,
  "code"=>$code,
  "user"=>$user,
 ));

 
// ***************************************************************************************************
 if($verif->rowCount()===0){


// *******************************compter le nombre de place disponible***********************************
$verifPlace=$bdd->prepare("SELECT NBREPLACEANIM-COUNT(NOINSCRIP) AS placesrestante 
FROM animation 
INNER JOIN inscription ON 
animation.CODEANIM=inscription.CODEANIM WHERE DATEANNULE IS NULL AND inscription.CODEANIM=:code 
AND DATEACT=:datee");
$verifPlace->execute(array(
    "code"=>$code,
    "datee"=>$dateact,
));

$recupPlace=$verifPlace->fetch();

$place=$recupPlace["placesrestante"]; //on recupere le as avec fech() car ca le creer dans la base de donnee quand on execute la requete
var_dump($place);
if($place >0){

// ***************************************************************************************************


//*********************************** * On insert si il est pas inscript*******************************************
$InsertAct=$bdd->prepare("INSERT INTO inscription (USER,CODEANIM,DATEACT,DATEINSCRIP) VALUES(:user,:code,:datee,:DateInscrip)");
$InsertAct->execute(array(
    "user"=>$user,
    "code"=>$code,
    "datee"=>$dateact,
    "DateInscrip"=>$dateInscip,

));

  header("Location:".$_SERVER['HTTP_REFERER']);

} else{
    $_SESSION["aucunePlace"]="il n'y a plus de place disponibles";
     header("Location:".$_SERVER['HTTP_REFERER']);
    
}

 }
else{
    // echo"Vous etes déja inscrit a cette activité";
    $_SESSION["inscript"]="vous etes déja inscript";
    header("Location:".$_SERVER['HTTP_REFERER']);
}



  header("Location:".$_SERVER['HTTP_REFERER']);



 ?>