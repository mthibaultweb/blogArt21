<? 
session_start();
if(isset($_SESSION['pseudoMemb'])){
    $pseudoMemb = $_SESSION['pseudoMemb'];
    require_once __DIR__ . './util/utilErrOn.php';
    require_once __DIR__ . './CONNECT/database.php';
    $requete1 = "SELECT pseudoUser  FROM user WHERE pseudoUser = ?;";
    $result1 = $db->prepare($requete1);
    $result1->execute([$pseudoMemb]);
    $nbUser = $result1->rowCount();
}

?>

<script src="https://kit.fontawesome.com/68b1f887b3.js" crossorigin="anonymous"></script>

<header>
    <div class="head">
            <nav role="navigation">
                <div id="menuToggle">
                    <input type="checkbox">      
                
                    <span></span>
                    <span></span>
                    <span></span> 

                   
                    <ul id="menu">
                        <a href="./front/includes/pages/accueil.php"><li>Accueil</li></a>
                        <?  //include __DIR__ ."/../../../back/session/sessionVerif.php"; ?>

                        <?php 
                         if(isset($_SESSION['pseudoMemb'])){ ?>
                        <a href="./front/includes/pages/profil.php"><li>Mon compte</li></a>

                        <?php } else {?>
                            <a href="./front/includes/pages/connexion.php"><li>Mon Compte</li></a>
                        <?php } ?>
                        <?php 
                         if(isset($_SESSION['pseudoMemb'])){ ?>
                            <a href="./back/session/deconnexion.php"><li>Me déconnecter</li></a>
                        <?php 
                        } 
                    
                        if(isset($_SESSION['pseudoMemb']) AND ($nbUser != 0)){ ?>
                            <a href="./index1.php"><li>Gestion CRUD</li></a>

                        <?php } ?>

                    </ul>
                </div>
            </nav>
            

                <!-- ----------------------------Code de la barre de recherche------------------------ -->
            <div class="tous_bar">
                <div class="bar_re">
                    <div class="recherche">
                        <label for="site-search">Rechercher dans le site : </label>
                        <input type="search" id="site-search" placeholder="..." name="recherche" >
                    </div>
                    <button class="button"> Rechercher </button>
                </div>


            <!-- ----------------------------Fin Code de la barre de recherche------------------------ -->

        <!--  <img src="../../assets/images/logo" class="connect"> -->

                <!-- Pour login -->
                <?
                    if(isset($_SESSION['pseudoMemb'])){ 
                ?>
                        <a href="./profil.php" >
                            <i class="fas fa-user"></i>
                        </a>

                <?php 
                    } 
                    else {
                ?>
                        <a href="./connexion.php" >
                            <i class="fas fa-user"></i>
                        </a>
                <?php 
                    } 
                ?>
                    
            </div>
        </div>
</header>     








