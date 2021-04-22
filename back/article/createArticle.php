<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : createArticle.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';


    // controle des saisies du formulaire


    // insertion classe STATUT
    require_once __DIR__ . './../../util/ctrlSaisies.php';
    require_once __DIR__ . './../../CLASS_CRUD/article.class.php';
    
    global $db;
    $monArticle = new ARTICLE;


    // Gestion du $_SERVER["REQUEST_METHOD"] => En POST
    // ajout effectif du statut
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Opérateur ternaire
        $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

        if ((isset($_POST["Submit"])) AND ($_POST["Submit"] === "Annuler")) {

            header("Location: ./article.php");
        }   // End of if ((isset($_POST["submit"])) ...

        // Mode création
       
        if (((isset($_POST['libTitrArt'])) AND !empty($_POST['libTitrArt']))
            AND (!empty($_POST['Submit']) AND ($Submit === "Valider"))
            AND (isset($_POST['libChapoArt'])) AND !empty($_POST['libChapoArt'])
            AND (isset($_POST['libAccrochArt'])) AND !empty($_POST['libAccrochArt'])
            AND (isset($_POST['parag1Art'])) AND !empty($_POST['parag1Art'])
            AND (isset($_POST['libSsTitr1Art'])) AND !empty($_POST['libSsTitr1Art'])
            AND (isset($_POST['parag2Art'])) AND !empty($_POST['parag2Art'])
            AND (isset($_POST['libSsTitr2Art'])) AND !empty($_POST['libSsTitr2Art'])
            AND (isset($_POST['parag3Art'])) AND !empty($_POST['parag3Art'])
            AND (isset($_POST['libConclArt'])) AND !empty($_POST['libConclArt'])
            AND ((isset($_POST['idMotCle'])) AND !empty($_POST['idMotCle']))
            //AND ((isset($_FILES['monfichier']['tmp_name'])) AND !empty($_FILES['monfichier']['tmp_name']))
            AND (isset($_POST['idAngl'])) AND !empty($_POST['idAngl'])
            AND (isset($_POST['idThem'])) AND !empty($_POST['idThem'])
            ){
            // Saisies valides
            $erreur = false;

            $libTitrArt = ctrlSaisies($_POST['libTitrArt']);
            $libChapoArt = ctrlSaisies($_POST['libChapoArt']);
            $libAccrochArt = ctrlSaisies($_POST['libAccrochArt']);
            $parag1Art = ctrlSaisies($_POST['parag1Art']);
            $libSsTitr1Art = ctrlSaisies($_POST['libSsTitr1Art']);
            $parag2Art = ctrlSaisies($_POST['parag2Art']);
            $libSsTitr2Art= ctrlSaisies($_POST['libSsTitr2Art']);
            $parag3Art = ctrlSaisies($_POST['parag3Art']);
            $libConclArt = ctrlSaisies($_POST['libConclArt']);
            $numAngl = ctrlSaisies($_POST['idAngl']);
            $numThem = ctrlSaisies($_POST['idThem']);
            $dtCreArt = date("Y-m-d h:i:s");
            $motCle = $_POST['idMotCle'];

            require_once __DIR__ . './ctrlerUploadImage.php';

            $urlPhotArt = $nomImage;

            $monArticle->create($dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt,$urlPhotArt, $numAngl, $numThem);
            
            $numArt = $monArticle->get_LastNumArt();

            $motCle = $_POST['idMotCle'];
            $nbMotCle = count($motCle);

            if ($nbMotCle > 0){
                for ($i = 0; $i < $nbMotCle; $i++) {
                    global $db;
                    $requete = 'INSERT INTO motclearticle (numMotCle, numArt) VALUES (?, ?);';
                    $result = $db->prepare($requete);
                    $result -> execute([$motCle[$i], $numArt]);
                    
                }
            }
             

            header("Location: ./article.php");
                
        }
        else{
            $erreur = true;
            $errSaisies =  "Erreur, la saisie est obligatoire !";
                
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

    <!-- <link href="../../front/assets/css/draganddrop.css" rel="stylesheet" type="text/css" /> -->

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
            <h2>Ajout d'un article</h2>
    </div>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" id="chgLang">

      <fieldset>
        <legend class="legend1">Formulaire Article...</legend>

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
            <input type="text" name="libAccrochArt" id="libAccrochArt" title="100 caractères max" size="100" maxlength="150" value="<?= $libAccrochArt; ?>" placeholder="Saisir une accroche" required/>
        </div>
        <div class="control-group">
            <h3>Paragraphe 1</h3>
            <label class="control-label" for="libSsTitr1Art">Sous-titre 1 de l'article :&nbsp;</label>
            <input type="text" name="libSsTitr1Art" id="libSsTitr1Art" title="100 caractères max" size="100" maxlength="100" value="<?= $libSsTitr1Art; ?>" placeholder="Saisir un sous-titre pour le paragraphe 1" required/><br/>
        
            <label class="control-label" for="parag1Art">Paragraphe 1 de l'article :&nbsp;</label>
            <textarea name="parag1Art" id="parag1Art" title="1200 caractères max" cols="100" rows="12" maxlength="1600" placeholder="Saisir le paragraphe 1" required><?= $parag1Art; ?></textarea>
        </div>
        <div class="control-group">
            <h3>Paragraphe 2</h3>
            <label class="control-label" for="libSsTitr2Art">Sous-titre 2 de l'article :&nbsp;</label>
            <input type="text" name="libSsTitr2Art" id="libSsTitr2Art" title="100 caractères max" size="100" maxlength="100" value="<?= $libSsTitr2Art; ?>" placeholder="Saisir un sous-titre pour le paragraphe 2" required/><br/>
        
            <label class="control-label" for="parag2Art">Paragraphe 2 de l'article :&nbsp;</label>
            <textarea name="parag2Art" id="parag2Art" title="1200 caractères max" cols="100" rows="12" maxlength="1600" placeholder="Saisir le paragraphe 2" required><?= $parag2Art; ?></textarea>
        </div>
        <div class="control-group">
            <h3>Paragraphe 3</h3>
            <label class="control-label" for="parag3Art">Paragraphe 3 de l'article :&nbsp;</label>
            <textarea name="parag3Art" id="parag3Art" title="1200 caractères max" cols="100" rows="12" maxlength="1600" placeholder="Saisir le paragraphe 3" required><?= $parag3Art; ?></textarea>
       </div>
        <div class="control-group">
            <label class="control-label" for="libConclArt">Conclusion de l'article :&nbsp;</label>
            <textarea name="libConclArt" id="libConclArt" title="800 caractères max" cols="100" rows="8" maxlength="900" placeholder="Saisir la conclusion" required><?= $libConclArt; ?></textarea>
        </div>

        <div class="control-group">
<!-- -------------------------------------------------------------- -->
			<label>Langue :&nbsp;</label>
			<select name='langue' id='langue' onchange='change()' required>
            <option value="" selected disabled hidden>Sélectionner une langue</option>
                <?
				$requete = "SELECT * FROM langue ;";
				$result = $db->query($requete);
				if ($result) {
                    while ($tuple = $result->fetch()) {
                    ?>
                    <option value="<?= $tuple["numLang"]; ?>" >
                        <?= $tuple["numLang"] . " " . $tuple["lib1Lang"]; ?>
                    </option>
                    <?
                    } // End of while
				}   // if ($result)
                ?>
			</select><br/>
<!-- -------------------------------------------------------------- -->
            <label>Angle :&nbsp;</label>
            <div id='angle' style='display:inline'>
                <select name='idAngl' id="idAngl" required>
                <option value="" selected disabled hidden>Sélectionner un angle</option>
                </select>
            </div>
			<br/>
<!-- -------------------------------------------------------------- -->
            <label>Thématique :&nbsp;</label>
			<div id='them' style='display:inline'>
				<select name='idThem' id="idThem" required>
                <option value="" selected disabled hidden>Sélectionner une thématique</option>
				</select>
			</div> 
            </br>
        </div>
        <br/>
<!-- --------------------------------------------------------------- -->
<!-- Drag and drop sur Mots clés -->
<!-- --------------------------------------------------------------- -->
    <div class="control-group">
        <div class="controls">
                <label class="control-label" for="LibTypMotsCles1">
                    Choisissez les mots clés liés à l'article :&nbsp;
                </label>
        </div>
        <div class="selectmotcle">
            <div class="list1">
                <div class="controls">
                    <label class="control-label" for="LibTypMotsCles2">
                        Liste Mots clés&nbsp;
                    </label>
                </div>
                <div id="motCle" style="display:inline">
                    <select class="form-control" id ="listMotCle" name="listMotCle[]" multiple="multiple" style="height:150px;">
                    </select>
                </div>
            </div>
            <div class="btnsaddsuppr">
                <div class="input-group btnadd">
                    <label class="control-label">
                        <button class="button" type="button" value="" id="add" style="cursor:pointer;" >Ajoutez&nbsp;>></button>
                    </label>
                </div>
                <div class="input-group btnspr">
                    <button class="button" type="button" value="" id="remove" style="cursor:pointer;"><<&nbsp;Supprimez</button>
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
            <input class="button2" type="file" name="monfichier"  id="monfichier" accept=".jpg,.gif,.png,.jpeg" size="70" maxlength="70" value="<? if(isset($_GET['id'])) echo $_POST['urlPhotArt']; else echo $urlPhotArt; ?>" tabindex="110" placeholder="Sur 70 car." title="Recherchez l'image à uploader" required/>
            <p>
            <? // Gestion extension images acceptées
            $msgImagesOK = "&nbsp;&nbsp;>> Extension des images acceptées : .jpg, .gif, .png, .jpeg" . "<br>" .
                "(lageur, hauteur, taille max : 80000px, 80000px, 200 000 Go)";
            echo "<i>" . $msgImagesOK . "</i>";
            ?>
            </p>
        </div>

        <div class="control-group">
            <div class="controls">
                <input class="button" type="submit" value="Annuler" name="Submit" formnovalidate/>
                <input class="button" type="submit" value="Valider" name="Submit" />
            </div>
        </div>
      </fieldset>
    </form>
</div>
    <script type='text/javascript'>
		function getXhr() {
        var xhr = null;
			if (window.XMLHttpRequest) { // Firefox et autres
			   xhr = new XMLHttpRequest();
			}
			else
				if (window.ActiveXObject) { // Internet Explorer
				   try {
						xhr = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
						xhr = new ActiveXObject("Microsoft.XMLHTTP");
					}
				}
				else { // XMLHttpRequest non supporté par le navigateur
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
				   xhr = false;
				}
        return xhr;
		}

		/**
		* Méthode appelée sur le click du bouton
		*/
		function change() {
			var xhr = getXhr();
            var xhr1 = getXhr();
            var xhr2 = getXhr();
            var xhr3 = getXhr();
			// On définit ce qu'on va faire quand on aura la réponse
			xhr.onreadystatechange = function() {
				//alert(xhr.readyState);	// Affiche 1 popup à chq FK/PK lue
				// test si tout est reçu et si serveur est ok
				if (xhr.readyState == 4 && xhr.status == 200) {
					di = document.getElementById('angle');
					di.innerHTML = xhr.responseText;
				}
			}

            xhr1.onreadystatechange = function() {
				//alert(xhr.readyState);	// Affiche 1 popup à chq FK/PK lue
				// test si tout est reçu et si serveur est ok
				if (xhr1.readyState == 4 && xhr1.status == 200) {
					di = document.getElementById('them');
					di.innerHTML = xhr1.responseText;
				}
			}
            
            xhr2.onreadystatechange = function() {
				//alert(xhr.readyState);	// Affiche 1 popup à chq FK/PK lue
				// test si tout est reçu et si serveur est ok
				if (xhr2.readyState == 4 && xhr2.status == 200) {
					di = document.getElementById('motCle');
					di.innerHTML = xhr2.responseText;
				}
			}

            xhr3.onreadystatechange = function() {
				//alert(xhr.readyState);	// Affiche 1 popup à chq FK/PK lue
				// test si tout est reçu et si serveur est ok
				if (xhr3.readyState == 4 && xhr3.status == 200) {
					di = document.getElementById('selectMotCle');
					di.innerHTML = xhr3.responseText;
				}
			}

			// Traitement POST ajaxAngle
			xhr.open("POST","./ajaxAngle.php",true);
			// pour le post
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// poster les arguments : ici, l'id de l'auteur
			langue = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
			//alert(idauteur);
			xhr.send("langue="+langue);	// Recup PK auteur à passer en "m" à livre (FK)

            // Traitement POST ajaxThem
			xhr1.open("POST","./ajaxThem.php",true);
			// pour le post
			xhr1.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// poster les arguments : ici, l'id de l'auteur
			langue1 = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
			//alert(idauteur);
			xhr1.send("langue="+langue1);	// Recup PK auteur à passer en "m" à livre (FK)

            // Traitement POST ajaxMotCle
			xhr2.open("POST","./ajaxMotCle.php",true);
			// pour le post
			xhr2.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// poster les arguments : ici, l'id de l'auteur
			langue2 = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
			//alert(idauteur);
			xhr2.send("langue="+langue2);	// Recup PK auteur à passer en "m" à livre (FK)

            // Traitement POST ajaxSelectMotCle
            xhr3.open("POST","./ajaxSelectMotCle.php",true);
			// pour le post
			xhr3.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			// poster les arguments : ici, l'id de l'auteur
			langue3 = document.getElementById('langue').options[document.getElementById('langue').selectedIndex].value;
			//alert(idauteur);
			xhr3.send("langue="+langue3);	// Recup PK auteur à passer en "m" à livre (FK)

		}	// End of function
  </script>
<?php
require_once __DIR__ . './footerArticle.php';

require_once __DIR__ . './footer.php';
?>
</body>
</html>
