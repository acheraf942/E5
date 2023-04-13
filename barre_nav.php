<link rel="stylesheet" type="text/css" href="style.css">
       
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