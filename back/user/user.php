<?php
///////////////////////////////////////////////////////////////
//
//  CRUD USER (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : user.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

    // controle des saisies du formulaire

    

    // insertion classe USER
    require_once __DIR__ . './../../CLASS_CRUD/user.class.php';
    global $db;
    $user = new USER;


    $errCIR=0;
    if (isset($_GET['errCIR']) AND !empty($_GET['errCIR'])) {
        $errCIR = ($_GET['errCIR']);
    }  


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion du User</title>
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
                <h1>BLOGART21 Admin - Gestion du CRUD User</h1>

                <h2>Tous les users</h2>

            </div>

            <div class="creerBt">
                <button class="button" onclick="location.href='./createUser.php'">
                    Créer un user
                </button>
            </div>
        </div>
        <?php
        if ($errCIR == 1){
            echo 'Vous ne pouvez pas supprimer le super administrateur';
        }
        ?>
        <div class="tableArea">
            <table class="tableau">
            <thead class="entete">
                <tr>
                    <th>&nbsp;Pseudo User&nbsp;</th>
                    <th>&nbsp;Mot de Passe&nbsp;</th>
                    <th>&nbsp;Nom&nbsp;</th>
                    <th>&nbsp;Prenom&nbsp;</th>
                    <th>&nbsp;eMail&nbsp;</th>
                    <th>&nbsp;Statut&nbsp;</th>
                    <th colspan="2">&nbsp;Action&nbsp;</th>
                </tr>
            </thead>
            <tbody class="body">
        <?
            $allUser = $user->get_AllUser();
            foreach($allUser as $row){
            // Appel méthode : tous les statuts en BDD

            // Boucle pour afficher
            //foreach($all as $row) {
        ?>
                <tr>
                <td><h4>&nbsp; <?php echo $row["pseudoUser"]; ?> &nbsp;</h4></td>
                <td>&nbsp; <?php echo $row["passUser"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["nomUser"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["prenomUser"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["eMailUser"]; ?> &nbsp;</td>
                <td>&nbsp; <?php echo $row["libStat"]; ?> &nbsp;</td>

                <td>&nbsp;<a class="button" href="./updateUser.php?id=<?=$row["pseudoUser"];?>"><i>Modifier</i></a>&nbsp;
                <br /></td>
                <td>&nbsp;<a class="button" href="./deleteUser.php?id=<?=$row["pseudoUser"];?>"><i>Supprimer</i></a>&nbsp;
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
