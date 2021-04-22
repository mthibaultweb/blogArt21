<?
/////////////////////////////////////////////////////
//
//  CRUD MEMBRE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : membre.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';
require_once __DIR__ . './../../util/dateChangeFormat.php';

require_once __DIR__ . './../../CLASS_CRUD/membre.class.php';
global $db;
$membre = new MEMBRE;

$errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    } 
$errSaisies ='';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Membre</title>
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
                <h1>BLOGART21 Admin - Gestion du CRUD Membre</h1>

                <h2>Tous les membres</h2>

            </div>

            <!-- <div class="creerBt">
                <button class="button" onclick="location.href='./createMembre.php'">
                    Créer un membre
                </button>
            </div> -->
        </div>
    <div class="tableArea">
    <table class="tableau">
    <thead class="entete">
        <tr>
            <th>&nbsp;NumMembre&nbsp;</th>
            <th>&nbsp;PrenomMembre&nbsp;</th>
            <th>&nbsp;NomMembre&nbsp;</th>
            <th>&nbsp;PseudoMembre&nbsp;</th>
            <th>&nbsp;PassMembre&nbsp;</th>
            <th>&nbsp;EmailMembre&nbsp;</th>
            <th>&nbsp;DtCréaMembre&nbsp;</th>
            <th>&nbsp;SouvenirMembre&nbsp;</th>
            <th>&nbsp;AccordMembre&nbsp;</th>
            <th>&nbsp;Statut&nbsp;</th>

            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody class="body">
    <?
    $allMembre = $membre->get_AllMembre();
    foreach($allMembre as $row){
        $dateIn = $row["dtCreaMemb"];
        $from='Y-m-d H:i:s';
        $to = 'd-m-Y H:i:s';
        $dateOut = dateChangeFormat($dateIn, $from, $to);
    // Appel méthode : toutes les langues en BDD

    // Boucle pour afficher
    //foreach($all as $row) {
    ?>
        <tr>
        <td><h4>&nbsp; <?php echo $row["numMemb"]; ?> &nbsp;</h4></td>
        <td>&nbsp; <?php echo $row["prenomMemb"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["nomMemb"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["pseudoMemb"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["passMemb"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["eMailMemb"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $dateOut; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["souvenirMemb"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["accordMemb"]; ?> &nbsp;</td>
        <td>&nbsp; <?php echo $row["libStat"]; ?> &nbsp;</td>

        <td>&nbsp;<a class="button" href="./updateMembre.php?id=<?=$row["numMemb"];?>"><i>Modifier</i></a>&nbsp;
        <br /></td>
        <td>&nbsp;<a class="button" href="./deleteMembre.php?id=<?=$row["numMemb"];?>"><i>Supprimer</i></a>&nbsp;
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
    if ($errCIR == 1){
    echo 'Vous ne pouvez pas supprimer ce membre. Veuillez d\'abord supprimer ce membre dans les autres tables';
    } 
    if (isset($_GET['id']) AND !empty($_GET['id'])) {
        $errSaisies = ($_GET['id']);
        echo $errSaisies;
    }
    require_once __DIR__ . './footer.php';
    ?>
</body>
</html>