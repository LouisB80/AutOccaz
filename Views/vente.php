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
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="POST" action="user_cars">
                                <!-- barre de progression -->
                                <ul id="progressbar">
                                    <li class="active" id="info">Information sur le véhicule</li>
                                    <li id="engine">Motorisation</li>
                                    <li id="config">Configuration</li>
                                    <li id="moreInfo">Plus d'information</li>
                                    <li id="pictures">Ajouter des photos</li>
                                </ul>
                                <!-- Information sur le véhicule -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="text-center fs-title">Information sur le véhicule</h2>
                                        <input type="text" name="immat" placeholder="Numéro d'immatriculation">
                                        <input type="text" name="identifiedNumber" placeholder="3 derniers chiffres du numéro d'identification">
                                        <label for="year">Année du véhicule:</label>
                                        <input type="date" id="year" name="year" placeholder="Ex: 2020">
                                        <div>
                                            <label for="brand">Marque:</label>
                                            <select name="brand" id="brand">
                                                <option value="">--Sélectionner une marque--</option>
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
                                        <input type="text" name="fiscalPower" placeholder="Puissance fiscale">
                                        <input type="text" name="power" placeholder="Puissance dynamique">
                                        <input type="mileage" name="mileage" placeholder="Kilomètrage">
                                        <label for="firstRegistration">Date de première mise en circulation:</label>
                                        <input type="date" id="firstRegistration" name="firstRegistration" placeholder="Ex: 01/01/2020">
                                        <div>
                                            <label for="gearBox">Boîte de vitesse:</label>
                                            <select name="gearBox" id="gearBox">
                                                <option value="">--Boîte de vitesse--</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="fuel">Carburant:</label>
                                            <select name="fuel" id="fuel">
                                                <option value="">--Carburant--</option>
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
                                        <input type="text" name="color" placeholder="Couleur du véhicule">
                                        <input type="text" name="seat" placeholder="Nombre de places">
                                        <label for="doors">Nombre de portes:</label>
                                        <select name="doors" id="doors">
                                            <option value="">--Sélectionner le nombre de portes--</option>
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
                                            <legend>Première main</legend>
                                            <input type="radio" id="firstHandYes" name="firstHand" value="1">
                                            <label for="firstHandYes">Oui</label>
                                            <input type="radio" id="firstHandNo" name="firstHand" value="0">
                                            <label for="firstHandNo">Non</label>
                                        </div>
                                        <div>
                                            <legend>Louer</legend>                                    
                                            <input type="radio" id="rentYes" name="rent" value="1">
                                            <label for="rentYes">Oui</label>
                                            <input type="radio" id="rentNo" name="rent" checked value="0">
                                            <label for="rentNo">Non</label>
                                        </div>
                                        <div>
                                            <legend>Vendre</legend>
                                            <input type="radio" id="sellYes" name="sell" value="1">
                                            <label for="sellYes">Oui</label>
                                            <input type="radio" id="sellNo" name="sell" checked value="0">
                                            <label for="sellNo">Non</label>
                                        </div>
                                        <div>
                                            <legend>Fumeur:</legend>
                                            <input type="radio" id="smokerYes" name="smoker" value="1">
                                            <label for="smokerYes">Oui</label>
                                            <input type="radio" id="smokerNo" name="smoker" checked value="0">
                                            <label for="smokerNo">Non</label>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Precedent" />
                                    <input type="button" name="next" class="next action-button" value="Suivant" />
                                </fieldset>
                                <!-- Ajouter des photos -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Ajouter des photos</h2>
                                        <label for="uploadImg">Veuillez inserer une image:</label>
                                        <input type="file" name="uploadImg" id="uploadImg">                                        
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Precedent" />
                                    <input type="button" name="next" class="next action-button" value="Suivant" />
                                </fieldset>
                                <!-- Étape finale -->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>Votre annonce a été mise en ligne avec succés</h5>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-success" value="Terminer" />
                                    </div>
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
