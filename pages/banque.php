<?php
global $bdd;
$req = $bdd->query('SELECT * FROM commandes  WHERE id_clients = "'.$_SESSION['id_commande'].'" ORDER BY date_commande DESC ');
$data = $req->fetch();
?>
<div class="container text-center">

    <div><img src="images/logo-CIC.png" alt=""
            style="background-repeat: no-repeat;image-size:contain;width:450px;height:150px;"></div>
    <p>Bonjour <?php echo $data['nom'];?> <?php echo $data['prenom'];?></p>
    <br>
    <p>votre reglement est d'un montant de <?php echo $data['total_commande'];?>€</p>
    <br>
    <p>votre commande est le n° <?php echo $data['id_commande'];?></p>
</div>
<div class="container text-center">
    <div class="row">
        <div class="col-md-3"></div>
    
        <div class="col-md-6 mb-3">
            <label for="cc-name123">Nom sur la carte</label>
            <input type="text" class="form-control" id="cc-name123" placeholder="" required>
            <div class="invalid-feedback">
                le nom de la carte est obligatoire
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mb-3">
            <label for="cc-number123">numéro de carte</label>
            <input type="text" class="form-control" id="cc-number123" required>
            <div class="invalid-feedback">
                le numéro de carte est obligatoire
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3 mb-3">
            <label for="cc-expiration123">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration123" required>
            <div class="invalid-feedback">
            la date d'expiration est obligatoire
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="cc-cvv123">CVV</label>
            <input type="text" class="form-control" id="cc-cvv123" required>
            <div class="invalid-feedback">
            le cvv et obligatoire
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <a href="index.php?page=13">
            <button class="btn btn-primary btn-block" type="submit" id="valider_paiement">Valider</button>
        </a>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<script src="build/js/jquery-3.4.1.min.js"></script>
<script>
$('#valider_paiement').click((e)=>{
    var validation = "true";
    var id_commande = "<?php echo $_SESSION['id_commande']?>";
    var num_commande = <?php echo $data['id_commande']?>;
    var dataString = "num_commande="+num_commande+"&validation="+validation+"&id_commande="+id_commande;
    var url = 'ajax/validation_paiement.php';
    console.log(dataString);
    $.ajax({
    url: url,
    method : "POST",
    data : dataString,
    sucess: function(){
      console.log("succès");
      console.log(dataString);
    },
    error: function(){
        console.log("error");
        console.log(dataString);
    }
  });
  
});

</script>