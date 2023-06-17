<?php
if (isset($_SESSION["login"]))
{
    // création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM inscrit INNER JOIN accompagnateur ON inscrit.fk_id_accompagnateur = accompagnateur.id_accompagnateur WHERE id_inscrit=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $inscrit = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM rdc WHERE id_rdc=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $rdc = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM cap_emploi WHERE id_cap_emploi=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $cap_emploi = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM cma WHERE id_cma=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $cma = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM enfant WHERE fk_id_inscrit_enfant=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $enfant = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM files WHERE id_files=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $files = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM langue_anglaise WHERE id_langue_anglaise=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $langue_anglaise = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM langue_francaise WHERE id_langue_francaise=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $langue_francaise = $requete->fetchAll();
    $requete = null;
    
    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM mission_locale WHERE id_mission_locale=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $mission_locale = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM permis_conduire WHERE fk_id_inscrit_permis=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $permis_conduire = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM pole_emploi WHERE id_pole_emploi=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $pole_emploi = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM rdc WHERE id_rdc=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $rdc = $requete->fetchAll();
    $requete = null;

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM soelis WHERE id_soelis=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $soelis = $requete->fetchAll();
    $requete = null;

    foreach($inscrit as $ligne_inscrit)
    {
    ?>
    <div class="addsuivis">
        <h1 class="titrecreer">MODIFICATION DU SUIVI</h1>
        <h2 class="information">Informations personnelles</h2>
        <form class="form" method="post" id="suiviss" action="index.php?route=store_update&id=<?=$_GET["id"]?>" enctype="multipart/form-data">
            <!--    Information personnelles    -->
        <div class="block_enligne">
            <div class="input_boxe">
            <label for="dte_contact">Date du contact : <span class="obligatoire">*</span></label>
            <input type="date" id="dte_contact"  name="dte_contact" value="<?php echo $ligne_inscrit["dte_contact"] ?>" disabled>
            </div>
            <div class="input_boxe">
            <label for="origine_contact">Origine du contact : <span class="obligatoire">*</span></label>
            <input type="text" name="origine_contact" id="origine_contact"  value="<?php echo $ligne_inscrit["origine_contact"] ?>" disabled>
            </div>
        </div>
        
        <div class="radio_button">
            <label for="inscrit">Inscrit aux resto du coeur : <span class="obligatoire">*</span></label>
            <input type="radio" id="radio_oui" name="inscrit_rdc" class="radio_oui" value="oui" onclick="hideShowDiv(1)" disabled
            <?php
            if($ligne_inscrit["inscrit_rdc"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="inscrit_oui">oui</label>
            <input type="radio" id="radio_non" name="inscrit_rdc" class="radio_non" value="non" onclick="hideShowDiv(2)" disabled
            <?php
            if($ligne_inscrit["inscrit_rdc"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="inscrit_non">non</label>
        <?php
        foreach($rdc as $ligne_rdc)
        {?>
            <!--    Si oui   -->
        <div id="centre_num">
            <label id="num_" class="decale" for="num">N° : <span class="obligatoire">*</span></label>
            <input class="input_suivis" type="text" id="num" name="numero" value="<?php echo $ligne_rdc["numero"] ?>" disabled>

            <label id="centre" for="centre">Centre : <span class="obligatoire">*</span></label>
            <input class="input_suivis" type="text" id="centre" name="centre" value="<?php echo $ligne_rdc["centre"] ?>"disabled>

            <label id="jour" for="jour">Jour : <span class="obligatoire">*</span></label>
            <input class="input_suivis" type="text" id="jour" name="jour" value="<?php echo $ligne_rdc["jour"] ?>"disabled>
        </div>

            <!--    Si non    -->
            <div id="date_rea1">
            <label class="decale" for="date_r">Date de réalisation : </label>
            <input class="input_suivis" type="date" id="date_r" name="dte_realisation_rdc" value="<?php echo $ligne_rdc["dte_realisation_rdc"] ?>"disabled>
            <label for="commentaire_inscrit">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_inscrit" value="<?php echo $ligne_rdc["commentaire_inscrit"] ?>"disabled>
            </div>
            <div>
            <label for="benevole">Bénévole aux resto du coeur : <span class="obligatoire">*</span></label>
            <input type="radio" id="_oui" name="benevole_rdc" class="oui" value="oui"   disabled         
            <?php
            if($ligne_inscrit["benevole_rdc"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="benevole_oui">oui</label>
            <input type="radio" id="_non" name="benevole_rdc" class="non" value="non"  disabled
            <?php
            if($ligne_inscrit["benevole_rdc"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="benevole_non">non</label>
            </div>
        <?php
        }?>
        </div>
        <?php
        // ordre de mission
        $requete = $mysqlConnection->prepare('SELECT * FROM accompagnateur');
        //execution de la requete
        $requete->execute();
        $accompagnateurs = $requete->fetchAll();
        $mysqlConnection = null;
        $requete = null;
        ?>

            <div class="input_boxe">
            <label class="accompagnateur" for="accompagnateur">Accompagnateur SRE : <span class="obligatoire">*</span></label>
            <select name="accompagnateur" id="accompagnateur" class="form-control" disabled> 
                <option value="<?php echo $ligne_inscrit["name_acc"] ?>"> -- Selectionner un accompagnateur -- </option>
                <?php
                foreach($accompagnateurs as $ligne){
                if($ligne["is_admin"]==0){
                ?>
                    <option value=<?= $ligne["id_accompagnateur"]?>
                    <?php
                    if($ligne["id_accompagnateur"]==$ligne_inscrit["fk_id_accompagnateur"]){
                        echo "selected";
                    }
                    ?> ><?= $ligne["name_acc"]?></option>
                <?php
                }}
                ?>
            </select>
            <p class="oblig">(<span class="obligatoire">*</span> : obligatoire)</p>

            </div>


            <hr>



            <!--    
                Information personnelles : Coordonnées de la personne accueillie
            -->
           <?php
            foreach($inscrit as $ligne_inscrit)
                {
            ?>
            <div class="infor_pers">  
        <h2 class="information">Coordonnées</h2>
        <h2 class="information2">Situation personnelle</h2>
            <div class="block_enligne">
        <div class="input_boxe">
            <label for="civilite">Civilité : <span class="obligatoire">*</span></label>
            <select class="form-control" name="civilite" id="civilite" disabled>
                <option value="<?php echo $ligne_inscrit["civilite"] ?>">-- Selectionner une option --</option>
                <option value="Madame" <?php
                if($ligne_inscrit["civilite"]=="Madame"){
                        echo "selected";
                    }
                    ?>>Madame</option>
                <option value="Mademoiselle" <?php
                if($ligne_inscrit["civilite"]=="Mademoiselle"){
                        echo "selected";
                    }
                    ?>>Mademoiselle</option>
                <option value="Monsieur" <?php
                if($ligne_inscrit["civilite"]=="Monsieur"){
                        echo "selected";
                    }
                    ?>>Monsieur</option>
            </select>
            <div class="input_boxe">

            <label for="nom">Nom : <span class="obligatoire">*</span></label>
            <input type="text" id="nom" name="nom" value="<?php echo $ligne_inscrit["nom"] ?>"disabled>


            <label class="decale" for="prenom">Prénom : <span class="obligatoire">*</span></label>
            <input class="decale" type="text" id="prenom" name="prenom" value="<?php echo $ligne_inscrit["prenom"] ?>"disabled>
            </div>
            <div class="input_boxe">
            
            <label for="birth_date">Date de naissance : <span class="obligatoire">*</span></label>
            
            <input type="date" id="birthdate" name="dte_naissance" value="<?php echo $ligne_inscrit["dte_naissance"] ?>"disabled>
            <div class="div_age">

            </div>
            <div class="input_boxe">
            <label for="nationalite" id="nationalite">Nationalité : <span class="obligatoire">*</span></label>
            <select class="form-control" name="nationalite" id="nationalite" disabled>
                <option value="<?php echo $ligne_inscrit["nationalite"] ?>"><?php echo $ligne_inscrit["nationalite"] ?></option>
            </select>
        </div>
        <div class="input_boxe">
            <label id="adresse" for="adresse">Adresse : <span class="obligatoire">*</span></label>
            <input type="text" id="adresse" name="adresse" value="<?php echo $ligne_inscrit["adresse"] ?>"disabled>


            <label class="decaler" for="zipcode">Code Postal : <span class="obligatoire">*</span></label>
            <input class="decaler" type="text" id="zipcode" name="code_postal" value="<?php echo $ligne_inscrit["code_postal"] ?>"disabled>
            <div id="error-message" style="display: none; color: #f55;"></div>
            <div class="input_boxe">
            <label class="decaler" for="city">Ville : <span class="obligatoire">*</span></label>
            <select class="form-control" id="city" placeholder="Ville" name="ville" value="<?php echo $ligne_inscrit["ville"] ?>"disabled></select>
            <p class="ital" style="color : red;">Si la ville ne correspond pas, re-selectionner la ville</p>
            </div>
            </div>
            <div class="input_boxe">

            <label class="decaler" for="tel">Téléphone : <span class="obligatoire">*</span></label>
            <input class="decaler" type="text" id="tel" name="telephone" value="<?php echo $ligne_inscrit["telephone"] ?>"disabled>

            <label class="decaler" for="email">E-mail : <span class="obligatoire">*</span></label>
            <input class="decaler" type="mail" id="email" name="email" value="<?php echo $ligne_inscrit["email"] ?>"disabled>
            </div>
            
        </div>

            <label for="statue">Statue : <span class="obligatoire">*</span></label>
            <select class="form-control" id="statut" name="situation_perso"disabled>
                <option value="<?php echo $ligne_inscrit["situation_perso"] ?>">-- Selectionner un statut --</option>
                <option value="celibataire" <?php
                if($ligne_inscrit["situation_perso"]=="celibataire"){
                        echo "selected";
                    }
                    ?>>Célibataire</option>
                <option value="marier" <?php
                if($ligne_inscrit["situation_perso"]=="marier"){
                        echo "selected";
                    }
                    ?>>Marié(e)</option>
                <option value="concubin" <?php
                if($ligne_inscrit["situation_perso"]=="concubin"){
                        echo "selected";
                    }
                    ?>>Concubin(e)</option>
                <option value="veuf" <?php
                if($ligne_inscrit["situation_perso"]=="veuf"){
                        echo "selected";
                    }
                    ?>>Veuf(ve)</option>
                <option value="divorce" <?php
                if($ligne_inscrit["situation_perso"]=="divorce"){
                        echo "selected";
                    }
                    ?>>Divorcé(e)</option>
                <option value="pacse" <?php
                if($ligne_inscrit["situation_perso"]=="pacse"){
                        echo "selected";
                    }
                    ?>>Pacsé(e)</option>
            </select>
        </div>
        <?php
        }?>
            <!--    Situation personnelle    -->
            <!--    
                Enfants à charge  ------------------------------------------------------------------
            -->

            <div class="sit_perso">
            <label>Enfants à charge : <span class="obligatoire">*</span></label>
            <input type="radio" id="enfant_oui" name="enfant_charge" onclick="hideshowkid(1)" value="oui" disabled <?php
            if($ligne_inscrit["enfant_charge"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="enfant_oui">oui</label>


            <input type="radio" id="enfant_non" name="enfant_charge" onclick="hideshowkid(2)" value="non" disabled <?php
            if($ligne_inscrit["enfant_charge"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="enfant_non">non</label>
            <div id="enfant_naissance" class="input_boxe">
            <!--    Si oui    -->
            <label for="nombre_enfant">Nombre d'enfants à charge : <span class="obligatoire">*</span></label>
            <input type="number" id="nombre_enfant" name="nb_enfant" value="<?php echo $ligne_inscrit["nb_enfant"] ?>"disabled>
            <div id="boite">
            </div>
    <br>
            </div>
            <script>
    // Récupérer la référence de l'input nombre_enfant
    const inputNombreEnfant = document.getElementById('nombre_enfant');

    // Écouter l'événement de modification de l'input
    inputNombreEnfant.addEventListener('change', () => {
    // Récupérer le nombre d'enfants à partir de la valeur de l'input
    const nombreEnfant = parseInt(inputNombreEnfant.value);

    // Référence à l'élément parent où les divs doivent être ajoutés
    const parentElement = document.getElementById('boite');

    // Vider le contenu précédent
    parentElement.innerHTML = '';

    // Créer et ajouter les divs en fonction du nombre d'enfants
    for (let i = 0; i < nombreEnfant; i++) {
        // Créer un élément div
        const div = document.createElement('div');
        div.id = 'boite';
        const div2 = document.createElement('div');
        div2.id = 'boite2';

        // Créer un élément label pour le nom de l'enfant
        const labelNomEnfant = document.createElement('label');
        labelNomEnfant.htmlFor = `nom_enfant`;
        labelNomEnfant.textContent = `Nom prénom de l'enfant ${i + 1} : `;

        // Créer un élément input pour le nom de l'enfant
        const inputNomEnfant = document.createElement('input');
        inputNomEnfant.type = 'text';
        inputNomEnfant.name = `nom_enfant${i + 1}`; // Ajout d'un name différent
        inputNomEnfant.classList.add('nom_enfant');

        // Créer un élément label pour la date de naissance de l'enfant
        const labelDateNaissance = document.createElement('label');
        labelDateNaissance.htmlFor = 'dte_naissance_enfant';
        labelDateNaissance.textContent = `Date de naissance de l'enfant ${i + 1} : `;
        labelDateNaissance.classList.add('dte_naissance_enfant');


        // Créer un élément input pour la date de naissance de l'enfant
        const inputDateNaissance = document.createElement('input');
        inputDateNaissance.type = 'date';
        inputDateNaissance.name = `dte_naissance${i + 1}`; // Ajout d'un name différent
        inputDateNaissance.classList.add('dte_naissance_enfant');

        // Ajouter les éléments créés au div parent
        div.appendChild(labelNomEnfant);
        div.appendChild(inputNomEnfant);
        div2.appendChild(labelDateNaissance);
        div2.appendChild(inputDateNaissance);

        // Ajouter le div parent à l'élément parent
        parentElement.appendChild(div);
        parentElement.appendChild(div2);
    }
    });

            </script>
            <!--    Si non (rien)    -->

            <!--    
                Nature des revenus  ---------------------------------------------------------------
            -->
            <div class="input_boxe">
            <label for="revenus">Nature des revenus : <span class="obligatoire">*</span></label>
            <select class="form-control" name="nature_revenus" id="revenus" onchange="hideshowautre()"disabled>
                <option value="<?php echo $ligne_inscrit["nature_revenus"] ?>">-- Selectionner une option --</option>
                <option value="salaire" <?php
                if($ligne_inscrit["nature_revenus"]=="salaire"){
                        echo "selected";
                    }
                    ?>>Salaire</option>
                <option value="RSA" <?php
                if($ligne_inscrit["nature_revenus"]=="RSA"){
                        echo "selected";
                    }
                    ?>>RSA</option>
                <option value="ARE" <?php
                if($ligne_inscrit["nature_revenus"]=="ARE"){
                        echo "selected";
                    }
                    ?>>ARE</option>
                <option value="AAH" <?php
                if($ligne_inscrit["nature_revenus"]=="AAH"){
                        echo "selected";
                    }
                    ?>>AAH</option>
                <option value="retraite" <?php
                if($ligne_inscrit["nature_revenus"]=="retraite"){
                        echo "selected";
                    }
                    ?>>Pension de retraite</option>
                <option value="autre" id="autre" <?php
                if($ligne_inscrit["nature_revenus"]=="autre"){
                        echo "selected";
                    }
                    ?>>Autre</option>
                <option value="aucun" <?php
                if($ligne_inscrit["nature_revenus"]=="aucun"){
                        echo "selected";
                    }
                    ?>>Aucun</option>
            </select>
            
            <!--    Si "autre"    -->
            <div id="preciser" class="input_boxe">
            <label for="preciser">Préciser : <span class="obligatoire">*</span></label>
            <input type="text" name="autre_revenus"disabled>
            </div>
            </div>
            <!--    
                Pôle emplois  --------------------------------------------------------------------
            -->
            <label for="inscrit_pole_emploi">Inscrit à pôle emploi : <span class="obligatoire">*</span></label>
            <input type="radio" id="pole_oui" name="inscrit_pole_emploi" onclick="showhideemplois(1)" value="oui"disabled
            <?php
            if($ligne_inscrit["inscrit_pole_emploi"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="pole_oui">oui</label>
            <input type="radio" id="pole_non" name="inscrit_pole_emploi" onclick="showhideemplois(2)" value="non" disabled       
            <?php
            if($ligne_inscrit["inscrit_pole_emploi"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="pole_non">non</label>
            <!--    Si oui    -->
            <?php
            foreach($pole_emploi as $ligne_pole)
                {
            ?>
            <div class="input_boxe">
                <div id="pole_emplois">
            <label id="inscri_emplois" for="date_inscription_pole_emplois">Date d'inscription au pôle emplois : <span class="obligatoire">*</span></label>
            <input id="input_inscri_emplois" type="date" id="date_inscription_pole_emplois" name="dte_inscription" value="<?php echo $ligne_pole["dte_inscription"] ?>"disabled>
            <div class="input_boxe">
            <label id="ref" for="nom_ref">Nom du référent : <span class="obligatoire">*</span></label>
            <input id="input_ref" type="text" id="nom_ref" name="nom_referent" value="<?php echo $ligne_pole["nom_referent"] ?>"disabled>
            </div>
        </div>
            <!--    Si non    -->
            <div id="date_rea2">
            <label for="date_r2">Date de réalisation : <span class="obligatoire">*</span></label>
            <input type="date" id="date_r2" name="dte_realisation_pole" value="<?php echo $ligne_pole["dte_realisation_pole"] ?>"disabled>
            <label for="commentaire_pole">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_pole" value="<?php echo $ligne_pole["commentaire_pole"] ?>"disabled>
            </div>
        </div>
        <?php   }
            ?>
            <!--    
                Soélis  --------------------------------------------------------------------
            -->
            <label for="inscrit_soelis">Inscrit à Soélis : <span class="obligatoire">*</span></label>
            <input type="radio" id="soelis_oui" name="inscrit_soelis" onclick="showhidesoelis(1)" value="oui"disabled
            <?php
            if($ligne_inscrit["inscrit_soelis"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="soelis_oui">oui</label>
            <input type="radio" id="soelis_non" name="inscrit_soelis" onclick="showhidesoelis(2)" value="non"disabled          
            <?php
            if($ligne_inscrit["inscrit_soelis"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="soelis_non">non</label>
            <!--    Si oui    -->
            <?php
            foreach($soelis as $ligne_soelis)
                {
            ?>
            <div class="input_boxe">
                <div id="inscrit_soelis">
            <label id="inscri_soelis" for="date_inscription_soelis">Date d'inscription à Soelis : <span class="obligatoire">*</span></label>
            <input id="input_inscri_soelis" type="date" id="date_inscription_soelis" name="dte_inscription_soelis" value="<?php echo $ligne_soelis["dte_inscription_soelis"] ?>"disabled>
            <div class="input_boxe">
            <label id="ref" for="nom_ref">Nom du référent : <span class="obligatoire">*</span></label>
            <input id="input_ref" type="text" id="nom_ref" name="nom_referent_soelis" value="<?php echo $ligne_soelis["nom_referent_soelis"] ?>"disabled>
            </div>
        </div>
            <!--    Si non    -->
            <div id="date_rea_soelis">
            <label for="date_rea_s">Date de réalisation : <span class="obligatoire">*</span></label>
            <input type="date" id="date_rea_s" name="dte_realisation_soelis" value="<?php echo $ligne_soelis["dte_realisation_soelis"] ?>"disabled>
            <label for="commentaire_soelis">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_soelis" value="<?php echo $ligne_soelis["commentaire_soelis"] ?>"disabled>
            </div>
        </div>
        <?php   }
            ?>
            <!--    
                CMA  --------------------------------------------------------------------
            -->
            <label for="inscrit_cma">Inscrit à CMA : <span class="obligatoire">*</span></label>
            <input type="radio" id="cma_oui" name="inscrit_cma" onclick="showhidecma(1)" value="oui"disabled            
            <?php
            if($ligne_inscrit["inscrit_cma"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="cma_oui">oui</label>
            <input type="radio" id="cma_non" name="inscrit_cma" onclick="showhidecma(2)" value="non"disabled            
            <?php
            if($ligne_inscrit["inscrit_cma"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="cma_non">non</label>
            <!--    Si oui    -->
            <?php
            foreach($cma as $ligne_cma)
                {
            ?>
            <div class="input_boxe">
                <div id="inscrit_cma">
            <label id="inscrit_cma1" for="date_inscription_pole_emplois">Date d'inscription à CMA : <span class="obligatoire">*</span></label>
            <input id="input_inscri_cma" type="date" id="date_inscription_cma" name="dte_inscription_cma" value="<?php echo $ligne_cma["dte_inscription_cma"] ?>"disabled>
            <div class="input_boxe">
            <label id="ref" for="nom_ref_cma">Nom du référent : <span class="obligatoire">*</span></label>
            <input id="input_ref" type="text" id="nom_ref_cma" name="nom_referent_cma" value="<?php echo $ligne_cma["nom_referent_cma"] ?>"disabled>
            </div>
        </div>
            <!--    Si non    -->
            <div id="date_rea_cma">
            <label for="date_cma">Date de réalisation : <span class="obligatoire">*</span></label>
            <input type="date" id="date_cma" name="dte_realisation_cma" value="<?php echo $ligne_cma["dte_realisation_cma"] ?>"disabled>
            <label for="commentaire_cma">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_cma" value="<?php echo $ligne_cma["commentaire_cma"] ?>"disabled>
            </div>
        </div>
        <?php   }?>
            <!--    
                Mission local   -------------------------------------------------------------------
            -->
            <label for="inscrit_mission_local">Inscrit à la Mission Locale : <span class="obligatoire">*</span></label>
            <input type="radio" id="mission_oui" name="inscrit_mission_local" onclick="showhidemission(1)" value="oui"disabled            
            <?php
            if($ligne_inscrit["inscrit_mission_local"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="mission_oui">oui</label>
            <input type="radio" id="mission_non" name="inscrit_mission_local" onclick="showhidemission(2)" value="non"disabled            
            <?php
            if($ligne_inscrit["inscrit_mission_local"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="mission_non">non</label>
            <!--    Si oui    -->
            <?php
            foreach($mission_locale as $ligne_mission_local)
                {
            ?>
        <div id="date_rea3">
            <div class="input_boxe">
            <label for="date_r3">Date de réalisation : <span class="obligatoire">*</span></label>
            <input id="input_date_rea3" type="date" id="date_r3" name="dte_realisation_mission" value="<?php echo $ligne_mission_local["dte_realisation_mission"] ?>"disabled>
            <label for="commentaire_mission">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_mission" value="<?php echo $ligne_mission_local["commentaire_mission"] ?>"disabled>
        </div>
            </div>
            
            <div id="mission">
            <div class="input_boxe">
            <div class="input_boxe">
            <label id="datem" for="date_mission">Date d'inscription : <span class="obligatoire">*</span></label>
            <input id="input_datem" type="date" id="date_mission" name="dte_inscription_mission" value="<?php echo $ligne_mission_local["dte_inscription_mission"] ?>"disabled>
            </div>
            <label id="ref_m" for="ref_mission">Nom du référent de la mission locale pour l'emploi : <span class="obligatoire">*</span></label>
            <input type="text" id="ref_mission" name="nom_referent_mission" value="<?php echo $ligne_mission_local["nom_referent_mission"] ?>"disabled>
            <!--    Si non    -->
            <?php   }?>
            </div>
        </div>
            <!--    
                CAP emplois  ----------------------------------------------------------------------
            -->
            <div>
            <label for="inscrit_cap_emploi">Inscrit à CAP emploi : <span class="obligatoire">*</span></label>
            
            <input type="radio" id="cap_oui" name="inscrit_cap_emploi" onclick="showhidecap(1)" value="oui"disabled            
            <?php
            if($ligne_inscrit["inscrit_cap_emploi"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="cap_oui">oui</label>
            <input type="radio" id="cap_non" name="inscrit_cap_emploi" onclick="showhidecap(2)" value="non"disabled            
            <?php
            if($ligne_inscrit["inscrit_cap_emploi"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="cap_oui">non</label>
            </div>
            <!--    Si oui   -->
            <?php
            foreach($cap_emploi as $ligne_cap_emploi)
                {
            ?>
            <div class="input_boxe">
            <div id="cap">
            <label for="date_inscription_cap_emplois">Date d'inscription à CAP emploi : <span class="obligatoire">*</span></label>
            <input type="date" id="date_inscription_cap_emplois" name="dte_inscription_cap" value="<?php echo $ligne_cap_emploi["dte_inscription_cap"] ?>"disabled>
            <label for="nom_ref2">Nom du référent : <span class="obligatoire">*</span></label>
            <input type="text" id="nom_ref2" name="nom_referent_cap" value="<?php echo $ligne_cap_emploi["nom_referent_cap"] ?>"disabled>
            </div>
            <!--    Si non    -->
            <div id="date_rea4">
            <label for="date_r4">Date de réalisation : <span class="obligatoire">*</span></label>
            <input type="date" id="date_r4" name="dte_realisation_cap" value="<?php echo $ligne_cap_emploi["dte_realisation_cap"] ?>"disabled>
            <label for="commentaire_cap">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_cap" value="<?php echo $ligne_cap_emploi["commentaire_cap"] ?>"disabled>
            </div>
            </div>
            <?php   }?>
            <!--    
                CV  -------------------------------------------------------------------------------
            -->
            <label for="cv_oui_non">CV disponible : <span class="obligatoire">*</span></label>
            <input type="radio" id="cv_oui" name="cv_oui_non" onclick="showhidecv(1)" value="oui"disabled            
            <?php
            if($ligne_inscrit["cv_oui_non"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="cv_oui">oui</label>
            <input type="radio" id="cv_non" name="cv_oui_non" onclick="showhidecv(2)" value="non"disabled            
            <?php
            if($ligne_inscrit["cv_oui_non"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="cv_non">non</label>
            <div class="input_boxe">
            <!--    Si oui   -->
            <?php
            foreach($files as $ligne_files)
                {
            ?>
        </div>
        <div id="cv">
            <label for="pdfFile">Insérer le cv scanné (format PDF uniquement) : <span class="obligatoire">*</span></label> 
            <input type="file" id="pdfFile" name="pdfFile" accept="cv/pdf" value="<?php echo $ligne_files["names"] ?>"disabled>
        </div>



            <!--    Si non   -->
            <div id="date_cv">
            <div class="input_boxe">
            <label for="date_cv">Date programmé pour travailler le CV : <span class="obligatoire">*</span></label>
            <input type="date" name="dte_travailler_cv" value="<?php echo $ligne_files["dte_travailler_cv"] ?>"disabled>
            </div>
            </div>
            <?php
                }
            ?>
            <!--    
                Permis de conduire  ---------------------------------------------------------------
            -->
            <div class="input_boxe">
            <label for="permis">Permis : <span class="obligatoire">*</span></label>
            <select class="form-control" name="permis_voiture" id="permis" onchange="hideshowpermis()"disabled>
                <option value="<?php echo $ligne_inscrit["permis_voiture"] ?>" id="rien">-- Selectionner une option --</option>
                <option value="motos1" id="motos1" <?php
                if($ligne_inscrit["permis_voiture"]=="motos1"){
                        echo "selected";
                    }
                    ?>>Permis motos</option>
                <option value="auto1" id="auto1" <?php
                if($ligne_inscrit["permis_voiture"]=="auto1"){
                        echo "selected";
                    }
                    ?>>Permis auto</option>
                <option value="march1" id="march1" <?php
                if($ligne_inscrit["permis_voiture"]=="march1"){
                        echo "selected";
                    }
                    ?>>Permis marchandises ou de personnes</option>
                <option value="aucun" id="aucun" <?php
                if($ligne_inscrit["permis_voiture"]=="aucun"){
                        echo "selected";
                    }
                    ?>>Aucun</option>
            </select>
            </div>

            <!--    Si motos   -->
            <div class="input_boxe" id="motos">
            <label for="moto">Permis motos : <span class="obligatoire">*</span></label>
            <select class="form-control" name="moto" disabled>
                <?php
                foreach($permis_conduire as $ligne_permis){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="a" <?php
                if($ligne_permis["moto"]=="a"){
                        echo "selected";
                    }
                    ?>>A</option>
                <option value="a1" <?php
                if($ligne_permis["moto"]=="a1"){
                        echo "selected";
                    }
                    ?>>A1</option>
                <option value="a2" <?php
                if($ligne_permis["moto"]=="a2"){
                        echo "selected";
                    }
                    ?>>A2</option>
                <?php
                }
                ?>
            </select>
            </div>
            <!--    Si auto   -->
            <div class="input_boxe" id="auto">
            <label for="aut">Permis autos : <span class="obligatoire">*</span></label>
            <select class="form-control" name="auto" disabled>
                <?php
                foreach($permis_conduire as $ligne_permis){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="b" <?php
                if($ligne_permis["auto"]=="b"){
                        echo "selected";
                    }
                    ?>>B</option>
                <option value="b1" <?php
                if($ligne_permis["auto"]=="b1"){
                        echo "selected";
                    }
                    ?>>B1</option>
                <option value="be" <?php
                if($ligne_permis["auto"]=="be"){
                        echo "selected";
                    }
                    ?>>BE</option>
                <?php
                }
                ?>
            </select>
            </div>
            <!--    Si march   -->
            <div class="input_boxe" id="march">
            <label for="marchandise">Permis pour le transport de marchandises ou de personnes : <span class="obligatoire">*</span></label>
            <select class="form-control" name="marchandise" id="marchandise" disabled>
                <?php
                foreach($permis_conduire as $ligne_permis){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="c" <?php
                if($ligne_permis["transport"]=="c"){
                        echo "selected";
                    }
                    ?>>C</option>
                <option value="ce" <?php
                if($ligne_permis["transport"]=="ce"){
                        echo "selected";
                    }
                    ?>>CE</option>
                <option value="c1" <?php
                if($ligne_permis["transport"]=="c1"){
                        echo "selected";
                    }
                    ?>>C1</option>
                <option value="c1e" <?php
                if($ligne_permis["transport"]=="c1e"){
                        echo "selected";
                    }
                    ?>>C1E</option>
                <option value="d" <?php
                if($ligne_permis["transport"]=="d"){
                        echo "selected";
                    }
                    ?>>D</option>
                <option value="de" <?php
                if($ligne_permis["transport"]=="de"){
                        echo "selected";
                    }
                    ?>>DE</option>
                <option value="d1" <?php
                if($ligne_permis["transport"]=="d1"){
                        echo "selected";
                    }
                    ?>>D1</option>
                <option value="d1e" <?php
                if($ligne_permis["transport"]=="d1e"){
                        echo "selected";
                    }
                    ?>>D1E</option>
                <?php
                }
                ?>
            </select>
            </div>

            <!--    
                Véhicule disponible  -------------------------------------------------------------
            -->
            <div class="input_boxe">
            <label for="vehicule">Véhicule disponible : <span class="obligatoire">*</span></label>
            </div>
            <input type="radio" id="vehicule_oui" name="vehicule_dispo" onclick="showhideachat(1)" value="oui"disabled            
            <?php
            if($ligne_inscrit["vehicule_dispo"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="vehicule_oui">oui</label>
            <input type="radio" id="vehicule_non" name="vehicule_dispo" onclick="showhideachat(2)" value="non"disabled            
            <?php
            if($ligne_inscrit["vehicule_dispo"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="vehicule_non">non</label>
            <!--    Si oui (rien)  -->

            <!--    Si non   -->
        <div id="achat1">
            <div class="input_boxe">
            <label for="achat_vehicule">Achat prévu d'un véhicule ? <span class="obligatoire">*</span></label>
            </div>
            <input type="radio" id="achat_oui" name="achat_prevu" value="oui" onclick="showhidedatevehi(1)"disabled            
            <?php
            if($ligne_inscrit["achat_prevu"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="achat_oui">oui</label>
            <input type="radio" id="achat_non" name="achat_prevu" value="non" onclick="showhidedatevehi(2)"disabled            
            <?php
            if($ligne_inscrit["achat_prevu"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="achat_non">non</label>
            </div>
        
        <!--    Si oui (achat véhicule)  -->
        <div id="date_achat_vehicule" class="input_boxe">
        <label for="date_vehicule">Date d'achat prévue : </label>
        <input type="date" name="date_vehicule" id="achat_vehicule" value="<?php echo $ligne_inscrit["date_vehicule"] ?>"disabled>
        </div>
    </div>




        <div class="partie3">
        <hr>
            <!--    
                Diplome  -------------------------------------------------------------------------
            -->
            <h2 class="niveau_form">Niveau de formation : </h2>
            <div class="input_boxe">
            <label for="dipl">Diplôme obtenus : <span class="obligatoire">*</span></label>
            <select class="form-control" name="nom_diplome" id="dipl" onchange="hideshowdipl()"disabled>
                <option value="<?php echo $ligne_inscrit["nom_diplome"] ?>">-- Selectionner une option --</option>
                <option value="aucun" <?php
                if($ligne_inscrit["nom_diplome"]=="aucun"){
                        echo "selected";
                    }
                    ?>>Aucun diplôme</option>
                <option value="brevet" <?php
                if($ligne_inscrit["nom_diplome"]=="brevet"){
                        echo "selected";
                    }
                    ?>>Brevet</option>
                <option value="cap" <?php
                if($ligne_inscrit["nom_diplome"]=="cap"){
                        echo "selected";
                    }
                    ?>>CAP</option>
                <option value="bep" <?php
                if($ligne_inscrit["nom_diplome"]=="bep"){
                        echo "selected";
                    }
                    ?>>BEP</option>
                <option value="bac" <?php
                if($ligne_inscrit["nom_diplome"]=="bac"){
                        echo "selected";
                    }
                    ?>>BAC</option>
                <option value="bac+2" <?php
                if($ligne_inscrit["nom_diplome"]=="bac+2"){
                        echo "selected";
                    }
                    ?>>BAC +2</option>
                <option value="licence" <?php
                if($ligne_inscrit["nom_diplome"]=="licence"){
                        echo "selected";
                    }
                    ?>>Licence</option>
                <option value="master" <?php
                if($ligne_inscrit["nom_diplome"]=="master"){
                        echo "selected";
                    }
                    ?>>Master 1</option>
                <option value="master2" <?php
                if($ligne_inscrit["nom_diplome"]=="master2"){
                        echo "selected";
                    }
                    ?>>Master 2</option>
                <option value="autre" <?php
                if($ligne_inscrit["nom_diplome"]=="autre"){
                        echo "selected";
                    }
                    ?>>Autre</option>
                <option value="formation_continue" <?php
                if($ligne_inscrit["nom_diplome"]=="formation_continue"){
                        echo "selected";
                    }
                    ?>>Formation continue</option>
            </select>
            <!--    Si CAP   -->
            <div class="input_boxe" id="cap_metier">
            <label for="cap_metier">Renseigner le type de métier : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="cap_metier" value="<?php echo $ligne_inscrit["cap_metier"] ?>"disabled>
            </div>
            <!--    Si BEP   -->
            <div class="input_boxe" id="bep_metier">
            <label for="bep_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="bep_metier" value="<?php echo $ligne_inscrit["bep_metier"] ?>"disabled>
            </div>
            <!--    Si BAC   -->
            <div class="input_boxe" id="bac_metier">
            <label for="bac_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="bac_metier" value="<?php echo $ligne_inscrit["bac_metier"] ?>"disabled>
            </div>
            <!--    Si BAC+2   -->
            <div class="input_boxe" id="bac2_metier">
            <label for="bac2_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="bac2_metier" value="<?php echo $ligne_inscrit["bac2_metier"] ?>"disabled>
            </div>
            <!--    Si Licence   -->
            <div class="input_boxe" id="licence_metier">
            <label for="licence_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="licence_metier" value="<?php echo $ligne_inscrit["licence_metier"] ?>"disabled>
            </div>
            <!--    Si Master   -->
            <div class="input_boxe" id="master_metier">
            <label for="master_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="master_metier" value="<?php echo $ligne_inscrit["master_metier"] ?>"disabled>
            </div>
            <!--    Si Master 2   -->
            <div class="input_boxe" id="master2_metier">
            <label for="master2_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="master2_metier" value="<?php echo $ligne_inscrit["master2_metier"] ?>"disabled>
            </div>
            <!--    Si formation continue   -->
            <div class="input_boxe" id="form_continue">
            <label for="form_continue">Renseigner la formation : <span class="obligatoire">*</span></label>
            <input type="text" id="input_form_continue" name="form_continue" value="<?php echo $ligne_inscrit["form_continue"] ?>"disabled>
            </div>
            <!--    Si autre   -->
            <div id="rens_dipl">
            <label for="dipl_autre">Renseigner le diplôme : <span class="obligatoire">*</span></label>
            <input type="text" id="dipl_autre" name="nom_diplome_autre" value="<?php echo $ligne_inscrit["nom_diplome_autre"] ?>"disabled>
        
            <!--    Si aucun   -->
    </div>
    <div id="niveau">
            <label for="dipl_aucun">Nombre d'années d'études : <span class="obligatoire">*</span></label>
            <input type="text" id="dipl_aucun" name="nb_annee_scolarisation" value="<?php echo $ligne_inscrit["nb_annee_scolarisation"] ?>"disabled>
        
        
            <label for="dipl_niveau">Renseigner le niveau : <span class="obligatoire">*</span></label>
            <input type="text" id="dipl_niveau" name="niveau_diplome" value="<?php echo $ligne_inscrit["niveau_diplome"] ?>"disabled>
        </div>
        </div>
        <hr>
            <!--    
                Connaissance de la langue française  ----------------------------------------------
            -->
            <label for="atelier_fr">Inscrit aux ateliers de français : <span class="obligatoire">*</span></label>
            <input type="radio" id="fr_oui" name="atelier_fr" value="oui"disabled <?php
            if($ligne_inscrit["atelier_fr"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="fr_oui">oui</label>
            <input type="radio" id="fr_non" name="atelier_fr" value="non"disabled
            <?php
            if($ligne_inscrit["atelier_fr"]=="non"){
                echo "checked";
            }
            ?>>
            <label for="fr_non">non</label>
            <div>
                <p class="ital">1 à 6 | du plus bas au plus haut niveau</p>
            </div>
            <div class="input_boxe">
                <div class="ecrit">
            <label for="efrancais">Connaissance de la langue française (écrite) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="efrancais" name="langue_fr_ecrite" disabled>
                <?php
                foreach($langue_francaise as $ligne_fr){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1" <?php
                if($ligne_fr["langue_fr_ecrite"]=="A1"){
                    echo "selected";
                }
                ?>>A1 | 1</option>
                <option value="A2" <?php
                if($ligne_fr["langue_fr_ecrite"]=="A2"){
                    echo "selected";
                }
                ?>>A2 | 2</option>
                <option value="B1" <?php
                if($ligne_fr["langue_fr_ecrite"]=="B1"){
                    echo "selected";
                }
                ?>>B1 | 3</option>
                <option value="B2" <?php
                if($ligne_fr["langue_fr_ecrite"]=="B2"){
                    echo "selected";
                }
                ?>>B2 | 4</option>
                <option value="C1" <?php
                if($ligne_fr["langue_fr_ecrite"]=="C1"){
                    echo "selected";
                }
                ?>>C1 | 5</option>
                <option value="C2" <?php
                if($ligne_fr["langue_fr_ecrite"]=="C2"){
                    echo "selected";
                }
                ?>>C2 | 6</option>
                <?php
                }
                ?>
            </select>
            </div>
            </div>
            <div class="parler">
            <label for="pfrancais">Connaissance de la langue française (parlée) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="pfrancais" name="langue_fr_parlee"disabled>
            <?php
                foreach($langue_francaise as $ligne_fr){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1" <?php
                if($ligne_fr["langue_fr_parlee"]=="A1"){
                    echo "selected";
                }
                ?>>A1 | 1</option>
                <option value="A2" <?php
                if($ligne_fr["langue_fr_parlee"]=="A2"){
                    echo "selected";
                }
                ?>>A2 | 2</option>
                <option value="B1" <?php
                if($ligne_fr["langue_fr_parlee"]=="B1"){
                    echo "selected";
                }
                ?>>B1 | 3</option>
                <option value="B2" <?php
                if($ligne_fr["langue_fr_parlee"]=="B2"){
                    echo "selected";
                }
                ?>>B2 | 4</option>
                <option value="C1" <?php
                if($ligne_fr["langue_fr_parlee"]=="C1"){
                    echo "selected";
                }
                ?>>C1 | 5</option>
                <option value="C2" <?php
                if($ligne_fr["langue_fr_parlee"]=="C2"){
                    echo "selected";
                }
                ?>>C2 | 6</option>
                <?php
                }
                ?>
            </select>
            </div>
            <div class="lue">
            <label for="lfrancais" class="petit_lu">Connaissance de la langue française (Lue) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="lfrancais" name="langue_fr_lue"disabled>
            <?php
                foreach($langue_francaise as $ligne_fr){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1" <?php
                if($ligne_fr["langue_fr_lue"]=="A1"){
                    echo "selected";
                }
                ?>>A1 | 1</option>
                <option value="A2" <?php
                if($ligne_fr["langue_fr_lue"]=="A2"){
                    echo "selected";
                }
                ?>>A2 | 2</option>
                <option value="B1" <?php
                if($ligne_fr["langue_fr_lue"]=="B1"){
                    echo "selected";
                }
                ?>>B1 | 3</option>
                <option value="B2" <?php
                if($ligne_fr["langue_fr_lue"]=="B2"){
                    echo "selected";
                }
                ?>>B2 | 4</option>
                <option value="C1" <?php
                if($ligne_fr["langue_fr_lue"]=="C1"){
                    echo "selected";
                }
                ?>>C1 | 5</option>
                <option value="C2" <?php
                if($ligne_fr["langue_fr_lue"]=="C2"){
                    echo "selected";
                }
                ?>>C2 | 6</option>
                <?php
                }
                ?>
            </select>
            </div>
            <!--    
                Connaissance de la langue anglaise  ----------------------------------------------
            -->
            <div class="langue_anglais">
            <div class="input_boxe">
                <div class="ecrit">
            <label for="efrancais">Connaissance de la langue anglaise (écrite) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="eanglais" name="langue_en_ecrite"disabled>
            <?php
                foreach($langue_anglaise as $ligne_en){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1" <?php
                if($ligne_en["langue_en_ecrite"]=="A1"){
                    echo "selected";
                }
                ?>>A1 | 1</option>
                <option value="A2" <?php
                if($ligne_en["langue_en_ecrite"]=="A2"){
                    echo "selected";
                }
                ?>>A2 | 2</option>
                <option value="B1" <?php
                if($ligne_en["langue_en_ecrite"]=="B1"){
                    echo "selected";
                }
                ?>>B1 | 3</option>
                <option value="B2" <?php
                if($ligne_en["langue_en_ecrite"]=="B2"){
                    echo "selected";
                }
                ?>>B2 | 4</option>
                <option value="C1" <?php
                if($ligne_en["langue_en_ecrite"]=="C1"){
                    echo "selected";
                }
                ?>>C1 | 5</option>
                <option value="C2" <?php
                if($ligne_en["langue_en_ecrite"]=="C2"){
                    echo "selected";
                }
                ?>>C2 | 6</option>
                <?php
                }
                ?>
            </select>
            </div>
            </div>
            <div class="parler">
            <label for="panglais">Connaissance de la langue anglaise (parlée) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="panglais" name="langue_en_parlee"disabled>
            <?php
                foreach($langue_anglaise as $ligne_en){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1" <?php
                if($ligne_en["langue_en_parlee"]=="A1"){
                    echo "selected";
                }
                ?>>A1 | 1</option>
                <option value="A2" <?php
                if($ligne_en["langue_en_parlee"]=="A2"){
                    echo "selected";
                }
                ?>>A2 | 2</option>
                <option value="B1" <?php
                if($ligne_en["langue_en_parlee"]=="B1"){
                    echo "selected";
                }
                ?>>B1 | 3</option>
                <option value="B2" <?php
                if($ligne_en["langue_en_parlee"]=="B2"){
                    echo "selected";
                }
                ?>>B2 | 4</option>
                <option value="C1" <?php
                if($ligne_en["langue_en_parlee"]=="C1"){
                    echo "selected";
                }
                ?>>C1 | 5</option>
                <option value="C2" <?php
                if($ligne_en["langue_en_parlee"]=="C2"){
                    echo "selected";
                }
                ?>>C2 | 6</option>
                <?php
                }
                ?>
            </select>
            </div>
            <div class="lue">
            <label for="langlais" class="petit_lu">Connaissance de la langue anglaise (Lue) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="langlais" name="langue_en_lue"disabled>
            <?php
                foreach($langue_anglaise as $ligne_en){
                ?>
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1" <?php
                if($ligne_en["langue_en_lue"]=="A1"){
                    echo "selected";
                }
                ?>>A1 | 1</option>
                <option value="A2" <?php
                if($ligne_en["langue_en_lue"]=="A2"){
                    echo "selected";
                }
                ?>>A2 | 2</option>
                <option value="B1" <?php
                if($ligne_en["langue_en_lue"]=="B1"){
                    echo "selected";
                }
                ?>>B1 | 3</option>
                <option value="B2" <?php
                if($ligne_en["langue_en_lue"]=="B2"){
                    echo "selected";
                }
                ?>>B2 | 4</option>
                <option value="C1" <?php
                if($ligne_en["langue_en_lue"]=="C1"){
                    echo "selected";
                }
                ?>>C1 | 5</option>
                <option value="C2" <?php
                if($ligne_en["langue_en_lue"]=="C2"){
                    echo "selected";
                }
                ?>>C2 | 6</option>
                <?php
                }
                ?>
            </select>
            </div>
            </div>
            <div id="autre_langue1">
                <label class="decal" for="if_lang">Autre(s) langue(s) parlée(s) : <span class="obligatoire">*</span></label>
                <input type="radio" name="if_autre" id="oui_autre" value="oui" onclick="showhideautrelang(1)" disabled <?php
                if($ligne_inscrit["if_autre"]=="oui"){
                    echo "checked";
                }
                ?>>
                <label for="oui_autre">oui</label>
                <input type="radio" name="if_autre" id="non_autre" value="non" onclick="showhideautrelang(2)" disabled <?php
                if($ligne_inscrit["if_autre"]=="non"){
                    echo "checked";
                }
                ?>>
                <label for="non_autre">non</label>
            <!--  -->
                <div class="input_boxe" id="oui_langue_autre">
                    <label class="decal" for="input_autre_langue">Langue(s) : <span class="obligatoire">*</span></label>
                    <input type="text" name="autre_langue" id="input_autre_langue" value="<?php echo $ligne_inscrit["autre_langue"] ?>"disabled>
            </div>
            </div>
            <hr>
            <!--    
                Emplois précédemment occupés (si pas de cv)  ---------------------------------------
            -->

            <h2 class="emplois_prec">Emplois précédemment occupés : </h2>
            <textarea class="form-control" name="emploi_pre_occupe" id="empl_occ"disabled><?php echo $ligne_inscrit["emploi_pre_occupe"] ?></textarea>
            </div>
            <!--    
                Projet professionel de la personne  ------------------------------------------------
            -->
            <div class="-top">
            <div>
            <hr>
            <label for="reconv">Reconversion professionelle : <span class="obligatoire">*</span></label>
            <input type="radio" id="oui_reconv" name="reconversion" onclick="showhidereconv(1)" value="oui"disabled <?php
                if($ligne_inscrit["reconversion"]=="oui"){
                    echo "checked";
                }
                ?>>
            <label for="oui_reconv">oui</label>
            <input type="radio" id="non_reconv" name="reconversion" onclick="showhidereconv(2)" value="non"disabled <?php
                if($ligne_inscrit["reconversion"]=="non"){
                    echo "checked";
                }
                ?>>
            <label for="non_reconv">non</label>
            </div>
            <!--    Si non (rien)   -->

            <!--    
                Formation prévues  -----------------------------------------------------------------
            -->
            <!--    Si oui   -->
            <div id="formati">
            <label for="form_prevue">Formation prévues ? <span class="obligatoire">*</span></label>
            <input type="radio" id="oui_form" name="form_prevue" onclick="showhideformp(1)" value="oui"disabled <?php
                if($ligne_inscrit["form_prevue"]=="oui"){
                    echo "checked";
                }
                ?>>
            <label for="oui_form">oui</label>
            <input type="radio" id="non_form" name="form_prevue" onclick="showhideformp(2)" value="non"disabled <?php
                if($ligne_inscrit["form_prevue"]=="non"){
                    echo "checked";
                }
                ?>>
            <label for="non_form">non</label>
            </div>
            <!--    Si non (rien)   -->
            
            <!--    Si oui   -->
            <div class="input_boxe" id="renseign">
            <label for="form_nom">Renseigner le nom : <span class="obligatoire">*</span></label>
            <input type="text" id="form_nom" name="form_nom" value="<?php echo $ligne_inscrit["form_nom"] ?>"disabled>
            <label for="form_date">Renseigner la date : <span class="obligatoire">*</span></label>
            <input type="date" id="form_date" name="form_date" value="<?php echo $ligne_inscrit["form_date"] ?>"disabled>
            <label for="form_duree">Renseigner la durée : <span class="obligatoire">*</span></label>
            <input type="text" id="form_duree" name="form_duree" value="<?php echo $ligne_inscrit["form_duree"] ?>"disabled>
            </div>
            
            <!--    
                Reprise d'étude  ------------------------------------------------------------------
            -->
            <label for="etude">Reprise d'étude ? <span class="obligatoire">*</span></label>
            <input type="radio" id="oui_etude" name="reprise" onclick="showhidereprise(1)" value="oui"disabled <?php
                if($ligne_inscrit["reprise"]=="oui"){
                    echo "checked";
                }
                ?>>
            <label for="oui_etude">oui</label>
            <input type="radio" id="non_etude" name="reprise" onclick="showhidereprise(2)" value="non"disabled <?php
                if($ligne_inscrit["reprise"]=="non"){
                    echo "checked";
                }
                ?>>
            <label for="non_etude">non</label>
            <!--    Si oui   -->
            <div class="input_boxe" id="dipl_prep">
            <label for="dipl_prepa">Diplôme préparé : <span class="obligatoire">*</span></label>
            <input type="text" id="dipl_prepa" name="nom_etudes" value="<?php echo $ligne_inscrit["nom_etudes"] ?>"disabled>
            </div>
            <!--    
                bénéficier formation pro  ------------------------------------------------------------------
            -->
            <div>
            <label for="form_pro">La personne va-t-elle bénéficier d'une formation professionelle ? <span class="obligatoire">*</span></label>
            <input type="radio" id="form_pro_oui" name="form_pro" onclick="showhideformpro(1)" value="oui" value="non"disabled <?php
                if($ligne_inscrit["form_pro"]=="oui"){
                    echo "checked";
                }
                ?>>
            <label for="form_pro_oui">oui</label>
            <input type="radio" id="form_pro_non" name="form_pro" onclick="showhideformpro(2)" value="non" value="non"disabled <?php
                if($ligne_inscrit["form_pro"]=="non"){
                    echo "checked";
                }
                ?>>
            <label for="form_pro_non">non</label>
            </div>
            <!--    Si non (rien)   -->

            <!--    Si oui   -->
            <div class="input_boxe" id="oui_formpro">
            <label for="form_type">Type de formation : <span class="obligatoire">*</span></label>
            <select class="form-control" name="form_type" id="form_type" onchange="hideshowformqd()"disabled>
                <option value="rien">-- Selectionner une option --</option>
                <option value="qualifiante" <?php
                if($ligne_inscrit["form_type"]=="qualifiante"){
                    echo "selected";
                }
                ?>>Formation qualifiante</option>
                <option value="diplomante" <?php
                if($ligne_inscrit["form_type"]=="diplomante"){
                    echo "selected";
                }
                ?>>Formation diplômante</option>
            </select>
            </div>
            <!--    Si qualifiante   -->
            <div class="input_boxe" id="if_qual">
            <label for="nom_form">Nom de la formation qualifiante : <span class="obligatoire">*</span></label>
            <input type="text" id="nom_form" name="form_qual" value="<?php echo $ligne_inscrit["form_qual"] ?>"disabled>
            </div>
            <!--    Si diplômante   -->
            <div class="input_boxe" id="if_dipl">
            <label for="nom_diplo">Nom du diplôme : <span class="obligatoire">*</span></label>
            <input type="text" id="nom_diplo" name="form_dipl" value="<?php echo $ligne_inscrit["form_dipl"] ?>"disabled>
            </div>
            <div class="input_boxe">
            <label for="metier_s">Métier souhaité : <span class="obligatoire">*</span></label>
            <input type="text" id="metier_s" name="metier_souhaite" value="<?php echo $ligne_inscrit["metier_souhaite"] ?>"disabled>

            <label for="secteur_act">Secteur d'activité : <span class="obligatoire">*</span></label>
            <input type="text" id="secteur_act" name="secteur_activite" value="<?php echo $ligne_inscrit["secteur_activite"] ?>"disabled>

            <label for="secteur_geo">Secteur géographique souhaité : <span class="obligatoire">*</span></label>
            <input type="text" id="secteur_geo" name="secteur_geo" value="<?php echo $ligne_inscrit["secteur_geo"] ?>"disabled>
            </div>

            <label for="horaire">Horaire de travail souhaité : <span class="obligatoire">*</span></label>
            <select class="form-control" name="moment_journee" id="horaire"disabled>
                <option value="rien">-- Selectionner une option --</option>
                <option value="jour" <?php
                if($ligne_inscrit["moment_journee"]=="jour"){
                    echo "selected";
                }
                ?>>Travail la journée</option>
                <option value="matin" <?php
                if($ligne_inscrit["moment_journee"]=="matin"){
                    echo "selected";
                }
                ?>>Travail le matin</option>
                <option value="nuit" <?php
                if($ligne_inscrit["moment_journee"]=="nuit"){
                    echo "selected";
                }
                ?>>Travail de nuit</option>
                <option value="2x8" <?php
                if($ligne_inscrit["moment_journee"]=="2x8"){
                    echo "selected";
                }
                ?>>Travail en cycle 2x8</option>
                <option value="3x8" <?php
                if($ligne_inscrit["moment_journee"]=="3x8"){
                    echo "selected";
                }
                ?>>Travail en cycle 3x8</option>
                <option value="5x8" <?php
                if($ligne_inscrit["moment_journee"]=="5x8"){
                    echo "selected";
                }
                ?>>Travail en cycle 5x8</option>
                <option value="VSD" <?php
                if($ligne_inscrit["moment_journee"]=="VSD"){
                    echo "selected";
                }
                ?>>Travail en VSD</option>
                <option value="SD" <?php
                if($ligne_inscrit["moment_journee"]=="SD"){
                    echo "selected";
                }
                ?>>Travail en SD</option>
            </select>
            </div>
            <div>
            </div>
        </form>      
    </div>
    <?php
    }
    ?>
<?php
}
$mysqlConnection = null;

?>