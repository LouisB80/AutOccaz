<?php
ob_start();
$cssFile = 'user_settings.css';
$title = 'Infos personnelles';
$jsFile = '';
?>
<div id="user_settings" class="container-fluid text-center">
    <h2>Infos personnelles</h2>
</div>
<?php
$content = ob_get_clean();

