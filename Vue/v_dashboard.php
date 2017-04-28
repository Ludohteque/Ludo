<?php include('v_header.php'); ?>
<h5>Ma Dashboard :</h5>
<section class="tabs">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
    <label for="tab-1" class="tab-label-1">Mes jeux :</label>

    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
    <label for="tab-2" class="tab-label-2">Mes prêts :</label>

    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
    <label for="tab-3" class="tab-label-3">Mes emprunts :</label>

    <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
    <label for="tab-4" class="tab-label-4">Mes messages :</label>

    <div class="clear-shadow"></div>

    <div class="content">
        <div class="content-1">
            <h2>Liste de mes jeux</h2>
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
                        <td><?php echo $unExemplaire->getIdJeu()->getNom(); ?></td>
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
                        <td><?php echo $unPret->getIdExemplaire()->getIdJeu()->getNom(); ?></td>
                        <td><?php echo $unPret->getIdExemplaire()->getEtat(); ?></td>
                        <td><?php echo $unPret->getDateEmprunts(); ?></td>
                        <td><?php echo $unPret->getDateEmprunts(); ?></td>
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
                        <td><?php echo $unEmprunt->getIdExemplaire()->getIdJeu()->getNom(); ?></td>
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
                                <a class="btn btn-success" href="index.php?uc=dashboard&action=repondre&id=<?php echo $unMessage->getIdDestinataire()->getIdUser();?>">Répondre</a>
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
                            <td><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#corps<?php echo $unMessage->getIdMessage(); ?>">Voir</button></td>
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
                            <td><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#corps<?php echo $unMessage->getIdMessage(); ?>">Voir</button></td>
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
                            <td><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#corps<?php echo $unMessage->getIdMessage(); ?>">Voir</button></td>
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
    </div>
</section>




<?php
include('v_footer.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

