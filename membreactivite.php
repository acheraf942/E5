<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="post" action="membreactivite.php">
Selection d'une animation:
<select name="codeanim" data-target="">
<?php require_once'config.php';
	$sql ="SELECT CODEANIM, NOMANIM FROM animation";
	foreach  ($bdd->query($sql) as $row)
	{
		echo "<option value=$row[CODEANIM]>$row[NOMANIM]</option>";
	}
?>
</select>
<select name="codeanim" data-target="">
<?php
	$sql ="SELECT CODEANIM, NOMANIM FROM animation";
	foreach  ($bdd->query($sql) as $row)
	{
		echo "<option value=$row[CODEANIM]>$row[NOMANIM]</option>";
	}
?>
</select>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="app.js"></script>
</html>