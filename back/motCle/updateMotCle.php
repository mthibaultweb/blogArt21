<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateMotCle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // modification classe LANGUE
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/motCle.class.php';
    global $db;
    $monMotCle = new MOTCLE;
    

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif de la LANGUE
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {
            $reload = $_POST['id'];
            header("Location: ./updateMotCle.php?id=".$reload);
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création   
        
        if ((isset($_POST['id'])) AND !empty($_POST['id'])
        AND (!empty($_POST['Submit'])) AND ($_POST['Submit'] === "Modifier")
        AND (isset($_POST['libMotCle'])) AND !empty($_POST['libMotCle'])
        AND (isset($_POST['numLang'])) AND !empty($_POST['numLang'])) {
            
            // Saisies valides
            $erreur = false;

            $numMotCle = ($_POST['id']);

            $libMotCle = ctrlSaisies(($_POST['libMotCle']));

            $numLang = ($_POST['numLang']);    

            $monMotCle->update($numMotCle, $libMotCle, $numLang);
            header("Location: ./motCle.php");
                      
        }   // Fin if ((isset($_POST['libStat'])) ...
        else {
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
        }   // End of else erreur saisies




    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initMotCle.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mots Clés</title>
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
    <h1>BLOGART21 Admin - Gestion du CRUD Mots Clés</h1>
    <h2>Modification d'un mot clé</h2>
    </div>
    
<?
    // Modif : récup id à modifier
    if (isset($_GET['id']) AND !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$monMotCle->get_1MotCleByLangue($id);
        
        if ($query) {
            $libMotCle = $query['libMotCle'];
            $numLang = $query['numLang'];
            $lib1Lang = $query['lib1Lang'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)


?>
    <form method="post" action="./updateMotCle.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Modification Mot Clé...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

        <div class="control-group">
            <label class="control-label" for="libMotCle"><b>Mot Clé&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libMotCle" id="libMotCle" size="60" maxlength="60" value="<?= $libMotCle; ?>" autofocus="autofocus" required/>
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
require_once __DIR__ . './footerMotCle.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
