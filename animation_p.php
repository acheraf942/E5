
<section class="card">
<?php
if ($allanimation->rowCount() > 0) {
    while($anim = $allanimation->fetch()){
        $image=$anim['CODEANIM']; 
        $dateValiditeFR= date('d/m/Y', strtotime($anim['DATEVALIDITEANIM'])); //convertir la date en format FR
        ?>

        
       <?php echo"<div class='modele' style='border-radius: 15px; background: rgb(173,172,188);
background: linear-gradient(90deg, rgba(173,172,188,1) 0%, rgba(204,192,192,0.7682423311121324) 50%, rgba(196,200,201,0.8382703423166141) 99%),url("?><?php echo"imgAnim/".$image.".jpg); background-size: 420px 420px;'>";
        echo"<h1 class='titre'>".$anim['NOMANIM']."</h1>";
        echo"<center>L'animation se finie le ".$dateValiditeFR."</center><br>";
        echo"L'animation duree ".$anim["DUREEANIM"]." minutes<br>";
        echo"<center><p>description :</p></center>";
      echo"<p class='commentaire'>".$anim['DESCRIPTANIM']."</p>";
      echo"<p class='age'>La limite d'âge est de :".$anim['LIMITEAGE']." ans</p>";
      echo"<p class='place'>place(s) :".$anim['NBREPLACEANIM']." place(s) disponible</p>";
      echo"<p class='prix'>prix :".$anim['TARIFANIM']." €</p>";
      echo"La difficulter de cette animation est ".$anim["DIFFICULTEANIM"]."<br>";
      echo"<a class='lien1' href=animation_lien.php?CODEANIM=".$anim['CODEANIM'].">"?><?php echo "voir les activités</a>&ensp; ";
      echo"<a class='lien1' href=selectModifAnim.php?CODEANIM=".$anim['CODEANIM'].">"?><?php echo "Modifier l'animation</a>&ensp; ";
      echo"<a class='lien1' href=AjoutFondImage.php?CODEANIM=".$anim['CODEANIM'].">"?><?php echo "Ajouter une Image</a>";

      if($anim['DATEVALIDITEANIM'] >=date("Y-m-d") ||$anim["CODETYPEANIM"]==="") {

      }
      else{ ?>

      
        <?php
    }
    echo"</div>";
    } ?>
    </section>
    <?php
}
else{
    ?>
    <p>Aucun Résultat...</p>
    <?php
}

?>