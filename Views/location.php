<!--<link rel="stylesheet" href="assets/css/styles.css">-->
<?php
ob_start();
$cssFile = 'location.css';
$title = 'Louer un véhicule';
?>
<!-- Debut Louer un véhicule -->
<h2 id="section" class="text-center">Louer un véhicule</h2>
<!-- Fin Louer un véhicule -->
<div class="container-fluid">
    <div class="row justify-content-center " >
        <!-- Debut Affichage Base De Donnée -->
        <div class="input-group col-md-2 mr-2" id="search">
            <!-- Début Filtre -->
            <form class="text-center form-group w-100" action="index.html" method="post">
                <div>
                    <select class="marque form-control bg-dark text-light" name="Marque">
                        <option value="">--Marque--</option>
                        <option value="">Marque(BDD)</option>
                    </select>
                </div>
                <div class="mt-3">
                    <select class="model form-control bg-dark text-light" name="Model">
                        <option value="">--Modèle--</option>
                        <option value="">Modèle(BDD)</option>
                    </select>
                </div>
                <div class="mt-3"> 
                    <select class="carburant form-control bg-dark text-light" name="Carburant">
                        <option value="">--Carburant--</option>
                        <option value="">Carburant(BDD)</option>
                    </select>
                </div>
                <div class="mt-3">
                    <select class="region form-control bg-dark text-light" name="Region">
                        <option value="Région">--Région--</option>
                        <option value="Diesel">Région(BDD)</option>
                    </select>
                </div>
                <div class="mt-3">
                    <input type="button" class="btn btn-success form-control" name="recherche" value="Recherche">
                </div>
            </form>
            <!-- Fin Filtre -->
        </div>
        <!-- Debut Affichage Base De Donnée -->
        <div id="dataBaseList" class="col-md-9">
            <?php foreach ($rentCarsList as $rentCar): ?>
                <div class="text-light">
                    <img src="<?= $rentCar->source ?>" alt="<?= $rentCar->pictureName ?>">
                    <h3><?= $rentCar->brand . ' ' . $rentCar->model ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Fin Affichage Base De Donnée -->
    </div>
</div>
<?php
$content = ob_get_clean();
