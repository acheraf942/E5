<?php
require_once'../connexion/config.php';
if(isset($_GET['DATEACT']) AND ! empty($_GET['DATEACT']))
{
	$getdate = $_GET['DATEACT'];
	$recupact = $bdd->prepare("SELECT * FROM activite WHERE DATEACT = ?");
	$recupact->execute(array($getdate));
	if($recupact->rowCount()>0)
	{
		$supract = $bdd->prepare("DELETE FROM activite WHERE DATEACT = ?");
		$supract->execute(array($getdate));
		header('Location: annactivite.php');
	}
	else
	{
		echo "L'identifiant non existant";
	}
}
else
{
	echo "L'identifiant n'a pas été récupéré";
}
?>