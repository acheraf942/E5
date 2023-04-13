<?php $dateValiditeFR= date('d/m/Y', strtotime($datev)); //convertir la date en format FR ?>
    <section class="activite" style="border-radius: 15px; background: rgb(173,172,188);
        background: linear-gradient(90deg, rgba(173,172,188,1) 0%, rgba(204,192,192,0.7682423311121324) 50%, rgba(196,200,201,0.8382703423166141) 99%),url(<?php echo"imgAnim/".$image.".jpg); background-size: 420px 420px;"?>">

        <h1 class="titre"><?php echo $titre; ?></h1>

        <p class="DateFin"><?php echo"L'animation se finie le: ".$dateValiditeFR;  ?></p>

        <p><?php echo"L'animation dure ".$duree." minutes" ?></p>
        
        <center><p >Description :</p></center>

        <p class="description"><?php echo$description; ?></p>
        
        <p><?php echo "âge minimum:".$age." ans";?></p>
        
        <p>Prix:<?php echo $prix." €";  ?></p>
        
        <p><?php echo"nombres de place: ".$place;?></p>
        
        <p><?php echo"difficulter: ".$difficulter;?></p>

        <a href="animation_p.php">Retour</a>


</section>