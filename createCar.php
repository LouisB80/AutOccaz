<?php

require_once 'Models/Brands.php';
require_once 'Models/Cars.php';
require_once 'Models/Doors.php';
require_once 'Models/Fuels.php';
require_once 'Models/GearBox.php';
require_once 'Models/Models.php';
require_once 'Models/Pictures.php';
require_once 'Models/Users.php';
session_start();
if (isset($_POST)) {
    $car = new Cars($_POST['immat'], $_POST['identifiedNumber'], $_POST['year'], $_POST['firstRegistration'], $_POST['mileage'], $_POST['color'], $_POST['seat'], $_POST['firstHand'], $_POST['fiscalPower'], $_POST['power'], $_POST['leasing'], $_POST['sell'], $_POST['smoker'], $_POST['models'], $_POST['doors'], $_POST['gearBox'], $_POST['fuels'], $_SESSION['id'], $_POST['price']);
    $response = $car->create();
    echo json_encode($response);
}