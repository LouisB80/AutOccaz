<?php
require_once 'Models/Cars.php';
$cars = new Cars();
$sellCarsList = $cars->getSellsCars();
$popularCarsList = $cars->getPopulars();
require_once 'Views/achat.php';
require_once 'Views/includes/template.php';