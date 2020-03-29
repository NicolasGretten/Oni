<?php
$livraison =$bdd->query("SELECT * FROM mode_livraison");
$data_livraison =$livraison->fetch();
$item_number = strval(rand(1,500));
echo $item_number;
$req=$bdd->query("SELECT * FROM `membre` WHERE id ='". $_SESSION['id']."'");$data = $req->fetch();
if (isset ($_POST['validation_inscription'])){
            $pseudo=$_POST['pseudo_inscription'];
            $mdp=password_hash($_POST['mdp_inscription'], PASSWORD_DEFAULT);
            $email=$_POST['e-mail_inscription'];
            $sql =$bdd ->query('INSERT INTO membre VALUES("0","'.$pseudo.'","'.$mdp.'","'.$email.'","","","","0","")');
            $req = $bdd ->query('SELECT id FROM membre WHERE pseudo = "'.$pseudo.'"');
            $resultat = $req->fetch();
            $_SESSION['id'] = $resultat ['id'];
            
            echo' 
                        <script>
                            window.location="index.php?page=9";
                        </script> ';
            }
            if(isset($_POST['connexion_membre'])){    
                $pseudo_connexion=$_POST['pseudo_connexion'];
                $mdp_connexion =$_POST['mdp_connexion'];
                $req = $bdd ->query('SELECT id,pass FROM membre WHERE pseudo = "'.$pseudo_connexion.'"');
                $resultat = $req->fetch();
                $isPasswordCorrect = password_verify($mdp_connexion, $resultat['pass']);
                
                
           
                    
                if(!$resultat){
                    echo' 
                        <script>
                        alert("mauvais pseudonyme ou mot de passe");
                        </script>
                        ';
                }
                else{
                    if($isPasswordCorrect){
                        $_SESSION['id'] = $resultat ['id'];
                        $_SESSION['pseudo']=$pseudo_connexion;
                        echo' 
                        <script>
                            window.location="index.php?page=9";
                        </script> ';
                    }
                    else{
                        echo' 
                        <script>
                          alert("mauvais pseudonyme ou mot de passe");
                        </script>
                        ';
                    }
                }
            }
            if (isset ($_POST['validation_inscription'])){

            }
?>

