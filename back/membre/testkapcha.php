<?
///////////////////////////////////////////////////////////////
//
//  CRUD MEMBRE (PDO) - Code Modifié - 12 Fevrier 2021
//
//  Script  : createMembre.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV

require_once __DIR__ . './../../util/utilErrOn.php';
require_once __DIR__ . './../../util/ctrlSaisies.php';
    
// Insertion classe
require_once __DIR__ . './../../util/delAccents.php';
require_once __DIR__ . './../../util/dateChangeFormat.php';
include __DIR__ . './../../CLASS_CRUD/membre.class.php';

// Init variables form
include __DIR__ . './initMembre.php';
global $db;
$monMembre= new MEMBRE;

    // insertion classe MEMBRE
    $erreur = false;
    $errSaisies = "";
    //appel du fichier json pour le captcha
    $config = file_get_contents('./../../config.json');
    $configData = json_decode($config);
    //fin d'appel du fichier captcha

    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        //debut if special pour le captcha Gabriel
        if (!empty($_POST['g-recaptcha-response'])) {
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $configData->CAPTCHA_SECRET_KEY . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
    
            if ($responseData->success) {
                //fin du debut if special captcha Gabriel


        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
        //Submit = "";
        if ((isset($_POST['Submit'])) AND ($_POST["Submit"] === "Initialiser")) {
            header("Location: ./createMembre.php");
        }
        // Mode création
       
        if (((isset($_POST['prenomMemb'])) AND !empty($_POST['prenomMemb']))
            AND (((isset($_POST['nomMemb'])) AND !empty($_POST['nomMemb'])))
            AND ((isset($_POST['pseudoMemb'])) AND !empty($_POST['pseudoMemb']))
            AND ((isset($_POST['pass1Memb'])) AND !empty($_POST['pass1Memb']))
            AND ((isset($_POST['pass2Memb'])) AND !empty($_POST['pass2Memb']))
            AND ((isset($_POST['email1Memb'])) AND !empty($_POST['email1Memb']))
            AND ((isset($_POST['email2Memb'])) AND !empty($_POST['email2Memb']))
            AND ((isset($_POST['idStat'])) AND !empty($_POST['idStat']))
            AND((!empty($_POST['Submit']) AND ($Submit === "Valider")))) {
                if (((isset($_POST['accordMemb'])) AND !empty($_POST['accordMemb']))){
            // Saisies valides
            $erreur = false;
            $prenomMemb = ctrlSaisies(($_POST['prenomMemb']));
            $nomMemb = ctrlSaisies(($_POST['nomMemb']));
            $pseudoMemb = ctrlSaisies(($_POST['pseudoMemb']));
            $pseudoLength = strlen($pseudoMemb);
            $pass1Memb = ctrlSaisies(($_POST['pass1Memb']));
            $pass2Memb = ctrlSaisies(($_POST['pass2Memb']));
            $email1Memb = ctrlSaisies(($_POST['email1Memb']));
            $email2Memb = ctrlSaisies(($_POST['email2Memb']));
            $email2Memb = ctrlSaisies(($_POST['email2Memb']));
            $dtCreatMemb = date('Y-m-d H:i:s');
            $idStat = ctrlSaisies(($_POST['idStat']));
            $accordMemb = ($_POST['accordMemb']);
            //$accordMemb = ($accordMemb == "on") ? 1 : 0;
            if ($accordMemb == "on") {
                $accordMemb = 1;
            } else {
                $accordMemb = 0;
            }
            $msgErrExistPseudo = "";

            if ($pseudoLength >= 6 AND $pseudoLength <= 70)
            {
                $pseudoexist = $monMembre->get_ExistPseudo($pseudoMemb);
                if ($pseudoexist == 0)
                {
                    $pseudoExistF1 = 1;
                    $msgErrExistPseudo = "";
                }
                else 
                {
                    $pseudoExistF1 = 0;
                    $msgErrExistPseudo = "&nbsp;&nbsp;- Ce pseudo existe deja <br>";
                }
                $pseudoF1 = 1;
                $msgErrPseudo = "";
            }
            else {
                $pseudoF1 = 0;
                $msgErrPseudo = "&nbsp;&nbsp;- le pseudo doit etre entre 6 et 70 caracteres <br>";
            }
        

            if (filter_var($email1Memb, FILTER_VALIDATE_EMAIL))
            {
                $mail1F1 = 1; //TRUE
                $msgErrMail1 = "";
            } 
            else {
                $mail1F1 = 0; //FALSE
                $msgErrMail1 = "&nbsp;&nbsp;- Premier mail invalide<br>";
            } 
            
            if (filter_var($email2Memb, FILTER_VALIDATE_EMAIL))
                {
                    $mail2F1 = 1; //TRUE
                    $msgErrMail2 = "";
                } 
                else {
                    $mail2F1 = 0; //FALSE
                    $msgErrMail2 = "&nbsp;&nbsp;- Deuxième mail invalide<br>";
                } 
                
            if ($mail1F1 == 1 AND $mail2F1 == 1) 
            {
                  
                if ($email1Memb == $email2Memb) {
                     
                    $mailIdentiqF1 = 1;
                    $msgErrMailIdentiq = "";
                    $emailMemb = $email1Memb;
                } 
            else {  
                    $mailIdentiqF1 = 0;
                    $msgErrMailIdentiq = "&nbsp;&nbsp;- Les deux mails doivent être identique<br>";
                    }
            }
              
                // PASS VALIDE
                if ($pass1Memb == $pass2Memb){
                    $passIdentiqF1 = 1;
                    $msgErrPassIdentiq = ""; 
                } else {
                    $passIdentiqF1 = 0;
                    $msgErrPassIdentiq = "&nbsp;&nbsp;- Les deux mots de passe doivent être identique<br>";
                }
               
                // ACCORD RGPD
                if ($accordMemb == 1){
                    $okRGPD = 1;
                    $msgErrOkRGPD = "";
                } else {
                    $okRGPD = 0;
                    $msgErrOkRGPD = "&nbsp;&nbsp;- Vous devez accepter la conservation de vos données pour vous inscrire<br>";
                }

                if (($prenomMemb != "") AND ($nomMemb != "") AND ($mailIdentiqF1 == 1) AND ($passIdentiqF1 == 1) AND ($pseudoF1 == 1) AND ($pseudoExistF1 == 1) AND ($okRGPD == 1))           
                {
                    $souvenirMemb = ($_POST['souvenirMemb']);
                        //$souvenirMemb = ($souvenirMemb == "on") ? 1 : 0;
                        if ($souvenirMemb == "on") {
                            $souvenirMemb = 1;
                        } else {
                            $souvenirMemb = 0;
                        }
                    $passMemb = password_hash($_POST['pass1Memb'], PASSWORD_DEFAULT);
                    //$emailMemb = $email1Memb;
                    $monMembre->create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $emailMemb, $dtCreatMemb, $souvenirMemb, $accordMemb, $idStat);
                    header("Location: ./membre.php");
                } else {
                    echo "on arrive a rentrer dans la boucle err final";
                    $erreur = true;
                    $errSaisies = "Insert impossible, incohérence données saisies : <br>" . $msgErrExistPseudo . $msgErrPseudo . $msgErrMail1 . $msgErrMail2 . $msgErrMailIdentiq . $msgErrOkRGPD . $msgErrPassIdentiq;
                    //$errSaisies = "Erreur, la saisie est obligatoire !";
                }
                echo "on arrive a sortir dans la boucle final";
            }
            else {
                echo "&nbsp;&nbsp;- Vous devez accepter la conservation de vos données pour vous inscrire<br>";
            }
    
    }
    else {
            
        $erreur = true;
        echo "il faut remplir tout les champs"; 
        }

        //debut fin if special captcha Gabriel
    } else {
        $error = "Captcha invalide !";
        echo "captch probleme2";
    }
} else {
    $error = "Captcha invalide !";
    echo "captch probleme1";
}
//fin du fin if special captcha Gabriel
}
 
 
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- appel script captcha Gabriel-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- appel script captcha Gabriel-->

        <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>
    <h2>Ajout d'un Membre</h2>

    <form  method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>
            <legend class="legend1">Formulaire Membre...</legend>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="prenomMemb"><b>Prenom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="prenomMemb" id="prenomMemb" size="80" maxlength="80" value="<?= $prenomMemb; ?>" tabindex="10" autofocus="autofocus" /><br><br>

                <label class="control-label" for="nomMemb"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="nomMemb" id="nomMemb" size="80" maxlength="80" value="<?= $nomMemb; ?>" tabindex="20" /><br><br>

                <label class="control-label" for="pseudoMemb"><b>Pseudo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="pseudoMemb" id="pseudoMemb" size="80" maxlength="80" value="<?= $pseudoMemb; ?>" tabindex="20" /><br><br>

                <label class="control-label" for="email1Memb"><b>Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="email" name="email1Memb" id="email1Memb" size="80" maxlength="80" value="<?= $email1Memb; ?>" tabindex="20" /><br><br>

                <label class="control-label" for="email2Memb"><b>Confirmation Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="email" name="email2Memb" id="email2Memb" size="80" maxlength="80" value="<?= $email2Memb; ?>" tabindex="20" /><br><br>

                <label class="control-label" for="pass1Memb"><b>Mot de Passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="password" name="pass1Memb" id="pass1Memb" size="80" maxlength="80" value="<?= $pass1Memb; ?>" tabindex="20" /><br><br>

                <label class="control-label" for="pass2Memb"><b> Confirmation Mot de Passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="password" name="pass2Memb" id="pass2Memb" size="80" maxlength="80" value="<?= $pass2Memb; ?>" tabindex="20" /><br><br>

                <input type="checkbox" name="accordMemb" id="accordMemb" value="on" />
                <label class="control-label" for="accordMemb"> J’accepte les Conditions d’utilisation, j'ai lu et compris la Politique de confidentialité et la Politique de cookies des Fines gueules. </label><br><br>

                <input type="checkbox" name="souvenirMemb" id="souvenirMemb" value="on" />
                <label class="control-label" for="souvenirMemb"> Se souvenir de moi </label><br><br>

                <input type="hidden" id="idTypStat" name="idTypStat" value="<?= $idStat; ?>" />
                <select size="1" name="idStat" id="idStat" class="form-control form-control-create" tabindex="30">
                    <option value="-1">Sélectionner un Statut</option>
                    
                    <?
                global $db;
                $idStat = "";
                $libStat = "";

                $queryText = 'SELECT * FROM STATUT ORDER BY libStat;';
                $result = $db->query($queryText);
                if ($result) {
                    while ($tuple = $result->fetch()) {
                        $ListIdStat = $tuple["idStat"];
                        $ListLibStat = $tuple["libStat"];
?>
                    <option value="<?= ($ListIdStat); ?>">
                        <?= $ListLibStat; ?>
                    </option>
                    <?
                    } // End of while ()
                }   // if ($result)
?>
                </select>
                <br><br>
                <br><br>
                <!-- appel  captcha Gabriel-->
                <div class="d-flex justify-content-center">
                    <div class="g-recaptcha" data-sitekey="<?= $configData->CAPTCHA_SITE_KEY; ?>"></div>
                </div>
                <!-- appel captcha Gabriel-->
               


            </div>

            <?  
            if ($erreur)
            {
                echo ($errSaisies);
            }
            else {
                $errSaisies= "";
                echo ($errSaisies);
    
            }
?>

            <div class="control-group">
                <div class="controls">
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Annuler" name="Submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Valider" name="Submit" />
                    <br>
                </div>
            </div>
        </fieldset>
    </form>
    <?
require_once __DIR__ . './footerMembre.php';
require_once __DIR__ . './../../footer.php';
?>