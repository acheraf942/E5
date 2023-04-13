
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création d'un type d'animation</title>
    <link rel="stylesheet" type="text/css" href="general/style.css">
</head>
<?php include('general/barre_nav.php'); ?>
<body>
    <h1>Création d'un type d'animation</h1>
    <form action="insert_type_animation.php" method="POST">
        <label for="type_animation">Code Animation:</label>
        <input type="text" id="type_animation" name="type_animation" required>
        <br>
        <label for="nomtype_animation">Nom Type Animation:</label>
        <input type="text" id="nomtype_animation" name="nomtype_animation" required>
        <br>
        <input type="submit" value="Créer">
    </form>
</body>
</html>
