<?php
    require '../connexion.php';
    if (isset($_POST)) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adress=$_POST['adress'];
        $zip=$_POST['zip'];
        $ville=$_POST['ville'];
        $id_client =$_POST['id_client'];
       
        $requete_membre = $bdd->prepare('UPDATE membre SET nom_membre= "'.$nom.'"
        ,prenom_membre= "'.$prenom.'"
        ,adresse_membre="'.$adress.'"
        ,code_postale_membre="'.$zip.'"
        ,ville_membre="'.$ville.'" 
        WHERE id ="'.$id_client.'"');
        $requete_membre -> execute();
    }
       
    else {
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
    
        
    }
  
        
?>