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
require_once('general/barre_nav.php');
$bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8','root','');
?>

<h3>Liste des animations</h3>
<table border="1">
    <thead>
        <tr>
            <th>CODEANIM</th>
            <th>CODETYPEANIM</th>
            <th>NOMANIM</th>
            <th>DATECREATIONANIM</th>
            <th>DATEVALIDITEANIM</th>
            <th>DUREEANIM</th>
            <th>LIMITEAGE</th>
            <th>TARIFANIM</th>
            <th>NBREPLACEANIM</th>
            <th>DESCRIPTANIM</th>
            <th>COMMENTANIM</th>
            <th>DIFFICULTEANIM</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM ANIMATION";
        $animations = $bdd->query($sql);
        foreach ($animations as $animation) {
            echo "<tr>";
            echo "<td><a href='lien_anim.php?CODEANIM=" . $animation['CODEANIM'] . "'>" . $animation['CODEANIM'] . "</a></td>";

            echo "<td>" . $animation['CODETYPEANIM'] . "</td>";
            echo "<td>" . $animation['NOMANIM'] . "</td>";
            echo "<td>" . $animation['DATECREATIONANIM'] . "</td>";
            echo "<td>" . $animation['DATEVALIDITEANIM'] . "</td>";
            echo "<td>" . $animation['DUREEANIM'] . "</td>";
            echo "<td>" . $animation['LIMITEAGE'] . "</td>";
            echo "<td>" . $animation['TARIFANIM'] . "</td>";
            echo "<td>" . $animation['NBREPLACEANIM'] . "</td>";
            echo "<td>" . $animation['DESCRIPTANIM'] . "</td>";
            echo "<td>" . $animation['COMMENTANIM'] . "</td>";
            echo "<td>" . $animation['DIFFICULTEANIM'] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
