<?php
session_start();
if(!isset($_SESSION["type"])){
    header("Location:index.php");
}
?>

<?php

include("connexion/config.php");


$infoCompte=$bdd->prepare("SELECT FROM compte WHERE USER=:user");
$infoCompte->execute(array(
    "user"=>$_SESSION['user'],
));

while($recupCompte=$infoCompte->fetch()){
    $nom=$recupCompte["NOMCOMPTE"];
    $prenom=$recupCompte["PRENOMCOMPTE"];
    $dateInscrip=$recupCompte["DATEINSCRIP"];
    $naissance=$recupCompte["DATENAISCOMPTE"];
    $adresseM=$recupCompte["ADRMAILCOMPTE"];
    $NumTel=$recupCompte["NOTELCOMPTE"];

}




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fichierCSS/compte.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <center>Bonjour <?php echo $_SESSION["user"]; ?></center>
    <?php 
    include("bdd.php");
    $allAct=$bdd->prepare("SELECT * FROM inscription WHERE USER=:user");
    $allAct->execute(array(
        "user" => $_SESSION['user'],
    ));

    $allActR=$allAct->rowCount();

   if($allActR > 0){ ?>
   <p>Vos Activité(s)</p>
   <?php

    while($recupAct=$allAct->fetch()){
        $CodeAnim=$recupAct["CODEANIM"];
        $DateActivite=$recupAct['DATEACT'];

        if($recupAct['DATEACT']>=date("Y-m-d")){
            $dateValide="la date de l'activité n'est pas dépasser";
            if(!isset($recupAct["DATEANNULE"])){
                $annulation="l'activiter n'a pas été annuler";

                $verifActAnnule=$bdd->prepare("SELECT * FROM activite WHERE CODEANIM=:codeA AND DATEACT=:dateA");
                    $verifActAnnule->execute(array(
                        "codeA"=>$CodeAnim,
                        "dateA"=>$DateActivite
                    ));
                    while($DateAnnule=$verifActAnnule->fetch()){
                        $HrdebutAct=$DateAnnule["HRDEBUTACT"];
                    $DateAnnuleAct=$DateAnnule["DATEANNULEACT"];
                    $PrixACT=$DateAnnule["PRIXACT"];
                    $etat_act=$DateAnnule["CODEETATACT"];

                    if(empty($DateAnnuleAct)){
                         $dateActFR= date('d/m/Y', strtotime($recupAct['DATEACT'])); //convertir la date en format FR 


                         $DateActiviteFR= date('d/m/Y', strtotime($DateActivite)); //convertir la date en format FR 
                        if($etat_act=="A2"){

        echo"Votre numéro est le :".$recupAct["NOINSCRIP"]." ";
        echo "Votre activité commence le : ".$dateActFR." à ".$HrdebutAct." elle coûteras ".$PrixACT." €";
        echo"<a onclick='AnnuleAct()' href=desinscription.php?NOINSCRIP="?><?php echo $recupAct["NOINSCRIP"].">Désinscription a l'activité</a><br>";
        }
       
         if($etat_act=="A3"){
            echo"L'activite qui avais lieu le".$DateActiviteFR." a ".$HrdebutAct." n'est plus valide <br>";
        }
        if($etat_act=="A4"){
            echo"Votre numéro est le :".$recupAct["NOINSCRIP"]." ";
        echo "Votre activité commence le : ".$dateActFR." à ".$HrdebutAct." elle coûteras ".$PrixACT." € (elle peux etre annuler)";
        echo"<a onclick='AnnuleAct()' href=desinscription.php?NOINSCRIP="?><?php echo $recupAct["NOINSCRIP"].">Désinscription a l'activité</a><br>";
        }
    }else{
        echo"L'activite qui avais lieu le".$DateActiviteFR." a ".$HrdebutAct." à été annuler<br>";
    }
    }
}
        else{

        }
        }else{
            
        } 
        
    
   }
}else{ ?>

   <!-- <p class="ActVide">C'est vide aujourd'hui . . .</p> -->
   <?php
   }

   if(!isset($dateValide) || !isset($annulation)){
    echo"<p class='ActVide'>Vous N'avez aucune activité de prévue</p>"; ?>
    <img class="ActVideImg" src="image/renard2.gif" alt="" width="150px">
    <?php
} 

    ?>




<?php
if(isset($_SESSION["desinscription"])){

    unset($_SESSION["desinscription"]); ?>

<script>
    Swal.fire("Votre inscription a bien été annulée");
</script>
 <?php    
}
?> 
<a href="index.php">Retour à la page d'accueil</a>

<script src="app.js"></script>
</body>
</html>

