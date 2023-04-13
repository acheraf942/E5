<?php
session_start();

$DateActivitive=$_GET["DATEACT"];
$codeAct=$_GET["CODEANIM"]; 


if($_SESSION["type"]=="a"){
  include("connexion/config.php");
  // ****************************Recupere le nombre de place a l'animation***************************
  $recupPlaceAnim=$bdd->prepare("SELECT NBREPLACEANIM FROM animation WHERE CODEANIM=:code");
  $recupPlaceAnim->execute(array(
    "code"=>$codeAct
  ));
  $Place=$recupPlaceAnim->fetch();
  $PlaceDispo=$Place["NBREPLACEANIM"];
?>
<!-- ***************************************************************************************** -->



<!--******************************** Formulaire pour inscrire un vacancier********************* -->
<h1>Ajouter un vacancier a l'activite</h1>
<form action="inserer_vacancier.php" method="POST">
    <input type="text" name="CODEANIM" value="<?php echo $codeAct ?>" id="" readonly hidden ><br>
    <input type="date" name="DATEACT" value="<?php echo $DateActivitive ?>" id="" readonly hidden ><br>
    <select name="vacancier" id="">
      <?php
      include("bdd.php");
      $allVacancier=$bdd->query("SELECT * FROM compte WHERE TYPEPROFIL='v'");

      while($recupVac=$allVacancier->fetch()){
        $nom=$recupVac["NOMCOMPTE"];
        $prenom=$recupVac["PRENOMCOMPTE"];
        $user=$recupVac["USER"];
        $dateFin=$recupVac["DATEFINSEJOUR"];
        if($DateActivitive<=$dateFin){ //affiche les vacanciers avec leurs date qui sont toujours valide
        echo"<option value=$user>Pseudo: $user - Nom: $nom - Prenom: $prenom</option>";
      }
    }

?>
    </select><br>
    <input type="submit" value="inscrire">
  </form>
<!-- ******************************************************************************** -->

<!--*********************** Afficher les personnes inscript a l'activites************************************ -->
<?php

include("bdd.php");

$DateActivitive=$_GET["DATEACT"];
$codeAct=$_GET["CODEANIM"];

$recupInscript=$bdd->prepare("SELECT * FROM inscription WHERE DATEACT=:dateAct AND CODEANIM=:code AND DATEANNULE IS NULL "); //AND DATEANNULE IS NULL pour afficher que le personne qui sont inscript
$recupInscript->execute(array(
    "dateAct"=>$DateActivitive,
    "code"=>$codeAct
));

$compteNbPlace=$recupInscript->rowCount();

echo"<h1>Personne(s) inscript a l'activité</h1><br>";
echo"il y a $compteNbPlace personne inscript à l'activites/".$PlaceDispo;
echo"<table class='TablePersonne' border=1px>";
echo"<th class='titre'>Numero d'inscription</th>";
echo"<th class='titre'>Pseudo</th>";
echo"<th class='titre'>Date inscription</th>";
echo"<th class='titre'>Désinscription du vacancier</th>";
if($recupInscript->rowCount() > 0){
   
while($AffInscript=$recupInscript->fetch()){
  $num=$AffInscript["NOINSCRIP"];
  $user=$AffInscript["USER"];
  $dateInscription=$AffInscript["DATEINSCRIP"];
  $dateAnnule=$AffInscript["DATEANNULE"];

  $dateInscriptionFR= date('d/m/Y', strtotime($AffInscript["DATEINSCRIP"])); //convertir la date en format FR

if(!isset($dateAnnule)){
  echo"<tr>";
  echo" <td class='colonne1'>N°: ".$num."</td>";
  echo"<td class='colonne2'>".$user."</td>";
  echo"<td class='colonne1'>$dateInscriptionFR</td>";
  echo"<td class='colonne2'><a href=retirerinsc.php?NOINSCRIP=$num>Désincrire le vacancier</a></td>";
echo"</tr>";
} 

else{
  echo"<tr>";
  echo" <td class='colonne1'>N°: ".$num."</td>";
  echo"<td class='colonne2'>".$user."</td>";
  echo"<td class='colonne1'>$dateInscriptionFR</td>";
  echo"<td class='colonne2'>n'est plus inscript a l'activites</td>";
  echo"</tr>";
 }
}
} else{
    echo"Il y a aucune personne qui ses inscrit a l'activité";
}
echo"</table>";
?>

<!-- **************************************************************************************************** -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="fichierCSS/PersonneInscript.css">
    <title>Document</title>
</head>
<body>


<?php
}
else{
  header("Location:index.php");
}
?>


 

<?php if(isset($_SESSION["inscript"])){ ?>
    <?php
    unset($_SESSION["inscript"]);
 ?>
<script>
    Swal.fire("Le vacancier est déja inscript a l'activites ")
</script>
    <?php
} ?>



<?php if(isset($_SESSION["aucunePlace"]
)){ ?>
    <?php
    unset($_SESSION["aucunePlace"]
);
 ?>
<script>
    Swal.fire(" L'activites est complete")
</script>
    <?php
} ?>




</body>
</html>