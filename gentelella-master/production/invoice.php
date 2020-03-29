<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3><i class="fas fa-truck"></i> Commandes</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <?php
    $sql =$bdd ->query('SELECT * FROM commandes');
      while($commande = $sql -> fetch()){
      echo'
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                        <div class="x_content">
                          <section class="content invoice">
                            <!-- title row -->
                            <div class="row">
                              <div class="col-xs-12 invoice-header">
                                <h1>
                                  <small>
                                  '.$commande['date_commande'].'
                                  </small>
                                  </h1>
                                </div>
                                <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                  <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                      <strong>'.$commande['nom'].' '.$commande['prenom'].'</strong>
                                      <br>'.$commande['adresse'].'
                                      <br>'.$commande['email'].'
                                    </address>
                                  </div>
                                  <div class="col-sm-4 invoice-col">
                                    <b>Commande n°'.$commande['id_commande'].'</b>
                                    <br>
                                    <b>Livraison : '.$commande['livraison'].'</b>
                                    <br>
                                    <b>Paiement : '.$commande['moyen_paiement'].'</b>
                                    <br>
                                    <b>Total commande : '.$commande['total_commande'].'€</b>
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                  <div class="col-xs-12 table">
                                    <table class="table table-striped">
                                      <thead>
                                        <tr>
                                          <th>Qty</th>
                                          <th>Produit</th>
                                          <th style="width: 59%">Description</th>
                                          <th>Subtotal</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>1</td>
                                          <td>Call of Duty</td>
                                          <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica
                                            tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                                          </td>
                                          <td>$64.50</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                </section>
                                </div>
                                </div>
                                </div>
                                </div>
                                ';}
  ?>
</div>