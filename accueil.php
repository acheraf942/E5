<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Connexion</title>
        </head>
        <body bgcolor="#f3ca20 ">
        
        <div class="login-form">
             <?php
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'mdp':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe faux
                            </div>
                        <?php
                        break;

                        case 'user':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> identiiant incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                <label for="identifiant">Identifiant:</label>
	<input type="text" id="user" name="user" required>
	<br><br>
	<label for="mdp">Mot de passe:</label>
	<input type="password" id="mdp" name="mdp" required>
	<br><br>
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
	        </div>
</body>
</html>
                </div>   
            </form>
        </div>
        <style>
            body {
    background-color: #white;
    font-family: Arial, sans-serif;
}

.login-form {
    width: 360px;
    margin: 50px auto;
    padding: 30px 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    border-radius: 5px;
}

.login-form h2 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
    font-size: 14px;
    margin-bottom: 15px;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
}

.btn {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
}
        </style>
        </body>
</html>
