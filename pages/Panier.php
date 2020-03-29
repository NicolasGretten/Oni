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
        </div>
    </section>
  </div>