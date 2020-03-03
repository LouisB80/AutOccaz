<?php

session_start();
try {
    if (isset($_GET['action'])) {
        $url = 'Controllers/' . $_GET['action'] . 'Controller' . '.php';
        if (file_exists($url)) {
            require_once $url;
        } else {
            die('Erreur 404, cette page n\'existe pas');
        }
    } else {
        die('Erreur 404, cette page n\'existe pas');
    }
} catch (Exception $e) {
    exit($e->getMessage());
}