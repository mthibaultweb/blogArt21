<?php
///////////////////////////////////////////////////////////////
//
//  CRUD MEMBRE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createMembre.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe MEMBRE
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/membre.class.php';
    global $db;
    $membre = new MEMBRE;

    $config = file_get_contents('./../../js/config.json');
    $configData = json_decode($config);


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du membre
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (!empty($_POST['g-recaptcha-response'])) {
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $configData->CAPTCHA_SECRET_KEY . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
    
            if ($responseData->success) {
                $prenomMembre = ctrlSaisies($_POST['prenomMemb']);
                $nomMembre = ctrlSaisies($_POST['nomMemb']);
                $pseudoMembre = ctrlSaisies($_POST['pseudoMemb']);
                $passMembre1 = ctrlSaisies($_POST['passMemb1']);
                $passMembre2 = ctrlSaisies($_POST['passMemb2']);
                $emailMembre1 = ctrlSaisies($_POST['eMailMemb1']);
                $emailMembre2 = ctrlSaisies($_POST['eMailMemb2']);
                $souvenirMembre = ctrlSaisies($_POST['souvenirMemb']);
                $accordMembre = ctrlSaisies($_POST['accordMemb']);

                // Opérateur ternaire
                $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

                if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

                    header("Location: ./membre.php");
                }   // End of if ((isset($_POST["submit"])) ...

                // Mode création
                if ((!empty($_POST['Submit'])) AND ($Submit === "Valider")
                AND (isset($_POST['prenomMemb'])) AND !empty($_POST['prenomMemb'])
                AND (isset($_POST['nomMemb'])) AND !empty($_POST['nomMemb'])
                AND (isset($_POST['pseudoMemb'])) AND !empty($_POST['pseudoMemb'])
                AND (isset($_POST['passMemb1'])) AND !empty($_POST['passMemb1'])
                AND (isset($_POST['passMemb2'])) AND !empty($_POST['passMemb2'])
                AND (isset($_POST['eMailMemb1'])) AND !empty($_POST['eMailMemb1'])
                AND (isset($_POST['eMailMemb2'])) AND !empty($_POST['eMailMemb2'])
                AND (isset($_POST['souvenirMemb'])) AND !empty($_POST['souvenirMemb'])
                AND (isset($_POST['accordMemb'])) AND ($_POST['accordMemb'] === "on"))
                {

                    $erreur = false;

                    $prenomMembre = ctrlSaisies($_POST['prenomMemb']);
                    $nomMembre = ctrlSaisies($_POST['nomMemb']);
                    $pseudoMembre = ctrlSaisies($_POST['pseudoMemb']);
                    $passMembre1 = ctrlSaisies($_POST['passMemb1']);
                    $passMembre2 = ctrlSaisies($_POST['passMemb2']);
                    $emailMembre1 = ctrlSaisies($_POST['eMailMemb1']);
                    $emailMembre2 = ctrlSaisies($_POST['eMailMemb2']);
                    $dtCreaMembre = date("Y-m-d h:i:s");
                    $souvenirMembre = ctrlSaisies($_POST['souvenirMemb']);
                    $idStat = 1;

                    $pseudoExist = $membre->get_ExistPseudo($pseudoMembre);

                    if($pseudoExist != 0){
                        $errPseudo = "Ce pseudo existe déjà. Veuillez en choisir un nouveau";
                    }
                
                    if ($souvenirMembre == 'off'){
                        $souvenirMembre = 0;
                    }
                    else{
                        $souvenirMembre = 1;
                    }
                    $accordMembre = ctrlSaisies($_POST['accordMemb']);
                    if ($accordMembre == 'on'){
                        $accordMembre = 1;
                    }
                    if (filter_var($emailMembre1, FILTER_VALIDATE_EMAIL) AND filter_var($emailMembre2, FILTER_VALIDATE_EMAIL)) {
                        if ($emailMembre1 == $emailMembre2){
                            $eMailOk = 1;
                        }
                        else{
                            $eMailOk = 0;
                            $errMail2 = "Les adresses mails entrées ne correspondent pas.";
                        }
                    }
                    else {
                        $errMail1 = "L'adresse mail entrée n'est pas valide"; 
                    }

                    if($passMembre1 == $passMembre2){
                        $passwordOk = 1;
                        $passMembre1 = password_hash($_POST['passMemb1'], PASSWORD_DEFAULT);
                    }
                    else{
                        $passwordOk = 0;
                        $errPass = "Le mot de passe et la confirmation de mot de passe ne sont pas identiques";
                    }
                    if(($prenomMembre !="") AND ($nomMembre!="") AND ($idStat!="") AND ($dtCreaMembre!="") AND ($souvenirMembre!="") AND ($accordMembre!="") AND ($eMailOk == 1) AND ($passwordOk == 1) AND ($pseudoExist == 0)){
                        $messageInscri="Veuillez vous connecter pour confirmer votre inscription.";
                        $membre->create($prenomMembre, $nomMembre,$pseudoMembre,$passMembre2,$emailMembre1,$dtCreaMembre, $souvenirMembre,$accordMembre,$idStat);
                        header("Location: ./../../front/includes/pages/connexion.php?id=".$messageInscri);
                    }
                    
                    else{

                        header("Location: ./../../front/includes/pages/inscription.php?id=".$numMembre."&err1=".$errMail1."&err2=".$errMail2."&err3=".$errPass."&err4=".$errPseudo);
                        
                    } 

                } 
                else {
                    $erreur = true;
                    $errSaisies =  "Erreur, la saisie est obligatoire et vous devez obligatoirement accepter la sauvegarde de vos données!";
                    header("Location: ./../../front/includes/pages/inscription.php?id=".$errSaisies.$prenomMembre.$nomMembre.$pseudoMembre.$passMembre1.$passMembre2.$emailMembre1.$emailMembre2.$souvenirMembre.$accordMembre);
                }   // End of else erreur saisies
            
            }
            else {
                    $error = "Captcha invalide !";
                    echo "captch probleme2";
            }
        } 
        else{
            $error = "Captcha invalide !";
            echo "captch probleme1";
        }
    
    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initMembre.php';
?>

