<?php
if (isset ($_POST['enregistrer_info_perso_membre'])){
            $nom_membre=$_POST['nom_membre'];
            $prenom_membre=$_POST['prenom_membre'];
            $adresse_membre=$_POST['adresse_membre'];
            $code_postale_membre=$_POST['code_postale_membre'];
            $ville_membre=$_POST['ville_membre'];
            $sql =$bdd ->query('UPDATE membre SET nom_membre= "'.$nom_membre.'"
            ,prenom_membre= "'.$prenom_membre.'"
            ,adresse_membre="'.$adresse_membre.'"
            ,code_postale_membre="'.$code_postale_membre.'"
            ,ville_membre="'.$ville_membre.'" 
            WHERE id ="'.$_SESSION['id'].'"' );
            echo'
            <script>
                window.location="index.php?page=7";
            </script>
            ';
            }
?>
<div class="container mt-5">
    <div class="row" style="margin:auto;">
        <h2>Mes informations</h2>
    </div>
    <hr class="w-header my-4">
    <form  method="post" name="form_info_perso">
        <div class="row">
            <div class="col-4"><label for="pseudo_inscription">Nom :</label></div>
            <div class="col-4"><input type="text" placeholder="Nom" name="nom_membre" class="form-control"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><label for="e-mail_inscription">Prénom :</label></div>
            <div class="col-4"><input type="text" placeholder="Prénom" name="prenom_membre" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"><label for="mdp_connexion">Adresses :</label></div>
            <div class="col-4"><input type="text" placeholder="Adresse" name="adresse_membre" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"><input type="number" placeholder="Code Postale" name="code_postale_membre"
            class="form-control"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"><input type="text" placeholder="Ville" name="ville_membre" class="form-control">
            </div>
        </div>
        <br>
        <hr class="w-header my-4">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"><input type="submit" name="enregistrer_info_perso_membre" value="Enregistrer" class="btn btn-primary"></div>
        </div>
    </form>
    
</div>
