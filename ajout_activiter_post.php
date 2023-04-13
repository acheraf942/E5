
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../general/style.css">
    <title>Ajout d'une activité</title>
</head>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../general/barre_nav.php');

try {
    $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit;
}

if (isset($_POST['ajouter'])) {
    $codeanim = $_POST['codeanim'];
    $dateact = $_POST['dateact'];
    $codeetatact = $_POST['codeetatact'];
    $hrrdvact = $_POST['hrrdvact'];
    $prixact = $_POST['prixact'];
    $hrdebutact = $_POST['hrdebutact'];
    $hrfinact = $_POST['hrfinact'];
    $nomresp = $_POST['nomresp'];
    $prenomresp = $_POST['prenomresp'];

    $sql = "INSERT INTO ACTIVITE (CODEANIM, DATEACT, CODEETATACT, HRRDVACT, PRIXACT, HRDEBUTACT, HRFINACT, NOMRESP, PRENOMRESP) VALUES (:codeanim, :dateact, :codeetatact, :hrrdvact, :prixact, :hrdebutact, :hrfinact, :nomresp, :prenomresp)";
    $stmt = $bdd->prepare($sql);

    try {
        $result = $stmt->execute([
            ':codeanim' => $codeanim,
            ':dateact' => $dateact,
            ':codeetatact' => $codeetatact,
            ':hrrdvact' => $hrrdvact,
            ':prixact' => $prixact,
            ':hrdebutact' => $hrdebutact,
            ':hrfinact' => $hrfinact,
            ':nomresp' => $nomresp,
            ':prenomresp' => $prenomresp
        ]);
        
        if (!$result) {
            print_r($stmt->errorInfo());
        } else {
            echo "<p>Activité ajoutée avec succès.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Erreur: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>Aucune donnée reçue. Retournez au <a href='ajout_activiter.php'>formulaire d'ajout d'une activité</a> et soumettez à nouveau.</p>";
}

?>
</body>
</html>
