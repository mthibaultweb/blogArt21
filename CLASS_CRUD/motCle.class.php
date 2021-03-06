<?
	// CRUD MOTCLE (ETUD)

	require_once __DIR__ . './../CONNECT/database.php';

	class MOTCLE{
		function get_1MotCleByLangue($numMotCle){
			global $db;
            $requete = 'SELECT * FROM motcle INNER JOIN langue ON  motcle.numLang = langue.numLang WHERE motcle.numMotCle = ?;';
            $result = $db->prepare($requete);
            $result->execute([$numMotCle]);
            return($result->fetch());
		}
		function get_AllMotCleByLangue(){
			global $db;
            $requete = 'SELECT * FROM motcle INNER JOIN langue ON  motcle.numLang = langue.numLang ORDER BY motcle.numMotCle ASC;';
            $result = $db->prepare($requete);
            $result->execute();
            return($result->fetchAll());
		}
		
		function get_NbAllMotCleByidLangue($id){
            global $db;
            $query = 'SELECT * FROM motcle INNER JOIN langue ON motcle.numLang = langue.numLang WHERE motcle.numLang= ?;';
            $result = $db->prepare($query);
            $result->execute([$id]);
            $allNbMotCleByLangue = $result->fetchAll();
			$allNbMotCleByAllLangue = 0;
			foreach ( $allNbMotCleByLangue  as $row){
				$allNbMotCleByAllLangue = $allNbMotCleByAllLangue + 1;
			}
            return($allNbMotCleByAllLangue);
        }

		function get_NbAllMotCleByMotCleArticle($id){
            global $db;
            $query = 'SELECT * FROM motcle INNER JOIN motclearticle ON motcle.numMotCle = motclearticle.numMotCle WHERE motcle.numMotCle= ?;';
            $result = $db->prepare($query);
            $result->execute([$id]);
            $allNbMotCleByArticle = $result->fetchAll();
			$allNbMotCleByCleArticle = 0;
			foreach ( $allNbMotCleByArticle as $row){
				$allNbMotCleByCleArticle = $allNbMotCleByCleArticle + 1;
			}
            return($allNbMotCleByCleArticle);
        }
		
		function create($libMotCle, $numLang){
			global $db;
			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO motcle (libMotCle, numLang) VALUES (?,?);';
			  $result = $db->prepare($requete);
			  $result->execute(array($libMotCle, $numLang));

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert MOTCLE : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}
		

		function update($numMotCle, $libMotCle, $numLang){
			global $db;
			try {
				$db->beginTransaction();
				$requete="UPDATE motcle SET libMotCle = ?, numLang = ? WHERE numMotCle = ?";
				$result = $db->prepare($requete);
				$result->execute(array($libMotCle, $numLang, $numMotCle));
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete MOTCLE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}


		// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
		function delete($numMotCle){
			global $db;
			try {
				$db->beginTransaction();
				$requete= "DELETE FROM  motcle WHERE numMotCle = ?; ";
				$result = $db->prepare($requete);
				$result->execute([$numMotCle]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete MOCTLE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}

		

	}	// End of class
