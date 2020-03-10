<?php
$cars = new Cars();
$rentCarsList = $cars->getRentedCars();
require_once 'Views/location.php';
require_once 'Views/includes/template.php';
