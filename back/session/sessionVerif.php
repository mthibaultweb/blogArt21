<?
    // Continuité dans la session
    session_start();

/////////////////////////////////////////////////////
//
//  Verif session
//
//  Script  : sessionVerif.php
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

    // Si on n'est pas connecté, on est redirigé vers le script de login (session.php)
    // Variable non rensiegnée
    if (!isset($_SESSION['pseudoMemb']) OR !$_SESSION['pseudoMemb']) {
        header('Location: ./../../../front/includes/pages/accueil.php');
    }

    // C'est ici qu'on fait les vérif de login et de pass dans la BD
    // ici on transfere les éléments de login du formulaire session pour les afficher
    // Login récupéré dans la session en cours
    $logged = isset($_SESSION['pseudoMemb']) ? $_SESSION['pseudoMemb'] : '';

