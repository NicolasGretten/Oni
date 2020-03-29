<?php
    $id=$_GET['id'];
    $req =$bdd->query("SELECT * FROM `article` WHERE id_article = $id");$data =$req->fetch();
        if (isset ($_POST['valider'])){
            $taille=$_POST['taille'];
            $quantite=$_POST['quantite'];
            $couleur=$_POST['couleur'];
            $sql =$bdd ->query('INSERT INTO cart VALUES("'.$taille.'","'.$couleur.'","0","'.$data['libelle_article'].'","'.$data['prix'].'","'.$_SESSION['id_commande'].'","'.$quantite.'")');
            echo'
                <script>
                    window.location="index.php?page=20&id=0";
                </script>
            ';
        }
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 m-auto border">
            <section class="text-center mt-5">
                <h3 class="font-weight-bold mb-5">Détails du produit</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                            data-ride="carousel">
                            <div class="carousel-inner text-center text-md-left mb-5" role="listbox">
                                <div class="carousel-item active">
                                    <img src="images/<?php echo $data['images']; ?>" alt="First slide"
                                        class="img-fluid border">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 text-center text-md-left">
                        <h2
                            class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                            <strong><?php echo $data['libelle_article']; ?></strong>
                        </h2>
                        <br>
                        <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                            <span class="red-text font-weight-bold">
                                <strong><?php echo $data['prix']; ?>€</strong>
                            </span>
                        </h3>
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne1">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1"
                                        aria-expanded="true" aria-controls="collapseOne1">
                                        <h5 class="mb-0">
                                        <i class="fas fa-info"></i> Description
                                            <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseOne1" class="collapse show" role="tabpanel"
                                    aria-labelledby="headingOne1" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <?php echo $data['description']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo2">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx"
                                        href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                        <h5 class="mb-0">
                                        <i class="fas fa-info"></i> détails
                                            <i class="fas fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>
                                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                    data-parent="#accordionEx">
                                    <div class="card-body">
                                    <?php echo $data['details']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="color">
                            <div class="mt-5">
                                <form method="post" name="commande" id="form_commande_article">
                                    <div class="form-group">
                                        <label for="quantite">Quantité : </label>
                                        <select class="form-control" id="quantite" name="quantite">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="taille">Taille : </label>
                                        <select class="form-control" id="taille" name="taille">
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                            <option value="xxl">XXL</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="couleur">Taille : </label>
                                        <select class="form-control" id="couleur" name="couleur">
                                            <option value="noir">Noir</option>
                                            <option value="rouge">Rouge</option>
                                        </select>
                                    </div>
                                    <input type="submit" name="valider" style="float:right;" value="Ajoutez au panier"
                                        class="btn btn-primary btn-rounded mt-5 mb-5">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
    </div>
</div>

</section>
<div class="container my-5 mt-5">
    <section class="dark-grey-text mb-5">
        <h3 class="font-weight-bold text-center mb-5"><i class="fas fa-comment"></i> Commentaires sur le produit</h3>
        <hr class="w-header my-4">
        <div class="container">
        
            <?php
                com($id);
            ?> 
        </div>
    </section>
</div>
<div class="container">
    <h3 class="text-center"><i class="fas fa-comment-medical"></i> Ajouter un commentaire sur ce produit</h3>
    <hr class="w-header my-4">
    <div class="row">
        <div class="container">
        <form method="post" name="commentaire" class="form-group">
            <label for="pseudo_comm"><i class="fas fa-user-edit"></i> Votre pseudo</label>
            <input type="text" name="pseudo_comm" class="form-control mt-2 mb-2" value="Anonyme" id="pseudo_comm">
            <label for="contenu_comm"><i class="fas fa-comments"></i> Votre commentaire</label>
            <input type="text" name="contenu_comm" class="form-control mt-2 mb-2" id="contenu_comm">
            <br>
            <button type="button" value="Valider" class="btn btn-primary" name="validation_comm" id="envoyer">Valider</button>
        </form>
        
        </div>
    </div>
</div>
<script src="build/js/jquery-3.4.1.min.js"></script>
<script>
    function efface_contenu() {
        $('#contenu_comm').val("");
    };

    $("#envoyer").on('click',function(){
    var pseudo_comm =$("#pseudo_comm").val();
    var contenu_comm =$("#contenu_comm").val();
    var id_article = "<?php echo $id;?>";
    var url= 'ajax/ajout_comm.php';
    var dataString = 'pseudo='+pseudo_comm+'&contenu='+ contenu_comm+'&id='+id_article;
        $.ajax({
        url : url,
        method : 'POST',
        data: dataString,
        success: function(data){
            // console.log("success");
            document.location.reload(true);
            // console.log(dataString);
        },
        error: function(data){
            // console.log("error");
            // console.log(dataString);
        }
    });
    efface_contenu();
});
</script>