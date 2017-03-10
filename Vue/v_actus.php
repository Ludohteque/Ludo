<?php
require_once('DAO/EvenementDAO.php');
$evendao = new EvenementDAO();
$lesEvenements = $evendao->findDernierEvenement();
?>


<div class="jumbotron">
    <div class="containergeneral">
        <h1>Here comes the actus scroller</h1>
        <p>This space is reserved for the scroller. Put only the scroller here !!!</p>

        <div class="ism-slider" data-play_type="loop" data-interval="3000" id="my-slider">
            <ol>
                <li>
                    <a id="evenement" href="index.php?uc=evenement&action=affichageEven&id=<?php echo $lesEvenements[0]->getIdEvenement(); ?>"><img src="<?php echo $lesEvenements[0]->getLienImage(); ?>"></a>
                    <div class="ism-caption ism-caption-0"><?php echo $lesEvenements[0]->getTitre(); ?></div>
                </li>
                <li>
                    <a id="evenement" href="index.php?uc=evenement&action=affichageEven&id=<?php echo $lesEvenements[1]->getIdEvenement(); ?>"><img src="<?php echo $lesEvenements[1]->getLienImage(); ?>"></a>
                    <div class="ism-caption ism-caption-1"><?php echo $lesEvenements[1]->getTitre(); ?></div>
                </li>
                <li>
                    <a id="evenement" href="index.php?uc=evenement&action=affichageEven&id=<?php echo $lesEvenements[2]->getIdEvenement(); ?>"><img src="<?php echo $lesEvenements[2]->getLienImage(); ?>"></a>
                    <div class="ism-caption ism-caption-2"><?php echo $lesEvenements[2]->getTitre(); ?></div>
                </li>
                <li>
                    <a id="evenement" href="index.php?uc=evenement&action=affichageEven&id=<?php echo $lesEvenements[3]->getIdEvenement(); ?>"><img src="<?php echo $lesEvenements[3]->getLienImage(); ?>"></a>
                    <div class="ism-caption ism-caption-1"><?php echo $lesEvenements[3]->getTitre(); ?></div>
                </li>
            </ol>
        </div>
    </div>
</div>
