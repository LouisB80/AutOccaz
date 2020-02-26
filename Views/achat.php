<!--<link rel="stylesheet" href="assets/css/styles.css">-->
<?php
ob_start();
$cssFile = 'achat.css';
$title = 'Acheter un véhicule';
?>
<h2 id="section" class="text-center">Acheter un véhicule</h2>

<div class="container-fluid d-flex justify-content-center">
    <!-- Debut Affichage Base De Donnée -->
    <div id="dataBaseList">
        <div class="input-group justify-content-center" id="search">
            <!-- Début Filtre -->
            <form class="text-center" action="index.html" method="post">
                <select class="marque" name="Marque">
                    <option value="">--Marque--</option>
                    <option value="">Marque(BDD)</option>
                </select>
                <select class="model" name="Model">
                    <option value="">--Modèle--</option>
                    <option value="">Modèle(BDD)</option>
                </select>
                <select class="carburant" name="Carburant">
                    <option value="">--Carburant--</option>
                    <option value="">Carburant(BDD)</option>
                </select>
                <select class="region" name="Region">
                    <option value="Région">--Région--</option>
                    <option value="Diesel">Région(BDD)</option>
                </select>
                <input type="button" class="btn btn-success" name="recherche" value="Recherche">
            </form>
            <!-- Fin Filtre -->
        </div>
        <?php foreach ($sellCarsList as $sellCar): ?>
        <div>
            <img src="<?= $sellCar['source'] ?>" alt="<?= $sellCar['pictureName'] ?>">
            <h3><?= $sellCar['brand'] . ' ' . $sellCar['model'] ?></h3>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- Fin Affichage Base De Donnée -->
</div>
<?php
include 'includes/carousel.php';
$content = ob_get_clean();
