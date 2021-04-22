<?
/////////////////////////////////////////////////////
//
//  Connexion MEMBRE
//
//  Script  : ctrlerConnexion.php
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

//
// Contrôle que nous sommes bien en validation de formulaire:
// Lorsque le formulaire est envoyé, la varaible $_POST est renseignée
// sous forme de tableau avec toutes les valeurs du formulaire
//

// 0. Fonction traitant éléments formulaire (-> éviter injections SQL)
function ctrlerSaisieConnect($pseudo, $pass) {
    // 1. Connexion à la base de donnée
   

    $pseudoMemb = '';
    $passMemb = '';
    $idStat= '';

    // Recup du mdp et log utilisateur
    global $db;
    $requete = "SELECT pseudoMemb, passMemb FROM membre WHERE pseudoMemb = ?;";
    $result = $db->prepare($requete);
    $result->execute([$pseudo]);
    $nbMembre = $result->rowCount();

    $requete1 = "SELECT pseudoUser, passUser, idStat FROM user WHERE pseudoUser = ?;";
    $result1 = $db->prepare($requete1);
    $result1->execute([$pseudo]);
    $nbUser = $result1->rowCount();

    print($nbMembre);
    print($nbUser);

    // S'il y a bien un résultat
    if ($nbMembre != 0) {
        // Récupération du résultat de requête
        $object = $result->fetch();
        // Récupération du résultat champ par champ
        $pseudoMemb = $object['pseudoMemb'];
        $passMemb = $object['passMemb'];
        
    }
    if ($nbUser != 0) {
        // Récupération du résultat de requête
        $object = $result1->fetch();
        // Récupération du résultat champ par champ
        $pseudoMemb = $object['pseudoUser'];
        $passMemb = $object['passUser'];    
    }  
      // Fin if ($result ...)
    //password_verify($passMemb,$pass)
    if (($pseudoMemb == $pseudo) AND ($passMemb == $pass)) { 
        $passOK = true;
    }
    else {
        $passOK = false;
        header('Location: ./../../front/includes/pages/connexion.php?login='.$pseudoMemb.'&pass='.$pass.'&pass2='.$passMemb);
    }

    //true si pass saisi = à celui en table pour login saisi
    return ($passOK);
}

