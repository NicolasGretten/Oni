<div class="container mt-5">
    <h1 class="text-center"><i class="fas fa-truck-loading"></i> Mes commandes</h1>
    <table class="table table-hover mt-5 text-center">
    <thead>
        <tr>
        <th scope="col"><i class="fas fa-barcode"></i> numéro de ma commande</th>
        <th scope="col">Date</th>
        <th scope="col">Total</th>
        <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $req = $bdd->query('SELECT * FROM commandes WHERE id_membre = '.$_SESSION['id'].'');
        while($commandes =  $req->fetch()){
            if($commandes['validation'] == 1){
                $status = "commande payée";
            }
            else{
                $status = "commande en attente de payement";
            }
            echo '<tr>
        <th scope="row">'.$commandes['id_commande'].'</th>
        <td>'.$commandes['date_commande'].'</td>
        <td>'.$commandes['total_commande'].' €</td>
        <td>'.$status.'</td>
        </tr>';
        }
    ?>
    </tbody>
    </table>
</div>