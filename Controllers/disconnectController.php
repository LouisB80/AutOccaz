<?php
$_SESSION = [];
session_destroy();
header('Location: http://autocazz.fr/accueil');