<footer>
    <p>&copy; Nous 2017 <?php if (UserDAO::estConnecte()) { ?><a href="index.php?uc=dashboard&action=contactAdmin&id=<?php echo $_SESSION['id']; ?>"><span class="red">Contacter l'administrateur</span></a><?php } ?>
     <a href="index.php?uc=admin&action=demandeNouveaujeu">Demander l'ajout d'un jeu en base de données</a> </p>
    
</footer>


<script type="text/javascript" src="Vue/js/vendor/jquery-1.11.2.min.js" ></script>
<script type="text/javascript" src="Vue/js/ism-2.2.min.js"></script>
<script type="text/javascript" src="vue/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="vue/js/main.js"></script>

</body>
</html>
