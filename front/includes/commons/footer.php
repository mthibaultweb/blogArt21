
    <footer class="bas_page">

        <div class="bas_footer">

            <div class="contain_1">
                <ul><li> <h2 class="container_footer"> Notre blog</h2> </li>
                    <li> <br> <a href="./../pages/accueil.php" class="spe_footer">Accueil</a></li>
                    <li> <br>
                    <?if(isset($_SESSION['pseudoMemb'])){ ?>
                        <a href="./profil.php" class="spe_footer">Mon compte</a>

                        <?php } else {?>
                            <a href="./connexion.php" class="spe_footer">Mon Compte</a>
                        <?php } ?></li>
                </ul>
            </div>
            
            <div class="barreSepaPart ">
                <hr>
            </div>
            
            <div class="contain_1">
                <ul><li> <h2 class="container_footer"> Découvrir </h2> </li>
                    <li> <br> <a href="./article.php?id=55" class="spe_footer">Street-Art, l'Art Illégal</a> </li>
                    <li> <br> <a href="./article.php?id=57" class="spe_footer">Mascarons de Bordeaux</a> </li>
                    <li> <br> <a href="./article.php?id=56" class="spe_footer">La Face des Bassins des Lumières</a> </li>
                </ul>
            </div>

            <div class="barreSepaPart ">
                <hr>
            </div>

            <div class="contain_2">
                <ul><li> <h2 class="container_footer"> Nos Réseaux </h2> </li>
                    <li> <a href="./#"><i class="fa fa-instagram"></i></a></li>
                    <li> <a href="./#"><i class="fa fa-twitter"></i></a></li>
                    <li> <a href="./#"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>

            <div class="barreSepaPart ">
                <hr>
            </div>

            <div class="contain_3"> 
                <a class="btn_footer3" href="./../pages/connexion.php">Se connecter</a>
                <a class="btn_footer3" href="./../pages/inscription.php">S'inscrire</a>
            </div>
            

        
        </div>

        <div id="trait_dessus"><hr></div>

        <div class="titre_mention">
        <a href="./mentions.php"  class="mentionFooter"><h2> Mentions Légales</h2></a>
        </div>  

    </footer>




