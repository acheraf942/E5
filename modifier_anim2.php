<?php
require_once('../general/barre_nav.php');

// Connect to the database
$bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8','root','');

// Get the CODEANIM from the URL
if (isset($_GET['codeanim'])) {
    $codeanim = $_GET['codeanim'];
    
    // Fetch the animation data
    $sql = "SELECT * FROM ANIMATION WHERE CODEANIM = :codeanim";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([':codeanim' => $codeanim]);
    $animation = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../general/style.css">
    <title>Modifier Animation</title>
</head>
<body bgcolor="grey">
    <h3>Modifier Animation</h3>
    <form action="modifier_anim3.php" method="post">
        <table>
            <tr>
                <td>CODEANIM:</td>
                <td><input type="text" name="codeanim" value="<?php echo $animation['CODEANIM']; ?>" readonly></td>
            </tr>
            <!-- Add more input fields for other columns here -->
            <tr>
    <td>CODETYPEANIM:</td>
    <td>
        <select name="codetypeanim" onchange="combo(this,'theinput')">
            <?php
                $sql = "SELECT CODETYPEANIM, NOMTYPEANIM FROM TYPE_ANIM";
                foreach ($bdd->query($sql) as $row) {
                    echo "<option value='".$row['CODETYPEANIM']."'>".$row['NOMTYPEANIM']."</option>";
                }
            ?>
        </select>
    </td>
</tr>
            <tr>
                <td>NOMANIM:</td>
                <td><input type="text" name="nomanim" value="<?php echo $animation['NOMANIM']; ?>"></td>
            </tr>
            <tr>
                <td>DATECREATIONANIM:</td>
                <td><input type="date" name="datecreanim" value="<?php echo $animation['DATECREATIONANIM']; ?>"></td>
            </tr>
            <tr>
                <td>DATEVALIDITEANIM:</td>
                <td><input type="date" name="datevalidanim" value="<?php echo $animation['DATEVALIDITEANIM']; ?>"></td>
            </tr>
            <tr>
                <td>DUREEANIM:</td>
                <td><input type="number" name="dureeanim" value="<?php echo $animation['DUREEANIM']; ?>"></td>
            </tr>
            <tr>
                <td>LIMITEAGE:</td>
                <td><input type="number" name="ageanim" value="<?php echo $animation['LIMITEAGE']; ?>"></td>
            </tr>
            <tr>
                <td>TARIFANIM:</td>
                <td><input type="number" name="tarifanim" value="<?php echo $animation['TARIFANIM']; ?>"></td>
            </tr>
            <tr>
                <td>NBREPLACEANIM:</td>
                <td><input type="number" name="nbplaceanim" value="<?php echo $animation['NBREPLACEANIM']; ?>"></td>
            </tr>
            <tr>
                <td>DESCRIPTANIM:</td>
                <td><input type="text" name="descranim" value="<?php echo $animation['DESCRIPTANIM']; ?>"></td>
            </tr>
            <tr>
                <td>COMMENTANIM:</td>
                <td><input type="text" name="comanim" value="<?php echo $animation['COMMENTANIM']; ?>"></td>
            </tr>
            <tr>
                <td>DIFFICULTEANIM:</td>
                <td><input type="text" name="difanim" value="<?php echo $animation['DIFFICULTEANIM']; ?>"></td>
            </tr>
            <!-- ... -->
            <tr>
                <td><input type="submit" name="modifier" value="Modifier"></td>
                <td><input type="reset" name="annuler" value="Annuler"></td>
            </tr>
        </table>
    </form>
</body>
</html>
