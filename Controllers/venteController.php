<?php

if (isset($_SESSION['user'])) {
    require_once 'Models/Cars.php';
    $cars = new Cars();
    $popularCarsList = $cars->getPopulars();
    require_once 'Views/vente.php';
    require_once 'Views/includes/template.php';
} else {
    echo 'Vous devez être connecté pour accéder à cette page !';
    header('refresh: 1; url = accueil');
}