<?php
ob_start();
$cssFile = 'accueil.css';
$title = 'Bienvenue sur Autocazz';
$jsFile = 'apiActu.js';
?>
<div id="prez" class="mx-auto w-100">
    <p>
        Bienvenue sur Aut'Occaz, site de vente de voiture en ligne entre particulier mais aussi location de véhicule de particulier à particulier.
    </p>
    <p>
        Aut'Occaz a pour but de révolutionner le monde de l'automobile en proposant de nouveaux services visant l'échange entre particulier (location de véhicule, achat, vente).
    </p>
</div>
<!-- Présentation du site -->

<!-- Fin Présentation du site -->
<div class="container-fluid mt-3 mb-3">
    <div class="row justify-content-center" id="accueil">
        <!-- Début Annonces publiées recemment -->
        <div class="col-md-9" >
            <div id="annonces" class="mb-3">
                <article class="forecast text-center">
                    <h2 class="mb-3">Annonces publiées récemment</h2>
                    <?php foreach ($recentCarsList as $recentCars) : ?>
                        <article>
                            <h3><?= $recentCars['brand'] . ' ' . $recentCars['model'] ?></h3>
                            <p>Couleur : <?= $vrecentCars['color'] ?></p>
                        </article>
                    <?php endforeach; ?>                    
                </article>
            </div>
            <div id="carousel">
                <?php require_once 'includes/carousel.php'; ?>
            </div>
        </div>

        <!-- Fin Annonces publiées recemment -->
        <!-- Début Dernières actualitées Automobile -->

        <div class="col-md-2" id="actu">
            <section id="apiAuto">
                <h2 class="mb-3 text-center">Actualités du monde automobile</h2>
            </section>
        </div>
        <!-- Fin Dernières actualitées Automobile -->     
    </div>

</div>
<?php
$content = ob_get_clean();
