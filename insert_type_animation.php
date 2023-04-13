<?php

include('connexion/config.php');


$codeAnimation =$_POST['type_animation'];
$nomtypeAnimation=$_POST['nomtype_animation'];

if(!empty($_POST['type_animation'])AND !empty($_POST['nomtype_animation'])){
    $selectcode =$bdd->prepare('SELECT * FROM type_anim WHERE CODETYPEANIM=:typeanim');
    $selectcode->execute(array(
        "typeanim"=>$codeAnimation,
    ));
    


    $selectnom =$bdd->prepare('SELECT * FROM type_anim WHERE NOMTYPEANIM=:nomanim');
    $selectnom->execute(array(
        "nomanim"=>$nomtypeAnimation,
    ));

    $countselect =$selectcode->rowCount();

    $countnom =$selectnom->rowCount();

    if($countselect===1){
        echo "Veuillez entrez un code qui n'existe pas déja";
     
    }

    elseif($countnom===1){
     echo "Veuillez entrez un nom qui n'existe pas déja";
     
    }
    else{
        $insertype =$bdd->prepare('INSERT INTO type_anim(CODETYPEANIM,NOMTYPEANIM) VALUES (:code_anim,:nom_anim)');
        $insertype->execute(array(
            "code_anim"=>$codeAnimation,
            "nom_anim"=>$nomtypeAnimation,

        ));
        header("Location:animation.php");
    
        echo "votre type d'animation a bien été créer";
    }

}
else{
      echo "Veuillez remplir tous les champs";
}

?>