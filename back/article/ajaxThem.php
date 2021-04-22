<?
// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

require_once __DIR__ . './../../CONNECT/database.php';

	echo "<select name='idThem'>";
	$langue1 = $_REQUEST["langue"];

	if (isset($langue1)) {
		global $db;
		$requete = "SELECT numThem, libThem FROM thematique WHERE numLang = ?;" ;
		$result = $db->prepare($requete);
		$result->execute([$langue1]);
		$allThemByLangue = $result->fetchAll();
		foreach($allThemByLangue as $them){
			echo "<option value='" . $them["numThem"] . "'>" . $them["libThem"] . "</option>";
		}
	}
	else {
		echo "<option value='-1'>- - - Choisir une thématique - - -</option>";
	}

	echo "</select>";

