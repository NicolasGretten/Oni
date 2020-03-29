<?php 
        if (isset($_GET['del'])) {
            $id_to_delete = $_GET['del'];
            $sql =$bdd ->query('DELETE FROM article WHERE id_article="'.$id_to_delete.'"');
            }
?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Accueil</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="">
        <div class="x_content">
          <div class="row">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"></i>
                </div>
                <div class="count">
                  <i class="fas fa-users"></i>
                  <?php $sql =$bdd ->query('SELECT COUNT(id) FROM membre');$nmb_inscrit = $sql->fetch();echo $nmb_inscrit['COUNT(id)'];?>
                </div>

                <h3>Membres Inscrit</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"></i>
                </div>
                <div class="count">
                <i class="fas fa-box"></i>
                <?php $sql =$bdd ->query('SELECT COUNT(id_commande) FROM cart');
                          $nmb_commande = $sql->fetch();echo $nmb_commande['COUNT(id_commande)'];?></div>

                <h3>Commandes en cours</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"></i>
                </div>
                <div class="count">
                <i class="fas fa-tshirt"></i>
                <?php $sql =$bdd ->query('SELECT COUNT(id_article) FROM article');
                          $meilleur_vente = $sql->fetch();echo $meilleur_vente['COUNT(id_article)'];?></div>

                <h3>Nombre d'articles</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"></i>
                </div>
                <div class="count">
                <i class="fas fa-truck-loading"></i>                
                <?php $sql =$bdd ->query('SELECT COUNT(id_commande) FROM commandes');$nmb_inscrit = $sql->fetch();echo $nmb_inscrit['COUNT(id_commande)'];?></div>

                <h3>Commandes valider</h3>
              </div>
            </div>
          </div>

          <div class="row top_tiles" style="margin: 10px 0;">
            <div class="col-md-3 tile">
            <i class="fas fa-money-bill-wave"></i><span> Revenue Total</span>
              <h2><?php $sql =$bdd ->query('SELECT SUM(total_commande) FROM commandes');
                          $total = $sql->fetch();echo $total['SUM(total_commande)'];?>€</h2>
              <span class="sparkline_two" style="height: 160px;">
                <canvas width="200" height="60"
                  style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
              </span>
            </div>
          </div>
          <br />
        </div>
      </div>
    </div>
  </div>
</div>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fas fa-database"></i> BDD <small>Toutes mes données</small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Mes articles</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
            <thead>
              <tr>
                <th>id article</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Images</th>
                <th>Libelle sous-catégories</th>
                <th>Id sous-categorie</th>
              </tr>
            </thead>


            <tbody>
            <?php
            $sql =$bdd ->query('SELECT * FROM article');
            while($article = $sql -> fetch()){
              echo'<tr class="text-center">
                <td>'.$article['id_article'].'</td>
                <td>'.$article['libelle_article'].'</td>
                <td>'.$article['prix'].' €</td>
                <td>'.$article['description'].'</td>
                <td ><img style="background-size:contain;width:125px;height:150px;"src="../images/'.$article['images'].'"/></td>
                <td>'.$article['libelle_souscategorie'].'</td>
                <td>'.$article['id_souscategorie'].'</td>
                <td style=""> 
                <a href="index.php?del='.$article['id_article'].'" onclick="return(confirm(\'Voulez-vous supprimer cet article ?\'))"class="btn btn-light">X</a>
            </td>
              </tr>';
            }
            ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Les Membres</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
              <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>e-mail</th>
                <th>pseudo</th>
                <th>adresse</th>
              </tr>
            </thead>

            <tbody style="text-align:center;">
            <?php
            $re =$bdd ->query('SELECT * FROM membre');
            while($membre = $re -> fetch()){
              echo'<tr>
                <td>'.$membre['id'].'</td>
                <td>'.$membre['nom_membre'].'</td>
                <td>'.$membre['prenom_membre'].'</td>
                <td>'.$membre['email'].'</td>
                <td>'.$membre['pseudo'].'</td>
                <td>'.$membre['adresse_membre'].' '.$membre['code_postale_membre'].' , '.$membre['ville_membre'].'</td>
              </tr>';
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Mes sous-catégories</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
              <tr>
                <th>id</th>
                <th></th>
                
                <th>Sexe</th>
                <th>Nom</th>
                <th>Images</th>
              </tr>
            </thead>

            <tbody style="text-align:center;">
            <?php
            $re =$bdd ->query('SELECT * FROM sous_categorie');
            while($sous_cat = $re -> fetch()){
              echo'<tr>
                <td>'.$sous_cat['id_souscategorie'].'</td>
                <th><input type="checkbox" id="check-all" class="flat"></th>
                
                <td>'.$sous_cat['libelle_categorie'].'</td>
                <td>'.$sous_cat['libelle_souscategorie'].'</td>
                <td ><img style="background-size:contain;width:125px;height:150px;"src="../images/'.$sous_cat['images'].'"/></td>
              </tr>';
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>