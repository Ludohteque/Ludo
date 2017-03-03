    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php 
    include('Vue/v_header.php');
    include('Vue/v_actus.php'); 
    
    if (UserDAO::estConnecte()){include('Vue/v_tablemesjeux.php');} ?>
        <div id="en blanc">
        </div>
    

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Jeux populaires :</h2>
          <p>ici vont les jeux populaires... Cékomssapicétou !!!<p>
              
              <a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Nouveautés</h2>
          <p>Ici vont les nouveautés ... Cékomssapicétou !!!<p><a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Derniers jeux empruntés</h2>
          <p>Ici vont les derniers jeux empruntés .... Cékomssapicétou !!!<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          <table class="jeuxaccueil">
              <tr class="trjeuxmain">
                  <th>Jeu :</th>
                  <th>Note :</th>
              </tr>
              <?php 
              
              //foreach ($lesDerniersJeux as $leJeu) { 
                  
              //}
              
              
              
              ?>
                        
                  
              
              
          </table>
        </div>
      </div>
    </div>
      <hr id="barreH"> <!-- Balise de barre horizontale --> <!-- /container -->        
    <?php 
    include('Vue/v_footer.php'); ?>
