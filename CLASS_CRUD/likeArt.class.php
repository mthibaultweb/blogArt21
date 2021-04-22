<?php
	// CRUD LIKEART (ETUD)

	require_once __DIR__ . './../../CONNECT/database.php';

	class LIKEART{
		function get_1LikeArt($numMemb, $numArt){
            global $db;
            $query = 'SELECT * FROM likeart INNER JOIN article ON likeart.numArt = article.numArt INNER JOIN membre ON likeart.numMemb = membre.numMemb WHERE likeart.numMemb = ? AND likeart.numArt = ? ;';
            $result = $db->prepare($query);
            $result->execute([$numMemb,$numArt]);
			$likeart = $result->fetch();
            return($likeart);
        }

		function get_LikeByArt( $numArt){
            global $db;
            $query = 'SELECT * FROM likeart INNER JOIN article ON likeart.numArt = article.numArt  WHERE likeart.numMemb = ? ;';
            $result = $db->prepare($query);
            $result->execute([$numArt]);
            return($result->rowCount());
        }

		function get_AllLikeArt(){
			global $db;
			$query = 'SELECT * FROM likeart INNER JOIN article ON likeart.numArt = article.numArt INNER JOIN membre ON likeart.numMemb = membre.numMemb ;';
			$result = $db->query($query);
			$allLikeArt = $result->fetchAll();
			return($allLikeArt);

		}

		function create( $numArt, $numMemb, $likeArt){
			global $db;
			try {
				$db->beginTransaction();
				$requete= "INSERT INTO likeart (numArt,numMemb, likeA) VALUES (?,?,?);";
				$result = $db->prepare($requete);
				$result->execute([ $numArt, $numMemb, $likeArt]);

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert LIKEART: ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update( $numArt,$numMemb, $likeArt){
			global $db;
			try {
				$db->beginTransaction();
				$requete="UPDATE likeart SET likeA = ? WHERE  numArt = ? AND  numMemb = ? ;";
				$result = $db->prepare($requete);
				$result->execute([$likeArt,$numArt,$numMemb]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur update LIKEART : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}

		
	}	// End of class
