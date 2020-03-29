<?php
    require '../pages/connexion.php';
    if (isset($_POST)) {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adress=$_POST['adress'];
        $zip=$_POST['zip'];
        $ville=$_POST['ville'];
        $id_client =$_POST['id_client'];
        $id_session=$_POST['id_session'];
        $paiement =$_POST['paiement'];
        $livraison =$_POST['livraison'];
        $total=$_POST['total'];
        $email=$_POST['email'];
        $num_commande=$_POST['num_commande'];
        $today = date("Y-m-d H-i-s");
        
        $requete_commande =$bdd ->prepare('INSERT INTO commandes VALUES("'.$num_commande.'","'.$id_session.'",
       "'.$total.'" ,"'.$paiement.'","'.$livraison.'",
        "'.$nom.'","'.$prenom.'","'.$adress.'","'.$email.'","'.$today.'", false , "'.$id_client.'")');
        $requete_commande -> execute();
    }
    else {
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
    
        
    }
  
        
?>