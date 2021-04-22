<?php
///////////////////////////////////////////////////////////////
//
//  CRUD ANGLE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createAngle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe ANGLE
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/getNextNumAngl.php';
    require_once __DIR__ . './../../CLASS_CRUD/angle.class.php';
    global $db;
    $monAngle = new ANGLE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du angle
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./angle.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libAngl'])) AND !empty($_POST['libAngl']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND ((isset($_POST['numLang'])) AND !empty($_POST['numLang']))) {
            // Saisies valides
            $erreur = false;

            $libAngl = ctrlSaisies(($_POST['libAngl']));
            $numLang = ctrlSaisies($_POST['numLang']);
            $numAngl = getNextNumAngl($numLang);
            echo $numAngl;

            $monAngle->create($numAngl, $libAngl, $numLang);

            header("Location: ./angle.php");
        }   // Fin if ((isset($_POST['libAngl'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

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
        <h2>Ajout d'un angle</h2>
    </div>
    <form method="post" action="./createAngle.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Angle...</legend>

        <div class="control-group">
            <label class="control-label" for="libAngl">Nom de l'angle :&nbsp;</label>
            <input type="text" name="libAngl" id="libAngl" pattern=[a-zA-Z0-9À-ž\s]+ title="Lettres, chiffres et espaces uniquement, 60 caractères max" size="60" maxlength="60" value="<?= $libAngl; ?>" autofocus="autofocus" placeholder="Saisir un nom pour l'angle" required/>
        </div>

        <div class="control-group">
            <label for="numLang">Langue :&nbsp;</label>  
            <select id="numLang" name="numLang" onchange="select()" required>
            <option value="" selected disabled hidden>Sélectionner une langue</option>
                <?php 
                global $db;
                $requete = 'SELECT numLang, lib1Lang FROM LANGUE ;';
                $result = $db->query($requete);
                $allLangue = $result->fetchAll();
                foreach ($allLangue AS $langue)
                {
                ?>
                <option value="<?php echo $langue['numLang'];?>"><?php echo $langue['lib1Lang'];?></option>
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
require_once __DIR__ . './footerAngle.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
