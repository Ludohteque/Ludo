<?php
require_once('DAO/ExemplaireDAO.php');
$unjeudao = new ExemplaireDAO();
$mesjeux = $unjeudao->findMesJeux($_SESSION['id']);
?>
<div id="tableContainer"> <!-- table contenant la liste de ses propres jeux -->
        <table class="table table-hover table-condensed" id="listPropreJeux">
                <tr style="background-color: white;">
                    <th style="text-align:center;">Jeu</th>
                    <th style="text-align:center;">Age minimum</th>
                    <th style="text-align:center;">Catégorie</th>
                    <th style="text-align:center;">Note</th>
                    <th style="text-align:center;">Photo</th>
                </tr>
                <?php 
              foreach ($mesjeux as $leJeu) {
                  ?>
              <tr>
                  <td><?php echo $leJeu[0];?></td>
                  <td><?php echo $leJeu[1];?></td>
                  <td><?php echo $leJeu[2];?></td>
                  <td><?php echo $leJeu[3];?></td>
                  <td><?php echo $leJeu[4];?></td>
              </tr>   
                   <?php
              } 
              ?>
        </table>
      </div>
    