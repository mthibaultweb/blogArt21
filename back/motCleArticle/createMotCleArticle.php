<?php
///////////////////////////////////////////////////////////////
//
//  CRUD MOTCLEARTICLE (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createMotCleArticle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe LANGUE
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/motCleArticle.class.php';
    global $db;
    $monMotCleArticle = new MOTCLEARTICLE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du motCleArticle
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./motCleArticle.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
        if (isset($_POST['Valider']) AND
        isset($_POST['numLang']) AND $_POST['numLang'] != "" AND
        isset($_POST['numArt']) AND $_POST['numArt'] != "") {
            $numLang = $_POST['numLang'];
            $numArt = $_POST['numArt'];
            $numLang_selectionnee = $_POST['numLang'];
            $numArt_selectionne = $_POST['numArt'];
            $etudFind = true;


            $queryText = 'SELECT LibClas, NomEtu, PrenomEtu FROM class INNER JOIN etudiant ON classe.numClas = etudiant.numClas WHERE numEtu = :numEtu AND etudiant.numClas = :numClas;';
            $query = $db->prepare($queryText);

            $query->bindParam(':numClas', $NumClas);
            $query->bindParam(':numEtu', $NumEtu);
            $query->execute();

            //$query = get_1EtudiantByEtudByClas($NumClas, $NumEtu);
            if ($query AND $query->rowCount() == 1) {
                $object = $query->fetchObject();
                $libClas = $object->LibClas;
                $libEtudiant = $object->PrenomEtu . " " . $object->NomEtu;
            }   // Fin if ($query ...)

        }   // End of if ((isset($_POST['ok']) )

    }   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")

    // Init variables form
    include __DIR__ . './initMotCleArticle.php';

    // Classe envoyée par le form
    $idLang = (isset($_POST['numLang'])) ? $_POST['numLang'] : null;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD MotCle / Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="./../../front/assets/css/normalize.css">
    <link rel="stylesheet" href="./../css/footer.css">
    
</head>
<body>
    <h1>BLOGART21 Admin - Gestion du CRUD Mot Clé / Article</h1>
    <h2>Sélectionner une langue puis un article et un mot clé</h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" id="chgLang">

        <fieldset>
            <legend class="legend1">Formulaire Mot Clé / Article...</legend>
            <div class="control-group">
                <label for="numLang">Choisissez la langue</label>
                <input type="hidden" id="idLang" name="idLang" value="<?= $numLang; ?>" />
                <select id="numLang" name="numLang"  onchange="document.forms['chgLang'].submit();" size="1" title="Sélectionnez la classe !" autofocus="autofocus"> 
                    <option value="-1">- - - Choisissez une langue - - -</option>
                    <?php 
                    global $db;
                    $requete = 'SELECT numLang, lib1Lang FROM langue ORDER BY lib1Lang ;';
                    $result = $db->query($requete);
                    $allLangue = $result->fetchAll();
                    foreach ($allLangue as $langue)
                    {
                        $numLang = $langue['numLang'];
                        $lib1Lang = $langue['lib1Lang'];
                    ?>
                    
                    <option value="<?= ($numLang); ?>" <?= ((isset($idLang) && $idLang == $numLang) ? " selected=\"selected\"" : null); ?> >
                        <?= ($lib1Lang); ?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <?
            $result->closeCursor();

            if (isset($idLang) AND $idLang != -1) {
                // Listbox dynamique
                $numLang = $_POST['numLang'];
                ?>
                <div class="control-group">
                    <label for="numMotCle">Mot clé</label>  
                    <select id="numMotCLe" name="numMotCle"  onchange="select()">
                        <option value="-1">- - - Choisissez un mot clé - - -</option>
                        <?php 
                        global $db;
                        $requete = 'SELECT numMotCle, libMotCle FROM motcle WHERE numLang = ?;';
                        $result = $db->prepare($requete);
                        $result->execute([$numLang]);
                        $allMotCle = $result->fetchAll();
                        foreach ($allMotCle as $motCle)
                        {
                        ?>
                        <option value="<?php echo $motCle['numMotCle'];?>"><?php echo $motCle['libMotCle'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

            <?
                $result->closeCursor();
            }   // End of if (isset($idclas) && $idclas != -1)
            ?>
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Annuler" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </fieldset>
    </form>
<?php
require_once __DIR__ . './footerMotCleArticle.php';
require_once __DIR__ . './footer.php';
?>
</body>
</html>