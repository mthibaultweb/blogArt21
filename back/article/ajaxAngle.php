<?
// Mode DEV
require_once __DIR__ . './../../util/utilErrOn.php';

require_once __DIR__ . './../../CONNECT/database.php';

	echo "<select name='idAngl'>";
	$langue = $_REQUEST["langue"];

	if (isset($langue)) {
		global $db;
		$requete = "SELECT numAngl, libAngl FROM angle WHERE numLang = ?;" ;
		$result = $db->prepare($requete);
		$result->execute([$langue]);
		$allAngleByLangue = $result->fetchAll();
		foreach($allAngleByLangue as $angle){
			echo "<option value='" . $angle["numAngl"] . "'>" . $angle["libAngl"] . "</option>";
		}
	}	// if (isset)
	else {
		echo "<option value='-1'>- - - Choisir un livre - - -</option>";
	}

	echo "</select>";

