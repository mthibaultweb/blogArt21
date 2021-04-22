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
                        
                        $membre->create($prenomMembre, $nomMembre,$pseudoMembre,$passMembre2,$emailMembre1,$dtCreaMembre, $souvenirMembre,$accordMembre,$idStat);
                        header("Location: ./membre.php");
                    }
                    
                    else{

                        header("Location: ./createMembre.php?id=".$numMembre."&err1=".$errMail1."&err2=".$errMail2."&err3=".$errPass."&err4=".$errPseudo);
                        
                    } 

                } 
                else {
                    $erreur = true;
                    $errSaisies =  "Erreur, la saisie est obligatoire et vous devez obligatoirement accepter la sauvegarde de vos données!";
                    header("Location: ./createMembre.php?id=".$errSaisies);
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="./../../front/assets/css/normalize.css">

    <link rel="stylesheet" href="./../../front/assets/css/nav.css">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/gestionCRUD.css">
    <link rel="stylesheet" href="./../css/form.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
<?php
include __DIR__ ."./../commons/navbar.php";
?>
<div class="wrapper">
    <div class="Titre">
        <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
        <h2>Ajout d'un membre</h2>
    </div>


    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Membre...</legend>

        <div class="control-group">
            <label class="control-label" for="prenomMemb"><b>Prénom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomMemb" id="prenomMemb" size="70" maxlength="70" value="<?= $prenomMembre; ?>" autofocus="autofocus" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="nomMemb"><b>Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomMemb" id="nomMemb" size="70" maxlength="70" value="<?= $nomMembre; ?>" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="pseudoMemb"><b>Pseudo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoMemb" id="pseudoMemb" size="70" maxlength="70" value="<?= $pseudoMembre; ?>"  required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="passMemb1"><b>Mot de passe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passMemb1" id="passMemb1" size="70" maxlength="70" value="<?= $passMembre1; ?>"  required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="passMemb2"><b>Confirmation mot de passe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passMemb2" id="passMemb2" size="70" maxlength="70" value="<?= $passMembre2; ?>"  required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailMemb1"><b>e-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMailMemb1" id="eMailMemb1" size="100" maxlength="100" value="<?= $emailMembre1; ?>" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailMemb2"><b>Confirmation e-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMailMemb2" id="eMailMemb2" size="100" maxlength="100" value="<?= $emailMembre2; ?>" required/>
        </div>

        <div class="control-group">
            <label class="control-label" for="souvenirMemb"><b>Se souvenir de moi :</b></label>
            <div class="controls">
               <fieldset>
                  <input type="radio" name="souvenirMemb"
                  <?= ($souvenirMembre == "on") ? 'checked="checked"' : ''
                  ?> value="on" />&nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="souvenirMemb"
                  <?= ($souvenirMembre == "off") ? 'checked="checked"' : ''
                  ?> value="off" checked="checked" />&nbsp;&nbsp;Non
               </fieldset>
            </div>
        </div>
      
        <div class="control-group">
            <label class="control-label" for="accordMemb"><b>J'accepte que mes données soient conservées :</b></label>
            <div class="controls">
               <fieldset>
                  <input type="radio" name="accordMemb"
                  <?= ($accordMembre == "on") ? 'checked="checked"' : ''
                  ?> value="on" />&nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="accordMemb"
                  <?= ($accordMembre == "off") ? 'checked="checked"' : ''
                  ?> value="off" checked="checked" />&nbsp;&nbsp;Non
               </fieldset>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="g-recaptcha" data-sitekey="<?= $configData->CAPTCHA_SITE_KEY; ?>"></div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input class="button" type="submit" value="Annuler" name="Submit" formnovalidate/>
                <input class="button" type="submit" value="Valider" name="Submit" />
            </div>
        </div>
      </fieldset>
    </form>
</div>
<?php

if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $errSaisies = ($_GET['id']);
    echo $errSaisies;
}
if (isset($_GET['err1']) AND !empty($_GET['err1'])){
    $errPass = $_GET['err1'];
    echo $errPass.'</br>';
}
if (isset($_GET['err2']) AND !empty($_GET['err2'])){
    $errMail1 = $_GET['err2'];
    echo $errMail1.'</br>';
}
if (isset($_GET['err3']) AND !empty($_GET['err3'])){
    $errMail2 = $_GET['err3'];
    echo $errMail2.'</br>';
} 
if (isset($_GET['err4']) AND !empty($_GET['err4'])){
    $errMail2 = $_GET['err4'];
    echo $errMail2.'</br>';
} 

require_once __DIR__ . './footerMembre.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
