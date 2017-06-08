<!Doctype HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="icon" type="image/ico" href="Vue/img/favicon.ico" />
        <title>Ludothèque</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href="https://fonts.googleapis.com/css?family=Eczar" rel="stylesheet">


        <link rel="stylesheet" href="Vue/css/bootstrap.min.css">
        <link rel="stylesheet" href="Vue/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="Vue/css/myslider.css">
        <link rel="stylesheet" href="Vue/css/main.css">

<!--        <script src="Vue/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="Vue/js/vendor/bootstrap.min.js" type="text/javascript"></script>

        <script src="Vue/js/ism-2.2.min.js"></script>
        <script src="Vue/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <script src="Vue/js/main.js"></script>-->

        <?php require_once('DAO/UserDAO.php'); ?>
    </head>
    <body>
        <div class="modal fade" id="cModal" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3><span class="red">Veuillez confirmer la suppression ...</span></h3>
                </div>
                <div class="modal-body">
                    <p>Etes-vous sûr de vouloir supprimer cet élément ?</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" id="Non">Non</a>
                    <a href="#" class="btn btn-danger" id="Yes">Oui</a>
                </div>
            </div>
        </div>
    </div>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="trophy.png" width="25" height="25"/></a>
                    <a class="navbar-brand" href="index.php">Ludothèque</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" role="form">
                        <span id="welc">Bienvenue <?php
                            if (UserDAO::estConnecte()) {
                                echo $_SESSION['pseudo'];
                            }
                            ?> !</span>
                        <?php
                        if (!UserDAO::estConnecte()) {
                            echo "<a class=\"btn btn-success\" id=\"inscription\" href=\"index.php?uc=inscription&action=demandeInscription\">S'enregistrer</a>";
                            ?><span> </span><?php
                                echo "<a class=\"btn btn-success\" id=\"connexion\" href=\"index.php?uc=connexion&action=demandeConnexion\">S'identifier</a>";
                            }
                            if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                                echo "<a class=\"btn btn-warning\" href=\"index.php?uc=admin&action=demandeAdmin\">Administration</a>";
                                ?><span> </span><?php echo "<a class=\"btn btn-success\" href=\"index.php?uc=dashboard&action=demandeDashboard\">Ma Dashboard</a>";
                                ?><span> </span><?php
                            echo "<a class=\"btn btn-danger\" href=\"index.php?uc=connexion&action=deconnexion\">Déconnexion</a>";
                        } else if (UserDAO::estConnecte()) {
                            echo "<a class=\"btn btn-success\" href=\"index.php?uc=dashboard&action=demandeDashboard\">Ma Dashboard</a>";
                            ?><span> </span><?php
                            echo "<a class=\"btn btn-danger\" href=\"index.php?uc=connexion&action=deconnexion\">Déconnexion</a>";
                        }
                        ?>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>
