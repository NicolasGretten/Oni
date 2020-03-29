<?php 
$id=$_GET['id'];
$re =$bdd->query("SELECT * FROM `article` WHERE id_souscategorie= $id ");
$data = $re -> fetch();
?>
<div class="container-fluid mt-5">
    <div class="row ">
        <div class="col-2 pr-5 border-right">
            <!--Section: Content-->
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
                <!--Grid row-->
                <div class="pt-2">
                    <!--Grid column-->
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
                                    <!-- bloc déroulant -->
                                    <?php
                                        categorie('femmes');
                                    ?>
                                </div>
                            </nav>
                        </div>
                        <!-- <div class="mb-5">
                            <h5 class="font-weight-bold mb-3">Prix</h5>
                            <div class="divider-small mb-3"></div>
                            <form class="range-field">
                                <input type="range" min="0" max="319" />
                            </form>
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-left">
                                    <p class="dark-grey-text"><strong id="resellerEarnings">0$</strong></p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p class="dark-grey-text"><strong id="clientPrice">319$</strong></p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-8 m-auto mt-5">
            <section class="dark-grey-text text-center">
                <h1 class="font-weight-bold mb-4 pb-2"><?php echo $data['libelle_souscategorie']; ?></h1>
                <hr class="w-header my-4">
                <p class="grey-text w-responsive mx-auto mb-5"></p>
                <div class="row">
                    <?php
                        article($id);
                    ?>
                </div>
                <hr class="w-header my-4">
            </section>
        </div>
    </div>
</div>