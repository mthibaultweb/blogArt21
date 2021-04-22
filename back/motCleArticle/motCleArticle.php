<?
/////////////////////////////////////////////////////
//
//  CRUD MOTCLEARTICLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : motCleArticle.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

require_once __DIR__ . './../../CLASS_CRUD/motCleArticle.class.php';
global $db;
$monMotCleArticle = new MOTCLEARTICLE;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Mots-Clés / Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="./../../front/assets/css/normalize.css">
    
    <link rel="stylesheet" href="./../../front/assets/css/nav.css">
    <link rel="stylesheet" href="./../css/footer.css">
    <link rel="stylesheet" href="./../css/gestionCRUD.css" >

</head>
<body>*<?php
    include __DIR__ ."./../commons/navbar.php";
    ?>
    <div class="wrapper">
        <div class="hautpage">
            <div class="Titre">
                <h1>BLOGART21 Admin - Gestion du CRUD Mots Clés / Articles</h1>

                <h2>Toutes les jointures mots clés / articles</h2>

            </div>
        </div>
    <div class="tableArea">
    <table class="tableau">
    <thead class="entete">
        <tr>
            <th>&nbsp;Titre Article&nbsp;</th>
            <th>&nbsp;Mots Clés&nbsp;</th>
            <!-- <th>&nbsp;Action&nbsp;</th> -->
        </tr>
    </thead>
    <tbody class="body">
    <?
    $allMotCleArticle = $monMotCleArticle->get_AllMotCleArticle();
    foreach($allMotCleArticle as $row){
    // Appel méthode : toutes les langues en BDD

    // Boucle pour afficher
    //foreach($all as $row) {
    ?>
        <tr>
        <td><h4>&nbsp; <?php echo $row["libTitrArt"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["libMotCle"]; ?> &nbsp;</td>

        <!-- <td>&nbsp;<a class="button" href="./deleteMotCleArticle.php?id=$row["numMotCle"];"><i>Supprimer</i></a>&nbsp; -->
        </td>
        </tr>
    <?
    }	// End of foreach
    ?>
    </tbody>
    </table>
</div>
</div>
    <?
    require_once __DIR__ . './footer.php';
    ?>
</body>
</html>