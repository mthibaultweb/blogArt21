<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./../../assets/css/formArticle.css" />
    </head>

    <div class="container">
        <h1> écrivez votre article </h1>
        <form method="post" action="traitement.php">
            <label for="titre">Titre de votre article</label> </br>
            <input type="text" name="titre" size="100" id="titre" placeholder="100 caractères maximum" title="Renseignez le titre de votre article" /> </br>

            <label for="chapeau">Chapeau de l'article</label> </br>
            <input type="text" name="chapeau" size="500" id="chapeau" placeholder="500 caractères maximum" title="Renseignez le chapeau de votre article" /> </br>

            <label for="accroche">Phrase d'accroche</label> </br>
            <input type="text" name="accroche" size="100" id="accroche" placeholder="100 caractères maximum" title="Renseignez la phrase d'accroche de votre article" /> </br>

            <label for="sous-titre1">Sous-titre du premier paragraphe</label> </br>
            <input type="text" name="sous-titre1" size="100" id="sous-titre1" placeholder="100 caractères maximum" title="Renseignez le sous-titre de votre premier paragraphe" /> </br>

            <label for="paragraphe1">Premier paragraphe</label> </br>
            <input class="paragraphe" type="text" size="1200" name="paragraphe1" id="paragraphe1" placeholder="1200 caractères maximum" title="Renseignez le premier paragraphe de votre article" /> </br>

            <label for="sous-titre2">Sous-titre du deuxième paragraphe</label> </br>
            <input type="text" name="sous-titre2" size="100" id="sous-titre2" placeholder="100 caractères maximum" title="Renseignez le sous-titre de votre deuxième paragraphe" /> </br>

            <label for="paragraphe2">Deuxième paragraphe</label> </br>
            <input type="text" name="paragraphe2" size="1200" id="paragraphe2" placeholder="1200 caractères maximum" title="Renseignez le deuxième paragraphe de votre article" /> </br>

            <label for="paragraphe3">Troisième paragraphe</label> </br>
            <input type="text" name="paragraphe3" size="1200" id="paragraphe3" placeholder="1200 caractères maximum" title="Renseignez le troisième paragraphe de votre article" /> </br>

            <label for="conclusion">Conclusion</label> </br>
            <input type="text" name="conclusion" size="800" id="conclusion" placeholder="800 caractères maximum" title="Renseignez la conclusion de votre article" /> </br>

            <label for="tag">Tags</label> </br>
            <input type="text" name="tag" id="tag" placeholder="60 caractères maximum par mots clés" title="Renseignez les tags de votre article" /> </br>
            
                <label for="tag">Importer une image</label> </br>
            <div class="importAlign">
                <input type="text" name="import" id="import" title="Importez une image" /> </br>
                <button class="button"> IMPORTER </button>
            </div>
        </form>
    </div>

</html>