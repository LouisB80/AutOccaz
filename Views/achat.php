<!--<link rel="stylesheet" href="assets/css/styles.css">-->
<?php
ob_start();
$cssFile = 'achat.css';
$title = 'Acheter un véhicule';
?>
<h2 id="section" class="text-center">Acheter un véhicule</h2>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Debut Affichage Base De Donnée -->
        <div class="input-group justify-content-center col-md-2 mr-2" id="search">
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
        <div id="dataBaseList" class="col-md-9">        
            <?php foreach ($sellCarsList as $sellCar): ?>
                <div class="text-light">
                    <img src="<?= $sellCar->source ?>" alt="<?= $sellCar->pictureName ?>">
                    <h3><?= $sellCar->brand . ' ' . $sellCar->model ?></h3>
                    <p><?= $sellCar->price ?>€</p>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Fin Affichage Base De Donnée -->
    </div>
</div>
<?php
include 'includes/carousel.php';
$content = ob_get_clean();
