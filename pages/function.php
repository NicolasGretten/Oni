<?php
require 'connexion.php';

function categorie($categorie){

    global $bdd;

    $re =$bdd->query('SELECT * FROM sous_categorie WHERE libelle_categorie="'.$categorie.'"');
    while($data = $re -> fetch()) {
    echo '<a class="dropdown-item" href="index.php?page=6&id='.$data['id_souscategorie'].'">'.$data['libelle_souscategorie'].'</a>';

    }
}

function inc(){

    global $bdd;

    if(isset($_GET['page'])) {
        $page=$_GET["page"];

       if($page ==4){
        include('pages/mes_commandes.php');
       } 
       elseif($page ==6){
           include('pages/product.php');
       }    
       elseif($page ==7){
           include('pages/Informationscompte.php');
       }    
       elseif($page ==8){
           include('pages/inscription.php');
       }    
       elseif($page ==9){
           include('pages/paiement.php');
       }    
       elseif($page ==10){
           include('pages/formulaireInfoPerso.php');
       }    
       elseif($page ==11){
           include('pages/banque.php');
       }    
       elseif($page ==13){
           include('pages/paiement_accepter.php');
       }    
       elseif($page ==20){
           include('pages/Panier.php');
       }    
       elseif($page ==21){
           include('pages/CompteUtilisateur.php');
       }    
       elseif($page ==23){
           include('pages/Apropos.php');
       }    
       elseif($page ==24){
           include('pages/Article.php');
       }    
       else{
           include('pages/accueil.php');
       }
   }
   else {
       include('pages/accueil.php');
   }
}

function sum(){
    global $bdd;
    $req_somme = $bdd->query("SELECT SUM(prix*quantite) FROM `cart`WHERE id_commande ='". $_SESSION['id_commande']."'");
    $data_sept = $req_somme -> fetch();
    return $data_sept['SUM(prix*quantite)']; 
}

