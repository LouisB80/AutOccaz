<?php

require_once 'Models/Brands.php';
require_once 'Models/Cars.php';
require_once 'Models/Doors.php';
require_once 'Models/Fuels.php';
require_once 'Models/GearBox.php';
require_once 'Models/Models.php';
require_once 'Models/Pictures.php';
require_once 'Models/Users.php';

//regex
$regexImmat = '/^([A-Z|a-z]{2}|[0-9]{2,4})+(\-|)+([0-9]{3}|[A-Z|a-z]{2,3})+(\-|)+([A-Z|a-z]{2}|[0-9]{2}|2[A-B|a-b])$/';
$regexIdentifiedNumber = '/^[0-9]{3}$/';
$regexYear = '/^(?:19|20)[0-9]{2}$/';
$regexDate = '/^((?:19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/';
//Initialisation des variables à l'envoi du formulaire
if (isset($_POST['subscribe'])) {
    //Tableau d'erreur
    $errors = [];
    $var = [];
    if ($_POST['step'] == 0) {
        $immat = $identifiedNumber = $year = $brands = $models = '';
        //contrôle de l'immatriculation
        $immat = trim(filter_input(INPUT_POST, 'immat', FILTER_SANITIZE_STRING));
        if (empty($immat)) {
            $errors['immat'] = 'Veuillez renseigner le numéro de plaque';
        } elseif (!preg_match($regexImmat, $immat)) {
            $errors['immat'] = 'L\'immatriculation est incorrect !';
        }
        //contrôle du numéro d'identification
        $identifiedNumber = trim(filter_input(INPUT_POST, 'identifiedNumber', FILTER_SANITIZE_NUMBER_INT));
        if (empty($identifiedNumber)) {
            $errors['identifiedNumber'] = 'Veuillez renseigner les 3 numèro d\'identification de votre carte grise';
        } elseif (!preg_match($regexIdentifiedNumber, $identifiedNumber)) {
            $errors['identifiedNumber'] = 'Le numéro d\'identification de votre carte grise est incorrect';
        }
        //contrôle de l'année du véhicule
        $year = trim(filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT));
        if (empty($year)) {
            $errors['year'] = 'Veuillez renseigner l\'année du véhicule';
        } elseif (!preg_match($regexYear, $year)) {
            $errors['year'] = 'L\'année du véhicule est incorrect';
        }
        //contrôle de la marque
        $brands = trim(filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_NUMBER_INT));
        if (empty($brands)) {
            $errors['brand'] = 'Veuillez renseigner la marque du véhicule';
        } elseif (!filter_var($brands, FILTER_VALIDATE_INT)) {
            $errors['brand'] = 'Ce champ est incorrect';
        }
        //contrôle du modèle
        $models = trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_NUMBER_INT));
        if (empty($models)) {
            $errors['model'] = 'Veuillez renseigner le modèle du véhicule';
        } elseif (!filter_var($models, FILTER_VALIDATE_INT)) {
            $errors['model'] = 'Ce champ est incorrect';
        }
        if (count($errors) === 0) {
            $var['immat'] = $immat;
            $var['identifiedNumber'] = $identifiedNumber;
            $var['year'] = $year;
            $var['brand'] = $brands;
            $var['models'] = $models;
        }
        $tab = array('error' => $errors, 'validValue' => $var);
        exit(json_encode($tab));
    } elseif ($_POST['step'] == 1) {
        $fiscalPower = $power = $mileage = $firstRegistration = $gearBox = $fuels = '';
        //contrôle de la puissance fiscale
        $fiscalPower = trim(filter_input(INPUT_POST, 'fiscalPower', FILTER_SANITIZE_NUMBER_INT));
        if (empty($fiscalPower)) {
            $errors['fiscalPower'] = 'Veuillez renseigner la puissance fiscale';
        } elseif (!filter_var($fiscalPower, FILTER_VALIDATE_INT)) {
            $errors['fiscalPower'] = 'Ce champ est incorrect';
        }
        //contrôle de la puissance dynamique
        $power = trim(filter_input(INPUT_POST, 'power', FILTER_SANITIZE_NUMBER_INT));
        if (empty($power)) {
            $errors['power'] = 'Veuillez renseigner la puissance dynamique';
        } elseif (!filter_var($power, FILTER_VALIDATE_INT)) {
            $errors['power'] = 'Ce champ est incorrect';
        }
        //contrôle du kilomètrage
        $mileage = trim(filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT));
        if (empty($mileage)) {
            $errors['mileage'] = 'Veuillez renseigner le kilomètrage du véhicule';
        } elseif (!filter_var($mileage, FILTER_VALIDATE_INT)) {
            $errors['mileage'] = 'Le kilomètrage est incorrect';
        }
        //contrôle de l'année de mise en circulation
        $firstRegistration = trim(filter_input(INPUT_POST, 'firstRegistration', FILTER_SANITIZE_STRING));
        if (empty($firstRegistration)) {
            $errors['firstRegistration'] = 'Veuillez renseigner la date de mise en circulation';
        } elseif (!preg_match($regexDate, $firstRegistration)) {
            $errors['firstRegistration'] = 'La date de mise en circulation du véhicule est incorrect';
        }
        //contrôle de la boîte de vitesse
        $gearBox = trim(filter_input(INPUT_POST, 'gearBox', FILTER_SANITIZE_NUMBER_INT));
        if (empty($gearBox)) {
            $errors['gearBox'] = 'Veuillez renseigner le type de la boîte de vitesse';
        } elseif (!filter_var($gearBox, FILTER_VALIDATE_INT)) {
            $errors['gearBox'] = 'Ce champ est incorrect';
        }
        //contrôle du carburant
        $fuels = trim(filter_input(INPUT_POST, 'fuel', FILTER_SANITIZE_NUMBER_INT));
        if (empty($fuels)) {
            $errors['fuel'] = 'Veuillez renseigner le type de carburant';
        } elseif (!filter_var($fuels, FILTER_VALIDATE_INT)) {
            $errors['fuel'] = 'Ce champ est incorrect';
        }
        if (count($errors) === 0) {
            $var['fiscalPower'] = $fiscalPower;
            $var['power'] = $power;
            $var['mileage'] = $mileage;
            $var['firstRegistration'] = $firstRegistration;
            $var['gearBox'] = $gearBox;
            $var['fuels'] = $fuels;
        }
        $tab = array('error' => $errors, 'validValue' => $var);
        exit(json_encode($tab));
    } elseif ($_POST['step'] == 2) {
        $color = $seat = $doors = '';
        //contrôle de la couleur
        $color = trim(filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING));
        if (empty($color)) {
            $errors['color'] = 'Veuillez renseigner la couleur du véhicule';
        }
        //contrôle du nombre de siège
        $seat = trim(filter_input(INPUT_POST, 'seat', FILTER_SANITIZE_NUMBER_INT));
        if (empty($seat)) {
            $errors['seat'] = 'Veuillez renseigner le nombre de siège du véhicule';
        } elseif (!filter_var($seat, FILTER_VALIDATE_INT)) {
            $errors['seat'] = 'Le nombre de siège est incorrect';
        }
        //contrôle du nombre de porte
        $doors = trim(filter_input(INPUT_POST, 'doors', FILTER_SANITIZE_NUMBER_INT));
        if (empty($doors)) {
            $errors['doors'] = 'Veuillez renseigner le nombre de porte';
        } elseif (!filter_var($doors, FILTER_VALIDATE_INT)) {
            $errors['doors'] = 'Ce champ est incorrect';
        }
        if (count($errors) === 0) {
            $var['color'] = $color;
            $var['seat'] = $seat;
            $var['doors'] = $doors;
        }
        $tab = array('error' => $errors, 'validValue' => $var);
        exit(json_encode($tab));
    } elseif ($_POST['step'] == 3) {
        $firstHand = $leasing = $sell = $smoker = '';
        //contrôle si premère main
        $firstHand = trim(filter_input(INPUT_POST, 'firstHand', FILTER_SANITIZE_NUMBER_INT));
        if (!isset($firstHand)) {
            $errors['firstHand'] = 'Veuillez renseigner ce champ';
        }
        //contrôle si location
        $leasing = trim(filter_input(INPUT_POST, 'rent', FILTER_SANITIZE_NUMBER_INT));
        if (!isset($leasing)) {
            $errors['rent'] = 'Veuillez renseigner ce champ';
        }
        //contrôle si vente
        $sell = trim(filter_input(INPUT_POST, 'sell', FILTER_SANITIZE_NUMBER_INT));
        if (!isset($sell)) {
            $errors['sell'] = 'Veuillez renseigner ce champ';
        }
        //contrôle si fumeur
        $smoker = trim(filter_input(INPUT_POST, 'smoker', FILTER_SANITIZE_NUMBER_INT));
        if (!isset($smoker)) {
            $errors['smoker'] = 'Veuillez renseigner ce champ';
        }
        //contrôle du prix de vente
        $price = trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT));
        if (empty($price)) {
            $errors['price'] = 'Veuillez renseigner ce champ';
        } elseif (!filter_var($price, FILTER_VALIDATE_FLOAT)) {
            $errors['price'] = 'Ce champ est incorrect, merci de renseigner un prix';
        }
        if (count($errors) === 0) {
            $var['firstHand'] = $firstHand;
            $var['leasing'] = $leasing;
            $var['sell'] = $sell;
            $var['smoker'] = $smoker;
            $var['price'] = $price;
        }
        $tab = array('error' => $errors, 'validValue' => $var);
        exit(json_encode($tab));
    }
}