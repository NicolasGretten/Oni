<div class="bandeauFemmes">
    <div class="titr1 grosTitre">Femmes</div>
</div>

<div class="box">
    <?php
    $re =$bdd->query("SELECT * FROM `sous_categorie` WHERE libelle_categorie='femmes'" );
    while($data = $re -> fetch()) {
       echo' <a href="index.php?page=6&id='.$data['id_souscategorie'].'"><div class="itemGeneral" 
       style="background-image: url('.$data['images'].');grid-area:'.$data['position'].';">
       <span>'.$data['libelle_souscategorie'].'</span></div></a>';
    }
?>
</div>
