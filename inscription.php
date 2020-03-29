<?php if ( empty(session_id()) ) session_start(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h1>Connectez-vous</h1>
            <div class="card">
              <div class="card-body z-depth-2 px-4">
                <div class="md-form mt-3">
                <form action="index.php?page=9" method="post" name="connexion_membres">
                  <i class="fa fa-user prefix grey-text"></i>
                  <input type="text" id="form3" class="form-control" placeholder="Entrer votre pseudo" name="pseudo_connexion">
                  <label for="form3">Your name</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-key prefix grey-text"></i>
                  <input type="text" id="form4" class="form-control" placeholder="Entrer votre mot de passe" name="mdp_connexion">
                  <label for="form4">Your password</label>
                </div>
                <div class="text-center my-3">
                  <button class="btn btn-indigo btn-block" name="connexion_membre" type="submit">Send</button>
                </form>
                </div>
              </div>
            </div>
        </div>
        <div class="col-6">
            <h1>Inscrivez vous</h1>
            <div class="card">
              <div class="card-body z-depth-2 px-4">
                <div class="md-form mt-3">
                <form action="index.php?page=9" method="post" name="inscription_nouveaux_membres">
                  <i class="fa fa-user prefix grey-text"></i>
                  <input type="text" id="form3" class="form-control" placeholder="Entrer votre pseudo" name="pseudo_inscription">
                  <label for="form3">Your name</label>
                </div>
                <div class="md-form mt-3">
                  <i class="fa fa-mail prefix grey-text"></i>
                  <input type="text" id="form3" class="form-control" placeholder="Entrer votre e-mail" name="e-mail_inscription">
                  <label for="form3">E-mail</label>
                </div>
                <div class="md-form">
                  <i class="fas fa-key prefix grey-text"></i>
                  <input type="text" id="form4" class="form-control" placeholder="Entrer votre mot de passe" name="mdp_inscription">
                  <label for="form4">Your password</label>
                </div>
                <div class="text-center my-3">
                  <button class="btn btn-indigo btn-block" name="validation_inscription" value="Inscription" type="submit">Send</button>
                </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
