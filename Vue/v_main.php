    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php 
    require_once('DAO/JeuDAO.php');
    require_once('Modele/Jeu.php');
    $jeuDAO = new JeuDAO();
    $lesNouveautes = $jeuDAO->getNouveautes();
    $lesPopulaires = $jeuDAO->getPopulaires();
    
    include('Vue/v_header.php');
    include('Vue/v_actus.php'); 
    ?>
    
    <div id="tableContainer"> <!-- table contenant la liste de ses propres jeux -->
        <table class="table table-hover table-condensed" id="listPropreJeux">
                <tr style="background-color: white;">
                    <th style="text-align:center;">Jeu</th>
                    <th style="text-align:center;">Age minimum</th>
                    <th style="text-align:center;">Catégorie</th>
                    <th style="text-align:center;">Photo</th>
                    <th style="text-align:center;">Note</th>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
        </table>
      </div>
    </div>
        <div id="en blanc">
            
        </div>
    </div>
    

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Jeux populaires :</h2>
          <p>ici vont les jeux populaires... Cékomssapicétou !!!<p>
          <table class="jeuxaccueil">
              <tr class="trjeuxmain">
                  <th>Jeu</th>
                  <th>Note</th>
              </tr>
              <?php 
              foreach ($lesPopulaires as $leJeu) { 
                  ?>
              <tr>
                  <th><?php echo $leJeu->getNom();?></th>
                  <th><?php echo $leJeu->getNote();?></th>
              </tr>   
                   <?php
              } 
              ?>
          </table>
          <a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Nouveautés</h2>
          <p>Ici vont les nouveautés ... Cékomssapicétou !!!</p>
          <table class="jeuxaccueil">
              <tr class="trjeuxmain">
                  <th>Jeu</th>
                  <th>Note</th>
              </tr>
              <?php 
              foreach ($lesNouveautes as $leJeu) { 
                  ?>
              <tr>
                  <th><?php echo $leJeu->getNom();?></th>
                  <th><?php echo $leJeu->getNote();?></th>
              </tr>   
                   <?php
              } 
              ?>
          </table>
          <a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a>
        </div>
        <div class="col-md-4">
          <h2>Derniers jeux empruntés</h2>
          <p>Ici vont les derniers jeux empruntés .... Cékomssapicétou !!!<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          
        </div>
      </div>

      <hr id="barreH"> <!-- Balise de barre horizontale -->
    </div> <!-- /container -->        
    <?php 
    include('Vue/v_footer.php'); ?>
