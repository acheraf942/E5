<?php
session_start();
?>



<?php
// **************************************RECUPERER LES INFOS DE L'ANIMATION*********************************************************
include('connexion/config.php');

if(isset($_GET['CODEANIM']) AND !empty($_GET['CODEANIM'])){

    $get_code=$_GET['CODEANIM'];
    $article = $bdd->prepare("SELECT * FROM animation WHERE CODEANIM=:codeanim");
    $article->execute(array(
        "codeanim"=>$get_code,
    ));

  


        if($article->rowCount() ==1){
            $article= $article->fetch();
            $codeAnim = $article['CODEANIM'];
            $titre=$article['NOMANIM'];
            $datec=$article['DATECREATIONANIM'];
            $datev=$article['DATEVALIDITEANIM'];
            $duree=$article['DUREEANIM'];
            $description=$article['DESCRIPTANIM'];
            $age=$article['LIMITEAGE'];
            $prix=$article['TARIFANIM'];
            $place=$article['NBREPLACEANIM'];
            $difficulter=$article['DIFFICULTEANIM'];
    
        }
        else{
            die("cette animation n'existe pas");
        }

    }
    
else{
    die("erreur");
}

$_SESSION['code'] = $article['CODEANIM'];
$image=$codeAnim;

?>



<?php
$Act =$bdd->prepare("SELECT * FROM activite WHERE CODEANIM=:codeanim");
$Act->execute(array(
"codeanim"=>$get_code,
));

 while($recupActivite= $Act->fetch()){

     $dateAct =$recupActivite["DATEACT"];

 }

// ************************************************************************************************************************
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>Gacti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .bulle {
            display: inline-block;
            position: relative;
            padding: 20px;
            border-radius: 25px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .bulle::after {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-left: -10px;
            width: 0;
            height: 0;
            border: 10px solid transparent;
            border-bottom-color: #ffffff;
        }

        .activite {
            padding: 1rem;
            text-align: center;
        }

        .activite h1 {
            margin-bottom: 0.5rem;
        }

        .activite p {
            margin-bottom: 0.5rem;
        }

        .activite a {
            text-decoration: none;
            color: #1a1a1a;
            background-color: #e0e0e0;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .activite a:hover {
            background-color: #cccccc;
        }
    </style>
</head>
<body>
<div class="bulle">
    <?php $dateValiditeFR= date('d/m/Y', strtotime($datev)); ?>
    <section class="activite">
        <h1 class="titre"><?php echo $titre; ?></h1>
        <p class="DateFin"><?php echo "L'animation se termine le: ".$dateValiditeFR; ?></p>
        <p><?php echo "L'animation dure ".$duree." minutes"; ?></p>
        <p style="font-weight: bold;">Description :</p>
        <p class="description"><?php echo $description; ?></p>
        <p><?php echo "Âge minimum: ".$age." ans"; ?></p>
        <p>Prix: <?php echo $prix." €"; ?></p>
        <p><?php echo "Nombre de places: ".$place; ?></p>
        <p><?php echo "Difficulté: ".$difficulter; ?></p>
        <a href="essai.php">Retour</a>
    </section>
</div


<!-- ************************************************************************************** -->


<?php include("AffAct.php"); ?>



<!--***************************** On c déja inscript******************** -->
<?php if(isset($_SESSION["inscript"])){ ?>
    <?php
    unset($_SESSION["inscript"]);
 ?>
<script>
    Swal.fire("Vous vous etes déja inscript pour ce jour a cette activites ")
</script>
    <?php
} ?>

<!-- *************** il y a aucune place********************** -->
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
<!-- ******************************************************** -->

<?php if(isset($_SESSION["inscriptReussi"])){ ?>
    <?php
    unset($_SESSION["inscriptReussi"]);
 ?>
<script>
    Swal.fire(" L'inscription a l'activite a bien été réussi")
</script>
    <?php
} ?>



<script src="app.js"></script>
</body>
</html>