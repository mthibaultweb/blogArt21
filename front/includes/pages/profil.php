<?  //include __DIR__ ."/../../../back/session/sessionVerif.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
        <link rel="stylesheet" href="./../../assets/css/normalize.css">
        <link rel="stylesheet" href="./../../assets/css/nav.css">
        <link rel="stylesheet" href="./../../assets/css/footer.css">
        <link rel="stylesheet" href="./../../assets/css/profil.css">
    </head>
    <body>        
        <? 
        include __DIR__."./../commons/navbar.php";
        require_once __DIR__."./../../../util/utilErrOn.php";
        require_once __DIR__."./../../../util/ctrlSaisies.php";
        require_once __DIR__."./../../../CLASS_CRUD/membre.class.php";
        global $db;
        $membre = new MEMBRE;

        if(isset($_SESSION['pseudoMemb'])){

            $pseudoMemb = ctrlSaisies($_SESSION['pseudoMemb']);
            $infoMembre = $membre->get_1Memb($pseudoMemb);

        }
        ?>
        <!-- <svg width="100vw" height="40vw" viewBox="0 0 1440 1725" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: fixed; top:50%; left:30%; z-index:-8;">
            <path d="M2527.7 534.104C2322.01 189.33 1935.98 64.2684 1935.98 64.2684C1935.98 64.2684 1447.58 -126.848 950.845 150.059C950.845 150.059 695.096 356.279 411.108 139.386C131.292 -74.487 -127.345 412.667 -135.046 426.966C-135.046 427.369 -135.367 427.973 -135.367 428.375C-141.785 453.75 -251.209 909.086 -59.9582 1098.59C-59.9582 1098.59 86.3676 1274.8 334.095 1208.55C334.095 1208.55 1169.05 938.286 1138.57 1370.46C1138.57 1370.46 1164.56 1641.93 1653.59 1710.81C1653.59 1710.81 2099.63 1822.37 2415.07 1415.37C2414.75 1415.37 2733.71 878.877 2527.7 534.104Z" fill="#113638"/>
        </svg> -->
        <svg class="bckgd" width="1440" height="917" viewBox="0 0 1440 917" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: fixed; top:40%; width:180%; left:-25%; z-index:-8;">
            <path d="M1366.22 17.2388C1048.72 60.2854 888.511 83.0967 817.01 146.251C754.372 201.585 802.432 222.269 737.86 278.374C642.485 361.256 446.349 395.43 284.585 379.415C103.85 361.518 77.3235 291.966 -87.1471 289.263C-245.002 286.661 -364.851 348.35 -395.013 363.874C-665.213 502.953 -703.729 819.939 -547.625 887.712C-412.676 946.308 -244.414 769.953 126.286 788.23C381.96 800.839 388.275 888.983 689.878 909.473C821.415 918.412 1133.58 939.622 1311.04 822.422C1408.62 757.971 1435.96 671.149 1591.63 631.229C1666.69 611.985 1687.02 625.314 1728.33 607.909C1928.74 523.477 1824.82 51.8116 1546.07 1.68945C1530.81 -1.05604 1513.75 -2.75926 1366.22 17.2388Z" fill="#113638"/>
        </svg>
        <div class="profil">
            <div class="infoProfil">
                <div>
                    <img id="pp" src="./../../assets/images/Vector_2.svg" height="300" width="300" >
                </div>
                <div class="labelProfil"><label>Profil : </label><label><?= $infoMembre['pseudoMemb'];?></label></div>
                <div class="labelProfil"><label>E-mail : </label><label><?= $infoMembre['eMailMemb'];?></label></div>
                <div class="labelProfil"><label>Mot de passe : </label><label>**********</label></div>
                <a class="button btnProfil" href="./connexion.php">Modifier les informations</a>
                <a class="button btnProfil" href="./../../../back/session/deconnexion.php">Se deconnecter</a>
                <!-- <button class="button2">Supprimer le compte</button> -->
            </div>
        </div>

        <?
            include __DIR__."./../commons/footer.php";
        ?>
    </body>
</html>