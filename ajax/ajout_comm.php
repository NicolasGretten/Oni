<?php
    require '../pages/connexion.php';
    if(isset($_POST)){
        $pseudo = $_POST['pseudo'];
        $contenu = $_POST['contenu'];
        $id = $_POST['id'];
        $datetime = date('Y-m-d');
        $req = $bdd->prepare('INSERT INTO  commentaires VALUES(NULL ,"'.utf8_decode($contenu).'","'.$id.'","'.utf8_decode($pseudo).'","'.$datetime.'")');
        $req -> execute();
        
    }