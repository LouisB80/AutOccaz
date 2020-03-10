<?php
ob_start();
$cssFile = 'user_panel.css';
$title = 'Espace Personnel';
$jsFile = '';
?>
<div id="user_panel" class="container-fluid text-center">
    <h2>Espace Utilisateur</h2>
    <div class="row justify-content-center">
        <div class="card col-md-2 m-2">
            <a href="/user_settings">
                <i class="fa fa-cog fa-5x card-img" aria-hidden="true"></i>
                <p class="card-text">Modifier les infos personnelles</p>
            </a>
        </div>
        <div class="card col-md-2 m-2">
            <a href="/user_cars">
                <i class="fa fa-car fa-5x card-img" aria-hidden="true"></i>
                <p class="card-text">Vos annonces publiées</p>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card col-md-2 m-2">
            <a href="/user_likes">
                <i class="fa fa-heart fa-5x card-img" aria-hidden="true"></i>
                <p class="card-text">Vos annonces sauvegardées</p>
            </a>
        </div>
        <div class="card col-md-2 m-2">
            <a href="#" class="text-danger">
                <i class="fa fa-trash fa-5x card-img" aria-hidden="true"></i>
                <p class="card-text">Désactiver le compte</p>
            </a>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();

