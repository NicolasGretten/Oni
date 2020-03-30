<?php 
    $id=$_GET['id'];
        
        if (isset($_GET['del'])) {
            $id_to_delete = $_GET['del'];
            $sql =$bdd ->query('DELETE FROM cart WHERE id_panier="'.$id_to_delete.'"');
            }
?>
                    <?php
                        panier($id);
                    ?>
                </tbody>
            </table>
            <div class="container mt-5">
                <section class="dark-grey-text text-center">
                    <h3 class="font-weight-bold mb-4 pb-2"><i class="fas fa-star text-warning"></i> Nos meilleurs Ventes <i class="fas fa-star text-warning"></i></h3>
                    <hr class="w-header my-4">
                    <div class="row">
                        <?php
                        bestsellers();
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
  </div>
  