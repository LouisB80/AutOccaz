<?php

if (isset($_SESSION['user'])) {
    require_once 'Models/Brands.php';
    require_once 'Models/Cars.php';
    require_once 'Models/Doors.php';
    require_once 'Models/Fuels.php';
    require_once 'Models/GearBox.php';
    require_once 'Models/Models.php';
    require_once 'Models/Pictures.php';
    $brands = new Brands();
    $cars = new Cars();
    $doors = new Doors();
    $fuels = new Fuels();
    $gearBox = new GearBox();
    $models = new Models();
    $pictures = new Pictures();
    $listOfBrands = $brands->getAll();
    $listOfDoors = $doors->getAll();
    $listOfFuels = $fuels->getAll();
    $listOfGearBox = $gearBox->getAll();
    require_once 'Views/vente.php';
    require_once 'Views/includes/template.php';
} else {
    echo 'Vous devez être connecté pour accéder à cette page !';
    header('refresh: 1; url = accueil');
}