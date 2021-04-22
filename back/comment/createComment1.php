<?php

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe COMMENT
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/getNextNumCom.php';
    require_once __DIR__ . './../../CLASS_CRUD/comment.class.php';
    require_once __DIR__ . './../../CLASS_CRUD/membre.class.php';
    global $db;
    $monComment = new COMMENT;
    $membre = new MEMBRE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statucommentairet
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $pseudoMemb = ctrlSaisies(($_POST['pseudoMemb']));
        $numArt = ctrlSaisies(($_POST['numArt']));
        $libCom = ctrlSaisies(($_POST['libCom']));
        $infoMemb = $membre-> get_1Memb($pseudoMemb);
        $numMemb = $infoMemb['numMemb'];
        
        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./comment.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libCom'])) AND !empty($_POST['libCom']))
            AND (!empty($_POST['Submit']) AND ($_POST["Submit"] ==="Envoyer"))
            AND ((isset($_POST['numArt'])) AND !empty($_POST['numArt']))
            AND ((isset($numMemb) AND !empty($numMemb)))) {    
            
            // Saisies valides
            $erreur = false;

            $libCom = ctrlSaisies(($_POST['libCom']));
            $numArt = ctrlSaisies(($_POST['numArt']));
            $dtCreaCom = date("Y-m-d h:i:s");
            $numSeqCom = getNextNumCom($numArt);
            $message = "Votre commentaire a bien été pris en compte. Il sera affiché lorsqu'il sera validé par le propriétaire.";
            $monComment->create($numSeqCom, $numArt, $dtCreaCom, $libCom, $numMemb);
            header("Location: ./../../front/includes/pages/article.php?id=".$numArt."&message=".$message);

                  
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
            header("Location: ./createComment1.php?id=".$numArt.$numMemb.$libCom);
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initComment.php';
?>
