<?php
if (isset ($_POST['ajout_produit'])){
  $uploaddir = '../images/';
$uploadfile = $uploaddir . basename($_FILES['img']['name']);
if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
} 
  $nom=$_POST['nom'];
  $prix=$_POST['prix'];
  $desc=$_POST['desc'];
  $detail=$_POST['detail'];
  $id_sous_cat=$_POST['id_sous_cat'];
  $req = $bdd->query('SELECT * FROM sous_categorie');
  while($sous_cat_comp =  $req->fetch()){
    if($id_sous_cat == $sous_cat_comp['id_souscategorie']){
      $sous_cat =  $sous_cat_comp['libelle_souscategorie'];
    }
  }
  $sql =$bdd ->query('INSERT INTO article VALUES(NULL,"'.$nom.'",'.$prix.',"'.$desc.'","'.$_FILES['img']['name'].'","'.$sous_cat.'",'.$id_sous_cat.', 0, "'.$detail.'")');
}

?>
<div class="">
  <div class="page-title"></div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <form class="form-horizontal form-label-left" method="post" name="form_ajout_produit" action="index.php?page=2" enctype="multipart/form-data">
            <span class="section">Ajouter un article</span>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nom">Nom <span
                  class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nom" class="form-control col-md-7 col-xs-12"name="nom" required="required" type="text">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prix">Prix <span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="prix" name="prix" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span
                  class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="desc" name="desc"  required="required"
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">Images <span
                  class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="img" name="img" required="required" 
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sous_cat">Sous-categorie <span
                  class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="id_sous_cat" id="sous_cat" class="form-control" required>
                <option value="">- - - - - Sélectionner une sous-catégorie - - - - - </option>
                <?php
                  $req = $bdd->query('SELECT * FROM sous_categorie');
                  while($sous_cat =  $req->fetch()){
                    echo'<option value="'.$sous_cat['id_souscategorie'].'">'.$sous_cat['libelle_categorie'].' - '.$sous_cat['libelle_souscategorie'].'</option>';
                  }
                ?>
              </select>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_sous_cat">Détails<span
                  class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea type="text" id="detail" name="detail" required="required" 
                  class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-danger">Annuler</button>
                <input  type="submit" class="btn btn-success" name="ajout_produit" value="Valider">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>