<div class="control-group">
            <label for="numMemb">Membre :</label>  
            <select id="numMemb" name="numMemb"  onchange="select()">
                <option value="" selected disabled hidden>Sélectionner un membre</option>
                <?php 
                global $db;
                $requete = 'SELECT * FROM membre ;';
                $result = $db->query($requete);
                $allMembre = $result->fetchAll();
                foreach ($allMembre AS $membre)
                {
                ?>
                <option value="<?php echo $membre['numMemb'];?>"><?php echo $membre['pseudoMemb'];?></option>
                <?php
            }
            ?>
            </select>
        </div>
        <div class="control-group">
            <label for="numArt">Article :</label>  
            <select id="numArt" name="numArt"  onchange="select()">
                <option value="" selected disabled hidden>Sélectionner un Article</option>
                <?php 
                global $db;
                $requete = 'SELECT * FROM article ;';
                $result = $db->query($requete);
                $allArticle = $result->fetchAll();
                foreach ($allArticle AS $article)
                {
                ?>
                <option value="<?php echo $article['numArt'];?>"><?php echo $article['libTitrArt'];?></option>
                <?php
            }
            ?>
            </select>
        </div>