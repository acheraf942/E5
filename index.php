<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Centre de Loisirs</title>
	<link rel="stylesheet" type="text/css" href="general/style.css">
</head>

<body>
	<?php 
	session_start();
	?>

	<nav>
		<ul>
		<?php if (isset($_SESSION['user'])): ?>
				<li><a href="connexion/deconnexion.php"><button>Se Deconnecter</button></a></li>
				<li><a href=""><button><?php echo $_SESSION['pseudo']; ?></button></a></li>
				<li class="menu-html"><a href="activite/afficher_activite.php" class="partie">Animation</a>
					<ul class="menu">
						<li><a href="essai.php">Voir les activités et s'inscrire</a></li>
						<li><a href="compte.php">Mes reservations</a></li>
						</ul>
					</ul>
				</li>
				<?php if ($_SESSION['type'] == "a"): ?>
					<li class="menu"><a href="animation/ajtanimation.php" class="partie">Animation</a>
						<ul class="menu">
							<br>
							<li><a href="activite/ajtactivite.php">Ajouter activite</a></li>
							<li><a href="ajt_type_anim.php">ajouter un type d'animation</a></li>
							<li><a href="animation/ajtanimation.php">Ajouter une animation</a></li>
							<li><a href="essai.php">gerer les activiter</a></li>
						</ul>
							
						</ul>
					</li>
				<?php endif; ?>
			<?php else: ?>
				<li><a href="connexion/connexion.php"><button>Se connecter</button></a></li>
			<?php endif; ?>
		</ul>
	</nav>
	<br>
	<br><br><br><br><br>
	<header>
		
	</header>
	<main>
		<section>
			<article>
				<h2>Bienvenue</h2>
				<p>Bienvenue sur notre site web de centre de loisirs. Vous pouvez consulter nos activités et animations, ainsi que vous inscrire en tant que membre pour pouvoir profiter de nos services. Nous proposons une variété d'activités pour tous les âges, telles que des sports, des jeux, des ateliers créatifs, etc. Nous avons également des animations spéciales pour les événements et les vacances. N'hésitez pas à parcourir notre site et à nous contacter si vous avez des questions ou si vous souhaitez vous inscrire.</p>
			</article>
			<article>
				<h2>Nos activités</h2>
				<p>Consultez notre liste d'activités pour voir ce que nous proposons. Vous pouvez également filtrer les activités par âge et par date. Pour vous inscrire, connectez-vous à votre compte membre et sélectionnez l'activité qui vous intéresse. Vous pouvez également annuler votre inscription si nécessaire.</p>
			</article>
<article>
<h2>Nos animations</h2>
<p>Découvrez nos animations spéciales pour les événements et les vacances. Nous avons une variété d'animations pour tous les âges, telles que des spectacles, des jeux, des concours, etc. Pour vous inscrire, connectez-vous à votre compte membre et sélectionnez l'animation qui vous intéresse. Vous pouvez également annuler votre inscription si nécessaire.</p>
</article>
</section>
<aside>
<h3>Événements à venir</h3>
<ul>
<li>15 avril - Chasse aux oeufs de Pâques</li>
<li>1er mai - Tournoi de football</li>
<li>15 juillet - Spectacle de magie</li>
</ul>
</aside>
</main>


</div>
</body>
<footer>
<p>© Centre de loisirs 2023</p>
</footer>
</html>
