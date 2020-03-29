<?php if(isset($_POST['connexion_admin'])){    
                $pseudo_connexion=$_POST['pseudo_admin'];
                $mdp_connexion =$_POST['mdp_admin'];
                $req = $bdd ->query('SELECT id,pass FROM compte_admin WHERE pseudo = "'.$pseudo_connexion.'"');
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
                    
                        $_SESSION['identifiant'] = $resultat ['id'];
                        $_SESSION['pseudo_admin']=$pseudo_connexion;
                        echo' 
                        <script>
                            window.location="index.php";
                        </script> ';
                    if($isPasswordCorrect){
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
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form  action="index.php?page=5" method="post" name="connexion_admin">
              <h1>Connexion Admin</h1>
              <div>
                <input type="text" class="form-control" name="pseudo_admin" placeholder="Entrer votre pseudo" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="mdp_admin" placeholder="Entrer votre mot de passe" required="" />
              </div>
              <div>
                <input type="submit" name="connexion_admin" value="Connexion" class="btn btn-default submit">
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="separator"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

