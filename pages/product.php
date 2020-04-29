<?php 
$id=$_GET['id'];
$re =$bdd->query("SELECT * FROM `article` WHERE id_souscategorie= $id ");
$data = $re -> fetch();
?>
<div class="container-fluid mt-5">
    <div class="row ">
        <!-- <div class="col-2 pr-5 border-right">
            <section class="">
                <style>
                    .link-black a {
                        color: black;
                    }

                    .link-black a:hover {
                        color: #0056b3;
                    }

                    .link-black .active {
                        color: #0056b3;
                    }

                    .divider-small {
                        width: 30px;
                        background-color: rgba(0, 0, 0, .1);
                        height: 3px;
                    }
                </style>
                <div class="pt-2">
                    <div class=" col-sm-12 m-auto ">
                        <div class="mb-5">
                        <h5 class="font-weight-bold mb-3">Catégories</h5>
                            <div class="divider-small mb-3"></div>
                            <nav class="nav flex-column">
                                <h5>Hommes</h5>
                                <div class="dropdown">
                                    <?php
                                        categorie('hommes');
                                    ?>
                                </div>
                                <h5 class="mt-3">Femmes</h5>
                                <div class="dropdown">
                                    <?php
                                        categorie('femmes');
                                    ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
        </div> -->
        <div class="col-md-8 m-auto mt-5">
            <section class="dark-grey-text text-center">
                <h1 class="font-weight-bold mb-4 pb-2"><?php echo $data['libelle_souscategorie']; ?></h1>
                <hr class="w-header my-4">
                <div class="row">
                    <?php
                        article($id);
                    ?>
                </div>
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col border p-5 mr-2">
                            <div class="row mb-4">
                                <div class="col h3">Rejoignez la communauté ! </div>
                            </div>
                            <div class="row">
                                <div class="col"><a href=""><i class="fab fa-facebook fa-3x text-info"></i></a></div>
                                <div class="col"><a href=""><i class="fab fa-instagram fa-3x text-info"></i></a></div>
                                <div class="col"><a href=""><i class="fab fa-twitter fa-3x text-info"></i></a></div>
                                <div class="col"><a href=""><i class="fab fa-youtube fa-3x text-info"></i></a></div>
                            </div>
                        </div>
                        <div class="col border p-5 ml-2">
                            <div class="row mb-4">
                                <div class="col h3">Modes de paiement et sociétés de livraison </div>
                            </div>
                            <div class="row">
                                <div class="col"><i class="fab fa-paypal fa-3x text-info"></i></div>
                                <div class="col"><i class="fab fa-cc-mastercard fa-3x text-info"></i></div>
                                <div class="col"><i class="fab fa-ups fa-3x text-info"></i></div>
                                <div class="col"><i class="fab fa-dhl fa-3x text-info"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>