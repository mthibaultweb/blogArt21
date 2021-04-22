<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : updateArticle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/article.class.php';
    require_once __DIR__ . './../../CLASS_CRUD/angle.class.php';
    require_once __DIR__ . './../../CLASS_CRUD/motCleArticle.class.php';
    global $db;
    $monArticle = new ARTICLE;
    $monAngle = new ANGLE;
    $motCleArticle = new MOTCLEARTICLE;

    
    require_once __DIR__ .'./initVar.php';
    require_once __DIR__ .'./initConst.php';
    $TargetDir = TARGET;

    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
        $url = $_FILES['monfichier']['tmp_name'];

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Initialiser")) {
            $reload = $_POST['numArt'];
            header("Location: ./updateArticle.php?id=".$reload);
        }   // End of if ((isset($_POST["submit"])) ...
        
        // Mode création
        if (((isset($_POST['numArt'])) AND !empty($_POST['numArt']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Modifier"))
            AND ((isset($_POST['libTitrArt'])) AND !empty($_POST['libTitrArt']))
            AND (isset($_POST['libChapoArt'])) AND !empty($_POST['libChapoArt'])
            AND (isset($_POST['libAccrochArt'])) AND !empty($_POST['libAccrochArt'])
            AND (isset($_POST['parag1Art'])) AND !empty($_POST['parag1Art'])
            AND (isset($_POST['libSsTitr1Art'])) AND !empty($_POST['libSsTitr1Art'])
            AND (isset($_POST['parag2Art'])) AND !empty($_POST['parag2Art'])
            AND (isset($_POST['libSsTitr2Art'])) AND !empty($_POST['libSsTitr2Art'])
            AND (isset($_POST['parag3Art'])) AND !empty($_POST['parag3Art'])
            AND (isset($_POST['libConclArt'])) AND !empty($_POST['libConclArt'])
            AND (isset($_POST['numAngl'])) AND !empty($_POST['numAngl'])
            AND (isset($_POST['idMotCle'])) AND !empty($_POST['idMotCle'])
            AND (isset($_POST['numThem'])) AND !empty($_POST['numThem'])) {
            // Saisies valides
            $erreur = false;

            if((isset($_FILES['monfichier']['tmp_name'])) AND !empty($_FILES['monfichier']['tmp_name'])){
                
                require_once __DIR__ . './ctrlerUploadImage.php';
                $urlPhotArt = $nomImage;
            }
            else{ 
                $urlPhotArt =-1;
            }

            $numArt = ctrlSaisies($_POST['numArt']);
            $libTitrArt = ctrlSaisies($_POST['libTitrArt']);
            $libChapoArt = ctrlSaisies($_POST['libChapoArt']);
            $libAccrochArt = ctrlSaisies($_POST['libAccrochArt']);
            $parag1Art = ctrlSaisies($_POST['parag1Art']);
            $libSsTitr1Art = ctrlSaisies($_POST['libSsTitr1Art']);
            $parag2Art = ctrlSaisies($_POST['parag2Art']);
            $libSsTitr2Art= ctrlSaisies($_POST['libSsTitr2Art']);
            $parag3Art = ctrlSaisies($_POST['parag3Art']);
            $libConclArt = ctrlSaisies($_POST['libConclArt']);
            $numAngl = ctrlSaisies($_POST['numAngl']);
            $numThem = ctrlSaisies($_POST['numThem']);
           
            $monArticle->update($numArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt,$urlPhotArt, $numAngl, $numThem);
            

            $motCle = $_POST['idMotCle'];
            $nbMotCle = count($motCle);
            

            if ($nbMotCle > 0){ 
                $motCleArticle->deleteMotCleArticle($numArt);
                for ($i = 0; $i < $nbMotCle; $i++) {
                    global $db;
                    $requete = 'INSERT INTO motclearticle (numMotCle, numArt) VALUES (?, ?);';
                    $result = $db->prepare($requete);
                    $result -> execute([$motCle[$i], $numArt]);
                    
                }
            }

            header("Location: ./article.php?=id".$url);
                
        }
        else{
            $motcle= ($_POST['idMotCle']);
            var_dump($motcle);
            //header("Location: ./updateArticle.php?id=");
            
            
        }
    
    }   
    // Init variables form
    include __DIR__ . './initArticle.php';
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
    <link rel="stylesheet" href="./../css/gestionCRUD.css">
    <link rel="stylesheet" href="./../css/form.css">

    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<script type="text/javascript">
    $(document).ready(function(){
        $('#add').click(function() {
            return !$('#listMotCle option:selected')
            .remove().appendTo('#idMotCle');
        });
        $('#remove').click(function() {
            return !$('#idMotCle option:selected')
            .remove().appendTo('#listMotCle');
        });
        function selectall()  {
            $('#idMotCle').find('option').each(function() {
                $(this).attr('selected', 'selected');
            });
        }
    });
</script>

<body>
<?php
include __DIR__ ."./../commons/navbar.php";
?>
<div class="wrapper">
    <div class="Titre">
        <h1>BLOGART21 Admin - Gestion du CRUD Article</h1>
            <h2>Modification d'un article</h2>
    </div>

    <?
    // Modif : récup id à modifier
    if (isset($_GET['id']) AND !empty($_GET['id'])) {

        $id = ctrlSaisies(($_GET['id']));
    
        $query = (array)$monArticle->get_1ArticleByThemAngl($id);
        
        if ($query) {
            $numArt = $query['numArt'];
            $libTitrArt = $query['libTitrArt'];
            $libChapoArt = $query['libChapoArt'];
            $libAccrochArt = $query['libAccrochArt'];
            $parag1Art = $query['parag1Art'];
            $libSsTitr1Art = $query['libSsTitr1Art'];
            $parag2Art = $query['parag2Art'];
            $libSsTitr2Art= $query['libSsTitr2Art'];
            $parag3Art = $query['parag3Art'];
            $libConclArt = $query['libConclArt'];
            $urlPhotArt1 = $query['urlPhotArt'];
            $numAngl = $query['numAngl'];
            $libAngl = $query['libAngl'];
            $numLang = $query['numLang'];
            $numThem = $query['numThem'];
            $libThem = $query['libThem'];

            $query2 = (array)$monAngle->get_1AngleByLangue($numAngl);

            if ($query2) {
                $lib1Lang = $query2['lib1Lang'];
            }
            
        }   // Fin if ($query)


    }   // Fin if (isset($_GET['id'])...)
    ?>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">

        <fieldset>
            <legend class="legend1">Formulaire Article...</legend>

            <input type="hidden" id="numArt" name="numArt" value="<?= $_GET['id']; ?>" />

            <div class="control-group">
                <label class="control-label" for="libTitrArt">Titre de l'article :&nbsp;</label>
                <input type="text" name="libTitrArt" id="libTitrArt" title="100 caractères max" size="100" maxlength="100" value="<?= $libTitrArt; ?>" autofocus="autofocus" placeholder="Saisir le titre de l'article" required/>
            </div>
            <div class="control-group">
                <label class="control-label" for="libChapoArt">Chapeau de l'article :&nbsp;</label>
                <textarea name="libChapoArt" id="libChapoArt" title="500 caractères max" cols="100" rows="5" maxlength="500" placeholder="Saisir le chapeau de l'article" required><?= $libChapoArt; ?></textarea>
            </div>
            <div class="control-group">
                <label class="control-label" for="libAccrochArt">Accroche de l'article :&nbsp;</label>
                <input type="text" name="libAccrochArt" id="libAccrochArt" title="100 caractères max" size="100" maxlength="100" value="<?= $libAccrochArt; ?>" placeholder="Saisir une accroche" required/>
            </div>
            <div class="control-group">
                <h3>Paragraphe 1</h3>
                <label class="control-label" for="libSsTitr1Art">Sous-titre 1 de l'article :&nbsp;</label>
                <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" title="100 caractères max" size="100" maxlength="100" value="<?= $libSsTitr1Art; ?>" placeholder="Saisir un sous-titre pour le paragraphe 1" required/><br/>
            
                <label class="control-label" for="parag1Art">Paragraphe 1 de l'article :&nbsp;</label>
                <textarea name="parag1Art" id="parag1Art" title="1200 caractères max" cols="100" rows="12" maxlength="1200" placeholder="Saisir le paragraphe 1" required><?= $parag1Art; ?></textarea>
            </div>
            <div class="control-group">
                <h3>Paragraphe 2</h3>
                <label class="control-label" for="libSsTitr2Art">Sous-titre 2 de l'article :&nbsp;</label>
                <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" title="100 caractères max" size="100" maxlength="100" value="<?= $libSsTitr2Art; ?>" placeholder="Saisir un sous-titre pour le paragraphe 2" required/><br/>
            
                <label class="control-label" for="parag2Art">Paragraphe 2 de l'article :&nbsp;</label>
                <textarea name="parag2Art" id="parag2Art" title="1200 caractères max" cols="100" rows="12" maxlength="1200" placeholder="Saisir le paragraphe 2" required><?= $parag2Art; ?></textarea>
            </div>
            <div class="control-group">
                <h3>Paragraphe 3</h3>
                <label class="control-label" for="parag3Art">Paragraphe 3 de l'article :&nbsp;</label>
                <textarea name="parag3Art" id="parag3Art" title="1200 caractères max" cols="100" rows="12" maxlength="1200" placeholder="Saisir le paragraphe 3" required><?= $parag3Art; ?></textarea>
            </div>
            <div class="control-group">
                <label class="control-label" for="libConclArt">Conclusion de l'article :&nbsp;</label>
                <textarea name="libConclArt" id="libConclArt" title="800 caractères max" cols="100" rows="8" maxlength="800" placeholder="Saisir la conclusion" required><?= $libConclArt; ?></textarea>
            </div>
            <div class="control-group">
                <label for="lib1Lang">Langue :</label>  
                <input type="text" name="lib1Lang" id="lib1Lang" title="Vous ne pouvez pas changer la langue" value="<?php echo $lib1Lang;?>" readonly/>
            </div>
            <div class="control-group">
                <label for="numAngl">Angle :</label>  
                <select id="numAngl" name="numAngl" required>
                    <?php 
                    global $db;
                    $requete = 'SELECT numAngl, libAngl FROM angle WHERE numLang = ? ORDER BY libAngl ASC;';
                    $result = $db->prepare($requete);
                    $result->execute([$numLang]);
                    $allAngle = $result->fetchAll();
                    foreach ($allAngle AS $angle)
                    {
                    ?>
                    <option value="<?= ($angle['numAngl']); ?>" <?= (isset($numAngl) && $numAngl == $angle['numAngl'] ) ? " selected=\"selected\"" : null; ?> >
                        <?= $angle['libAngl']; ?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="control-group">
                <label for="numThem">Thématique :</label>  
                <select id="numThem" name="numThem" required>
                    <?php 
                    global $db;
                    $requete = 'SELECT numThem, libThem FROM thematique WHERE numLang = ?;';
                    $result = $db->prepare($requete);
                    $result->execute([$numLang]);
                    $allThem = $result->fetchAll();
                    foreach ($allThem AS $them)
                    {
                    ?>
                    <option value="<?= ($them['numThem']); ?>" <?= (isset($numThem) && $numThem == $them['numThem'] ) ? " selected=\"selected\"" : null; ?> >
                            <?= $them['libThem']; ?>
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <!-- --------------------------------------------------------------- -->
            <!-- Drag and drop sur Mots clés -->
            <!-- --------------------------------------------------------------- -->
            <div class="control-group">
                <div class="selectmotcle">
                    <div class="list1">
                        <div class="controls">
                            <label class="control-label" for="LibTypMotsCles2">
                                Liste Mots clés&nbsp;
                            </label>
                        </div>
                        <div id="motCle" style="display:inline">
                            <select class="form-control" id ="listMotCle" name="listMotCle[]" multiple="multiple" style="height:150px;">
                                <?
                                global $db;
                                $requete = 'SELECT * FROM motcle WHERE numLang = ?;';
                                $result = $db->prepare($requete);
                                $result->execute([$numLang]);
                                $allMotCleByLang = $result->fetchAll();
                                $nbMotCleByLang = $result->rowCount();

                                

                                foreach ($allMotCleByLang AS $motCleByLang)
                                {  
                                    echo "<option value='" . $motCleByLang["numMotCle"] . "'>" . $motCleByLang["libMotCle"] . "</option>";   
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="btnsaddsuppr">
                        <div class="input-group btnadd">
                            <label class="control-label">
                                <button class="button" type="button" value="" id="add">Ajoutez&nbsp;>></button>
                            </label>
                        </div>
                        <div class="input-group btnspr">
                            <button class="button" type="button" value="" id="remove"><<&nbsp;Supprimez</button>
                        </div>
                    </div>

                    <div class="list2">
                        <div class="controls">
                            <label class="control-label" for="LibTypMotsCles">
                                Mots clés ajoutés&nbsp;
                            </label>
                        </div>
                        <div id="selectMotCle" style="display:inline">
                            <select class="form-control" name="idMotCle[]" size="9" id="idMotCle" multiple="multiple" style="height:150px;" required>
                                <?
                                $allMotCleArticle = $motCleArticle -> get_AllMotCleArticleByArt($numArt);
                                foreach ($allMotCleArticle AS $motcle)
                                {
                                    echo "<option value='" . $motcle["numMotCle"] . "' selected >" . $motcle["libMotCle"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------------------------------------------------------------- -->
            <!-- End of Drag and drop sur Mots clés -->
            <!-- --------------------------------------------------------------- -->
            <div class="control-group">
                <label class="control-label" for="monfichier">Importez l'illustration :&nbsp;</label>
                <input class="button2" type="file" name="monfichier"  id="monfichier" accept=".jpg,.gif,.png,.jpeg" size="70" maxlength="70" value="<? if(isset($_GET['id'])) echo $urlPhotArt1; else echo $urlPhotArt; ?>" tabindex="110" placeholder="Sur 70 car." title="Recherchez l'image à uploader" />
                <p>
                <? // Gestion extension images acceptées
                $msgImagesOK = "&nbsp;&nbsp;>> Extension des images acceptées : .jpg, .gif, .png, .jpeg" . "<br>" .
                    "(lageur, hauteur, taille max : 80000px, 80000px, 200 000 Go)";
                echo "<i>" . $msgImagesOK . "</i>";
                ?>
                </p>
                <img src="<?= $TargetDir.htmlspecialchars($urlPhotArt1);?>" height="200px"/>
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
    require_once __DIR__ . './footerArticle.php';

    require_once __DIR__ . './footer.php';
    ?>
</body>
</html>