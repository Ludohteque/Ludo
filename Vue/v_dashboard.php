<?php include('v_header.php'); ?>
<h5>Ma Dashboard :</h5>
<?php
if (isset($resultat)) {
    echo "<div class='message'>" . $resultat . "</div>";
}
?>
<section class="tabs">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
    <label for="tab-1" class="tab-label-1">Mes jeux :</label>

    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
    <label for="tab-2" class="tab-label-2">Mes prêts :</label>

    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
    <label for="tab-3" class="tab-label-3">Mes emprunts :</label>

    <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
    <label for="tab-4" class="tab-label-4">Mes messages :</label>
    
    <input id="tab-5" type="radio" name="radio-set" class="tab-selector-5" />
    <label for="tab-5" class="tab-label-5">Mon profil :</label>

    <div class="clear-shadow"></div>

    <div class="content">
        <div class="content-1">
            <h2>Liste de mes jeux<div class="right"><a class="btn btn-success" href="index.php?uc=dashboard&action=ajouterExemplaire">Ajouter un jeu</a></div></h2>
            <?php
            $exemplairedao = new ExemplaireDAO();
            $mesExemplaires = $exemplairedao->findParIdUser($_SESSION['id']);
            ?>
            <table class="tableau">
                <tr class="tableauTete">
                    <th>N° Exemplaire</th>
                    <th>Jeu</th>
                    <th>Etat</th>
                    <th>Disponibilité</th>
                </tr>
                <?php
                foreach ($mesExemplaires as $unExemplaire) {
                    ?>
                    <tr>
                        <td><?php echo $unExemplaire->getIdExemplaire(); ?></td>
                        <td><a href='index.php?uc=jeu&action=affichage&id=<?php echo $unExemplaire->getIdJeu()->getIdJeu(); ?>'><?php echo $unExemplaire->getIdJeu()->getNom(); ?></a></td>
                        <td><?php echo $unExemplaire->getEtat(); ?></td>
                        <td><?php echo $unExemplaire->getDisponibilite(); ?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>
        </div>
        <div class="content-2">
            <h2>Liste de mes prêts</h2>
            <?php
            $empruntsdao = new EmpruntDAO();
            $mesPrets = $empruntsdao->getMesPrets($_SESSION['id']);
            ?>  
            <table class="tableau">
                <tr class="tableauTete">
                    <th>N° Exemplaire</th>
                    <th>Jeu</th>
                    <th>Etat</th>
                    <th>Date Emprunt</th>
                    <th>Date Remise</th>
                </tr>
                <?php
                foreach ($mesPrets as $unPret) {
                    ?>
                    <tr>
                        <td><?php echo $unPret->getIdExemplaire()->getIdExemplaire(); ?></td>
                        <td><a href='index.php?uc=jeu&action=affichage&id=<?php echo $unPret->getIdExemplaire()->getIdJeu()->getIdJeu(); ?>'><?php echo $unPret->getIdExemplaire()->getIdJeu()->getNom(); ?></a></td>
                        <td><?php echo $unPret->getIdExemplaire()->getEtat(); ?></td>
                        <td><?php echo $unPret->getDateEmprunts(); ?></td>
                        <td>
                            <?php 
                            if ($unPret->getDateRemise()==null) {
                                ?>
                            <form action="index.php?uc=dashboard&action=remiseJeu" method ="POST">
                                <input value="<?php echo $unPret->getIdEmprunts();?>" name="idEmprunt" type="hidden"/>
                                <button type="submit" class="btn btn-warning">Rendu</button>
                            </form>
                                <?php
                            } else {
                                echo $unPret->getDateRemise();
                            }  
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="content-3">
            <h2>Liste de mes emprunts</h2>
            <?php
            $mesEmprunts = $empruntsdao->getMesEmprunts($_SESSION['id']);
            ?>  
            <table class="tableau">
                <tr class="tableauTete">
                    <th>N° Exemplaire</th>
                    <th>Jeu</th>
                    <th>Etat</th>
                    <th>Date Emprunt</th>
                    <th>Date Remise</th>
                </tr>
                <?php
                foreach ($mesEmprunts as $unEmprunt) {
                    ?>
                    <tr>
                        <td><?php echo $unEmprunt->getIdExemplaire()->getIdExemplaire(); ?></td>
                        <td><a href='index.php?uc=jeu&action=affichage&id=<?php echo $unEmprunt->getIdExemplaire()->getIdJeu()->getIdJeu(); ?>'><?php echo $unEmprunt->getIdExemplaire()->getIdJeu()->getNom(); ?></a></td>
                        <td><?php echo $unEmprunt->getIdExemplaire()->getEtat(); ?></td>
                        <td><?php echo $unEmprunt->getDateEmprunts(); ?></td>
                        <td><?php echo $unEmprunt->getDateEmprunts(); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

        <div class="content-4">
            <h2>Tous vos messages</h2>
            <a class="btn btn-success" href="index.php?uc=dashboard&action=repondreMessage">Nouveau message</a>
            <h3>Demande de prêt - Message envoyés</h3>
            <?php
            $messagedao = new MessageDAO();
            $mesMessages = $messagedao->demandeEmprunt($_SESSION['id'], 'Demande de prêt');
            ?>
            <table class="tableau">
                <tr class="tableauTete">
                    <th>Sujet</th>
                    <th>Destinataire</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($mesMessages as $unMessage) {
                    if ($unMessage->getIdExpediteur()->getIdUser() == $_SESSION['id']) {
                        ?>
                        <tr>
                            <td><?php echo $unMessage->getSujet(); ?></td>
                            <td><?php echo $unMessage->getIdDestinataire()->getPseudo(); ?></td>
                            <td><?php echo $unMessage->getDate() ?></td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#corps<?php echo $unMessage->getIdMessage(); ?>">Voir</button>
                            </td>
                        </tr>
                        <tr id="corps<?php echo $unMessage->getIdMessage(); ?>" class="collapse">
                            <td colspan="100%"><?php echo $unMessage->getCorps() ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <h3>Demande de prêt - Message reçus</h3>
            <table class="tableau">
                <tr class="tableauTete">
                    <th>Sujet</th>
                    <th>Expéditeur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($mesMessages as $unMessage) {
                    if ($unMessage->getIdDestinataire()->getIdUser() == $_SESSION['id']) {
                        ?>
                        <tr>
                            <td><?php echo $unMessage->getSujet(); ?></td>
                            <td><?php echo $unMessage->getIdExpediteur()->getPseudo(); ?></td>
                            <td><?php echo $unMessage->getDate() ?></td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#corps<?php echo $unMessage->getIdMessage(); ?>">Voir</button>
                                <a class="btn btn-success" href="index.php?uc=dashboard&action=repondreMessage&id=<?php echo $unMessage->getIdExpediteur()->getIdUser(); ?>">Répondre</a>
                                <a class="btn btn-success" href="index.php?uc=dashboard&action=demarrerEmprunt&id=<?php echo $unMessage->getIdExpediteur()->getIdUser(); ?>">Démarrer l'emprunt</a>
                            </td>
                        </tr>
                        <tr id="corps<?php echo $unMessage->getIdMessage(); ?>" class="collapse">
                            <td colspan="100%"><?php echo $unMessage->getCorps() ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <h3>Questions diverses - Message envoyés</h3>
            <?php
            $mesMessages = $messagedao->demandeEmprunt($_SESSION['id'], 'Questions diverses');
            ?>
            <table class="tableau">
                <tr class="tableauTete">
                    <th>Sujet</th>
                    <th>Destinataire</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($mesMessages as $unMessage) {
                    if ($unMessage->getIdExpediteur()->getIdUser() == $_SESSION['id']) {
                        ?>
                        <tr>
                            <td><?php echo $unMessage->getSujet(); ?></td>
                            <td><?php echo $unMessage->getIdDestinataire()->getPseudo(); ?></td>
                            <td><?php echo $unMessage->getDate() ?></td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#corps<?php echo $unMessage->getIdMessage(); ?>">Voir</button>
                            </td>
                        </tr>
                        <tr id="corps<?php echo $unMessage->getIdMessage(); ?>" class="collapse">
                            <td colspan="100%"><?php echo $unMessage->getCorps() ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <h3>Questions diverses - Message reçus</h3>
            <?php
            $mesMessages = $messagedao->demandeEmprunt($_SESSION['id'], 'Questions diverses');
            ?>
            <table class="tableau">
                <tr class="tableauTete">
                    <th>Sujet</th>
                    <th>Expéditeur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($mesMessages as $unMessage) {
                    if ($unMessage->getIdDestinataire()->getIdUser() == $_SESSION['id']) {
                        ?>
                        <tr>
                            <td><?php echo $unMessage->getSujet(); ?></td>
                            <td><?php echo $unMessage->getIdExpediteur()->getPseudo(); ?></td>
                            <td><?php echo $unMessage->getDate() ?></td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#corps<?php echo $unMessage->getIdMessage(); ?>">Voir</button>
                                <a class="btn btn-success" href="index.php?uc=dashboard&action=repondreMessage&id=<?php echo $unMessage->getIdExpediteur()->getIdUser(); ?>">Répondre</a>
                            </td>
                        </tr>
                        <tr id="corps<?php echo $unMessage->getIdMessage(); ?>" class="collapse">
                            <td colspan="100%"><?php echo $unMessage->getCorps() ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
        <div class="content-5">
            <?php
            $daouser = new UserDAO();
            $user = $daouser->find($_SESSION['id']);
            ?>
            <h2>Vos informations</h2>
            <form>
                <div class="form-group">
                    <label>Pseudo:</label>
                    <p><?php echo $user->getPseudo();?></p>
                </div>
                <div class="form-group">
                    <label>Ville:</label>
                    <p><?php echo $user->getVille();?></p>
                </div>
                <div class="form-group">
                    <label>Nouvelle ville:</label>
                    <input type="text" class="form-control" name="ville"/>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <p><?php echo $user->getMail();?></p>
                </div>
                <div class="form-group">
                    <label>Nouvelle email:</label>
                    <input type="text" class="form-control" name="mail"/>
                </div>
                <div class="form-group">
                    <label>Téléphone:</label>
                    <p><?php echo $user->getTel();?></p>
                </div>
                <div class="form-group">
                    <label>Nouveau téléphone:</label>
                    <input type="text" class="form-control" name="tel"/>
                </div>
                <div class="form-group">
                    <label>Nouveau mot de passe:</label>
                    <input type="password" class="form-control" name="pass"/>
                </div>
                <div class="form-group">
                    <label>Confirmer mot de passe:</label>
                    <input type="password" class="form-control" name="pass1"/>
                </div>
                
            </form>
        </div>
    </div>
</section>




<?php
include('v_footer.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

