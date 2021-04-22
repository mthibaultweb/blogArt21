<?php
///////////////////////////////////////////////////////////////
//
//  CRUD ANGLE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateAngle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe ANGLE
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/angle.class.php';
    global $db;
    $monAngle = new ANGLE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du angle
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {
            $reload = $_POST['id'];
            header("Location: ./updateAngle.php?id=".$reload);
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['id'])) AND !empty($_POST['id']))
            AND((isset($_POST['libAngl'])) AND !empty($_POST['libAngl']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Modifier"))
            AND ((isset($_POST['numLang'])) AND !empty($_POST['numLang']))) {
            // Saisies valides
            $erreur = false;

            $libAngl = ctrlSaisies(($_POST['libAngl']));
            $numLang = ctrlSaisies($_POST['numLang']);
            $numAngl = ($_POST['id']);

            $monAngle->update($numAngl, $libAngl, $numLang);

            header("Location: ./angle.php");
        }   // Fin if ((isset($_POST['libAngl'])) ...
        else {
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies
        // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initAngle.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Angle</title>
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
        <h1>BLOGART21 Admin - Gestion du CRUD Angle</h1>
            <h2>Modification d'un angle</h2>
    </div>
<?
    // Modif : récup id à modifier
    if (isset($_GET['id']) and !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$monAngle->get_1AngleByLangue($id);

        if ($query) {
            $libAngl = $query['libAngl'];
            $numLang = $query['numLang'];
            $lib1Lang = $query['lib1Lang'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)


?>
    <form method="post" action="./updateAngle.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Angle...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libAngl">Nouveau nom de l'angle :&nbsp;</label>
            <input type="text" name="libAngl" id="libAngl" pattern=[a-zA-Z0-9À-ž\s]+ title="Lettres, chiffres et espaces uniquement, 60 caractères max" size="60" maxlength="60" value="<?= $libAngl; ?>" autofocus="autofocus" placeholder="Saisir un nom pour l'angle" required/>
        </div>
        <div class="control-group">
            <label for="numLang">Langue :</label>  
            <select id="numLang" name="numLang"  onchange="select()">
            <?php 
            global $db;
            $requete = 'SELECT * FROM LANGUE ;';
            $result = $db->query($requete);
            $allLangue = $result->fetchAll();
            foreach ($allLangue AS $langue)
            {
            ?>
            <option value="<?= ($langue['numLang']); ?>" <?= (isset($numLang) && $numLang == $langue['numLang'] ) ? " selected=\"selected\"" : null; ?> >
                <?= $langue['lib1Lang']; ?>
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
require_once __DIR__ . './footerAngle.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
