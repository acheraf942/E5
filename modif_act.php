<?php
session_start();

if(!isset($_SESSION["type"])=="a"){
    header("Location:index.php");
}

$modifcode=$_GET["CODEANIM"];
$modifDate=$_GET["DATEACT"];



include("connexion/config.php");

$recupAct=$bdd->prepare("SELECT * FROM activite WHERE CODEANIM=:code AND DATEACT=:dateact");
$recupAct->execute(array(
    "code"=>$modifcode,
     "dateact"=>$modifDate,
));

$recup=$recupAct->fetch();

$code=$recup["CODEANIM"];
$dateAct=$recup["DATEACT"];
$CodeEtat=$recup["CODEETATACT"];
$RDV=$recup["HRRDVACT"];
$prix=$recup["PRIXACT"];
$debut=$recup["HRDEBUTACT"];
$fin=$recup["HRFINACT"];
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form action="modifact2.php" method="POST">
    <h1>Modifier l'activité</h1>
    <div class="card">
    <label>Code de l'activité :</label><input type="text" name="code" value="<?php echo $code ?>" readonly><br>

    <label>Date de l'activité:</label><input type="date" name="dateAct" value="<?php echo $dateAct ?>" readonly><br>

    <label>Code Etat de l'activité :</label> <select name="codeEtat" id="">
        <option value="<?php echo $CodeEtat ?>">Le code actuel est <?php echo $CodeEtat ?></option>
        <?php
        $selectEtat=$bdd->query("SELECT * FROM etat_act");

        while($etat=$selectEtat->fetch()){
            $codeEtat=$etat["CODEETATACT"];
            $nomEtat=$etat["NOMETATACT"];
            echo"<option value=".$codeEtat.">".$codeEtat." ".$nomEtat."</option>";
        }
        ?>


    </select><br>

    <label>Heure rendez vous de l'activité :</label> <input type="time"  name="rdv" id="" value="<?php echo $RDV ?>"><br>

    <label>Prix de l'activité :</label><input type="number" min="0" name="prix" value="<?php echo $prix ?>"><br>

    <label>Heure début de l'activité :</label> <input type="time" name="debut" id="" value="<?php echo $debut ?>"><br>

    <input type="submit" class="valider">

    </form>
</div>






</body>
</html>