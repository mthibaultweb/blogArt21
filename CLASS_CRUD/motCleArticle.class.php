<?
// CRUD MOTCLEARTICLE (ETUD)

	require_once __DIR__ . './../../CONNECT/database.php';

	class MOTCLEARTICLE{
    function get_AllMotCleArticle(){
			global $db;
      $requete = 'SELECT * FROM motclearticle INNER JOIN motcle ON motclearticle.numMotCle = motcle.numMotCle INNER JOIN article ON motclearticle.numArt = article.numArt;';
      $result = $db->prepare($requete);
      $result->execute();
      return($result->fetchAll());
		}

    function get_AllMotCleArticleByArt($numArt){
			global $db;
      $requete = 'SELECT * FROM motclearticle INNER JOIN motcle  ON motclearticle.numMotCle = motcle.numMotCle WHERE motclearticle.numArt = ?';
      $result = $db->prepare($requete);
      $result->execute([$numArt]);
      return( $result->fetchAll());
		}

    function get_nbMotCleArticleByArt($numArt){
			global $db;
      $requete = 'SELECT * FROM motclearticle INNER JOIN motcle  ON motclearticle.numMotCle = motcle.numMotCle WHERE motclearticle.numArt = ?';
      $result = $db->prepare($requete);
      $result->execute([$numArt]);
      $result->fetchAll();
      return( $result->rowCount());
		}

    function deleteMotCleArticle($numArt){
      global $db;
      $requete = 'DELETE FROM motclearticle WHERE numArt = ?;';
      $result = $db->prepare($requete);
      $result->execute([$numArt]);

    }
  }