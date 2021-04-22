<?php
///////////////////////////////////////////////////////////////
//
//  CRUD USER (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateUser.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe USER
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/user.class.php';
    global $db;
    $user = new USER;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du USER
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {
            $reload = $_POST['pseudoUser'];
            header("Location: ./updateUser.php?id=".$reload);
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['pseudoUser'])) AND !empty($_POST['pseudoUser']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND (isset($_POST['passUser'])) AND !empty($_POST['passUser'])
            AND (isset($_POST['nomUser'])) AND !empty($_POST['nomUser'])
            AND (isset($_POST['prenomUser'])) AND !empty($_POST['prenomUser'])
            AND (isset($_POST['eMailUser1'])) AND !empty($_POST['eMailUser1'])
            AND (isset($_POST['eMailUser2'])) AND !empty($_POST['eMailUser2'])
            AND (isset($_POST['idStat'])) AND !empty($_POST['idStat'])) {
            // Saisies valides
            $erreur = false;

            $pseudoUser = ctrlSaisies($_POST['pseudoUser']);
            $passUser = ctrlSaisies($_POST['passUser']);
            $nomUser = ctrlSaisies($_POST['nomUser']);
            $prenomUser = ctrlSaisies($_POST['prenomUser']);
            $eMailUser1 = ctrlSaisies($_POST['eMailUser1']);
            $eMailUser2 = ctrlSaisies($_POST['eMailUser2']);
            $idStat = ctrlSaisies($_POST['idStat']);
    
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

            
            if(($pseudoUser !="") AND ($nomUser!="") AND ($prenomUser!="") AND ($idStat!="")AND ($eMailOk == 1)){
                
                $user->update($pseudoUser, $passUser, $nomUser, $prenomUser, $eMailUser1, $idStat);
                header("Location: ./user.php");
            }
            else{

                header("Location: ./updateUser.php?id=".$pseudoUser."&err2=".$errMail1."&err3=".$errMail2."&err4=".$errPass);
                
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
        <h2>Modification d'un user</h2>
    </div>
<?
    
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


    // Modif : récup id à modifier
    if (isset($_GET['id']) and !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$user->get_1UserByStatut($id);

        if ($query) {
            $pseudoUser = $query['pseudoUser'];
            $passUser = $query['passUser'];
            $nomUser = $query['nomUser'];
            $prenomUser = $query['prenomUser'];
            $eMailUser1 = $query['eMailUser'];
            $eMailUser2 = $query['eMailUser'];
            $idStat = $query['idStat'];
            $libStat = $query['libStat'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)


?>
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

<fieldset>
    <legend class="legend1">Formulaire User...</legend>

    <input type="hidden" id="id" name="id" value="<? $_GET['id']; ?>">

    <div class="control-group">
        <label class="control-label" for="pseudoUser"><b>Pseudo :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="text" name="pseudoUser" id="pseudoUser" title="Vous ne pouvez pas changer votre pseudo" size="60" maxlength="60" value="<?= $pseudoUser; ?>" readonly />
    </div>
    <div class="control-group">
        <label class="control-label" for="passUser"><b>Mot de passe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="password" name="passUser" id="passUser" title="Vous ne pouvez pas changer de mot de passe" size="60" maxlength="60" value="<?= $passUser; ?>" readonly />
    </div>
    <div class="control-group">
        <label class="control-label" for="nomUser"><b>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="text" name="nomUser" id="nomUser" size="60" maxlength="60" value="<?= $nomUser; ?>" autofocus="autofocus" required/>
    </div>
    <div class="control-group">
        <label class="control-label" for="prenomUser"><b>Prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="text" name="prenomUser" id="prenomUser" size="60" maxlength="60" value="<?= $prenomUser; ?>"  required/>
    </div>
    <div class="control-group">
        <label class="control-label" for="eMailUser1"><b>eMail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
        <input type="email" name="eMailUser1" id="eMailUser1" size="70" maxlength="70" value="<?= $eMailUser1; ?>"  required/>
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
            <option value="<?= ($statut['idStat']); ?>" <?= (isset($idStat) && $idStat == $statut['idStat'] ) ? " selected=\"selected\"" : null; ?> >
                <?= $statut['libStat']; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="control-group">
        <div class="controls">
            <input class="button" type="submit" value="Initialiser" name="Submit" formnovalidate/>
            <input class="button" type="submit" value="Modifier" name="Submit" />
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
