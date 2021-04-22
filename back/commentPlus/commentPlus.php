<?
/////////////////////////////////////////////////////
//
//  CRUD COMMENTPLUS (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : commentPlus.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Commentaire sur commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="./../../front/assets/css/normalize.css">
    
    <link rel="stylesheet" href="./../../front/assets/css/nav.css">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/gestionCRUD.css" >

</head>
<body>
<?php
    include __DIR__ ."./../commons/navbar.php";
    ?>
    <div class="wrapper">
        <div class="hautpage">
            <div class="Titre">
                <h1>BLOGART21 Admin - Gestion du CRUD Réponses sur commentaire</h1>

                <h2>Toutes les réponses sur commentaire</h2>

            </div>

            <!-- <div class="creerBt">
                <button class="button" onclick="location.href='./createAngle.php'">
                    Répondre à un commentaire sur commentaire
                </button>
            </div> -->
        </div>

    <br><br><br><br><br><br><br>

    <h2>En construction :-)</h2>

    <br><br><br><br><br><br><br><br><br><br>
</div>

<?
require_once __DIR__ . './footer.php';
?>
</body>
</html>
