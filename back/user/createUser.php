<?php
///////////////////////////////////////////////////////////////
//
//  CRUD USER (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createUser.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe USER
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/user.class.php';
    global $db;
    $user = new USER;



    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./user.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['pseudoUser'])) AND !empty($_POST['pseudoUser']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND (isset($_POST['passUser1'])) AND !empty($_POST['passUser1'])
            AND (isset($_POST['passUser2'])) AND !empty($_POST['passUser2'])
            AND (isset($_POST['nomUser'])) AND !empty($_POST['nomUser'])
            AND (isset($_POST['prenomUser'])) AND !empty($_POST['prenomUser'])
            AND (isset($_POST['eMailUser1'])) AND !empty($_POST['eMailUser1'])
            AND (isset($_POST['eMailUser2'])) AND !empty($_POST['eMailUser2'])
            AND (isset($_POST['idStat'])) AND !empty($_POST['idStat'])) {
            // Saisies valides
            $erreur = false;

            $pseudoUser = ctrlSaisies($_POST['pseudoUser']);
            $passUser1 = ctrlSaisies($_POST['passUser1']);
            $passUser2 = ctrlSaisies($_POST['passUser2']);
            $nomUser = ctrlSaisies($_POST['nomUser']);
            $prenomUser = ctrlSaisies($_POST['prenomUser']);
            $eMailUser1 = ctrlSaisies($_POST['eMailUser1']);
            $eMailUser2 = ctrlSaisies($_POST['eMailUser2']);
            $idStat = ctrlSaisies($_POST['idStat']);
           
            
            $pseudoExist = $user->get_ExistPseudo($pseudoUser);

            if($pseudoExist != 0){
                $errPseudo = "Ce pseudo existe déjà. Veuillez en choisir un nouveau";
            }
            if (filter_var($eMailUser1, FILTER_VALIDATE_EMAIL) AND filter_var($eMailUser2, FILTER_VALIDATE_EMAIL)) {
                if ($eMailUser1 == $eMailUser2){
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

            if($passUser1 == $passUser2){
                $passwordOk = 1;
                $passUser1 = password_hash($_POST['passUser1'], PASSWORD_DEFAULT);
            }
            else{
                $passwordOk = 0;
                $errPass = "Le mot de passe et la confirmation de mot de passe ne sont pas identiques";
            }

            
            if(($pseudoUser !="") AND ($nomUser!="") AND ($prenomUser!="") AND ($idStat!="")AND ($eMailOk == 1) AND ($passwordOk == 1) AND ($pseudoExist == 0)){
                
                $user->create($pseudoUser, $passUser2, $nomUser, $prenomUser, $eMailUser1, $idStat);
                header("Location: ./user.php");
            }
            else{

                header("Location: ./createUser.php?id=".$pseudoUser."&err1=".$errPseudo."&err2=".$errMail1."&err3=".$errMail2."&err4=".$errPass);
                
            }
        }
    
    }   
    // Init variables form
    include __DIR__ . './initUser.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="./../../front/assets/css/normalize.css">

    <link rel="stylesheet" href="./../../front/assets/css/nav.css">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/gestionCRUD.css">
    <link rel="stylesheet" href="./../css/form.css">
    
</head>
<body>
<?php
include __DIR__ ."./../commons/navbar.php";
?>
<div class="wrapper">
    <div class="Titre">
        <h1>BLOGART21 Admin - Gestion du CRUD User</h1>
        <h2>Ajout d'un user</h2>
    </div>
    <?php
    if (isset($_GET['err1']) AND !empty($_GET['err1'])){
        $errPseudo = $_GET['err1'];
        echo $errPseudo.'</br>';
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
        $errPass = $_GET['err4'];
        echo $errPass.'</br>';
    }
    ?>
    
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire User...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->

        <div class="control-group">
            <label class="control-label" for="pseudoUser"><b>Pseudo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoUser" id="pseudoUser" size="60" maxlength="60" value="<?= $pseudoUser; ?>" autofocus="autofocus" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="passUser1"><b>Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passUser1" id="passUser1" size="60" maxlength="60" value="<?= $passUser1; ?>" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="passUser2"><b>Confirmation mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="passUser2" id="passUser2" size="60" maxlength="60" value="<?= $passUser2; ?>" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="nomUser"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomUser" id="nomUser" size="60" maxlength="60" value="<?= $nomUser; ?>" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="prenomUser"><b>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomUser" id="prenomUser" size="60" maxlength="60" value="<?= $prenomUser; ?>" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailUser1"><b>eMail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMailUser1" id="eMailUser1" size="70" maxlength="70" value="<?= $eMailUser1; ?>" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="eMailUser2"><b>Confirmation eMail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMailUser2" id="eMailUser2" size="70" maxlength="70" value="<?= $eMailUser2; ?>" required/>
        </div>
        <div class="control-group">
            <label for="idStat">Statut:</label>  
            <select id="idStat" name="idStat"  onchange="select()" required>
                <?php 
                global $db;
                $requete = 'SELECT idStat, libStat FROM statut ;';
                $result = $db->query($requete);
                $allStatut = $result->fetchAll();
                foreach ($allStatut AS $statut)
                {
                ?>
                <option value="<?php echo $statut['idStat'];?>"><?php echo $statut['libStat'];?></option>
                <?php
                }
                ?>
            </select>
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
require_once __DIR__ . './footerUser.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
