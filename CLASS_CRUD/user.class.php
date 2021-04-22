<?
	// CRUD USER (ETUD)

	require_once __DIR__ . './../../CONNECT/database.php';

	class USER{
		function get_1User($pseudoUser, $passUser){


		}

		function get_AllUser(){
			global $db;
			$query = 'SELECT * FROM user INNER JOIN statut ON user.idStat = statut.idStat;';
			$result = $db->query($query);
			$allUser = $result->fetchAll();
			return($allUser);

		}

		function get_ExistPseudo($pseudoUser) {
			global $db;
			$requete = 'SELECT * FROM user WHERE pseudoUser = ?;';
			$result = $db->prepare($requete);
			$result->execute([$pseudoUser]);
			return($result->rowCount());
		}

		function get_1UserByStatut($pseudoUser){
			global $db;
			$requete = 'SELECT * FROM user INNER JOIN statut ON user.idStat = statut.idStat WHERE user.pseudoUser = ?;';
			$result = $db->prepare($requete);
			$result->execute([$pseudoUser]);
			return($result->fetch());
		}

		

		function get_AllUsersByStat(){


		}

		function get_NbAllUsersByidStat($idStat){
            global $db;
            $query = 'SELECT * FROM user INNER JOIN statut ON user.idStat = statut.idStat WHERE statut.idStat = ?;';
            $result = $db->prepare($query);
            $result->execute([$idStat]);
            $allUsersStat = $result->fetchAll();
			$allNbUsersByStat = 0;
			foreach ($allUsersStat as $row){
				$allNbUsersByStat = $allNbUsersByStat + 1;
			}
            return($allNbUsersByStat);
        }

		function create($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
			global $db;
			try {
          	$db->beginTransaction();
			$requete = 'INSERT INTO user (pseudoUser, passUser, nomUser, prenomUser, emailUser, idStat) VALUES (?,?, ?, ?, ?, ?);';
			$result = $db->prepare($requete);
			$result->execute([$pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat]);

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert USER : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
			global $db;
			try {
				$db->beginTransaction();
				$requete = 'UPDATE user SET nomUser=?, prenomUser=?, emailUser=?, idStat = ? WHERE pseudoUser = ? AND passUser=?;';
				$result = $db->prepare($requete);
				$result->execute([$nomUser, $prenomUser, $emailUser, $idStat, $pseudoUser, $passUser]);
	
							$db->commit();
							$result->closeCursor();
					}
					catch (PDOException $e) {
							die('Erreur update USER : ' . $e->getMessage());
							$db->rollBack();
							$result->closeCursor();
					}
		}

		function delete($pseudoUser, $passUser){
			global $db;
			try {
				$db->beginTransaction();
				$requete = "DELETE FROM user WHERE pseudoUser = ? AND passUser = ? ;";
				$result = $db->prepare($requete);
				$result->execute([$pseudoUser, $passUser]);


							$db->commit();
							$result->closeCursor();
					}
					catch (PDOException $e) {
							die('Erreur delete USER : ' . $e->getMessage());
							$db->rollBack();
							$result->closeCursor();
					}
		}

	}	// End of class
