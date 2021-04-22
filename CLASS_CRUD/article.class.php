<?php
	// CRUD ARTICLE (ETUD)

	require_once __DIR__ . './../../CONNECT/database.php';

	class ARTICLE{
		function get_1ArticleByThemAngl($numArt){
            global $db;
            $requete = 'SELECT * FROM article INNER JOIN thematique ON article.numThem = thematique.numThem INNER JOIN angle  ON article.numAngl = angle.numAngl WHERE numArt = ?;';
            $result = $db->prepare($requete);
            $result->execute([$numArt]);
            return($result->fetch());
        }

		function get_AllArticleByThemAngl(){
			global $db;
            $requete = 'SELECT * FROM article INNER JOIN thematique ON article.numThem = thematique.numThem INNER JOIN angle  ON article.numAngl = angle.numAngl;';
            $result = $db->prepare($requete);
            $result->execute();
            return($result->fetchAll());

		}

		function get_AllArticle(){
			global $db;
			$requete = 'SELECT * FROM article;';
			$result = $db->query($requete);
			$allArticle = $result->fetchAll();
			return($allArticle);

		}

	
		// Fonction pour recupérer la dernière PK de ARTICLE
		// avant insert des n occurr dans TJ MOTCLEARTICLE
		function get_LastNumArt() {
			global $db;
	
			$requete = "SELECT MAX(numArt) AS numArt FROM article;";
			$result = $db->query($requete);
	
			if ($result) {
				$tuple = $result->fetch();
				$lastNumArt = $tuple["numArt"];
	
			}   // End of if ($result)
			return $lastNumArt;
		} // End of function
	
		function get_NbAllAnglByArt($numAngl){
            global $db;
            $query = 'SELECT * FROM article INNER JOIN angle ON article.numAngl = angle.numAngl WHERE angle.numAngl = ?;';
            $result = $db->prepare($query);
            $result->execute([$numAngl]);
            $allAnglByArt = $result->fetchAll();
			$allNbAnglByArt = 0;
			foreach ($allAnglByArt as $row){
				$allNbAnglByArt = $allNbAnglByArt + 1;
			}
            return($allNbAnglByArt);
        }

		function create($dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem){
			global $db;
			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO article (dtCreArt, libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt,urlPhotArt, numAngl, numThem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);';
			  $result = $db->prepare($requete);
			  $result->execute([$dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt,$numAngl, $numThem]);
              //$dernier_id = $db->lastInsertId();
              //return($dernier_id);
					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert ARTICLE : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update($numArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem){
			global $db;
			try {
				$db->beginTransaction();
				if ( $urlPhotArt != -1){
				$requete="UPDATE article SET libTitrArt = ?, libChapoArt = ?, libAccrochArt = ?, parag1Art = ?, libSsTitr1Art = ?, parag2Art = ?, libSsTitr2Art = ?, parag3Art = ?, libConclArt = ?, urlPhotArt = ?, numAngl = ?, numThem = ? WHERE numArt = ? ;";
				$result = $db->prepare($requete);
				$result->execute([$libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem, $numArt]);
				}
				else{
					$requete="UPDATE article SET libTitrArt = ?, libChapoArt = ?, libAccrochArt = ?, parag1Art = ?, libSsTitr1Art = ?, parag2Art = ?, libSsTitr2Art = ?, parag3Art = ?, libConclArt = ?, numAngl = ?, numThem = ? WHERE numArt = ? ;";
					$result = $db->prepare($requete);
					$result->execute([$libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $numAngl, $numThem, $numArt]);
				}
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur update ARTICLE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
		}

		

	}	// End of class
