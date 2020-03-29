<?php
    require '../pages/connexion.php';
    if(isset($_POST)){
        $id_commande= $_POST['id_commande'];
        $num_commande = $_POST['num_commande'];
        $validation = $_POST['validation'];
        $req = $bdd->prepare('UPDATE commandes SET validation='.$validation.' WHERE id_commande = "'.$num_commande.'"');
        $req -> execute();
        $sup = $bdd->prepare('DELETE FROM cart WHERE id_commande ="'.$id_commande.'" ');
        $sup-> execute();
    }
    else {
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
    
        
    }
?>
