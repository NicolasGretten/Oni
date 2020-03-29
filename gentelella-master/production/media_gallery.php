<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="far fa-image"></i> Images <small> Mes produits </small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <?php
          $re =$bdd->query("SELECT * FROM `article`");
            while($data = $re -> fetch()) {
            echo'   <div class="col-md-55">
                      <div class="thumbnail" style="height:400px">
                        <div class="image view view-first" style="height:350px">
                          <img style="width: 100%;height:350px; display: block;" src="../../images/'.$data['images'].'" alt="image" />
                          <div class="mask" style="height:100%;padding-top:120px;">
                            <p>'.$data['description'].'</p>
                          </div>
                        </div>
                        <div class="caption">
                          <p>'.$data['libelle_article'].'</p>
                        </div>
                      </div>
                    </div>';}
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>