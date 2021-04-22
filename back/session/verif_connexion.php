<?
/////////////////////////////////////////////////////
//
//  Session login
//
//  Script  : sessionLogin.php
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';
require_once __DIR__ . './../../CONNECT/database.php';

    // 0. Fonction permettant de contrôler l'existence des login/pass en BD
    require_once __DIR__."./ctrlConnexion.php";

    

    // // Recup login et password du form session.php
    $pseudoMemb = isset($_POST['pseudoMemb']) ? $_POST['pseudoMemb'] : '';
    $passMemb = isset($_POST['passMemb']) ? $_POST['passMemb'] : '';
    ctrlerSaisieConnect($pseudoMemb, $passMemb);



    if ($pseudoMemb == '' OR $passMemb == '') {
        # Erreur saisie : champs vides => error = 1
        // Retour page d'accueil...
        header('Location: ./../../front/pages/connexion.php?error=1');
    }
    else {
        # ici on contrôle l'existence des login/pass en BD...

        if (!ctrlerSaisieConnect($pseudoMemb, $passMemb)) {
          // pass invalid => error = 2
          header('Location: ./../../front/includes/pages/connexion.php?error=2&login='.$pseudoMemb);
        }
        else {
          // numéro unique délivré au user
          // Login / pass trouvé en BD
          session_start();
          // Création des variables superglobales
          $_SESSION['pseudoMemb'] = $pseudoMemb;
          $_SESSION['passMemb'] = $passMemb;
          $_SESSION['logged'] = true;

          // Créat cookie si login existe
          if (isset($_POST["pseudoMemb"])){
            setcookie("accueil.php", $_POST["pseudoMemb"], time()+24*2600, null, null, false, true);
          }
          //$login = isset($_COOKIE['login']) ? $_COOKIE['login'] : '';

          // Re-diriger le visiteur vers une nouvelle page
          header('Location: ./../../front/includes/pages/accueil.php');
        }
    }
