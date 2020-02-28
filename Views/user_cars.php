<?php
ob_start();
$cssFile = 'user_cars.css';
$title = 'Vos annonces';
$jsFile = '';
?>
<div id="user_cars" class="container-fluid text-center">
    <h2>Vos annonces</h2>
    <table>
        <thead>
            <tr>
                <th colspan="2">#</th>
                <th colspan="2">Marque</th>
                <th colspan="2">Modèle</th>
                <th colspan="2">Prix</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>...</td>
                <td>...</td>
                <td>...</td>
                <td>...</td>
            </tr>
        </tbody>
    </table>

</div>
<?php
$content = ob_get_clean();

