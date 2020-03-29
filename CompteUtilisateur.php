<?php if(isset($_POST['connexion_membre'])){    
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
                        // echo "vous etes co";
                        // print_r($_SESSION);
                        echo' 
                        <script>
                            window.location="index.php";
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
?>
<!-- <div class="modal-cont" >
    <div class="box_modal" style="margin:auto;">
        <p>Déjà membre ? Connectez vous</p>
        <form action="index.php?page=21" method="post" name="connexion_membres">
            <label for="uname">Pseudo</label>
                <input type="text" placeholder="Entrer votre pseudo" name="pseudo_connexion" class="input_connection">
                <label for="psw">Mot de passe</label>
                <input type="password" placeholder="Entrer votre mot de passe" name="mdp_connexion" class="input_connection">
                <input type="submit" name="connexion_membre" value="Connexion">
        </form> 
</div> -->
<div class="container-fluid mt-3">
  <section style="background-image: url('images/clem-onojeghuo-HpEDSZukJqk-unsplash.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask d-flex justify-content-center align-items-center">
      <div class="container py-5 my-5">
        <h3 class="font-weight-bold text-center text-white pb-2">Connexion</h3>
        <p class="lead text-center text-white pt-2 mb-5">Connectez vous pour profitez plainement de votre expérience chez Lux</p>
        <div class="row d-flex align-items-center justify-content-center">
          <div class="col-md-6 col-xl-5">
            <div class="card">
              <div class="card-body z-depth-2 px-4">
              <form action="index.php?page=21" method="post" name="connexion_membres">
                <div class="md-form mt-3">
                  <i class="fa fa-user prefix grey-text"></i>
                  <input type="text" id="form3" class="form-control input_connection" placeholder="Entrer votre pseudo" name="pseudo_connexion">
                  <label for="form3">Pseudo</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-key prefix grey-text"></i>
                  <input id="form4" class="form-control input_connection" type="password" placeholder="Entrer votre mot de passe" name="mdp_connexion">
                  <label for="form4">Votre mot de passe</label>
                </div>
                <div class="text-center my-3">
                <button type="submit" class="btn btn-primary" value="Connexion" name="connexion_membre">Connexion</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>