<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Asap&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/carousel.css">
        <link rel="stylesheet" href="assets/css/footer.css">
        <link rel="stylesheet" href="assets/css/<?= $cssFile ?>">
        <title><?= $title ?></title>
    </head>
    <body>
        <!-- Début Modal inscription-->
        <div class="modal fade" id="connection" tabindex="-1" role="dialog" aria-labelledby="connection" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="login-wrap">
                            <div class="login-html">
                                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Se connecter</label>
                                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'inscrire</label>
                                <div class="login-form">
                                    <form class="sign-in-htm" method="POST" action="">
                                        <div class="group">
                                            <label for="userConnection" class="label">Adresse Mail</label>
                                            <input id="userConnection" name="userConnection" type="text" class="input">
                                        </div>
                                        <div class="group">
                                            <label for="passConnection" class="label">Mot de passe</label>
                                            <input id="passConnection" name="passConnection" type="password" class="input" data-type="password">                                            
                                        </div>
                                        <div class="group">
                                            <input type="submit" name="connection" class="button" value="Se connecter">
                                        </div>
                                        <div class="hr"></div>                                        
                                    </form>                                    
                                    <form class="sign-up-htm" method="POST" action="">
                                        <div class="group">
                                            <label for="lastNameInscription" class="label">Nom</label>
                                            <input id="lastNameInscription" name="lastNameInscription" type="text" class="input">                                            
                                        </div>
                                        <div class="group">
                                            <label for="firstNameInscription" class="label">Prenom</label>
                                            <input id="firstNameInscription" name="firstNameInscription" type="text" class="input">                                            
                                        </div>
                                        <div class="group">
                                            <label for="mailInscription" class="label">Adresse mail</label>
                                            <input id="mailInscription" name="mailInscription" type="text" class="input">                                            
                                        </div>
                                        <div class="group">
                                            <label for="passInscription" class="label">Mot de passe</label>
                                            <input id="passInscription" name="passInscription" type="password" class="input" data-type="password">                                            
                                        </div>
                                        <div class="group">
                                            <label for="passValidation" class="label">Répeter le mot de passe</label>
                                            <input id="passValidation" name="passValidation" type="password" class="input" data-type="password">                                            
                                        </div>
                                        <div class="group">
                                            <label for="phoneNumber" class="label">Téléphone</label>
                                            <input id="phoneNumber" name="phoneNumber" type="text" class="input">                                            
                                        </div>
                                        <div class="group">
                                            <input type="submit" name="subscribe" class="button" value="S'inscrire">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin de la Modal inscription-->
        <nav class="nav navbar-expand-lg">
            <div class="container">
                <div id="mainListDiv" class="main_list">    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navlinks sizeNav">
                            <li><a class="navbar-brand" href="accueil">Aut'Occaz</a></li>
                            <li><a class="navbar-brand" href="location">Louer un Véhicule</a></li>
                            <li><a class="navbar-brand" href="achat">Acheter un véhicule</a></li>
                            <li><a class="navbar-brand" href="vente">Vendre un véhicule</a></li>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <li>
                                    <div class="dropdown navbar-brand">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenu1">
                                            <a class="dropdown-item" href="user_panel">Espace personnel</a>
                                            <a class="dropdown-item" href="disconnect">Déconnexion</a>
                                        </div>
                                    </div>

                                </li>
                            <?php } else { ?>
                                <li><button type="button" class="btn btn-light " data-toggle="modal" data-target="#connection"><img id="loginIcon" src="assets/img/login.png" alt="Clé"></button></li>
                            <?php } ?>
                        </ul> 
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars text-white justify-content-center" aria-hidden="true"></i></span>
                    </button>
                </div>
            </div>
        </nav>
        <section class="home">
        </section>
        <!-- Fin de Navbar -->