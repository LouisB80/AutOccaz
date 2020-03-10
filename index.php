<?php

session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
spl_autoload_register(function($class) {
    $modelClass = ROOT . '/Models/' . $class . '.php';
    if (file_exists($modelClass)) {
        require_once $modelClass;
    }
});
try {
    if (isset($_GET['action'])) {
        $url = 'Controllers/' . $_GET['action'] . 'Controller' . '.php';
        if (file_exists($url)) {
            require_once $url;
        } else {
            header('Location: accueil');
        }
    } else {
        header('Location: accueil');
    }
} catch (Exception $e) {
    exit($e->getMessage());
}