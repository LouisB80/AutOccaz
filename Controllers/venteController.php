<?php

if (isset($_SESSION['user'])) {
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
    header('refresh: 1; url = /accueil');
}