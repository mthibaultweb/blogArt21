<?
	// CRUD MEMBRE (ETUD)

	require_once __DIR__ . './../../CONNECT/database.php';

	class MEMBRE{
		function get_1Membre($idMembre){
            global $db;
            $query = 'SELECT * FROM membre WHERE numMemb = ?;';
            $result = $db->prepare($query);
            $result->execute([$idMembre]);
            return($result->fetch());
        }
		function get_1Memb($pseudoMemb){
            global $db;
            $query = 'SELECT * FROM membre WHERE pseudoMemb = ?;';
            $result = $db->prepare($query);
            $result->execute([$pseudoMemb]);
            return($result->fetch());
        }
		function get_AllMembre(){
			global $db;
            $requete = 'SELECT * FROM membre INNER JOIN statut ON membre.idStat = statut.idStat;';
            $result = $db->prepare($requete);
            $result->execute();
            return($result->fetchAll());
		}
		function get_1MembreByStat($idMembre){
			global $db;
            $query = 'SELECT * FROM membre INNER JOIN statut ON membre.idStat = statut.idStat WHERE numMemb = ?;';
            $result = $db->prepare($query);
            $result->execute([$idMembre]);
            return($result->fetch());
		}

		function get_ExistPseudo($pseudoMemb) {
			global $db;
			$requete = 'SELECT * FROM membre WHERE pseudoMemb = ?;';
			$result = $db->prepare($requete);
			$result->execute([$pseudoMemb]);
			return($result->rowCount());
		}
		

		function get_NbAllMembreByLikeCom($numMembre){
            global $db;
            $query = 'SELECT * FROM membre INNER JOIN likecom ON membre.numMemb = likecom.numMemb WHERE membre.numMemb= ?;';
            $result = $db->prepare($query);
            $result->execute([$numMembre]);
            $allNbMembreByLikeC = $result->fetchAll();
			$allNbMembreByLikeCom = 0;
			foreach ( $allNbMembreByLikeC as $row){
				$allNbMembreByLikeCom = $allNbMembreByLikeCom + 1;
			}
            return($allNbMembreByLikeCome);
        }

		function get_NbAllMembreByLikeArt($numMembre){
            global $db;
            $query = 'SELECT * FROM membre INNER JOIN likeart ON membre.numMemb = likeart.numMemb WHERE membre.numMemb= ?;';
            $result = $db->prepare($query);
            $result->execute([$numMembre]);
            $allNbMembreByLikeA = $result->fetchAll();
			$allNbMembreByLikeArt = 0;
			foreach ( $allNbMembreByLikeA as $row){
				$allNbMembreByLikeArt = $allNbMembreByLikeArt + 1;
			}
            return($allNbMembreByLikeArt);

        }
		
		function create($prenomMembre,$nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre,$souvenirMembre,$accordMembre,$idStat){
			global $db;
			try {
				$db->beginTransaction();
				$requete= 'INSERT INTO membre (prenomMemb, nomMemb,pseudoMemb,passMemb,eMailMemb,dtCreaMemb,souvenirMemb,accordMemb,idStat) VALUES (?,?,?,?,?,?,?,?,?);';
				$result = $db->prepare($requete);
				$result->execute(array($prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre,$souvenirMembre,$accordMembre,$idStat));
				$db->commit();
				$result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert MEMBRE : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
		}
		

		function update($numMembre,$prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre, $souvenirMembre,$idStat){
			global $db;
			try {
				$db->beginTransaction();
				$requete="UPDATE membre SET prenomMemb = ?, nomMemb = ?, pseudoMemb = ?, passMemb = ?, eMailMemb = ?, dtCreaMemb = ?, souvenirMemb = ?, idStat = ? WHERE numMemb = ?";
				$result = $db->prepare($requete);
				$result->execute(array($prenomMembre, $nomMembre,$pseudoMembre,$passMembre,$emailMembre,$dtCreaMembre, $souvenirMembre, $idStat, $numMembre));
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur update MEMBRE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}


		// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
		function delete($numMembre){
			global $db;
			try {
				$db->beginTransaction();
				$requete= "DELETE FROM  membre WHERE numMemb = ?; ";
				$result = $db->prepare($requete);
				$result->execute([$numMembre]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete MEMBRE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
			}

		

	}	// End of class
