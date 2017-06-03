<?php
require_once('DAO/ExemplaireDAO.php');
$unjeudao = new ExemplaireDAO();
$mesjeux = $unjeudao->findParIdUser($_SESSION['id']);
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
              <tr class="small">
                  <td><a href='index.php?uc=jeu&action=affichage&id=<?php echo $leJeu->getIdJeu()->getIdJeu(); ?>'><?php echo $leJeu->getIdJeu()->getNomJeu() ;?></a></td>
                  <td><?php echo $leJeu->getIdJeu()->getIdAge()->getAgeMin() . " / " . $leJeu->getIdJeu()->getIdage()->getAgeMax(); ?></td>
                  <td><?php 
                    foreach ($leJeu->getIdJeu()->getLesCategories() as $unecategorie) {
                        echo $unecategorie. "<br>";
                    }
                    ?></td>
                  <td><?php echo $leJeu->getIdJeu()->getNote(); ?></td>
                  <td><?php if ($leJeu->getIdJeu()->getImage()) { ?><img width="150" height="100" src="Vue/img/jeu/<?php echo $leJeu->getIdJeu()->getImage(); ?>" /><?php } ?>
                  </td>
              </tr>   
                   <?php
              } 
              ?>
        </table>
      </div>
    