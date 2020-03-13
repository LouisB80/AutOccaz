<?php
ob_start();
$cssFile = 'vente.css';
$title = 'Vendre un véhicule';
$jsFile = 'vente.js';
?>
<div class="container justify-content-center">
    <!--Debut Vendre un véhicule--> 
    <h2 id="section" class="text-center">Vendre un véhicule</h2>
    <!--Début du formulaire de vente--> 
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-12 col-sm-9 col-md-7 col-lg-6 text-center mb-5 mt-3 mb-2 shadow ">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="POST" novalidate action="/user_cars" enctype="multipart/form-data">
                                <!-- barre de progression -->
                                <ul id="progressbar">
                                    <li class="active" id="info">Informations sur le véhicule</li>
                                    <li id="engine">Motorisation</li>
                                    <li id="config">Configuration</li>
                                    <li id="moreInfo">Plus d'informations</li>
                                    <li id="pictures">Ajouter des photos</li>
                                </ul>
                                <!-- Information sur le véhicule -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 id="test" class="text-center fs-title">Information sur le véhicule</h2>
                                        <input type="text" name="immat" id="immat" placeholder="Numéro d'immatriculation">
                                        <input type="text" name="identifiedNumber" id="identifiedNumber" placeholder="3 derniers chiffres du numéro d'identification">
                                        <input type="text" name="year" id="year" placeholder="Année du véhicule">
                                        <div>
                                            <label for="brand">Marque:</label>
                                            <select name="brand" id="brand">
                                                <option value="">--Sélectionner une marque--</option>
                                                <?php foreach ($listOfBrands as $brand) : ?>
                                                    <option value="<?= $brand->id ?>"><?= $brand->brand ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="model">Modèle:</label>
                                            <select name="model" id="model">
                                                <option value="">--Sélectionner un modèle--</option>                                              
                                            </select>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Suivant" />
                                </fieldset>
                                <!-- Motorisation -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Motorisation</h2>
                                        <input type="text" name="fiscalPower" id="fiscalPower" placeholder="Puissance fiscale">
                                        <input type="text" name="power" id="power" placeholder="Puissance dynamique">
                                        <input type="mileage" name="mileage" id="mileage" placeholder="Kilomètrage">
                                        <label for="firstRegistration">Date de première mise en circulation:</label>
                                        <input type="date" id="firstRegistration" name="firstRegistration" placeholder="Ex: 01/01/2020">
                                        <div>
                                            <label for="gearBox">Boîte de vitesse:</label>
                                            <select name="gearBox" id="gearBox">
                                                <option value="">--Boîte de vitesse--</option>
                                                <?php foreach ($listOfGearBox as $gearBox) : ?>
                                                    <option value="<?= $gearBox->id ?>"><?= $gearBox->type ?></option>
                                                <?php endforeach ?> 
                                            </select>
                                        </div>
                                        <div>
                                            <label for="fuel">Carburant:</label>
                                            <select name="fuel" id="fuel">
                                                <option value="">--Carburant--</option>
                                                <?php foreach ($listOfFuels as $fuel) : ?>
                                                    <option value="<?= $fuel->id ?>"><?= $fuel->type ?></option>
                                                <?php endforeach ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Precedent" />
                                    <input type="button" name="next" class="next action-button" value="Suivant" />
                                </fieldset>
                                <!-- Configuration -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Configuration</h2>
                                        <input type="text" name="color" id="color" placeholder="Couleur du véhicule">
                                        <input type="text" name="seat" id="seat" placeholder="Nombre de places">
                                        <label for="doors">Nombre de portes:</label>
                                        <select name="doors" id="doors">
                                            <option value="">--Nombre de portes--</option>
                                            <?php foreach ($listOfDoors as $door) : ?>
                                                <option value="<?= $door->id ?>"><?= $door->number ?></option>
                                            <?php endforeach ?> 
                                        </select>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Precedent" />
                                    <input type="button" name="next" class="next action-button" value="Suivant" />
                                </fieldset>
                                <!-- Plus d'information -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Plus d'information</h2>
                                        <div>
                                            <legend id="">Première main</legend>
                                            <input type="radio" id="firstHandYes" name="firstHand" value="1">
                                            <label for="firstHandYes">Oui</label>
                                            <input type="radio" id="firstHandNo" name="firstHand" value="0">
                                            <label for="firstHandNo">Non</label>
                                        </div>
                                        <div>
                                            <legend id="">Louer</legend>                                    
                                            <input type="radio" id="rentYes" name="rent" value="1">
                                            <label for="rentYes">Oui</label>
                                            <input type="radio" id="rentNo" name="rent" checked value="0">
                                            <label for="rentNo">Non</label>
                                        </div>
                                        <div>
                                            <legend id="">Vendre</legend>
                                            <input type="radio" id="sellYes" name="sell" checked value="1">
                                            <label for="sellYes">Oui</label>
                                            <input type="radio" id="sellNo" name="sell" value="0">
                                            <label for="sellNo">Non</label>
                                        </div>
                                        <div>
                                            <legend id="">Fumeur:</legend>
                                            <input type="radio" id="smokerYes" name="smoker" value="1">
                                            <label for="smokerYes">Oui</label>
                                            <input type="radio" id="smokerNo" name="smoker" checked value="0">
                                            <label for="smokerNo">Non</label>
                                        </div>
                                        <input type="text" name="price" id="price" placeholder="Entrer un prix">
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Precedent" />
                                    <input type="button" name="next" class="next action-button" value="Suivant" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center" id="viewInfo">Votre annonce va étre créé.</h2>
                                        <p>Souhaitez-vous ajouter des photos ?</p>
                                    </div>
                                    <input type="submit" name="submit" class="previous action-button-previous send" value="Non" />
                                    <input type="button" name="next" class="updatePictures action-button send" value="Oui" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center" id="viewInfo">Votre annonce a été enregistrée avec succés.</h2>
                                        <p>Si vous souhaitez, vous pouvez ajouter des photos ci-dessous</p>
                                        <input type="hidden" id="hiddenInput">
                                        <input type="file" name="picture" id="fileUpload">
                                    </div>
                                    <input type="button" name="upload" class="btn btn-success" id="upload" value="Ajoute une photo" />
                                    <input type="submit" name="submit" class="btn action-button submit" value="Terminer" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin du formulaire de vente-->
<?php
$content = ob_get_clean();
