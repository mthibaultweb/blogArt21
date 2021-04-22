<?php
///////////////////////////////////////////////////////////////
//
//  CRUD ANGLE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteAngle.php  (ETUD)   -   BLOGART21
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

    // Ctrl CIR
    require_once __DIR__ . './../../CLASS_CRUD/article.class.php';
    global $db;
    $monArticle = new ARTICLE;
    $errCIR = 0;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // suppression effective de l'angle
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Opérateur ternaire
    $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

    if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

        header("Location: ./angle.php");
    }   // End of if ((isset($_POST["submit"])) ...

    if (isset($_POST['id']) AND (!empty($_POST['id']))
        AND (!empty($_POST['Submit']) AND ($Submit === "Supprimer"))) {
            
            $numAngl = ctrlSaisies($_POST['id']);

            $allArticle = $monArticle->get_NbAllAnglByArt($numAngl);
            
            if($allArticle < 1){
                
                $monAngle->delete($numAngl);
                header("Location: ./angle.php");

            }
            else{
                $errCIR = 1;
                header("Location: ./angle.php?errCIR=".$errCIR);
            }        

    }   // End of if ((isset($_POST['id'])
    else {
        echo "Ne fonctionne pas";
    }
}   // End of if ($_SERVER["REQUEST_METHOD"] === "POST")

// Init variables form
include __DIR__ . './initAngle.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD ANGLE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="../../front/assets/css/normalize.css">

    <link rel="stylesheet" href="../../front/assets/css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/gestionCRUD.css">
    <link rel="stylesheet" href="../css/form.css">

</head>
<body>
<?php
include __DIR__ ."./../commons/navbar.php";
?>
<div class="wrapper">
<div class="Titre">
        <h1>BLOGART21 Admin - Gestion du CRUD Angle</h1>
        <h2>Suppression d'un angle</h2>
    </div>
<? 
// Modif : récup id à modifier
    if (isset($_GET['id']) and !empty($_GET['id'])){

        $id = ctrlSaisies(($_GET['id']));

        $query = (array)$monAngle->get_1AngleByLangue($id);

        if ($query) {
            $libAngl = $query['libAngl'];
            $lib1Lang = $query['lib1Lang'];
        }   // Fin if ($query)
    }   // Fin if (isset($_GET['id'])...)


?>    
    <form method="post" action="./deleteAngle.php" enctype="multipart/form-data">

      <fieldset>
        <legend class="legend1">Formulaire Angle...</legend>

        <input type="hidden" id="id" name="id" value="<?= $_GET['id'];?>"/>

        <div class="control-group">
            <label class="control-label" for="libAngl">Nom de l'angle :&nbsp;</label>
            <input type="text" name="libAngl" id="libAngl" size="60" maxlength="60" value="<?= $libAngl; ?>" readonly/>
        </div>
        <div class="control-group">
            <label class="control-label" for="lib1Lang">Langue :&nbsp;</label>
            <input type="text" name="lib1Lang" id="lib1Lang" size="60" value="<?= $lib1Lang; ?>" readonly/>
        </div>
        
        <div class="control-group">
            <div class="controls">
                <input class="button" type="submit" value="Annuler" name="Submit" formnovalidate/>
                <input class="button" type="submit" value="Supprimer" name="Submit" />
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
