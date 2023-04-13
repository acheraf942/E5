<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../general/style.css">
    <title></title>
</head>
<body bgcolor="grey" onload="initElement();">
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../general/barre_nav.php');
$bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8','root','');

if (isset($_POST['ajouter'])) {
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

    $check_sql = "SELECT CODEANIM FROM ANIMATION WHERE CODEANIM = ?";
    $check_stmt = $bdd->prepare($check_sql);
    $check_stmt->execute([$codeanim]);
    $code_exists = $check_stmt->fetch();

    if ($code_exists) {
        echo "Le code d'animation existe déjà. Veuillez en choisir un autre.";
    } else {
        $sql = "INSERT INTO ANIMATION (CODEANIM, CODETYPEANIM, NOMANIM, DATECREATIONANIM, DATEVALIDITEANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM, DESCRIPTANIM, COMMENTANIM, DIFFICULTEANIM) VALUES (:CODEANIM, :CODETYPEANIM, :NOMANIM, :DATECREATIONANIM, :DATEVALIDITEANIM, :DUREEANIM, :LIMITEAGE, :TARIFANIM, :NBREPLACEANIM, :DESCRIPTANIM, :COMMENTANIM, :DIFFICULTEANIM)";
        $stmt = $bdd->prepare($sql);

        try {
            $result = $stmt->execute([
                ':CODEANIM' => $codeanim,
                ':CODETYPEANIM' => $codetypeanim,
                ':NOMANIM' => $nomanim,
                ':DATECREATIONANIM' => $datecreanim,
                ':DATEVALIDITEANIM' => $datevalidanim,
                ':DUREEANIM' => $dureeanim,
                ':LIMITEAGE' => $ageanim,
                ':TARIFANIM' => $tarifanim,
                ':NBREPLACEANIM' => $nbplaceanim,
                ':DESCRIPTANIM' => $descranim,
                ':COMMENTANIM' => $comanim,
                ':DIFFICULTEANIM' => $difanim
            ]);

            if ($result) {
                echo "Animation ajoutée avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'animation.";
            }
        } catch (PDOException $e) {
        

            echo "Erreur: " . $e->getMessage();
        }
    }
}
?>
<!-- Reste du code HTML/PHP -->
</body>
</html>

