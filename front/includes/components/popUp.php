<html>
    <header>
        <meta charset="utf8">
        <title>popup</title>
        <link rel="stylesheet" href="./../../assets/css/popUp.css">
    </header>
    <body class="imgpop_mention">
        <div id="id-element" class="bulle">
            <h1 class="titre" >Mentions Légales</h1>
            <br>
            <p class="message">Afin de naviguer sur notre blog, vous devez accepter<br> nos mentions légales ainsi que nos conditions<br> d’utilisation.</p>
            <br>
            <br>
            <div class="bouton-container">
                <button onclick="afficher()" type="submit" class="bouton">Accepter les conditions</button>
                <a href="http:\\www.youtube.fr" class="alien">Toutes les mentions légales</a>
        </div>
        </div>

        <script>
    function afficher(){
        document.getElementById("id-element").style.display ="none";
    }
</script>

    </body>
</html>
