<?php
ob_start();
$cssFile = 'carDeal.css';
$title = $userCar->brand . ' ' . $userCar->model;
$jsFile = 'modifyCar.js';

if ($_SESSION['id'] === $userCar->id_Users) {
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
                            <div class="deal">
                                <input type="text" name="price" id="price" value="<?= $userCar->price ?>">
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="immat">Numéro d'immatriculation</label>
                            <input type="text" name="immat" id="immat" value="<?= $userCar->immat ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="identifiedNumber">3 derniers chiffres du numéro d'identification</label>
                            <input type="text" name="identifiedNumber" id="identifiedNumber" value="<?= $userCar->identifiedNumber ?>">
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row justify-content-arround mt-5">
                        <div class="col-md text-justify ml-3">
                            <div>
                                <label for="brand">Marque:</label>
                                <select name="brand" id="brand">
                                    <option value="">--Sélectionner une marque--</option>
                                    <?php foreach ($listOfBrands as $brand) : ?>
                                        <option value="<?= $brand->id ?>" <?= ($userCar->id_Brands == $brand->id) ? 'selected' : '' ?>><?= $brand->brand ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div><label for="year">Année :</label><input type="text" name="year" id="year" value="<?= $userCar->year ?>"></div>
                            <div><label for="firstRegistration">Mise en circulation:</label><input type="date" id="firstRegistration" name="firstRegistration" value="<?= $userCar->firstRegistration ?>"></div>
                            <div><label for="seat">Nombre de place:</label> <input type="text" name="seat" id="seat" value="<?= $userCar->seat ?>"></div>
                            <div>
                                <label for="doors">Nombre de portes:</label>
                                <select name="doors" id="doors">
                                    <option value="">--Nombre de portes--</option>
                                    <?php foreach ($listOfDoors as $door) : ?>
                                        <option value="<?= $door->id ?>" <?= ($userCar->id_Doors == $door->id) ? 'selected' : '' ?> ><?= $door->number ?></option>
                                    <?php endforeach ?> 
                                </select>
                            </div>
                            <div>
                                <label for="color">Couleur:</label>
                                <input type="text" name="color" id="color" value="<?= $userCar->color ?>">
                            </div>
                            <div>
                                <legend id="">Vendre</legend>
                                <input type="radio" id="sellYes" name="sell" <?= ($userCar->sell == 1) ? 'checked' : '' ?> value="1">
                                <label for="sellYes">Oui</label>
                                <input type="radio" id="sellNo" name="sell" <?= ($userCar->sell == 0) ? 'checked' : '' ?> value="0">
                                <label for="sellNo">Non</label>
                            </div>
                            <div>
                                <legend id="">Louer</legend>                                    
                                <input type="radio" id="rentYes" name="rent" <?= ($userCar->leasing == 1) ? 'checked' : '' ?> value="1">
                                <label for="rentYes">Oui</label>
                                <input type="radio" id="rentNo" name="rent" <?= ($userCar->leasing == 0) ? 'checked' : '' ?> value="0">
                                <label for="rentNo">Non</label>
                            </div>
                        </div>
                        <div class="col-md text-justify">
                            <div>
                                <label for="model">Modèle:</label>
                                <select name="model" id="model">
                                    <option value="">--Sélectionner un modèle--</option>                                              
                                </select>
                            </div>
                            <div>
                                <label for="mileage">Kilomètrage :</label>
                                <input type="mileage" name="mileage" id="mileage" value="<?= $userCar->mileage ?>">
                            </div>
                            <div>
                                <label for="fiscalPower">Puissance fiscale:</label>
                                <input type="text" name="fiscalPower" id="fiscalPower" value="<?= $userCar->fiscalPower ?>">
                            </div>
                            <div>
                                <label for="power">Puissance Dynamique:</label>
                                <input type="text" name="power" id="power" value="<?= $userCar->power ?>">
                            </div>
                            <div>
                                <label for="gearBox">Boîte de vitesse:</label>
                                <select name="gearBox" id="gearBox">
                                    <option value="">--Boîte de vitesse--</option>
                                    <?php foreach ($listOfGearBox as $gearBox) : ?>
                                        <option value="<?= $gearBox->id ?>" <?= ($userCar->id_GearBox == $gearBox->id) ? 'selected' : '' ?>><?= $gearBox->type ?></option>
                                    <?php endforeach ?> 
                                </select>
                            </div>
                            <div>
                                <label for="fuel">Carburant:</label>
                                <select name="fuel" id="fuel">
                                    <option value="">--Carburant--</option>
                                    <?php foreach ($listOfFuels as $fuel) : ?>
                                        <option value="<?= $fuel->id ?>" <?= ($userCar->id_Fuels == $fuel->id) ? 'selected' : '' ?>><?= $fuel->type ?></option>
                                    <?php endforeach ?> 
                                </select>
                            </div>
                            <div>
                                <legend id="">Première main</legend>
                                <input type="radio" id="firstHandYes" name="firstHand" <?= ($userCar->firstHand == 1) ? 'checked' : '' ?> value="1">
                                <label for="firstHandYes">Oui</label>
                                <input type="radio" id="firstHandNo" name="firstHand" <?= ($userCar->firstHand == 0) ? 'checked' : '' ?> value="0">
                                <label for="firstHandNo">Non</label>
                            </div>
                            <div>
                                <legend id="">Fumeur:</legend>
                                <input type="radio" id="smokerYes" name="smoker" <?= ($userCar->smoker == 1) ? 'checked' : '' ?> value="1">
                                <label for="smokerYes">Oui</label>
                                <input type="radio" id="smokerNo" name="smoker" <?= ($userCar->smoker == 0) ? 'checked' : '' ?> value="0">
                                <label for="smokerNo">Non</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <a class="btn btn-success mb-5" href="/modify_car/<?= $userCar->id ?>" role="button">Valider</a>
    </div>
    <?php
} else {
    header('Location: /accueil');
}
$content = ob_get_clean();
