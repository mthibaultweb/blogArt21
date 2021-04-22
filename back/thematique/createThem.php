<?php
///////////////////////////////////////////////////////////////
//
//  CRUD THEMATIQUE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createThem.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/getNextNumThem.php';
    require_once __DIR__ . './../../CLASS_CRUD/thematique.class.php';
    global $db;
    $maThematique = new THEMATIQUE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./thematique.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['libThem'])) AND !empty($_POST['libThem']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND ((isset($_POST['numLang'])) AND !empty($_POST['numLang']))) {
            // Saisies valides
            $erreur = false;

            $libThem = ctrlSaisies(($_POST['libThem']));
            $numLang = ctrlSaisies($_POST['numLang']);
            $numThem = getNextNumThem($numLang);
            echo $numAngl;

            $maThematique->create($numThem, $libThem, $numLang);

            header("Location: ./thematique.php");
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initThematique.php';
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
    <h1>BLOGART21 Admin - Gestion du CRUD Thématique</h1>
    <h2>Ajout d'une thématique</h2>
    </div>
    
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Thématique...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->

        <div class="control-group">
            <label class="control-label" for="libThem"><b>Nom de la thématique :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libThem" id="libThem" size="60" maxlength="60" value="<?= $libThem; ?>" autofocus="autofocus" required/>
        </div>

        <div class="control-group">
            <label for="numLang">Langue :</label>  
            <select id="numLang" name="numLang"  onchange="select()" required>
                <?php 
                global $db;
                $requete = 'SELECT numLang, lib1Lang FROM langue ;';
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
require_once __DIR__ . './footerThematique.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
