<?php
ob_start();
$cssFile = 'carDeal.css';
$title = $userCar->brand . ' ' . $userCar->model;
$jsFile = '';
?>
<div class="container-fluid text-center">
    <div class="row justify-content-center pt-5">
        <div class="jumbotron border shadow col-md-10 row mb-5 bg-light">
            <div class="col-md-6" >
                <h2 class="text-left mb-5"><?= $userCar->brand . ' ' . $userCar->model ?></h2>
                <img class="img-fluid" src="../assets/img/ford.jpg" alt ="">
            </div>
            <div class=" col-md-6">
                <div class="row justify-content-arround">
                    <div class="col-md-4 text-center pt-2">
                        <p class="deal"><?= $userCar->price . ' € ' ?></p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-lg fa fa-heart fa-2x" href="#!" role="button"></a>
                    </div>
                    <div class="col-md-4 pt-1">
                        <a class="btn btn-info" href="" role="button">Contacter le vendeur</a>
                    </div>
                </div>
                <hr class="my-2">
                <div class="row justify-content-arround mt-5">
                    <div class="col-md text-justify ml-3">
                        <p><span>Marque:</span> <?= $userCar->brand ?></p>
                        <p><span>Année :</span><?= $userCar->year ?></p>
                        <p><span>Mise en circulation:</span> <?= $userCar->firstRegistration ?></p>
                        <p><span>Nombre de siège:</span> <?= $userCar->seat ?></p>
                        <p><span>Nombre de porte:</span> <?= $userCar->number ?></p>
                        <p><span>Couleur:</span> <?= $userCar->color ?></p>
                        <p><span>Vendre:</span> <?= ($userCar->sell) ? 'Oui' : 'Non' ?></p>
                        <p><span>Louer:</span> <?= ($userCar->leasing) ? 'Oui' : 'Non' ?></p>
                    </div>
                    <div class="col-md text-justify">
                        <p><span>Modèle:</span> <?= $userCar->model ?></p>
                        <p><span>Kilomètrage:</span> <?= $userCar->mileage ?> Km</p>
                        <p><span>Puissance fiscale:</span> <?= $userCar->fiscalPower ?> CV</p>
                        <p><span>Puissance dynamique:</span> <?= $userCar->power ?> CV</p>
                        <p><span>Boîte de vitesse:</span> <?= $userCar->type ?></p>
                        <p><span>Carburant:</span> <?= $userCar->fuel ?></p>
                        <p><span>Première Main:</span> <?= ($userCar->firstHand) ? 'Oui' : 'Non' ?></p>
                        <p><span>Fumeur:</span> <?= ($userCar->smoker) ? 'Oui' : 'Non' ?></p>
                        <p><span>Localisation:</span> <?= ($userCar->smoker) ? '' : 'Non renseigné' ?></p>
                    </div>
                </div>
            </div>
        </div>              
    </div>
    <?php if ($_SESSION['id'] === $userCar->id_Users) { ?>
        <a class="btn btn-info mb-5" href="/modify_car/<?= $userCar->id ?>" role="button">Modifier l'annonce</a>
    <?php } ?>  
</div>

<?php
$content = ob_get_clean();
