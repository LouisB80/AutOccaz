<?php

/* Vérifier si le formulaire a été soumis */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCar = $_POST['carId'];
    /* Taille max du fichier = 2Mo */
    $maxSize = 2 * 1024 * 1024;
    /* On récupère le fichier */
    $fileName = $_FILES['picture']['name'];
    $fileSize = $_FILES['picture']['size'];
   
    /* Emplacement du fichier */
    $location = 'uploads/' . $fileName;
    $uploadOk = 1;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);

    /* Extensions Valides */
    $validExtensions = array('jpg', 'jpeg', 'png');
    /* Test de l'extension */
    if (!in_array(strtolower($imageFileType), $validExtensions)) {
        $uploadOk = 0;
        die('Erreur: Veuillez insérer une image.');
    }
    /* Vérifie la taille du fichier */
    if ($fileSize > $maxSize) {
        $uploadOk = 0;
        die('Erreur: La taille du fichier est supérieure à la limite autorisée.');
    }
    /* On renomme le fichier */
    $temp = explode(".", $_FILES['picture']['name']);
    $newFileName = 'uploads/car_'. $idCar . '.' . end($temp);
    /* Téléchargement du fichier */
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $newFileName)) {
        echo $location;
    } else {
        die('Erreur lors du téléchargement');
    }
}