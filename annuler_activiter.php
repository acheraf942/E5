<!doctype html>
<style>
	table{
		border-color: solid black 10px;
		width: 100%;
		align-items: center;
		text-align: center;
	}

		body {
			background-color: #46494C;
			color: white;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
		}
		table {
			border-color: white;
			width: 100%;
			text-align: center;
			margin-top: 20px;
		}
		th, td {
			padding: 10px;
			border: 1px solid white;
		}
		th {
			background-color: #27282B;
			text-transform: uppercase;
		}
		a {
			color: white;
			text-decoration: none;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-weight: normal;
			font-size: 40px;
    		font-family: 'Comic Sans MS';
			background-color: #212529;
		}
		footer{
			background-color: #212529;
            color: #fff;
            font-size: 14px;
            padding: 20px;
            text-align: center;
			position: absolute;
			bottom: 0;
			left: 0;
			right: 0;
	}

	
	
	
</style>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>	
<?php
session_start();

require_once '../connexion/config.php';
$user = $_SESSION['USER'];

if ($_SESSION['TYPEPROFIL'] == 'en') {
    $requete1 = "SELECT * FROM inscription";
} else if ($_SESSION['TYPEPROFIL'] == 'va') {
    $requete1 = "SELECT * FROM inscription WHERE USER = '$user'";
}

$resultat = mysqli_query($connexion, $requete1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <center><h1>Inscription</h1></center>

    <table border="1">
        <tr>
            <td>No inscription</td>
            <td>user</td>
            <td>code animation</td>
            <td>date activité</td>
            <td>date inscription</td>
            <td>date annulation</td>
        </tr>
        <?php while ($enreg = mysqli_fetch_array($resultat)) { ?>
            <tr>
                <td><?php echo $enreg["NOINSCRIP"]; ?></td>
                <td><?php echo $enreg["USER"]; ?></td>
                <td><?php echo $enreg["CODEANIM"]; ?></td>
                <td><?php echo $enreg["DATEACT"]; ?></td>
                <td><?php echo $enreg["DATEINSCRIP"]; ?></td>
                <td><?php echo $enreg["DATEANNULE"]; ?></td>
                <?php if ($_SESSION['TYPEPROFIL'] == "en") { ?>
                    <td>
                        <a href='annulation.php?NOINSCRIP=<?php echo $enreg["NOINSCRIP"]; ?>'>Annuler</a>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

</body>
<footer>
    <strong><a href="../index.php">accueil</a></strong>
</footer>
</html>
