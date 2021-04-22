<?
setcookie('page', 'accueil.php', 3600*24, null, null, false, true);
$page = basename($_SERVER["SCRIPT_FILENAME"]);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    
    <link rel="stylesheet" href="./../../assets/css/normalize.css">

    <link rel="stylesheet" href="./../../assets/css/nav.css">
    <link rel="stylesheet" href="./../../assets/css/cookies.css">
    <link rel="stylesheet" href="./../../assets/css/banner.css"> 

    <link rel="stylesheet" href="./../../assets/css/presentation.css"> 
    <link rel="stylesheet" href="./../../assets/css/accueil.css"> 

    <link rel="stylesheet" href="./../../assets/css/footer.css">

    <!-- popup mentions légales <link rel="stylesheet" href="../../assets/css/popUp.css"> -->

    <!-- Script pour les réseaux sociaux -->
    <script src="https://kit.fontawesome.com/68b1f887b3.js" crossorigin="anonymous"></script>

</head>

<body class="corp">

    <?
        include __DIR__ ."./../commons/navbar.php";

        include __DIR__ ."./../components/cookies.php";

        include __DIR__ ."./../commons/banner.php";

        include __DIR__ ."./../components/presentation.php";

    ?>
    <main class="wrapper">
        <div class="articles">
            <img class="imgArticles" src="./../../assets/images/banniere_Alber.png" alt="Une image"> <!-- Image Alber -->
            
            <div class="articleOverlay">
                <h1 class="grand_titre"> Street Art - L'art Illégal</h1>
                <div class="txtArticles">
                    <p class="para_presentation">
                        Il fait partie intégrante de chaque  
                        <br>
                        ville et pourtant il reste malgré tout 
                        <br>
                        illégal [...] 
                    </p>   
                    <svg class="haut_droit" width="72" height="61" viewBox="0 0 72 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="2.5" x2="72" y2="2.5" stroke="#FFF3FB" stroke-width="5"/>
                        <path d="M69.5 61L69.5 5" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>
                    <svg class="bas_gauche"  width="73" height="62" viewBox="0 0 73 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="72.2878" y1="59.1425" x2="0.288634" y2="59.4986" stroke="#FFF3FB" stroke-width="5"/>
                        <line x1="2.49997" y1="0.987637" x2="2.77691" y2="56.987" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>
                </div> 
                <a class="btn_footer" href="./article.php?id=55">VOIR L'ARTICLE</a>
            </div>

        </div> 

        <div class="articles">
            <img class="imgArticles" src="./../../assets/images/baniere_base_sous_marine_1.jpg" alt="Une image"> <!-- Image Alber -->
            
            <div class="articleOverlay">
                <h1 class="grand_titre">La face des bassins de Lumières</h1>
                <div class="txtArticles">
                    <p class="para_presentation">
                        Les Bassins de Lumières, niché  
                        <br>
                        dans la base sous-marine de Bordeaux [...]
                    </p>   
                    <svg class="haut_droit" width="72" height="61" viewBox="0 0 72 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="2.5" x2="72" y2="2.5" stroke="#FFF3FB" stroke-width="5"/>
                        <path d="M69.5 61L69.5 5" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>
                    <svg class="bas_gauche"  width="73" height="62" viewBox="0 0 73 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="72.2878" y1="59.1425" x2="0.288634" y2="59.4986" stroke="#FFF3FB" stroke-width="5"/>
                        <line x1="2.49997" y1="0.987637" x2="2.77691" y2="56.987" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>
                </div> 
                <a class="btn_footer" href="./article.php?id=56">VOIR L'ARTICLE</a>
            </div>

        </div> 

        <div class="articles">
            <img class="imgArticles" src="./../../assets/images/banniere_mascarons.png" alt="Une image"> <!-- Image Alber -->
            
            <div class="articleOverlay">
                <h1 class="grand_titre"> Mascarons de Bordeaux</h1>
                <div class="txtArticles">
                    <p class="para_presentation">
                        Les mascarons, de l’italien,
                        <br>
                        “grand masque grotesque” et de l’arabe, “bouffonnerie” [...]
                    </p>   
                    <svg class="haut_droit" width="72" height="61" viewBox="0 0 72 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="2.5" x2="72" y2="2.5" stroke="#FFF3FB" stroke-width="5"/>
                        <path d="M69.5 61L69.5 5" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>
                    <svg class="bas_gauche"  width="73" height="62" viewBox="0 0 73 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="72.2878" y1="59.1425" x2="0.288634" y2="59.4986" stroke="#FFF3FB" stroke-width="5"/>
                        <line x1="2.49997" y1="0.987637" x2="2.77691" y2="56.987" stroke="#FFF3FB" stroke-width="5"/>
                    </svg>
                </div> 
                <a class="btn_footer" href="./article.php?id=57">VOIR L'ARTICLE</a>
            </div>

        </div> 
    </main>
    <!--------------------------------------------- Partie Footer --------------------------------------------------->
    <?
    include __DIR__."./../commons/footer.php";
    ?>
    </body>
</html>