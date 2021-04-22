<?php
	// CRUD STATUT (ETUD)

	require_once __DIR__ . './../../CONNECT/database.php';

	class STATUT{
		function get_1Statut($idStat){
            global $db;
            $query = 'SELECT * FROM statut WHERE idStat = ?;';
            $result = $db->prepare($query);
            $result->execute([$idStat]);
            return($result->fetch());
        }

		function get_AllStatuts(){
			global $db;
			$query = 'SELECT * FROM statut;';
			$result = $db->query($query);
			$allstatuts = $result->fetchAll();
			return($allstatuts);

		}

		function create($libStat){
			global $db;
			try {
			  $db->beginTransaction();
			  $requete= 'INSERT INTO statut (libStat) VALUES (?);';
			  $result = $db->prepare($requete);
			  $result->execute(array($libStat));

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert STATUT : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update($idStat, $libStat){
			global $db;

			try {
				$db->beginTransaction();
				$requete="UPDATE statut SET libStat = ? WHERE idStat = ? ";
				$result = $db->prepare($requete);
				$result->execute(array($libStat, $idStat));
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete STATUT : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}

		function delete($idStat){
		global $db;

		try {
			$db->beginTransaction();
			$requete= "DELETE FROM statut WHERE idStat = ?; ";
			$result = $db->prepare($requete);
			$result->execute([$idStat]);
			$db->commit();
			$result->closeCursor();

			}
			catch (PDOException $e) {
					die('Erreur delete STATUT : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

	}	// End of class
