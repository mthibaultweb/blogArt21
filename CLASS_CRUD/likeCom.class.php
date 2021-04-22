<?php
	// CRUD LIKECOM (ETUD)

	require_once __DIR__ . './../../CONNECT/database.php';

	class LIKECOM{
		function get_1LikeCom($numMemb, $numArt, $numSeqCom){
            global $db;
            $query = 'SELECT * FROM likecom INNER JOIN comment ON likecom.numSeqCom = comment.numSeqCom INNER JOIN article ON likecom.numArt = article.numArt INNER JOIN membre ON likecom.numMemb = membre.numMemb WHERE likecom.numMemb = ? AND likecom.numArt = ? AND likecom.numSeqCom = ?;';
            $result = $db->prepare($query);
            $result->execute([$numMemb,$numArt, $numSeqCom]);
			$likecom = $result->fetch();
            return($likecom);
        }

		function get_AllLikeCom(){
			global $db;
			$query = 'SELECT * FROM likecom INNER JOIN comment ON likecom.numSeqCom = comment.numSeqCom INNER JOIN membre ON likecom.numMemb = membre.numMemb INNER JOIN article ON likecom.numArt = article.numArt ;';
			$result = $db->query($query);
			$allLikeCom = $result->fetchAll();
			return($allLikeCom);

		}
		function get_AllLikeComByArt($numArt){
			global $db;
			$query = 'SELECT * FROM likecom WHERE numArt = ?';
			$result = $db->prepare($query);
			$result->execute([$numArt]);
			return($result->rowCount());

		}

		function create($numMemb, $numArt, $numSeqCom, $likeC){
			global $db;
			try {
				$db->beginTransaction();
				$requete= "INSERT INTO likecom (numMemb,numArt, numSeqCom, likeC) VALUES (?,?,?,?);";
				$result = $db->prepare($requete);
				$result->execute([$numMemb, $numArt, $numSeqCom, $likeC]);

					$db->commit();
					$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert LIKECOM: ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}

		function update($numMemb, $numArt, $numSeqCom, $likeC){
			global $db;
			try {
				$db->beginTransaction();
				$requete="UPDATE likecom SET likeC = ? WHERE  numMemb = ? AND  numArt = ?  AND numSeqCom = ?;";
				$result = $db->prepare($requete);
				$result->execute([$likeC, $numMemb, $numArt, $numSeqCom]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur update LIKECOM : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}

		
	}	// End of class
