<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../general/style.css">
    <title></title>
</head>
<body>
<?php 
require_once('../general/barre_nav.php');
try {
    $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8','root','');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>
    <div class="ajt">
    <form action="ajout_activiter_post.php" method="post">
        <h3>Ajouter une activité</h3>
        <table>
            <tr>
                <td>
                Animation correspondante:
                </td>
                <td>
                <select name="codeanim" onchange="combo(this,'theinput')">
                    <?php
                    $sql = "SELECT CODEANIM, NOMANIM FROM animation";
                    foreach  ($bdd->query($sql) as $row) {
                       echo "<option value='".$row['CODEANIM']."'>".$row['NOMANIM']."</option>";
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>
                Etat activite:
                </td>
                <td>
                <select name="codeetatact" onchange="combo(this,'theinput')">
                    <?php
                    $sql = "SELECT CODEETATACT,NOMETATACT FROM ETAT_ACT";
                    foreach  ($bdd->query($sql) as $row) {
                       echo "<option value='".$row['CODEETATACT']."'>".$row['NOMETATACT']."</option>";
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>
                Date:
                </td>
                <td>
                <input type="date" name="dateact" id="" min="<?php echo date('Y-m-d'); ?>" value="<?php if (isset($_POST['DateAct'])) { echo $_POST['DateAct']; } ?>">


                </td>
            </tr>
            <tr>
                <td>
                Heure de rendez-vous:
                </td>
                <td>
                <input type="time" name="hrrdvact">
                </td>
            </tr>
            <tr>
                <td>
                Prix:
                </td>
                <td>
                <input type="number" name="prixact">
                </td>
            </tr>
            <tr>
                <td>
                Heure du début:
                </td>
                <td>
                <input type="time" name="hrdebutact">
                </td>
            </tr>
            <tr>
                <td>
                Heure de fin:
                </td>
                <td>
                <input type="time" name="hrfinact">
                </td>
            </tr>
            
            <tr>
                <td>
                Nom du responsable:
                </td>
                <td>
                <input type="text" name="nomresp">
                </td>
            </tr>
            <tr>
                <td>
                Prénom du responsable:
                </td>
                <td>
                <input type="text" name="prenomresp">
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="ajouter" value="Ajouter">
                </td>
                <td>
                <input type="reset" name="annuler" value="Annuler">
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
