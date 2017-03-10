<!-- Main jumbotron for a primary marketing message or call to action -->
<?php

include('Vue/v_header.php');
include('Vue/v_actus.php');

if (UserDAO::estConnecte()) {
    include('Vue/v_tablemesjeux.php');
}
?>


<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Jeux populaires :</h2>
            <p>ici vont les jeux populaires... Cékomssapicétou !!!<p>
            <table class="tableau">
                <tr class="tableauTete">
                    <th>Jeu</th>
                    <th>Note</th>
                </tr>
                <?php
                foreach ($lesPopulaires as $leJeu) {
                    ?>
                    <tr>
                        <td><a href='index.php?uc=jeu&action=affichage&id=<?php echo $leJeu->getIdProduit(); ?>'><?php echo $leJeu->getNom(); ?></a></td>
                        <td><?php echo $leJeu->getNote(); ?></td>
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
            <table class="tableau">
                <tr class="tableauTete">
                    <th>Jeu</th>
                    <th>Note</th>
                </tr>
                <?php
                foreach ($lesNouveautes as $leJeu) {
                    ?>
                    <tr>
                        <td><?php echo $leJeu->getNom(); ?></td>
                        <td><?php echo $leJeu->getNote(); ?></td>
                    </tr>   
                    <?php
                }
                ?>
            </table>
            <a class="btn btn-default" href="#" role="button">Voir plus &raquo;</a>
        </div>
        <div class="col-md-4">
            <h2>Derniers jeux empruntés</h2>
            <p>Ici vont les derniers jeux empruntés .... Cékomssapicétou !!!<p>
            <table class="tableau">
                <tr class="tableauTete">
                    <th>Jeu</th>
                    <th>Date d'emprunt</th>
                    <th>Note</th>
                </tr>
                <?php
                foreach ($lesEmpruntes as $unEmprunt) {
                    ?>
                    <tr>
                        <td><?php echo $unEmprunt->getIdExemplaire()->getIdJeu()->getNom(); ?></td>
                        <td><?php echo $unEmprunt->getDateEmprunts(); ?></td>
                        <td><?php echo $unEmprunt->getIdExemplaire()->getIdJeu()->getNote(); ?></td>
                    </tr>   
                    <?php
                }
                ?>
            </table>
            <a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>

    <hr id="barreH"> <!-- Balise de barre horizontale -->
</div> <!-- /container -->        
<?php include('Vue/v_footer.php'); ?>
