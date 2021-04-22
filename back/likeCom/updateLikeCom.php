<?
///////////////////////////////////////////////////////////////
//
//  CRUD LIKEART (PDO) - Code Modifié - 30 Janvier 2021
//
//  Script  : createLikeCom.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
    require_once __DIR__ . './../../util/utilErrOn.php';
    
    
    // controle des saisies du formulaire
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    include __DIR__ . './../../CLASS_CRUD/likeCom.class.php';
    include __DIR__ . './initLikeCom.php';

    
    global $db;
    $likeCom= new LIKECOM;
    // insertion classe STATUT

    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
        //Submit = "";
        if ((isset($_POST["Submit"])) AND ($Submit === "Initialiser")) {

            $sameId1 = $_POST['id1'];
            $sameId2 = $_POST['id2'];
            $sameId3 = $_POST['id3'];
            header("Location: ./updateLikeCom.php?id1=".$sameId1."&id2=".$sameId2."&id3=".$sameId3);
        }
        // Mode création
        if (((isset($_POST['id1'])) AND !empty($_POST['id1']))
        AND ((isset($_POST['id2'])) AND !empty($_POST['id2']))
        AND ((isset($_POST['id3'])) AND !empty($_POST['id3']))
        AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
            // Saisies valides
            $erreur = false;
            $numMemb = ctrlSaisies(($_POST['id1']));
            $numArt = ctrlSaisies(($_POST['id2']));
            $numSeqCom = ctrlSaisies(($_POST['id3']));
            $valLikeC = ctrlSaisies($_POST['likeC']);
            $likeC = ($valLikeC == "on") ? 1 : 0;
            $likeCom->update($numMemb, $numArt, $numSeqCom, $likeC);

            header("Location: ./likeCom.php");

        }   // Fin if
        else {
            $erreur = true;
            $errSaisies = "Erreur, la saisie est obligatoire !";
        }
            
    }

    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like Commentaire</title>
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
        <h1>BLOGART21 Admin - Gestion du CRUD Like Commentaire</h1>
        <h2>Modification d'un like commentaire</h2>
    </div>
    <?
    global $db;
     if (isset($_GET['id1']) and $_GET['id1'] AND isset($_GET['id2']) and $_GET['id2' ]AND isset($_GET['id3']) and $_GET['id3']) {

        
        $id1 = ctrlSaisies(($_GET['id1']));
        $id2 = ctrlSaisies(($_GET['id2']));
        $id3 = ctrlSaisies(($_GET['id3']));

        
        $query = (array)$likeCom->get_1LikeCom($id1, $id2, $id3);

        if ($query) {
            $likeC = $query['likeC'];
            $pseudoMemb = $query['pseudoMemb'];
            $libTitrArt = $query['libTitrArt'];
            $libCom = $query['libCom'];    
            
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)
?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>
            <legend class="legend1">Formulaire Like Commentaire...</legend>

            <input type="hidden" id="id1" name="id1" value="<?= isset($_GET['id1']) ? $_GET['id1'] : '' ?>" />
            <input type="hidden" id="id2" name="id2" value="<?= isset($_GET['id2']) ? $_GET['id2'] : '' ?>" />
            <input type="hidden" id="id3" name="id3" value="<?= isset($_GET['id3']) ? $_GET['id3'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="pseudoMemb"><b>Membre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="pseudoMemb" id="pseudoMemb" size="80" maxlength="80" value="<?= $pseudoMemb; ?>" readonly/>
            </div>
            <div class="control-group">
                <label class="control-label" for="libTitrArt"><b>Titre de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libTitrArt" id="libTitrArt" size="80" maxlength="80" value="<?= $libTitrArt; ?>" readonly/>
            </div>
            <div class="control-group">
                <label class="control-label" for="libCom"><b>Titre de l'article:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                <input type="text" name="libCom" id="libCom" size="80" maxlength="80" value="<?= $libCom; ?>" readonly/>
            </div>
                
            <br><br>
            <label class="control-label" for=""><b> Voulez vous liker ce Commentaire? :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label><br>
            
            <input type="checkbox" name="likeC" id="likeC" <?=  ($likeC == 1)  ? 'checked="checked" "value="on" ' : 'value="on"' ?> />




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
                <input class="button" type="submit" value="Initialiser" name="Submit" formnovalidate/>
                <input class="button" type="submit" value="Modifier" name="Submit" />
            </div>
        </div>
      </fieldset>
    </form>
</div>
    <?
require_once __DIR__ . './footerLikeCom.php';

require_once __DIR__ . './footer.php';
?>
</body>

</html>