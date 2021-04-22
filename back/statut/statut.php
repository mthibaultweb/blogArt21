<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : statut.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

    // controle des saisies du formulaire

    

    // insertion classe STATUT
    require_once __DIR__ . './../../CLASS_CRUD/statut.class.php';
    global $db;
    $monStatut = new STATUT;


    $errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    }  


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion du Statut</title>
	<meta charset="utf-8" />
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
                <h1>BLOGART21 Admin - Gestion du CRUD Statuts</h1>

                <h2>Tous les statuts</h2>

            </div>

            <div class="creerBt">
                <button class="button" onclick="location.href='./createStatut.php'">
                    Créer un statut
                </button>
            </div>
        </div>
    <?php
    if ($errCIR == 1){
    echo 'Vous ne pouvez pas supprimer cet utilisateur. Veuillez d\'abord supprimer cet utilisateur dans les autres tables';
    }
    ?>
<div class="tableArea">
	<table class="tableau">
    <thead class="entete">
        <tr>
            <th>&nbsp;Numéro&nbsp;</th>
            <th>&nbsp;Nom&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody class="body">
<?
    $allStatuts = $monStatut->get_AllStatuts();
    foreach($allStatuts as $row){
	// Appel méthode : tous les statuts en BDD

    // Boucle pour afficher
	//foreach($all as $row) {
?>
        <tr>
		<td><h4>&nbsp; <?php echo $row["idStat"]; ?> &nbsp;</h4></td>

        <td>&nbsp; <?php echo $row["libStat"]; ?> &nbsp;</td>

		<td>&nbsp;<a class="button" href="./updateStatut.php?id=<?=$row["idStat"];?>"><i>Modifier</i></a>&nbsp;
		<br /></td>
		<td>&nbsp;<a class="button" href="./deleteStatut.php?id=<?=$row["idStat"];?>"><i>Supprimer</i></a>&nbsp;
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
