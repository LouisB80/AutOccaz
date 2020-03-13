<?php

require_once 'Models/Users.php';
//regex pour les contrôle du formulaire
$regexName = "/^[A-Za-zéÉ][A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+((-| )[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]+)?$/";
$regexPass = '/^([0-9a-zA-Z\.,!?@_-]{4,})$/';
$regexTel = "/^0[2367]([0-9]{2}){4}$/";
//contrôle du formulaire d'inscription après envoi
if (isset($_POST['subscribe'])) {
//variables msg d'alerte champs mal saisis
    $lastName = $firstName = $mail = $password = $passwordValidate = $phoneNumber = '';
//tableau d'erreurs
    $errors = [];
//contrôle du nom
    $lastName = trim(filter_input(INPUT_POST, 'lastNameInscription', FILTER_SANITIZE_STRING));
    if (empty($lastName)) {
        $errors['lastName'] = 'Veuillez renseigner le nom';
    } elseif (!preg_match($regexName, $lastName)) {
        $errors['lastName'] = 'Votre nom contient des caractères non autorisés !';
    }
//contrôle du prénom
    $firstName = trim(filter_input(INPUT_POST, 'firstNameInscription', FILTER_SANITIZE_STRING));
    if (empty($firstName)) {
        $errors['firstName'] = 'Veuillez renseigner le prenom';
    } elseif (!preg_match($regexName, $firstName)) {
        $errors['firstName'] = 'Votre prenom contient des caractères non autorisés !';
    }
//contrôle de l'email
    $mail = trim(htmlspecialchars($_POST['mailInscription']));
    if (empty($mail)) {
        $errors['mail'] = 'Veuillez renseigner votre email';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = 'L\'email n\'est pas valide!';
    }
//contrôle du mot de passe
    $password = trim($_POST['passInscription']);
    $passwordValidate = trim($_POST['passValidation']);
    if (empty($password) || !preg_match($regexPass, $password)) {
        $errors['password'] = 'Le mot de passe doit comporter au moins 4 caractères !';
    }
    if (empty($passwordValidate) || !preg_match($regexPass, $passwordValidate)) {
        $errors['passwordIns'] = 'Veuillez renseigner la confirmation du mot de passe';
    }
    if ($password != $passwordValidate) {
        $errors['passwordIns'] = 'Le mot de passe n\'est pas identique à la confirmation';
    } else {
        $password = trim(password_hash($password, PASSWORD_BCRYPT));
    }
//contrôle du téléphone
    $phoneNumber = trim(htmlspecialchars($_POST['phoneNumber']));
    if (empty($phoneNumber)) {
        $errors['phoneNumber'] = 'Veuillez renseigner votre téléphone';
    } elseif (!preg_match($regexTel, $phoneNumber)) {
        $errors['phoneNumber'] = 'Le format du téléphone n\'est pas valide!';
    }
//contrôle des erreurs
    if (count($errors) === 0) {
        $user = new User($lastName, $firstName, $password, $mail, $phoneNumber);
        $user->create();
        $newUser = $user->getOneByMail($mail);
        session_start();
        $_SESSION['user'] = $mail;
        $_SESSION['id'] = $newUser->id;
    }
    exit(json_encode($errors));
}
//contrôle de la connexion
elseif (isset($_POST['connection'])) {
    $user = new User();
    $mail = trim(htmlspecialchars($_POST['userConnection']));
    $password = trim($_POST['passConnection']);
    $user = $user->getOneByMail($mail);
//tableau d'erreurs
    $errors = [];
    if (empty($mail)) {
        $errors['userConnection'] = 'Veuillez entrer votre email';
    }
    if (empty($password)) {
        $errors['passConnection'] = 'Veuillez entrer votre mot de passe';
    } else if (!password_verify($password, $user->password)) {
        $errors['passConnection'] = 'L\'addresse mail ou le mot de passe est invalide';
    } else {
        session_start();
        $_SESSION['user'] = $mail;
        $_SESSION['id'] = $user->id;
    }
    exit(json_encode($errors));
}
