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
                    <img src="Vue/img/slider_1.jpg">
                    <div class="ism-caption ism-caption-0">Titre 1</div>
                </li>
                <li>
                    <img src="Vue/img/slider_2.jpg">
                    <div class="ism-caption ism-caption-0">Titre 2</div>
                </li>
                <li>
                    <img src="Vue/img/slider_3.jpg">
                    <div class="ism-caption ism-caption-0">Titre 3</div>
                </li>
                <li>
                    <img src="Vue/img/slider_4.jpg">
                    <div class="ism-caption ism-caption-0">Titre 3</div>
                </li>
            </ol>
        </div>
    </div>
</div>