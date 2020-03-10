<?php

if (isset($_SESSION['user'])) {
    $cars = new Cars();
    $userCar = $cars->getOne($_GET['value']);
    require_once 'Views/car_deal.php';
    require_once 'Views/includes/template.php';
} else {
    echo 'Vous devez être connecté pour accéder à cette page !';
    header('refresh: 1; url = /accueil');
}