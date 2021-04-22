<?
// CRUD COMMENT

require_once __DIR__ . './../../CONNECT/database.php';

	class COMMENT{      

        function get_AllComment(){
            global $db;
            $requete = 'SELECT * FROM comment INNER JOIN article ON comment.numArt = article.numArt INNER JOIN membre ON comment.numMemb = membre.numMemb;';
            $result = $db->prepare($requete);
            $result->execute();
            return($result->fetchAll());
        }

        function get_1CommentByArt($numSeqCom,$numArt){
            global $db;
            $query = 'SELECT * FROM comment INNER JOIN article ON comment.numArt = article.numArt WHERE comment.numSeqCom = ? AND comment.numArt = ?;';
            $result = $db->prepare($query);
            $result->execute([$numSeqCom,$numArt]);
            return($result->fetch());
        }

        function get_AllCommentByArt($numArt){
            global $db;
            $affComOK = 1;
            $query = 'SELECT * FROM comment INNER JOIN membre ON comment.numMemb = membre.numMemb WHERE numArt = ? AND affComOk = ?;';
            $result = $db->prepare($query);
            $result->execute([$numArt, $affComOK]);
            return($result->fetchAll());
        }

        function get_nbComment($numArt){
            global $db;
            $affComOK = 1;
            $requete = 'SELECT * FROM comment WHERE numArt = ? AND affComOk = ?;';
            $result = $db->prepare($requete);
            $result->execute([$numArt, $affComOK]);
            return($result->rowCount());
        }
        
        function create($numSeqCom, $numArt, $dtCreaCom, $libCom, $numMemb){
            global $db;
            try {
                $db->beginTransaction();
                $requete = 'INSERT INTO comment (numSeqCom, numArt, dtCreCom, libCom, numMemb) VALUES (?,?,?,?,?);';
                $result = $db->prepare($requete);
                $result->execute([$numSeqCom, $numArt, $dtCreaCom, $libCom, $numMemb]);
                $db->commit();
                $result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur insert COMMENT : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
        }
        
        function update($numSeqCom, $numArt, $attModOK, $affComOK, $notifComKOAff) {
            global $db;
            try {
                $db->beginTransaction();
                $requete = 'UPDATE comment SET attModOK = ?, affComOK = ?, notifComKOAff = ? WHERE numSeqCom = ? AND numArt = ?';
                $result = $db->prepare($requete);
                $result->execute([$attModOK, $affComOK,$notifComKOAff,$numSeqCom, $numArt]);
                $db->commit();
                $result->closeCursor();
			}
			catch (PDOException $e) {
					die('Erreur update COMMENT : ' . $e->getMessage());
					$db->rollBack();
					$result->closeCursor();
			}
        }
        
    } // End of class