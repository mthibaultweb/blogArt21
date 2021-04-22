<?php
///////////////////////////////////////////////////////////////
//
//  CRUD COMMENT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateComment.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // modification classe COMMENT
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/comment.class.php';
    global $db;
    $monComment = new COMMENT;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de la COMMENT
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {
            header("Location: ./comment.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création   
        
        if ((isset($_POST['id'])) AND !empty($_POST['id'])
        AND (isset($_POST['id2'])) AND !empty($_POST['id2'])
        AND (!empty($_POST['Submit'])) AND ($Submit === "Valider"))
        {
            // Saisies valides
            $erreur = false;

            $numSeqCom = ($_POST['id']);
            $numArt = ($_POST['id2']);
            $attModOK = ($_POST['attModOK']);
            $affComOK = ($_POST['affComOK']);


            $attModOK = 1;
            $affComOK = 1;
            $notifComKOAff = null;

            $monComment->update($numSeqCom, $numArt, $attModOK, $affComOK, $notifComKOAff );

            header("Location: ./comment.php");
                      
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initComment.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Commentaire</title>
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
        <h1>BLOGART21 Admin - Gestion du CRUD Commentaire</h1>
        <h2>Validation d'un commentaire</h2>
    </div>
<?
    // Modif : récup id à modifier
    if (isset($_GET['id']) AND !empty($_GET['id'])
    AND isset($_GET['id2']) AND !empty($_GET['id2'])) {

        $id = ctrlSaisies(($_GET['id']));
        $id2 = ctrlSaisies(($_GET['id2']));
    
        $query = (array)$monComment->get_1CommentByArt($id, $id2);
        
        if ($query) {
            $numSeqCom = $query['numSeqCom'];
            $numArt = $query['numArt'];
            $libCom = $query['libCom'];
            $libTitrArt = $query['libTitrArt'];
            $attModOK = $query['attModOK'];
            $affComOK = $query['affComOK'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)

?>
    <form method="post" action="./updateComment.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Validation d'un commentaire...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />
        <input type="hidden" id="id2" name="id2" value="<?= $_GET['id2']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libCom"><b>Commentaire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libCom" id="libCom" size="80" maxlength="80" value="<?= $libCom; ?>" autofocus="autofocus" readonly/>
        </div>

        <div class="control-group">
            <label class="control-label" for="libTitrArt"><b>Titre de l'article&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $libTitrArt; ?>"  readonly/>
        </div>
        <input type="hidden" id="attModOK" name="attModOK" value="<?= $attModOK; ?>" />
        <input type="hidden" id="affComOK" name="affComOK" value="<?= $affComOK; ?>" />
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
require_once __DIR__ . './footerComment.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
