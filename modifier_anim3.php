<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../general/style.css">
    <title>Liste des Animations</title>
</head>
<body bgcolor="grey">

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../general/barre_nav.php');
$bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8','root','');

if (isset($_POST['modifier'])) {
    $codeanim = $_POST['codeanim'];
    $codetypeanim = $_POST['codetypeanim'];
    $nomanim = $_POST['nomanim'];
    $datecreanim = $_POST['datecreanim'];
    $datevalidanim = $_POST['datevalidanim'];
    $dureeanim = $_POST['dureeanim'];
    $ageanim = $_POST['ageanim'];
    $tarifanim = $_POST['tarifanim'];
    $nbplaceanim = $_POST['nbplaceanim'];
    $descranim = $_POST['descranim'];
    $comanim = $_POST['comanim'];
    $difanim = $_POST['difanim'];

    $sql = "UPDATE ANIMATION SET CODETYPEANIM = :codetypeanim, NOMANIM = :nomanim, DATECREATIONANIM = :datecreanim, DATEVALIDITEANIM = :datevalidanim, DUREEANIM = :dureeanim, LIMITEAGE = :ageanim, TARIFANIM = :tarifanim, NBREPLACEANIM = :nbplaceanim, DESCRIPTANIM = :descranim, COMMENTANIM = :comanim, DIFFICULTEANIM = :difanim WHERE CODEANIM = :codeanim";
    
    $stmt = $bdd->prepare($sql);

    try {
        $result = $stmt->execute([
            ':codeanim' => $codeanim,
            ':codetypeanim' => $codetypeanim,
            ':nomanim' => $nomanim,
            ':datecreanim' => $datecreanim,
            ':datevalidanim' => $datevalidanim,
            ':dureeanim' => $dureeanim,
            ':ageanim' => $ageanim,
            ':tarifanim' => $tarifanim,
            ':nbplaceanim' => $nbplaceanim,
            ':descranim' => $descranim,
            ':comanim' => $comanim,
            ':difanim' => $difanim
        ]);

        if ($result) {
            echo "Animation modifiée avec succès.";
        } else {
            echo "Erreur lors de la modification de l'animation.";
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>
<h3>Animation mise à jour</h3>
    <p><a href="modifier_anim.php">Retour à la liste des animations</a></p>
    </body>
</html>s