function commandez(){
    if(empty($_SESSION['id']))
    return 'index.php?page=8';
    else{
    return 'index.php?page=9';
    }
}
function bestsellers(){
    global $bdd;
    $req = $bdd->query("SELECT * FROM article WHERE bestsellers = 1");
    for($i = 0; $i < 3; $i++){
        while($data = $req-> fetch()){
            echo '
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card align-items-center">
                <div class="view overlay"  style="width:255px;height:385px;">
                <div style="background-image:url(\'images/'.$data['images'].'\');background-size:contain;
                background-repeat:no-repeat;background-position:center;" class="img-fluid w-100 h-100"></div>
                    
                    <a>
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body text-center">
                    <a href="index.php?page=6&id='.$data['id_souscategorie'].'" class="grey-text">
                    <h6>'.$data['libelle_souscategorie'].'</h6>
                    </a>
                    <h5 class="mb-3">
                    <strong>
                        <a href="index.php?page=24&id='.$data['id_article'].'" class="dark-grey-text">'.$data['libelle_article'].'
                        </a>
                    </strong>
                    </h5>
                    <h5 class="font-weight-bold blue-text mb-0">
                    <strong>'.$data['prix'].'</strong>
                    </h5>
                </div>
                </div>
            </div>
            ';
    }};
}
function article($id)
{
    global $bdd;
    $re =$bdd->query("SELECT * FROM `article` WHERE id_souscategorie= $id ");
    while ($data = $re -> fetch()) {
        echo'
        
    <div class="col-12 col-lg-6 col-xl-3 mb-5 mt-5">
      <div class="card align-items-center">
        <div class="view overlay img-fluid p-3" style="width:285px;height:385px;">
        <div style="background-image:url(\'images/'.$data['images'].'\');background-size:contain;background-repeat:no-repeat;background-position:center;" class="img-fluid pt-5 w-100 h-100"></div>
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
        <div class="card-body text-center">
          <a href="" class="grey-text">
            <h6>'.$data['libelle_souscategorie'].'</h6>
          </a>
          <h5 class="mb-3">
            <strong>
              <a href="index.php?page=24&id='.$data['id_article'].'" class="dark-grey-text">'.$data['libelle_article'].'
              </a>
            </strong>
          </h5>
          <h5 class="font-weight-bold blue-text mb-0">
            <strong>'.$data['prix'].'€</strong>
          </h5>
        </div>
      </div>
    </div>';
    }
}

    function panier($id)
    {
        global $bdd;
        $commande =$bdd->query("SELECT * FROM `cart` WHERE id_commande ='". $_SESSION['id_commande']."' ORDER BY id_panier");
        $verif_commande =$commande->fetch();
        
        $re =$bdd->query("SELECT * FROM `cart` WHERE id_commande ='". $_SESSION['id_commande']."' ORDER BY id_panier");
        if ($verif_commande == false) {
            echo '
            <h1 style="text-align:center;" class="mt-5">Votre panier est vide ! 
            <i class="fas fa-frown"></i><i class="fas fa-heart-broken"></i></h1>
            <div class="container mt-5">
              <div class="row">
                <div class="col text-center h5">Continuer vos achats en suivant ce <a href="index.php" class="h3 text-danger">
                <i class="fas fa-bolt"></i> lien ! <i class="fas fa-bolt"></i></a></div>
              </div>
            </div>
            ';
        } else {
            echo'
        <div class="container my-5 py-3 z-depth-1 rounded">
        <h1>Mon panier</h1>
        <section class="dark-grey-text mt-5">
          <div class="table-responsive">
            <table class="table product-table mb-0">
              <thead class="mdb-color lighten-5">
                <tr>
                <th class="font-weight-bold">
                    <strong>Articles</strong>
                  </th>
                  <th></th>
                  <th></th>
                  <th class="font-weight-bold">
                    <strong>QTY</strong>
                  </th>
                  <th class="font-weight-bold">
                    <strong>Prix / total</strong>
                  </th>
                  <th></th>
                </tr>
              </thead>
        ';
            while ($data = $re -> fetch()) {
                echo'  
                    <tbody>

                        <!-- First row -->
                        <tr>
                            <td>
                            <h5 class="mt-3">
                                <strong>'.$data['libelle_article'].'</strong>
                            </h5>
                            <p class="text-muted">'.$data['libelle_article'].'</p>
                            </td>
                            
                            <td></td>
                            <td>'.$data['prix'].'€</td>
                            <td>
                            <input type="number" value="'.$data['quantite'].'" aria-label="Search" class="form-control" style="width: 100px" id="'.$data['id_panier'].'" >
                            </td>
                            <td class="font-weight-bold">
                            <strong id="strong_'.$data['id_panier'].'">'.$data['prix']*$data['quantite'].'€</strong>
                            </td>
                            <td>
                            <a href="index.php?page=20&id='.$id.'&del='.$data['id_panier'].'" onclick="return(confirm(\'Voulez-vous supprimer cet article ?\'))" ">X</a>
                            </td>
                        </tr>
                        <script src="jquery.js"></script>
                        <script>
                          $("#'.$data['id_panier'].'").change(function(e){
                            var url = "ajax/changement_quantite.php";
                            var changement = $("#'.$data['id_panier'].'").val();
                            var libelle_article = "'.$data['id_panier'].'";
                            var commande = "'.$_SESSION['id_commande'].'";
                            var dataString = "quantite="+changement+"&libelle_article="+ libelle_article+"&id_commande="+ commande;
                            console.log(dataString);
                            $.ajax({
                              url : url,
                              method : "POST",
                              data: dataString,
                              sucess: function(){
                                console.log("succès");
                              },
                              error: function(){
                                  console.log("error");
                              }
                          });
                        });
                        </script>
                    ' ;
            }
        }
        if (isset($_POST['valider'])) {
            $sql =$bdd ->query('UPDATE cart SET quantite =""  WHERE id_panier="'.$data_huit['id_panier'].'"');
        }
  
        if ($verif_commande == false) {
            echo '';
        } else {
            echo '
    <tr>
            <td colspan="3"></td>
            <td>
              <h4 class="mt-2">
                <strong>Total</strong>
              </h4>
            </td>
            <td class="text-right">
              <h4 class="mt-2">
                <strong>'.sum().'</strong>
              </h4>
            </td>
            <td colspan="3" class="text-right">
            <a style="text-decoration:none;color:white;" href="'.commandez().'">
              <button class="btn btn-primary">
              Commandez</button></a>
            </td>
          </tr>
    ';
        }
    }

    function livraison(){

        global $bdd;
        $livraison =$bdd->query("SELECT * FROM mode_livraison");
        while($data_livraison =$livraison->fetch()){
            echo'
                <div class="row">
                  <div class="col-md-5 mb-4">
                    <img src="'.$data_livraison['images'].'" class="img-fluid z-depth-1-half"
                      alt="Second sample image">
                  </div>
                  <div class="col-md-7 mb-4">
                    <h5 class="mb-3 h5">'.$data_livraison['libelle_livraison'].'</h5>
                    <p>'.$data_livraison['description'].'</p>
                    <input type="radio" value="'.$data_livraison['libelle_livraison'].'"id="'.$data_livraison['libelle_livraison'].'" name="livraison"> 
                    <label for="'.$data_livraison['libelle_livraison'].'">Choisir ce mode de livraison</label>
                  </div>
                </div>
                
            ';
        }
    }

    function paiement(){

      global $bdd;
      $paiement =$bdd->query("SELECT * FROM mode_paiement");
      while($mode_paiement =$paiement->fetch()){
          echo'
              <div class="row">
                <div class="col-md-5 mb-4">
                  <img src="'.$mode_paiement['images'].'" class="img-fluid z-depth-1-half"
                    alt="Second sample image">
                </div>
                <div class="col-md-7 mb-4">
                  <h5 class="mb-3 h5">'.$mode_paiement['libelle_paiement'].'</h5>
                  <input type="radio" value="'.$mode_paiement['libelle_paiement'].'"id="'.$mode_paiement['libelle_paiement'].'" name="paiement"> 
                    <label for="'.$mode_paiement['libelle_paiement'].'">Choisir ce mode de livraison</label>
                </div>
              </div>
          ';
      }
  }



    function recap()
    {
        global $bdd;
        $re =$bdd->query("SELECT * FROM `cart` WHERE id_commande ='". $_SESSION['id_commande']."' ORDER BY id_panier");
            while ($data = $re -> fetch()) {
                echo' 
                    <dl class="row">
                        <dd class="col-sm-8">
                        '.$data['libelle_article'].'
                        </dd>
                        <dd class="col-sm-4">
                            '.$data['prix']*$data['quantite'].' €
                        </dd>
                    </dl>
                    <hr>' ;
            }
            echo' <dl class="row">
            <dt class="col-sm-8">
              Total
            </dt>
            <dt class="col-sm-4">
              '.sum().' €
            </dt>
          </dl>
        </div>';
        }

        function com($id){
          global $bdd;
          $req = $bdd -> query("SELECT * FROM commentaires WHERE id_article =".$id."");
            while($data_commentaires = $req->fetch()){
                  echo'
                      <div class="media mb-3">
                          <div class="media-body">
                              <a>
                                  <h5 class="user-name font-weight-bold">'.$data_commentaires['auteurs'].'</h5>
                              </a>
                              <div class="card-data">
                                  <ul class="list-unstyled mb-1">
                                      <li class="comment-date font-small grey-text">
                                          <i class="far fa-clock"></i> '.$data_commentaires['date_commentaires'].'</li>
                                  </ul>
                              </div>
                              <p class="dark-grey-text article">'.$data_commentaires['contenu_commentaires'].'</p>
                          </div>
                      </div>
                      ';
                  }
        }
        
?>