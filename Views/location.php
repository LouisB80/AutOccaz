<!--<link rel="stylesheet" href="assets/css/styles.css">-->
<?php
ob_start();
$cssFile = 'location.css';
$title = 'Louer un véhicule';
?>
<!-- Debut Louer un véhicule -->
<h2 id="section" class="text-center">Louer un véhicule</h2>
<!-- Fin Louer un véhicule -->
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
        <?php foreach ($rentCarsList as $rentCar): ?>
        <div>
            <img src="<?= $rentCar['source'] ?>" alt="<?= $rentCar['pictureName'] ?>">
            <h3><?= $rentCar['brand'] . ' ' . $rentCar['model'] ?></h3>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- Fin Affichage Base De Donnée -->
</div>
<?php
$content = ob_get_clean();
