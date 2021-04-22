<?php
///////////////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateLangue.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // modification classe LANGUE
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/langue.class.php';
    global $db;
    $maLangue = new LANGUE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de la LANGUE
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {
            $reload = $_POST['id'];
            header("Location: ./updateLangue.php?id=".$reload);
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création   
        
        if ((isset($_POST['id'])) AND !empty($_POST['id'])
        AND (!empty($_POST['Submit'])) AND ($Submit === "Modifier")
        AND (isset($_POST['lib1Lang'])) AND !empty($_POST['lib1Lang'])
        AND (isset($_POST['lib2Lang'])) AND !empty($_POST['lib2Lang'])
        AND (isset($_POST['pays'])) AND !empty($_POST['pays'])) {
            
            // Saisies valides
            $erreur = false;

            $numLang = ($_POST['id']);

            $lib1Lang = ctrlSaisies(($_POST['lib1Lang']));

            $lib2Lang = ctrlSaisies(($_POST['lib2Lang']));

            $numPays = ($_POST['pays']);
            

            $maLangue->update($numLang, $lib1Lang, $lib2Lang, $numPays);

            header("Location: ./langue.php");
                      
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
            <h2>Modification d'une langue</h2>
    </div>
<?
    // Modif : récup id à modifier
    if (isset($_GET['id']) AND !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));
    
        $query = (array)$maLangue->get_1LangueByPays($id);
        
        if ($query) {
            $lib1Lang = $query['lib1Lang'];
            $lib2Lang = $query['lib2Lang'];
            $numPays = $query['numPays'];
            $numLang = $query['numLang'];
            $frPays = $query['frPays'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)



?>
    <form method="post" action="./updateLangue.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Modification Langue...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

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
                <?php 
                global $db;
                $requete = 'SELECT * FROM pays ;';
                $result = $db->query($requete);
                $allPays = $result->fetchAll();
                foreach ($allPays AS $pays)
                {
                ?>
                <option value="<?= ($pays['numPays']); ?>" <?= (isset($numPays) && $numPays == $pays['numPays'] ) ? " selected=\"selected\"" : null; ?> >
                    <?= $pays['frPays']; ?>
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
require_once __DIR__ . './footerLangue.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
