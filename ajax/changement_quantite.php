<?php
    require '../pages/connexion.php';
    if(isset($_POST)){
        $quantite = $_POST['quantite'];
        $libelle_article = $_POST['libelle_article'];
        $id_commande = $_POST['id_commande'];
        $req = $bdd->prepare("UPDATE cart SET quantite ='".$quantite."' WHERE id_commande = '".$id_commande."' AND  id_panier = '".$libelle_article."'");
        $req -> execute();
        
          echo'
          <script src="jquery.js"></script>
        <script>
        location.reload(true);
        </script>';
    }
    else {
        header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
    
        
    }
  
        
?>