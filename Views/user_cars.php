<?php
ob_start();
$cssFile = 'user_cars.css';
$title = 'Vos annonces';
$jsFile = '';
?>
<div id="user_cars" class="container-fluid text-center">
    <h2>Vos annonces</h2>
    <div class="row justify-content-center">
        <table class="w-75 table table-striped bg-dark text-light">
            <thead>
                <tr>
                    <th scope="col">Immatriculation</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Modèle</th>
                    <th scope="col">Consulter</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userCarsList as $car): ?>
                    <tr>
                        <td><?= $car->immat ?></td>
                        <td><?= $car->brand ?></td>
                        <td><?= $car->model ?></td>
                        <td><a href="/car_deal/<?= $car->id ?>"><button class="btn btn-info">Voir</button></a></td>
                        <td><a href=""><button class="btn btn-danger">Supprimer</button></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();

