<?php
require_once('DAO/EvenementDAO.php');
$unevendao = new EvenementDAO();
$mneven1 = $unevendao->findDernierEvenement();
$mneven1->getIdEvenement();
$mneven2 = $unevendao->findDernierEvenement();
$mneven1->getIdEvenement()-1;
$mneven3 = $unevendao->findDernierEvenement();
$mneven1->getIdEvenement()-2;
$mneven4 = $unevendao->findDernierEvenement();
$mneven1->getIdEvenement()-3;
?>


<div class="jumbotron">
      <div class="container">
        <h1>Here comes the actus scroller</h1>
        <p>This space is reserved for the scroller. Put only the scroller here !!!</p>
            <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
        </script>
        <style>
            /* jssor slider bullet navigator skin 05 css */
            /*
            .jssorb05 div           (normal)
            .jssorb05 div:hover     (normal mouseover)
            .jssorb05 .av           (active)
            .jssorb05 .av:hover     (active mouseover)
            .jssorb05 .dn           (mousedown)
            */
            .jssorb05 {
                position: absolute;
            }
            .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                position: absolute;
                /* size of bullet elment */
                width: 16px;
                height: 16px;
                background: url('Vue/img/b05.png') no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb05 div { background-position: -7px -7px; }
            .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
            .jssorb05 .av { background-position: -67px -7px; }
            .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

            /* jssor slider arrow navigator skin 22 css */
            /*
            .jssora22l                  (normal)
            .jssora22r                  (normal)
            .jssora22l:hover            (normal mouseover)
            .jssora22r:hover            (normal mouseover)
            .jssora22l.jssora22ldn      (mousedown)
            .jssora22r.jssora22rdn      (mousedown)
            .jssora22l.jssora22lds      (disabled)
            .jssora22r.jssora22rds      (disabled)
            */
            .jssora22l, .jssora22r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 58px;
                cursor: pointer;
                background: url('Vue/img/a22.png') center center no-repeat;
                overflow: hidden;
            }
            .jssora22l { background-position: -10px -31px; }
            .jssora22r { background-position: -70px -31px; }
            .jssora22l:hover { background-position: -130px -31px; }
            .jssora22r:hover { background-position: -190px -31px; }
            .jssora22l.jssora22ldn { background-position: -250px -31px; }
            .jssora22r.jssora22rdn { background-position: -310px -31px; }
            .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
            .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }
        </style>
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                <div style="position:absolute;display:block;background:url('Vue/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
                
                <div>
                    <div style="position:absolute;top:30px;left:30px;width:480px;height:120px;z-index:0;line-height:60px;"><span class="slidertitle">LES ACTUS !!!!</span></div>
                    <div style="position:absolute;top:300px;left:30px;width:480px;height:120px;z-index:0;line-height:38px;"><span class="slidertext">Toutes les actus de la ludothèque, facilement, simplement, avec du texte, des photos, des boutons si on veut... Génial !!!</span></div>
                </div>
                <a data-u="any" href="http://www.jssor.com" style="display:none">Full Width Slider</a>
                <div>
                    <a id="evenement" href="index.php?uc=evenement&action=affichageEven&id=<?php echo $mneven1->getIdEvenement(); ?>"><img data-u="image" src="<?php $mneven1->getLienImage(); ?>" /></a>
                </div>
                <div>
                    <a id="evenement" href="index.php?uc=evenement&action=affichageEven&id=<?php echo $mneven2->getIdEvenement(); ?>"><img data-u="image" src="<?php $mneven2->getLienImage(); ?>" /></a>
                </div>
                <div>
                    <a id="evenement" href="index.php?uc=evenement&action=affichageEven&id=<?php echo $mneven3->getIdEvenement(); ?>"><img data-u="image" src="<?php $mneven3->getLienImage(); ?>" /></a>
                </div>
                <div>
                    <a id="evenement" href="index.php?uc=evenement&action=affichageEven&id=<?php echo $mneven4->getIdEvenement(); ?>"><img data-u="image" src="<?php $mneven4->getLienImage(); ?>" /></a>
                </div> 
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                <!-- bullet navigator item prototype -->
                <div data-u="prototype" style="width:16px;height:16px;"></div>
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora22l" style="top:0px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
        </div>
        <script type="text/javascript">jssor_1_slider_init();</script>
        <br>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">HERE WE GO !!! &raquo;</a></p>
      </div>
</div>