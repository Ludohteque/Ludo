<?php
$evendao = new EvenementDAO();
$lesEvenements = $evendao->findDernierEvenement();
?>


<div class="jumbotron">
    <div class="containergeneral">
        <?php if (UserDAO::estConnecte()) { ?><h1>Ma ludothèque</h1> <?php } else { ?>
            <p>inscrivez-vous pour avoir accès à votre ludothèque !!!</p><?php } ?></br>

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
