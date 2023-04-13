<?php
session_start();
?>
<?php
include("connexion/config.php");
$user =$_SESSION['user'];
$codeAnim=$_SESSION["code"];
$DateAct =$_POST["dateActivite"];
$dateInscip= date("Y-m-d");



//********************* */ Verif si on c déja inscript a l'activité************************************************

$verifInscrip=$bdd->prepare("SELECT * FROM inscription WHERE CODEANIM=:codee AND DATEACT=:dateact AND USER=:user  AND DATEANNULE IS NULL "); //AND DATEANNULE IS NULL enlever cette ligne si une personne ne peux pas ce réinscrire si il c déja inscript et qui a annuler sont inscription
$verifInscrip->execute(array(
    "codee"=>$codeAnim,
    "dateact"=>$DateAct,
    "user"=>$_SESSION["user"]
));


if($verifInscrip->rowCount()=== 0){

// ************************************************************************************************************

// *******************************compter le nombre de place disponible si c bon on l'inscript***********************************
$verifPlace=$bdd->prepare("SELECT NBREPLACEANIM-COUNT(NOINSCRIP) AS placesrestante 
FROM animation 
INNER JOIN inscription ON 
animation.CODEANIM=inscription.CODEANIM WHERE DATEANNULE IS NULL AND inscription.CODEANIM=:code 
AND DATEACT=:datee");
$verifPlace->execute(array(
    "code"=>$_SESSION['code'],
    "datee"=>$DateAct,
));

$recupPlace=$verifPlace->fetch();

$place=$recupPlace["placesrestante"]; //on recupere le as avec fech() car ca le creer dans la base de donnee quand on execute la requete
var_dump($place);
if($place >0){

// ***************************************************************************************************


//*********************************** * On insert si il est pas inscript *******************************************
$InsertAct=$bdd->prepare("INSERT INTO inscription (USER,CODEANIM,DATEACT,DATEINSCRIP) VALUES(:user,:code,:datee,:DateInscrip)");
$InsertAct->execute(array(
    "user"=>$user,
    "code"=>$codeAnim,
    "datee"=>$DateAct,
    "DateInscrip"=>$dateInscip,

));
$_SESSION["inscriptReussi"]="vous vous etes bien inscript";
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

?>