<?php
if (isset ($_POST['ajout_categorie'])){
  $uploaddir = '../../images/';
  $uploadfile = $uploaddir . basename($_FILES['image']['name']);
  if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
  } 
  $menu=$_POST['menu'];
  $nom=$_POST['nom'];
  
  $sql =$bdd ->query('INSERT INTO sous_categorie VALUES(NULL,"'.$menu.'","'.$nom.'","'.$_FILES['image']['name'].'")');
}

?>
<div class="">
  <div class="page-title"></div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <form class="form-horizontal form-label-left" method="post" name="form_ajout_produit" enctype="multipart/form-data">
            <span class="section">Ajouter une catégorie</span>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu">Menu <span
                  class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="menu" id="menu" class="form-control">
                <option value="hommes">Hommes</option>
                <option value="femmes">Femmes</option>
                <option value="accessoires">Accessoires</option>
              </select>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nom">Nom <span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nom" name="nom" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">Images <span
                  class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="img" name="image" required 
                  class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <input  type="submit" class="btn btn-success" name="ajout_categorie" value="Valider">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>