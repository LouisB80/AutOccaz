<?php

$cars = new Cars();
$recentCarsList = $cars->getRecents();
$popularCarsList = $cars->getPopulars();
require_once 'Views/accueil.php';
require_once 'Views/includes/template.php';
