<?php
if(!isset($_SESSION['id'])){
        echo'
                    <div class=contentCategorie>
                    <div style="text-align:center;margin-top:25px;">Mes Informations</div>
                    <p>Connectez vous</p>
                    <p>Nom : </p>
                    <p>Prénom : </p>
                    <p>Adresse : </p>
                    <p>Adresse e-mail : </p> ';
}
else{
        $req =$bdd->query("SELECT * FROM `membre` WHERE id ='". $_SESSION['id']."'");
        $data = $req->fetch();
                    echo'
                    <div class="container mt-5 text-center">
        <div class="row">
                <div class="col-4 m-auto">
                        <div class="card border-primary mb-3" style="max-width: 20rem;">
                                <div class="card-header h3">Mes Informations</div>
                                <div class="card-body">
                                        <h4 class="card-title">Nom</h4>
                                        <p class="card-text">'.$data['nom_membre'].'</p>
                                        <h4 class="card-title">Prénom</h4>
                                        <p class="card-text">'.$data['prenom_membre'].'</p>
                                        <h4 class="card-title">adresse</h4>
                                        <p class="card-text">'.$data['adresse_membre'].' '.$data['code_postale_membre'].' '.$data['ville_membre'].'</p>
                                        <h4 class="card-title">E-mail</h4>
                                        <p class="card-text">'.$data['email'].'</p>

                                </div>
                        </div>
                </div>
        </div>
</div>';
                }
                    

    ?>
    <div class="container text-center">
            <div class="row">
                    <div class="col"><button type="button" class="btn btn-outline-secondary">
                            <a href="index.php?page=10">modifier mes informations</a></button></div>
            </div>
    </div>
    