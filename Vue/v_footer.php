<footer>
    <p>&copy; Nous 2017 <?php if (UserDAO::estConnecte()) { ?><a href="index.php?uc=dashboard&action=contactAdmin&id=<?php echo $_SESSION['id']; ?>"><span class="red">Contacter l'administrateur</span></a><?php } ?>
     <a href="index.php?uc=admin&action=demandeNouveaujeu">Demander l'ajout d'un jeu en base de données</a> </p>
    
</footer>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="Vue/js/ism-2.2.min.js"></script>
<script src="vue/js/vendor/bootstrap.min.js"></script>

<script src="vue/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
                function () {
                    (b[l].q = b[l].q || []).push(arguments)
                });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');

    $(document).ready(function () {
        $('#newjeuvld').click(function () {
            checked = $("input[type=checkbox]:checked").length;

            if (!checked) {
                alert("Vous devez choisir au moins une catégorie !");
                return false;
            }

        });
    });


</script>
</body>
</html>