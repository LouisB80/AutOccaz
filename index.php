<?php

session_start();
try {
    if (isset($_GET['action'])) {
        $url = 'Controllers/' . $_GET['action'] . 'Controller' . '.php';
        if (file_exists($url)) {
            require_once $url;
        } else {
            die('erreur 404');
        }
    } else {
        die('erreur 404');
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}