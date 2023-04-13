<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../general/style.css">
	<title></title>
	<?php 
	session_start();
	?>

	<nav>
		<ul>
			<?php if (isset($_SESSION['user'])): ?>
				<li><a href="../connexion/deconnexion.php"><button>Se Deconnecter</button></a></li>
				<li><a href=""><button><?php echo $_SESSION['pseudo']; ?></button></a></li>
				<li class="menu-html"><a href="activite/afficher_activite.php" class="partie">Animation</a>
					<ul class="menu">
						<li><a href="../essai.php">Voir les activités et s'inscrire</a></li>
						<li><a href="../compte.php">Mes reservations</a></li>
						</ul>
					</ul>
				</li>
				<?php if ($_SESSION['type'] == "a"): ?>
					<li class="menu"><a href="animation/ajtanimation.php" class="partie">Animation</a>
						<ul class="menu">
							<li><a href="activite/ajtactivite.php">Ajouter activite</a></li>
							<li><a href="../ajt_type_anim.php">ajouter un type d'animation</a></li>
							<li><a href="animation/ajtanimation.php">Ajouter une animation</a></li>
							<li><a href="../essai.php">gerer les activiter</a></li>
						</ul>
							<li><a href="../compte.php">Mes reservations</a></li>
						</ul>
					</li>
				<?php endif; ?>
			<?php else: ?>
				<li><a href="connexion/connexion.php"><button>Se connecter</button></a></li>
			<?php endif; ?>
		</ul>
	</nav>
	</nav></header>
</head>
<body bgcolor="grey" onload="initElement();">
<?php 
$bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8','root','');?>
	<div class="ajt">
	<form action="ajoutanim.php" method="post">
		<h3>Ajouter une animation</h3>
		<table>
			<tr>
				<td>
				Code:
				</td>
				<td>
				<input type="text" name="codeanim">
				</td>

			</tr>
			<tr>
				<td>
				Code type:
				</td>
				<td>
				<select name="codetypeanim" onchange="combo(this,'theinput')">
					<?php
					$sql ="SELECT CODETYPEANIM, NOMTYPEANIM FROM TYPE_ANIM";
					foreach  ($bdd->query($sql) as $row) {
					   echo "<option value=$row[CODETYPEANIM]>$row[NOMTYPEANIM]</option>";
					}
					?>

				</select>
				</td>

			</tr>
			<tr>
				<td>
				Nom:
				</td>
				<td>
				<input type="text" name="nomanim">
				</td>

			</tr>
			<tr>
				<td>
				Date de Création:
				</td>
				<td>
				<input type="date" name="datecreanim">
				</td>

			</tr>
			<tr>
				<td>
				Date de Validité:
				</td>
				<td>
				<input type="date" name="datevalidanim">
				</td>

			</tr>
			<tr>
				<td>
				Durée:
				</td>
				<td>
				<input type="number" name="dureeanim">
				</td>

			</tr>
			<tr>
				<td>
				Limite d'âge:
				</td>
				<td>
				<input type="number" name="ageanim">
				</td>

			</tr>
			<tr>
				<td>
				Tarif:
				</td>
				<td>
				<input type="number" name="tarifanim">
				</td>

			</tr>
			<tr>
				<td>
				Nombre de place:
				</td>
				<td>
				<input type="number" name="nbplaceanim">
				</td>
			</tr>
			<tr>
				<td>
				Description:
				</td>
				<td>
				<input type="text" name="descranim">
				</td>
			</tr>
			<tr>
				<td>
				Commentaire:
				</td>
				<td>
				<input type="text" name="comanim">
				</td>
			</tr>
			<tr>
				<td>
				Difficulté:
				</td>
				<td>
				<input type="text" name="difanim">
				</td>
			</tr>
			<tr>
				<td>
				<input type="submit" name="ajouter" value="Ajouter">
				</td>
				<td>
				<input type="reset" name="ajouter" value="Annuler">
				</td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>