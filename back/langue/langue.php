<?
/////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : langue.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


// insertion classe LANGUE
require_once __DIR__ . './../../CLASS_CRUD/langue.class.php';
global $db;
$maLangue = new LANGUE;

$errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    } 

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
    <link rel="stylesheet" href="./../css/gestionCRUD.css" >

</head>
<body>
<?php
    include __DIR__ ."./../commons/navbar.php";
    ?>
    <div class="wrapper">
        <div class="hautpage">
            <div class="Titre">
                <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>

                <h2>Toutes les langues</h2>

            </div>
    <div class="creerBt">
        <button class="button" onclick="location.href='./createLangue.php'">
            Créer une langue
        </button>
    </div>
</div>
    <?php
    if ($errCIR == 1){
    echo 'Vous ne pouvez pas supprimer cette langue. Veuillez d\'abord supprimer cette langue dans les autres tables';
    }
    ?>
<div class="tableArea">
    <table class="tableau">
    <thead class="entete">
        <tr>
            <th>&nbsp;Numéro Langue&nbsp;</th>
            <th>&nbsp;Libellé court&nbsp;</th>
            <th>&nbsp;Libellé long&nbsp;</th>
            <th>&nbsp;Pays&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?
    $allLangue = $maLangue->get_AllLanguesByPays();
    foreach($allLangue as $row){
	// Appel méthode : toutes les langues en BDD

    // Boucle pour afficher
	//foreach($all as $row) {
?>
        <tr>
		<td><h4>&nbsp; <?php echo $row["numLang"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["lib1Lang"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["lib2Lang"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["frPays"]; ?> &nbsp;</td>

		<td>&nbsp;<a class="button" href="./updateLangue.php?id=<?=$row["numLang"];?>"><i>Modifier</i></a>&nbsp;
		<br /></td>
		<td>&nbsp;<a class="button" href="./deleteLangue.php?id=<?=$row["numLang"];?>"><i>Supprimer</i></a>&nbsp;
		<br /></td>
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
