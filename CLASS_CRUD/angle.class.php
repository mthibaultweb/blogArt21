<?
	// CRUD ANGLE (ETUD)

	require_once __DIR__ . './../../CONNECT/database.php';

	class ANGLE{
		
		function get_NbAllAngleByidLangue($id){
            global $db;
            $query = 'SELECT * FROM angle INNER JOIN langue ON angle.numLang = langue.numLang WHERE angle.numLang = ?;';
            $result = $db->prepare($query);
            $result->execute([$id]);
            $allNbAngleById = $result->fetchAll();
			$allNbAngleByLangue = 0;
			foreach ( $allNbAngleById as $row){
				$allNbAngleByLangue = $allNbAngleByLangue + 1;
			}
            return($allNbAngleByLangue);
        }

		function get_AllAngle(){
            global $db;
            $query = 'SELECT * FROM angle ;';
            $result = $db->prepare($query);
            $result->execute();
            return($result->fetchAll());
			
        }
        function get_1AngleByLangue($numAngl){
            global $db;
            $query = 'SELECT * FROM angle INNER JOIN langue ON angle.numLang = langue.numLang WHERE angle.numAngl = ? ;';
            $result = $db->prepare($query);
            $result->execute([$numAngl]);
            return($result->fetch());
			
        }

        function get_AllAngleByLangue(){
            global $db;
            $query = 'SELECT numAngl, libAngl, lib1Lang FROM angle INNER JOIN langue ON angle.numLang = langue.numLang ORDER BY numAngl ASC;';
            $result = $db->prepare($query);
            $result->execute();
            return($result->fetchAll());
			
        }

		function create($numAngl, $libAngl, $numLang){ 
            global $db;
            try {
				$db->beginTransaction();
                $query = 'INSERT INTO angle (numAngl, libAngl, numLang) VALUES (?, ?, ?);';
                $result = $db->prepare($query);
                $result->execute([$numAngl, $libAngl, $numLang]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur insert ANGLE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
				
        }

        function update($numAngl, $libAngl, $numLang){ 
            global $db;
            try {
				$db->beginTransaction();
                $query = 'UPDATE angle SET libAngl = ?, numLang = ? WHERE numAngl = ?;';
                $result = $db->prepare($query);
                $result->execute([$libAngl, $numLang, $numAngl]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur insert ANGLE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
				
        }

        function delete($numAngl){ 
            global $db;
            try {
				$db->beginTransaction();
                $query = 'DELETE FROM angle WHERE numAngl = ?;';
                $result = $db->prepare($query);
                $result->execute([$numAngl]);
				$db->commit();
				$result->closeCursor();
	
				}
				catch (PDOException $e) {
						die('Erreur delete ANGLE : ' . $e->getMessage());
						$db->rollBack();
						$result->closeCursor();
				}
				
        }


		

	}	// End of class
