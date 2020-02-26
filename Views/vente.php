<?php
ob_start();
$cssFile = 'vente.css';
$title = 'Vendre un véhicule';
?>
<div class="container mt-4 mb-4">
    <!-- Debut Vendre un véhicule -->
    <h2 id="section" class="text-center">Vendre un véhicule</h2>
</div>
<div class="container-fluid d-flex justify-content-center">
    <!-- Début du formulaire de vente -->
    <form class="sellingForm row" action="" method="POST">
        <div class="form-group col-md-6">
            <label for="immat">Numéro d'immatriculation:</label>
            <input class="form-control" type="text" id="immat" name="immat" placeholder="Ex: ab123cd">
        </div>
        <div class="form-group col-md-6">
            <label for="identifiedNumber">3 derniers chiffres du numéro d'identification:</label>
            <input class="form-control" type="text" id="identifiedNumber" name="identifiedNumber" placeholder="Ex: 123">
        </div>
        <div class="form-group col-md-3">
            <label for="brand">Marque:</label>
            <select name="brand" id="brand">
                <option value="">--Sélectionner une marque--</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="model">Modèle:</label>
            <select name="model" id="model" disabled>
                <option value="">--Sélectionner un modèle--</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="year">Année du véhicule:</label>
            <input class="form-control" type="date" id="year" name="year" placeholder="Ex: 2020">
        </div>
        <div class="form-group col-md-3">
            <label for="firstRegistration">Date de première mise en circulation:</label>
            <input class="form-control" type="date" id="firstRegistration" name="firstRegistration" placeholder="Ex: 01/01/2020">
        </div>
        <div class="form-group col-md-3">
            <label for="fiscalPower">Puissance fiscale:</label>
            <input class="form-control" type="text" id="fiscalPower" name="fiscalPower" placeholder="Ex: 5">
        </div>
        <div class="form-group col-md-3">
            <label for="power">Puissance dynamique:</label>
            <input class="form-control" type="text" id="power" name="power" placeholder="Ex: 110">
        </div>
        <div class="form-group col-md-3">
            <label for="gearBox">Boîte de vitesse:</label>
            <select name="gearBox" id="gearBox">
                <option value="">--Sélectionner un type de boîte de vitesse--</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="fuel">Carburant:</label>
            <select name="fuel" id="fuel">
                <option value="">--Sélectionner le carburant--</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="color">Couleur du véhicule:</label>
            <input class="form-control" type="text" id="color" name="color" placeholder="Ex: Noir">
        </div>

        <div class="form-group col-md-3">
            <label for="seat">Nombre de places:</label>
            <input class="form-control" type="text" id="seat" name="seat" placeholder="Ex: 4">
        </div>
        <div class="form-group col-md-3">
            <label for="mileage">Kilomètrage:</label>
            <input class="form-control" type="mileage" id="mileage" name="mileage" placeholder="Ex: 10000">
        </div>        
        <fieldset class="form-group col-md-3">
            <legend>Première main:</legend>
            <div>
                <input type="checkbox" id="yes" name="firstHandYes">
                <label for="firstHandYes">Oui</label>
            </div>
            <div>
                <input type="checkbox" id="no" name="firstHandNo" checked>
                <label for="firstHandNo">Non</label>
            </div>
        </fieldset>
        <fieldset class="form-group col-md-3">
            <legend>Louer:</legend>
            <div>
                <input type="checkbox" id="yes" name="rent">
                <label for="rent">Oui</label>
            </div>
            <div>
                <input type="checkbox" id="no" name="rent" checked>
                <label for="rent">Non</label>
            </div>
        </fieldset>
        <fieldset class="form-group col-md-3">
            <legend>Vendre:</legend>
            <div>
                <input type="checkbox" id="yes" name="sell">
                <label for="sell">Oui</label>
            </div>
            <div>
                <input type="checkbox" id="no" name="sell" checked>
                <label for="sell">Non</label>
            </div>
        </fieldset>
        <fieldset class="form-group col-md-3">
            <legend>Fumeur:</legend>
            <div>
                <input type="checkbox" id="yes" name="smoker">
                <label for="smoker">Oui</label>
            </div>
            <div>
                <input type="checkbox" id="no" name="smoker" checked>
                <label for="smoker">Non</label>
            </div>
        </fieldset>
        <div class="form-group col-md-3">
            <label for="doors">Nombre de portes:</label>
            <select name="doors" id="doors">
                <option value="">--Sélectionner un modèle--</option>
            </select>
        </div>        
        <div class="col-md-12" >
            <input class="btn btn-success" type="submit" value="Valider" name="validation">
        </div>
    </form>
    <!-- Fin du formulaire de vente -->
</div>
<?php
include 'includes/carousel.php';
$content = ob_get_clean();
