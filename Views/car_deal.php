<?php
ob_start();
$cssFile = 'carDeal.css';
$title = $userCar->brand . ' ' . $userCar->model;
$jsFile = '';
?>
<div class="container-fluid text-center">
    <h2><?= $userCar->brand . ' ' . $userCar->model ?></h2>
    <div class="row">
        <div class="col-md-12" >
            <img src="" alt ="">
        </div>
        <div class="col" >
            
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
