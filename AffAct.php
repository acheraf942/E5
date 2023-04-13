<?php
include("connexion/config.php");
$codeA=$_GET["CODEANIM"];
$recupheure=$bdd->prepare("SELECT * FROM activite WHERE CODEANIM=:code");
        $recupheure->execute(array(
            "code"=>$codeA,
        ));

if($affAct=$recupheure->rowCount()>0){
echo"<section class='card'>";
        while($recup=$recupheure->fetch()){
        $DateAct=$recup["DATEACT"];
        $HRdebutAct=$recup["HRDEBUTACT"];
        $HRfinAct=$recup["HRFINACT"];
        $DateAnnule=$recup["DATEANNULEACT"];
        $prix=$recup["PRIXACT"];
        $etat_Act=$recup["CODEETATACT"];

        $heure=substr($HRdebutAct,0,2); //  Prend les 2 premiers chiffres

        $minute=substr($HRdebutAct,3,2);// Part des : et prends les deux chiffres suivants


        $heureDebut=$heure*60;

        $heureDebut=$heureDebut+$minute;


        $heureFin=substr($HRfinAct,0,2); //  Prend les 2 premiers chiffres

        $minuteFin=substr($HRfinAct,3,2);// Part des : et prends les deux chiffres suivants

        $heureDeFin=$heureFin*60;

        $heureDeFin=$heureDeFin+$minuteFin;

        if($DateAct>=date('Y-m-d')) {
        if(isset($_SESSION["type"])){
         
            
            if($_SESSION["dateFin"]>= $DateAct) { //si la date de fin de l'utiliteur et superieur a la date de l'activite
                if(empty($DateAnnule)){ 
                
                if($place>0) { ?>
                <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .modeleAct {
            display: inline-block;
            position: relative;
            padding: 20px;
            border-radius: 25px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .modeleAct input[type="date"],
        .modeleAct input[type="time"] {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 6px;
            margin-bottom: 10px;
            width: auto;
        }

        .modeleAct label {
            font-weight: bold;
            margin-right: 5px;
        }

        .modeleAct input[type="submit"] {
            background-color: #e0e0e0;
            border: none;
            border-radius: 4px;
            color: #1a1a1a;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
            padding: 8px 16px;
            transition: background-color 0.2s;
        }

        .modeleAct input[type="submit"]:hover {
            background-color: #cccccc;
        }
    </style>

                
                    <div class="modeleAct">
                    <form action="inscract.php" method="POST">
                    <input class="dateAct" type="date" name="dateActivite" id="" readonly value="<?php echo $DateAct ?>"><br>
                    <input class="heureDebutAct" type="time" name="heureDebut" id="" readonly value="<?php echo date('G:i', mktime(0, $heureDebut)); ?>">&ensp; &ensp; &ensp; &ensp; &ensp;
                    <input class="heureFinAct" type="time" name="heureFin" id="" readonly value="<?php echo date('G:i', mktime(0, $heureDeFin)); ?>"><br>
                    <label>prix:</label><?php echo $prix." €"; ?><br>

                    <?php if($etat_Act=="A4"){ ?>
                        <span>L'activites peux etre annulee</span><br>
                        <input type="submit" value="Inscription"> 
                        <?php
                    }

                    if($etat_Act=="A2"){
                    ?>
                    <input type="submit" value="Inscription"> 
                <?php 
                    }
                    if($etat_Act=="A3"){
                        echo"L'activites est annuler";
                    }
                
            
                    ?>
                </form>
                <br>

        <?php
        
        } else{
            echo"<div class='modeleAct'>";
            echo"L'activité n'a plus de place<br>";
        }

    }
    else{
        echo"<div class='modeleAct'>";
        echo"L'activité a été annuler<br>";
        
    }
    } else{
        echo"<div class='modeleAct'>";
        echo"Vous ne pouvez pas vous inscrire a cette activité car votre séjour ce finie avant<br>";
    }
}else{
    echo"<div class='modeleAct'>";
    echo"Vous devez avoir un compte pour pouvoir vous inscrire a une activité<br>";
}
     } else{
        // $actFinie="L'activité est finie";
    // echo"L'activité est finie";
    }




if($_SESSION["type"]=="a" AND $DateAct>=date('Y-m-d') ){
echo"<a href=modif_act.php?DATEACT="?><?php echo $DateAct."&CODEANIM="?><?php echo $get_code ?><?php echo">Modifier l'activité</a>&nbsp; &nbsp; &nbsp;";
echo"<a href=voirinscri.php?DATEACT=$DateAct&CODEANIM=$codeA>voirs inscrip</a> &nbsp; &nbsp; &nbsp;";
echo"<a onclick='AnnuleActEncadrant()' href=annuleract.php?DATEACT=$DateAct&CODEANIM=$codeA>annuler l'activité</a><br>";
}
echo"</div>";
        }
       
        echo"</section>";


    }
    // else{
    //     echo"<section class='PasAct'>";
    //     echo"<div class='modeleNoAct'>";
    //     echo"Il n'y a pas d'activité pour le moment<br>";
    //     echo"<img src='image/renard2.gif' alt='' width='150px'>";
    //     echo"</div>";
    //     echo"</section>";
    // }

?>