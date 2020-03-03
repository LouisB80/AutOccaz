<?php

require_once 'Models/Models.php';
$models = new Models();
$listOfModels = $models->getAllByBrand($_POST['idBrand']);
exit(json_encode($listOfModels));


