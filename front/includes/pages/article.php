<?
setcookie('page', 'article.php', 3600*24, null, null, false, true);
?>
<html>
    <head>
        <meta charset="utf8">
        <title>Article</title>
        <link rel="stylesheet" href="./../../assets/css/normalize.css">
        <link rel="stylesheet" href="./../../assets/css/article.css">
        <link rel="stylesheet" href="./../../assets/css/nav.css">
        <link rel="stylesheet" href="./../../assets/css/footer.css">
    </head>
    <body>

<? 

include __DIR__."./../commons/navbar.php";
require_once __DIR__."./../../../util/utilErrOn.php";
require_once __DIR__."./../../../util/ctrlSaisies.php";
require_once __DIR__."./../../../CLASS_CRUD/article.class.php";
require_once __DIR__."./../../../CLASS_CRUD/likeArt.class.php";
global $db;
$article = new ARTICLE;
$likeArt = new LIKEART;

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $numArt = ctrlSaisies($_GET['id']);
    $contenu = $article->get_1ArticleByThemAngl($numArt);
    $nbLikeArt = $likeArt->get_LikeByArt($numArt);
    $titreArt = $contenu['libTitrArt'];
    $sousTitr1 = $contenu['libSsTitr1Art'];
    $sousTitr2 = $contenu['libSsTitr2Art'];

}
?>
        
        <div class="articleContainer">
            <br>
            <br>
            <div class="articleImage">
                <img class="imageArt" src="./../../../uploads/<?= $contenu['urlPhotArt'];?>" >
                <div class="artOverlay">
                    <h1><?= $titreArt ?></h1>
                </div>
            </div>
            <br>
            <div class="textArticle">
                <p><?= $contenu['libChapoArt']; ?></P>
                <p class="accroche"><?= $contenu['libAccrochArt']; ?></p>
                <h2><?= $sousTitr1;?></h2>
                <p><?= $contenu['parag1Art']; ?></p>
                <h2><?= $sousTitr2; ?></h2>
                <p><?= $contenu['parag2Art']; ?></p>
                <p><?= $contenu['parag3Art']; ?></p>
                <h2> Conclusion : </h2>
                <p><?= $contenu['libConclArt']; ?></p>
            </div>
            <!-- <div class="likeArt">
                <label class="likeArticle">J'aime</label>
                <img src="../../assets/images/Like.png" style="margin-left: 1%;transform: translateY(5px);">
                <label class="likeArticle"><? //$nbLikeArt?></label>
            </div> -->
        </div>
        <br>
        <br>
        <br>
        <br>

        <?
        require_once __DIR__."./../../../CLASS_CRUD/comment.class.php";
        require_once __DIR__."./../../../CLASS_CRUD/likeCom.class.php";
        global $db;
        $comment = new COMMENT;
        $likecomment = new LIKECOM;

        if(isset($_GET['id']) AND !empty($_GET['id'])){
            $numArt = ctrlSaisies($_GET['id']);
            $commentaires = $comment->get_AllCommentByArt($numArt);
            $nbComment = $comment->get_nbComment($numArt);
            $nbLikeComment = $likecomment->get_AllLikeComByArt($numArt);
        }
        foreach($commentaires as $commentaire){
        ?>
        <div class="commentaireContainer">
                <div class="logoCommentaire">
                    <img src="./../../assets/images/Vector_2.svg" height="100" width="100" >
                </div>
                <div class="comment">
                    <div>
                        <label><?= $commentaire['dtCreCom'];?></label>
                        <label class="commentPseudo"><?= $commentaire['pseudoMemb'];?></label>
                    </div>
                    <div>
                        <form action="">
                        <textarea id="commentaire" name="commentaire" class="formulaire" cols="40" rows="3" readonly="readonly" style="resize: none; align-item:center;"><?= $commentaire['libCom'];?></textarea><br>
                        <button class="button">Répondre</button>
                        <img src="./../../assets/images/Like.png" style="margin-left: 1%;transform: translateY(5px);">
                        <label id="nbLikes"><?= $nbLikeComment?></label>
                        </form>
                    </div>
                </div> 
        </div>
        <? 
            }
            if ($nbComment == 0){
        ?>
                <div class="commentaireContainer">
                    <p class="pasDeComment">Pas encore de commentaires</p>
                </div>
        <?php
            }
        ?>
        <br>
        <div class="barreSeparation">
            <hr>
        </div>
        <br>

        <?
            if (isset($_GET['message'])){

                $message = $_GET['message'];

            ?>
            <div class="commentaireContainer">
                <p class="pasDeComment"><?= $message;?></p>
            </div>
            <?
            } 
            if(isset($_SESSION['pseudoMemb'])){
            ?>
                <div class="commentaireContainer">
                    <div class="logoCommentaire">
                        <img src="./../../assets/images/Vector_2.svg" height="100" width="100" >
                    </div>
                    <div>
                        <form method="post" action="./../../../back/comment/createComment1.php" enctype="multipart/form-data">
                            <input type="hidden" id="pseudoMemb" name="pseudoMemb" value="<?= $_SESSION['pseudoMemb'] ;?>" />
                            <input type="hidden" id="numArt" name="numArt" value="<?= $_GET['id'] ;?>" />
                            <div>
                                <label class="commentPseudo" for="libCom">Commentaire :</label>
                            </div>
                            <textarea id="libCom" name="libCom" placeholder="Écrivez un commentaire" class="formulaire" cols="40" rows="3" style="resize: none;"></textarea><br>
                            <input class="button btnComment" type="submit" value="Envoyer" name="Submit" />
                        </form>
                    </div>  
                </div>
            <?
                }
                else{
            ?>
                <div class="commentaireConnexion">
                    <div class="logoCommentaire">
                        <img src="./../../assets/images/Vector_2.svg" height="100" width="100" >
                    </div>
                    <div >
                        <div>
                            <label class="pseudoComment">Connectez vous pour commenter :</label>
                            <a class="button" href="./connexion.php">CONNECTEZ VOUS</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
        <br>
        <?
        $articlePrec = $numArt - 1;
        $articleSuiv = $numArt + 1;
        ?>

        <div class="changementArt">
            <a class="button changement" href="./article.php?id=<?= $articlePrec; ?>">ARTICLE PRECEDENT</a>
            <a class="button changement" href="./article.php?id=<?= $articleSuiv; ?>">ARTICLE SUIVANT</a>
        </div>
        <? 
        include __DIR__."./../commons/footer.php";
        ?>
    </body>
</html>