<div class="container mt-5">
  <section class="dark-grey-text">
  	<div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8">
            <ul class="nav md-pills nav-justified pills-primary font-weight-bold">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabFacturation" role="tab">1. Facturation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabLivraison" role="tab">2. Livraison</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabPaiement" role="tab">3. Paiement</a>
              </li>
            </ul>
            <div class="tab-content pt-4">
              <div class="tab-pane fade in show active" id="tabFacturation" role="tabpanel">
                <form>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <label for="firstName" class="">Nom</label>
                      <input type="text" id="firstName" class="form-control" 
                      placeholder="<?php
                        if($data['nom_membre'] == false){
                          echo'aucune info';
                      }
                      else{
                        echo '';
                      };
                  
                      ?>"
                      value="<?php
                       if($data['nom_membre'] == false){
                          echo'';
                       }
                       else{
                      echo $data['nom_membre'];
                      };
                      ?>">

                    </div>
                    <div class="col-md-6 mb-2">
                      <label for="lastName" class="">Prenom</label>
                      <input type="text" id="lastName" class="form-control" 
                      placeholder="<?php
                        if($data['prenom_membre'] == false){
                          echo'aucune info';
                      }
                      else{
                        echo '';
                      };
                  
                      ?>
                      "
                      value="<?php 
                      if($data['prenom_membre'] == false){
                          echo'';
                       }
                       else{
                      echo $data['prenom_membre'];
                      };?>">

                    </div>
                  </div>
                  <label for="email" class="">Email (optional)</label>
                  <input type="text" id="email" class="form-control mb-4" 
                  placeholder="<?php
                        if($data['email'] == false){
                          echo'aucune info';
                      }
                      else{
                        echo '';
                      };
                  
                      ?>
                  "
                  value="<?php 
                  if($data['email'] == false){
                    echo'';
                 }
                 else{
                  echo $data['email'];
                };
                  
                  ?>">
                  <label for="address" class="">Address</label>
                  <input type="text" id="address" class="form-control mb-4" 
                  placeholder="<?php
                  if($data['adresse_membre'] == false){
                    echo'aucune info';
                 }
                 else{
                  echo '';
                };
                  
                  ?>"
                  value="<?php
                  if($data['adresse_membre'] == false){
                    echo'';
                 }
                 else{
                  echo $data['adresse_membre'];
                };
                  
                  ?>">
                  <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4">
                      <label for="ville">Ville</label>
                      <input class="form-control" type="text" id="ville" 
                      placeholder="<?php
                        if($data['ville_membre'] == false){
                          echo'aucune info';
                      }
                      else{
                        echo '';
                      };
                  
                      ?>"
                      value="<?php 
                      if($data['ville_membre'] == false){
                        echo'';
                      }
                      else{
                      echo $data['ville_membre'];
                      };
                      ?>"
                      required>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">

                      <label for="zip">Code</label>
                      <input type="text" class="form-control" id="zip" 
                      placeholder="<?php
                        if($data['code_postale_membre'] == false){
                          echo'aucune info';
                      }
                      else{
                        echo '';
                      };
                  
                      ?>"
                      value="<?php 
                      if($data['code_postale_membre'] == false){
                        echo'';
                      }
                      else{
                      echo $data['code_postale_membre'];
                      };
                      ?>">
                      <div class="invalid-feedback">
                        Zip code required.
                      </div>
                    </div>
                  </div>
                  <hr>  
                 </form>
                  <a href="#tabLivraison" data-toggle="tab" role="tab">
                  <button class="btn btn-primary btn-lg btn-block" type="submit" id="next_facturation" name="next_facturation">Suivant</button>
                  </a>
              </div>
              <div class="tab-pane fade" id="tabLivraison" role="tabpanel">
                <div class="row">
                  <form action="">
                      <?php livraison();?>
                  </form>
                </div>
                <hr class="mb-4">
                <a href="#tabPaiement" data-toggle="tab" role="tab">
                  <button class="btn btn-primary btn-lg btn-block" type="submit" id="next_livraison">Suivant</button>
                </a>
              </div>
              <div class="tab-pane fade" id="tabPaiement" role="tabpanel">
                <div class="row">
                    <form action="">
                      <?php
                        paiement();
                      ?>
                  </form>
                </div>
                <hr class="mb-4">
                <!-- <form action="index.php?page=11" method="POST" name="form_paiement"> -->
                  <input type="hidden" value="<?php echo $item_number; ?>" name="item_number">
                    <button class="btn btn-primary btn-lg btn-block" type="button" id="place_order" name="place_order">Commandez</button>
              <!-- </form> -->
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card z-depth-0 border border-light rounded-0">
              <div class="card-body">
                <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">Résumé</h4>
                <hr>
                <?php
                    recap();
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="jquery.js"></script>
<script>

$('#place_order').click((e)=>{
  var paiement = $('input[type=radio][name=paiement]:checked').val();
  var livraison = $('input[type=radio][name=livraison]:checked').val();
  var total = <?php echo sum()?>;
  var email = "<?php echo $data['email'];?>";
  var num_commande = <?php echo $item_number?>;
  var id_session = "<?php echo $_SESSION['id_commande'];?>";
  var id_client = <?php echo $_SESSION['id'];?>;
  var name =$('#firstName').val();
  var prenom=$('#lastName').val();
  var adress =$('#address').val();
  var zip = $('#zip').val();
  var ville = $('#ville').val();
  var url='ajax/next_facturation.php';
  var urldeux='banque.php';
  var num="num_commande="+num_commande;
  var dataString="nom="+name+"&prenom="
  + prenom+"&adress="+ adress+"&zip="+ zip
  +"&ville="+ ville+"&id_client="+id_client+"&id_session="
  +id_session+"&paiement="+paiement+"&livraison="+livraison
  +"&total="+total+"&email="+email+"&num_commande="+num_commande;
  
  $.ajax({
    url: url,
    method : "POST",
    data : dataString,
    success: function(data){
      document.location.href="index.php?page=11";
      
    },
    error: function(data){
        alert("une erreur c'est produite avec votre commandes merci de réessayer ou de contacter le support.")
    }
  });
});
 
</script>