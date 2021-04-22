<?
// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

require_once __DIR__ . './../../CONNECT/database.php';

	echo "<select size=\"10\" multiple=\"multiple\"  id=\"listMotCle\" name=\"listMotCle[]\">";
	$langue2 = $_REQUEST["langue"];

	if (isset($langue2)) { 
        global $db;
        $requete = 'SELECT * FROM motcle WHERE numLang = ?;';
        $result = $db->prepare($requete);
        $result->execute([$langue2]);
        $allMotCle = $result->fetchAll();
        foreach ($allMotCle AS $motcle)
        {
            echo "<option value='" . $motcle["numMotCle"] . "'>" . $motcle["libMotCle"] . "</option>";
        }
	}	// if (isset)

	echo "</select>";
?>

    