<?
/////////////////////////////////////////////////////
//
//  CRUD ARTICLE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : article.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';
require_once __DIR__ . './../../util/dateChangeFormat.php';

    // insertion classe ARTICLE
    require_once __DIR__ . './../../CLASS_CRUD/article.class.php';
    global $db;
    $monArticle = new ARTICLE;


    $errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    }  



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Article</title>
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
            <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>

            <h2>Tous les articles</h2>

        </div>

        <div class="creerBt">
            <button class="button" onclick="location.href='./createArticle.php'">
                Créer un article
            </button>
        </div>
    </div>
    <?php
    if ($errCIR == 1){
        echo 'Vous ne pouvez pas supprimer cet article. Veuillez d\'abord supprimer cet article dans les autres tables';
    }
    ?>
    <div class="tableArea">
        <table class="tableau">
            <thead class="entete">
                <tr>
                    <th>&nbsp;Numéro Article&nbsp;</th>
                    <th>&nbsp;Date de création&nbsp;</th>
                    <th>&nbsp;Titre&nbsp;</th>
                    <th>&nbsp;Chapô&nbsp;</th>
                    <th>&nbsp;Accroche&nbsp;</th>
                    <th>&nbsp;Sous-titre 1&nbsp;</th>
                    <th>&nbsp;Paragraphe 1&nbsp;</th>
                    <th>&nbsp;Sous-titre 2&nbsp;</th>
                    <th>&nbsp;Paragraphe 2&nbsp;</th>
                    <th>&nbsp;Paragraphe 3&nbsp;</th>
                    <th>&nbsp;Conclusion&nbsp;</th>
                    <th>&nbsp;URL Photo&nbsp;</th>
                    <th>&nbsp;Angle&nbsp;</th>
                    <th>&nbsp;Thème&nbsp;</th>
                    <th>&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody class="body">
                <?
                $allArticle = $monArticle->get_AllArticleByThemAngl();
                foreach($allArticle as $row){
                    $dateIn = $row["dtCreArt"];
                    $from='Y-m-d H:i:s';
                    $to = 'd-m-Y H:i:s';
                    $dateOut = dateChangeFormat($dateIn, $from, $to);
                // Appel méthode : tous les statuts en BDD

                // Boucle pour afficher
                //foreach($all as $row) {
                ?>
                <tr>
                    <td><h4>&nbsp; <?php echo $row["numArt"]; ?> &nbsp;</h4></td>

                    <td>&nbsp; <?php echo $dateOut; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["libTitrArt"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["libChapoArt"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["libAccrochArt"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["libSsTitr1Art"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["parag1Art"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["libSsTitr2Art"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["parag2Art"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["parag3Art"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["libConclArt"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["urlPhotArt"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["libAngl"]; ?> &nbsp;</td>
                    <td>&nbsp; <?php echo $row["libThem"]; ?> &nbsp;</td>
                    

                    <td>&nbsp;<a class="button" href="./updateArticle.php?id=<?=$row["numArt"];?>"><i>Modifier</i></a>&nbsp;
                    <br /></td>
                </tr>
                <?
                }	// End of foreach
                ?>
            </tbody>
        </table>
    </div>
</div>
    <?php
    require_once __DIR__ . './footer.php';
    ?>
</body>
</html>
