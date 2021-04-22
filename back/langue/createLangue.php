<?php
///////////////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createLangue.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe LANGUE
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/getNextNumLang.php';
    require_once __DIR__ . './../../CLASS_CRUD/langue.class.php';
    global $db;
    $maLangue = new LANGUE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de la langue
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./langue.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (((isset($_POST['lib1Lang'])) AND !empty($_POST['lib1Lang']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))) {
                if ((isset($_POST['lib2Lang'])) AND !empty($_POST['lib2Lang'])) {
                    if ((isset($_POST['pays'])) AND !empty($_POST['pays'])) {
            
                        // Saisies valides
                        $erreur = false;

                        $lib1Lang = ctrlSaisies(($_POST['lib1Lang']));

                        $lib2Lang = ctrlSaisies(($_POST['lib2Lang']));

                        $numPays = ($_POST['pays']);
                        
                        $numLang = getNextNumLang($numPays);

                        $maLangue->create($numLang, $lib1Lang, $lib2Lang, $numPays);

                        header("Location: ./langue.php");
                    }
                }
        }   // Fin if ((isset($_POST['lib1Lang'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initLangue.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Langue</title>
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
        <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>
        <h2>Ajout d'une langue</h2>
    </div>

    <form method="post" action="./createLangue.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Langue...</legend>

        <!--<input type="hidden" id="id" name="id" value=": /*$_GET['id']; */-->
        
        <div class="control-group">
            <label class="control-label" for="lib1Lang">Langue libellé court :&nbsp;</label>
            <input type="text" name="lib1Lang" id="lib1Lang" size="30" maxlength="30" value="<?= $lib1Lang; ?>" placeholder="Saisir un libellé court (30 caractères max)" autofocus="autofocus" required/>
        </div>
        <div class="control-group">
            <label class="control-label" for="lib2Lang">Langue libellé long :&nbsp;</label>
            <input type="text" name="lib2Lang" id="lib2Lang" size="60" maxlength="60" value="<?= $lib2Lang; ?>" placeholder="Saisir un libellé long (60 caractères max)" required/>
        </div>
        <div class="control-group">
            <label for="pays">Num Pays :</label>  
            <select id="pays" name="pays"  onchange="select()" required>
                <option value="" selected disabled hidden>Sélectionner un pays</option>
                <?php 
                global $db;
                $requete = 'SELECT * FROM pays ;';
                $result = $db->query($requete);
                $allPays = $result->fetchAll();
                foreach ($allPays AS $pays)
                {
                ?>
                <option value="<?php echo $pays['numPays'];?>"><?php echo $pays['frPays'];?></option>
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
require_once __DIR__ . './footerLangue.php';
require_once __DIR__ . './footer.php';
?>
</body>
</html>