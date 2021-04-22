<?
///////////////////////////////////////////////////////////////
//
//  CRUD LIKEART (PDO) - Code Modifié - 30 Janvier 2021
//
//  Script  : createLangue.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
    require_once __DIR__ . './../../util/utilErrOn.php';
    
    
    // controle des saisies du formulaire
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/likeArt.class.php';
    require_once __DIR__ . './../../CLASS_CRUD/article.class.php';
    require_once __DIR__ . './../../CLASS_CRUD/membre.class.php';

    
    global $db;
    $monLikeArt= new LIKEART;
    $monArticle = new ARTICLE;
    $membre = new MEMBRE;
    // insertion classe STATUT

    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
        //Submit = "";
        if ((isset($_POST['Submit'])) AND ($_POST["Submit"] === "Annuler")) {
            header("Location: ./likeArt.php");
        }
        // Mode création
        if (((isset($_POST['numArt'])) AND !empty($_POST['numArt']))
        AND ((isset($_POST['numMemb'])) AND !empty($_POST['numMemb']))
        AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
            // Saisies valides
            $erreur = false;
            $numMemb = ctrlSaisies(($_POST['numMemb']));
            $numArt = ctrlSaisies(($_POST['numArt']));
            $valLikeA = ctrlSaisies($_POST['likeA']);
            $likeA = ($valLikeA == "on") ? 1 : 0;
            // var_dump($numMemb);
            // var_dump($numArt);
            // var_dump($likeA);
            $monLikeArt->create($numArt, $numMemb, $likeA);

            header("Location: ./likeArt.php");

        }   // Fin if
        else {
            $erreur = true;
            $errSaisies = "Erreur, la saisie est obligatoire !";
        }
            
    }

    include __DIR__ . './initLikeArt.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Like Article</title>
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
        <h1>BLOGART21 Admin - Gestion du CRUD Like Article</h1>
        <h2>Ajout d'un like sur article</h2>
    </div>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

        <fieldset>
            <legend class="legend1">Formulaire Like Article...</legend>

            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="control-group">
                <label class="control-label" for="numMemb"><b>Quel Membre :&nbsp;</b></label>
                <select size="1" name="numMemb" id="numMemb" class="form-control form-control-create">
                    <option value="-1">--- Selectionner un membre ---</option>
                    <?
                    $allMembre = $membre->get_AllMembre();
                    foreach($allMembre as $membre){
                        
                        echo "<option value='" . $membre["numMemb"] . "' >" . $membre["pseudoMemb"] . "</option>";

                    } 
                
                    ?>
                </select>

                <br><br>
                <label class="control-label" for="numArt"><b>Quel Article :&nbsp;&nbsp;</b></label>
                <select size="1" name="numArt" id="numArt" class="form-control form-control-create" tabindex="30">
                    <option value="-1">--- Selectionner un Article ---</option>
                    <?
                    $allArticle = $monArticle->get_AllArticle();
                    foreach($allArticle as $article){
                        
                        echo "<option value='" . $article["numArt"] . "' >" . $article["libTitrArt"] . "</option>";

                    } 
                
                    ?>
                </select>
                <br><br>
                <label class="control-label" for=""><b> Voulez vous liker cet article? :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label><br>

                <input type="checkbox" name="likeA" id="likeA" value="on"  />


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
                <input class="button" type="submit" value="Annuler" name="Submit" formnovalidate/>
                <input class="button" type="submit" value="Valider" name="Submit" />
            </div>
        </div>
      </fieldset>
    </form>
</div>
    <?
require_once __DIR__ . './footerLikeArt.php';

require_once __DIR__ . './footer.php';
?>
</body>

</html>