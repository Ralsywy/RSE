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
    $requete = $mysqlConnection->prepare('SELECT * FROM inscrit WHERE id_inscrit=:id');
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
    
    foreach($inscrit as $ligne_inscrit)
    {
    ?>
    <div class="addsuivis">
        <h1 class="titrecreer">MODIFICATION DU SUIVI</h1>
        <h2 class="information">Informations personnelles</h2>
        <form class="form" method="post" id="suiviss" action="index.php?route=store_update" enctype="multipart/form-data">
            <!--    Information personnelles    -->
        <div class="block_enligne">
            <div class="input_boxe">
            <label for="dte_contact">Date du contact : <span class="obligatoire">*</span></label>
            <input type="date" id="dte_contact"  name="dte_contact" value="<?php echo $ligne_inscrit["dte_contact"] ?>">
            </div>
            <div class="input_boxe">
            <label for="origine_contact">Origine du contact : <span class="obligatoire">*</span></label>
            <input type="text" name="origine_contact" id="origine_contact"  value="<?php echo $ligne_inscrit["origine_contact"] ?>">
            </div>
        </div>
        
        <div class="radio_button">
            <label for="inscrit">Inscrit aux resto du coeur : <span class="obligatoire">*</span></label>
            <input type="radio" id="radio_oui" name="inscrit_rdc" class="radio_oui" value="oui" onclick="hideShowDiv(1)"
            <?php
            if($ligne_inscrit["inscrit_rdc"]=="oui"){
                echo "checked";
            }
            ?>>
            <label for="inscrit_oui">oui</label>
            <input type="radio" id="radio_non" name="inscrit_rdc" class="radio_non" value="non" onclick="hideShowDiv(2)"
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
            <input class="input_suivis" type="text" id="num" name="numero" value="<?php echo $ligne_rdc["numero"] ?>">

            <label id="centre" for="centre">Centre : <span class="obligatoire">*</span></label>
            <input class="input_suivis" type="text" id="centre" name="centre" value="<?php echo $ligne_rdc["centre"] ?>">

            <label id="jour" for="jour">Jour : <span class="obligatoire">*</span></label>
            <input class="input_suivis" type="text" id="jour" name="jour" value="<?php echo $ligne_rdc["jour"] ?>">
        </div>

            <!--    Si non    -->
            <div id="date_rea1">
            <label class="decale" for="date_r">Date de réalisation : </label>
            <input class="input_suivis" type="date" id="date_r" name="dte_realisation_rdc">
            <label for="commentaire_inscrit">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_inscrit">
            </div>
            <div>
            <label for="benevole">Bénévole aux resto du coeur : <span class="obligatoire">*</span></label>
            <input type="radio" id="_oui" name="benevole_rdc" class="oui" value="oui">
            <label for="benevole_oui">oui</label>
            <input type="radio" id="_non" name="benevole_rdc" class="non" value="non">
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
            <select name="accompagnateur" id="accompagnateur" class="form-control">
                <option value="rien"> -- Selectionner un accompagnateur -- </option>
                <?php
                foreach($accompagnateurs as $ligne){
                if($ligne["is_admin"]==0){
                ?>
                    <option value=<?= $ligne["id_accompagnateur"]?>><?= $ligne["name_acc"]?></option>
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
            <div class="infor_pers">  
        <h2 class="information">Coordonnées</h2>
        <h2 class="information2">Situation personnelle</h2>
            <div class="block_enligne">
        <div class="input_boxe">
            <label for="civilite">Civilité : <span class="obligatoire">*</span></label>
            <select class="form-control" name="civilite" id="civilite">
                <option value="rien">-- Selectionner une option --</option>
                <option value="Madame">Madame</option>
                <option value="Mademoiselle">Mademoiselle</option>
                <option value="Monsieur">Monsieur</option>
            </select>
            <div class="input_boxe">

            <label for="nom">Nom : <span class="obligatoire">*</span></label>
            <input type="text" id="nom" name="nom">


            <label class="decale" for="prenom">Prénom : <span class="obligatoire">*</span></label>
            <input class="decale" type="text" id="prenom" name="prenom">
            </div>
            <div class="input_boxe">
            
            <label for="birth_date">Date de naissance : <span class="obligatoire">*</span></label>
            
            <input type="date" id="birthdate" name="dte_naissance">
            <div class="div_age">
            <p class="agee">Age : </p>
            <p class="form-control" disabled id="age"></p>
            </div>
            <script>
            var inputDate = document.getElementById("birthdate");
            var ageElement = document.getElementById("age");

            inputDate.addEventListener("input", calculerAge);

            function calculerAge() {
            var dateNaissance = inputDate.value;
            var dateActuelle = new Date();

            var anneeNaissance = new Date(dateNaissance).getFullYear();
            var anneeActuelle = dateActuelle.getFullYear();

            var age = anneeActuelle - anneeNaissance;

            ageElement.textContent = age + " ans";
            }

            </script>

            </div>
            <div class="input_boxe">
            <label for="nationalite" id="nationalite">Nationalité : <span class="obligatoire">*</span></label>
            <?php
            include('pays.php')
            ?>
        </div>
        <div class="input_boxe">
            <label id="adresse" for="adresse">Adresse : <span class="obligatoire">*</span></label>
            <input type="text" id="adresse" name="adresse">


            <label class="decaler" for="zipcode">Code Postal : <span class="obligatoire">*</span></label>
            <input class="decaler" type="text" id="zipcode" name="code_postal"  >
            <div id="error-message" style="display: none; color: #f55;"></div>
            <div class="input_boxe">
            <label class="decaler" for="city">Ville : <span class="obligatoire">*</span></label>
            <select class="form-control" id="city" placeholder="Ville" name="ville"></select>
            </div>
            </div>
            <div class="input_boxe">

            <label class="decaler" for="tel">Téléphone : <span class="obligatoire">*</span></label>
            <input class="decaler" type="text" id="tel" name="telephone">

            <label class="decaler" for="email">E-mail : <span class="obligatoire">*</span></label>
            <input class="decaler" type="mail" id="email" name="email">
            </div>
            
        </div>

            <label for="statue">Statue : <span class="obligatoire">*</span></label>
            <select class="form-control" id="statut" name="situation_perso">
                <option value="rien">-- Selectionner un statut --</option>
                <option value="celibataire">Célibataire</option>
                <option value="marie">Marié(e)</option>
                <option value="divorce">Concubin(e)</option>
                <option value="veuf">Veuf(ve)</option>
                <option value="pacse">Pacsé(e)</option>
            </select>
        </div>
            <!--    Situation personnelle    -->
            <!--    
                Enfants à charge  ------------------------------------------------------------------
            -->

            <div class="sit_perso">
            <label>Enfants à charge : <span class="obligatoire">*</span></label>
            <input type="radio" id="enfant_oui" name="enfant_charge" onclick="hideshowkid(1)" value="oui">
            <label for="enfant_oui">oui</label>


            <input type="radio" id="enfant_non" name="enfant_charge" onclick="hideshowkid(2)" value="non">
            <label for="enfant_non">non</label>
            <div id="enfant_naissance" class="input_boxe">
            <!--    Si oui    -->
            <label for="nombre_enfant">Nombre d'enfants à charge : <span class="obligatoire">*</span></label>
            <input type="number" id="nombre_enfant" name="nb_enfant">
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
            <select class="form-control" name="nature_revenus" id="revenus" onchange="hideshowautre()">
                <option value="rien">-- Selectionner une option --</option>
                <option value="salaire">Salaire</option>
                <option value="RSA">RSA</option>
                <option value="ARE">ARE</option>
                <option value="AAH">AAH</option>
                <option value="retraite">Pension de retraite</option>
                <option value="autre" id="autre">Autre</option>
                <option value="aucun">Aucun</option>
            </select>
            
            <!--    Si "autre"    -->
            <div id="preciser" class="input_boxe">
            <label for="preciser">Préciser : <span class="obligatoire">*</span></label>
            <input type="text" name="autre_revenus">
            </div>
            </div>
            <!--    
                Pôle emplois  --------------------------------------------------------------------
            -->
            <label for="inscrit_pole_emploi">Inscrit à pôle emploi : <span class="obligatoire">*</span></label>
            <input type="radio" id="pole_oui" name="inscrit_pole_emploi" onclick="showhideemplois(1)" value="oui">
            <label for="pole_oui">oui</label>
            <input type="radio" id="pole_non" name="inscrit_pole_emploi" onclick="showhideemplois(2)" value="non">
            <label for="pole_non">non</label>
            <!--    Si oui    -->
            <div class="input_boxe">
                <div id="pole_emplois">
            <label id="inscri_emplois" for="date_inscription_pole_emplois">Date d'inscription au pôle emplois : <span class="obligatoire">*</span></label>
            <input id="input_inscri_emplois" type="date" id="date_inscription_pole_emplois" name="dte_inscription">
            <div class="input_boxe">
            <label id="ref" for="nom_ref">Nom du référent : <span class="obligatoire">*</span></label>
            <input id="input_ref" type="text" id="nom_ref" name="nom_referent">
            </div>
        </div>
            <!--    Si non    -->
            <div id="date_rea2">
            <label for="date_r2">Date de réalisation : <span class="obligatoire">*</span></label>
            <input type="date" id="date_r2" name="dte_realisation_pole">
            <label for="commentaire_pole">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_pole">
            </div>
        </div>
            <!--    
                Soélis  --------------------------------------------------------------------
            -->
            <label for="inscrit_soelis">Inscrit à Soélis : <span class="obligatoire">*</span></label>
            <input type="radio" id="soelis_oui" name="inscrit_soelis" onclick="showhidesoelis(1)" value="oui">
            <label for="soelis_oui">oui</label>
            <input type="radio" id="soelis_non" name="inscrit_soelis" onclick="showhidesoelis(2)" value="non">
            <label for="soelis_non">non</label>
            <!--    Si oui    -->
            <div class="input_boxe">
                <div id="inscrit_soelis">
            <label id="inscri_soelis" for="date_inscription_soelis">Date d'inscription à Soelis : <span class="obligatoire">*</span></label>
            <input id="input_inscri_soelis" type="date" id="date_inscription_soelis" name="dte_inscription_soelis">
            <div class="input_boxe">
            <label id="ref" for="nom_ref">Nom du référent : <span class="obligatoire">*</span></label>
            <input id="input_ref" type="text" id="nom_ref" name="nom_referent_soelis">
            </div>
        </div>
            <!--    Si non    -->
            <div id="date_rea_soelis">
            <label for="date_rea_s">Date de réalisation : <span class="obligatoire">*</span></label>
            <input type="date" id="date_rea_s" name="dte_realisation_soelis">
            <label for="commentaire_soelis">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_soelis">
            </div>
        </div>
            <!--    
                CMA  --------------------------------------------------------------------
            -->
            <label for="inscrit_cma">Inscrit à CMA : <span class="obligatoire">*</span></label>
            <input type="radio" id="cma_oui" name="inscrit_cma" onclick="showhidecma(1)" value="oui">
            <label for="cma_oui">oui</label>
            <input type="radio" id="cma_non" name="inscrit_cma" onclick="showhidecma(2)" value="non">
            <label for="cma_non">non</label>
            <!--    Si oui    -->
            <div class="input_boxe">
                <div id="inscrit_cma">
            <label id="inscrit_cma1" for="date_inscription_pole_emplois">Date d'inscription à CMA : <span class="obligatoire">*</span></label>
            <input id="input_inscri_cma" type="date" id="date_inscription_cma" name="dte_inscription_cma">
            <div class="input_boxe">
            <label id="ref" for="nom_ref_cma">Nom du référent : <span class="obligatoire">*</span></label>
            <input id="input_ref" type="text" id="nom_ref_cma" name="nom_referent_cma">
            </div>
        </div>
            <!--    Si non    -->
            <div id="date_rea_cma">
            <label for="date_cma">Date de réalisation : <span class="obligatoire">*</span></label>
            <input type="date" id="date_cma" name="dte_realisation_cma">
            <label for="commentaire_cma">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_cma">
            </div>
        </div>
            <!--    
                Mission local   -------------------------------------------------------------------
            -->
            <label for="inscrit_mission_local">Inscrit à la Mission Locale : <span class="obligatoire">*</span></label>
            <input type="radio" id="mission_oui" name="inscrit_mission_local" onclick="showhidemission(1)" value="oui">
            <label for="mission_oui">oui</label>
            <input type="radio" id="mission_non" name="inscrit_mission_local" onclick="showhidemission(2)" value="non">
            <label for="mission_non">non</label>
            <!--    Si oui    -->
        <div id="date_rea3">
            <div class="input_boxe">
            <label for="date_r3">Date de réalisation : <span class="obligatoire">*</span></label>
            <input id="input_date_rea3" type="date" id="date_r3" name="dte_realisation_mission">
            <label for="commentaire_mission">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_mission">
        </div>
            </div>
            
            <div id="mission">
            <div class="input_boxe">
            <div class="input_boxe">
            <label id="datem" for="date_mission">Date d'inscription : <span class="obligatoire">*</span></label>
            <input id="input_datem" type="date" id="date_mission" name="dte_inscription_mission">
            </div>
            <label id="ref_m" for="ref_mission">Nom du référent de la mission locale pour l'emploi : <span class="obligatoire">*</span></label>
            <input type="text" id="ref_mission" name="nom_referent_mission">
            <!--    Si non    -->

            </div>
        </div>
            <!--    
                CAP emplois  ----------------------------------------------------------------------
            -->
            <div>
            <label for="inscrit_cap_emploi">Inscrit à CAP emploi : <span class="obligatoire">*</span></label>
            
            <input type="radio" id="cap_oui" name="inscrit_cap_emploi" onclick="showhidecap(1)" value="oui">
            <label for="cap_oui">oui</label>
            <input type="radio" id="cap_non" name="inscrit_cap_emploi" onclick="showhidecap(2)" value="non">
            <label for="cap_oui">non</label>
            </div>
            <!--    Si oui   -->
            <div class="input_boxe">
            <div id="cap">
            <label for="date_inscription_cap_emplois">Date d'inscription à CAP emploi : <span class="obligatoire">*</span></label>
            <input type="date" id="date_inscription_cap_emplois" name="dte_inscription_cap">
            <label for="nom_ref2">Nom du référent : <span class="obligatoire">*</span></label>
            <input type="text" id="nom_ref2" name="nom_referent_cap">
            </div>
            <!--    Si non    -->
            <div id="date_rea4">
            <label for="date_r4">Date de réalisation : <span class="obligatoire">*</span></label>
            <input type="date" id="date_r4" name="dte_realisation_cap">
            <label for="commentaire_cap">Commentaire : </label>
            <input type="text" class="input_suivis" name="commentaire_cap">
            </div>
            </div>
            <!--    
                CV  -------------------------------------------------------------------------------
            -->
            <label for="cv_oui_non">CV disponible : <span class="obligatoire">*</span></label>
            <input type="radio" id="cv_oui" name="cv_oui_non" onclick="showhidecv(1)" value="oui">
            <label for="cv_oui">oui</label>
            <input type="radio" id="cv_non" name="cv_oui_non" onclick="showhidecv(2)" value="non">
            <label for="cv_non">non</label>
            <div class="input_boxe">
            <!--    Si oui   -->
        </div>
        <div id="cv">
            <label for="pdfFile">Insérer le cv scanné (format PDF uniquement) : <span class="obligatoire">*</span></label> 
            <input type="file" id="pdfFile" name="pdfFile" accept="cv/pdf">
        </div>



            <!--    Si non   -->
            <div id="date_cv">
            <div class="input_boxe">
            <label for="date_cv">Date programmé pour travailler le CV : <span class="obligatoire">*</span></label>
            <input type="date" name="dte_travailler_cv">
            </div>
            </div>

            <!--    
                Permis de conduire  ---------------------------------------------------------------
            -->
            <div class="input_boxe">
            <label for="permis">Permis : <span class="obligatoire">*</span></label>
            <select class="form-control" name="permis_voiture" id="permis" onchange="hideshowpermis()">
                <option value="rien" id="rien">-- Selectionner une option --</option>
                <option value="motos1" id="motos1">Permis motos</option>
                <option value="auto1" id="auto1">Permis auto</option>
                <option value="march1" id="march1">Permis marchandises ou de personnes</option>
                <option value="aucun" id="aucun" >Aucun</option>
            </select>
            </div>
            <!--    Si motos   -->
            <div class="input_boxe" id="motos">
            <label for="moto">Permis motos : <span class="obligatoire">*</span></label>
            <select class="form-control" name="moto">
                <option value="rien">-- Selectionner une option --</option>
                <option value="a">A</option>
                <option value="a1">A1</option>
                <option value="a2">A2</option>
            </select>
            </div>
            <!--    Si auto   -->
            <div class="input_boxe" id="auto">
            <label for="aut">Permis autos : <span class="obligatoire">*</span></label>
            <select class="form-control" name="auto">
                <option value="rien">-- Selectionner une option --</option>
                <option value="b">B</option>
                <option value="b1">B1</option>
                <option value="be">BE</option>
            </select>
            </div>
            <!--    Si march   -->
            <div class="input_boxe" id="march">
            <label for="marchandise">Permis pour le transport de marchandises ou de personnes : <span class="obligatoire">*</span></label>
            <select class="form-control" name="marchandise" id="marchandise">
                <option value="rien">-- Selectionner une option --</option>
                <option value="c">C</option>
                <option value="ce">CE</option>
                <option value="c1">C1</option>
                <option value="c1e">C1E</option>
                <option value="d">D</option>
                <option value="de">DE</option>
                <option value="d1">D1</option>
                <option value="d1e">D1E</option>
            </select>
            </div>

            <!--    
                Véhicule disponible  -------------------------------------------------------------
            -->
            <div class="input_boxe">
            <label for="vehicule">Véhicule disponible : <span class="obligatoire">*</span></label>
            </div>
            <input type="radio" id="vehicule_oui" name="vehicule_dispo" onclick="showhideachat(1)" value="oui">
            <label for="vehicule_oui">oui</label>
            <input type="radio" id="vehicule_non" name="vehicule_dispo" onclick="showhideachat(2)" value="non">
            <label for="vehicule_non">non</label>
            <!--    Si oui (rien)  -->

            <!--    Si non   -->
        <div id="achat1">
            <div class="input_boxe">
            <label for="achat_vehicule">Achat prévu d'un véhicule ? <span class="obligatoire">*</span></label>
            </div>
            <input type="radio" id="achat_oui" name="achat_prevu" value="oui" onclick="showhidedatevehi(1)">
            <label for="achat_oui">oui</label>
            <input type="radio" id="achat_non" name="achat_prevu" value="non" onclick="showhidedatevehi(2)">
            <label for="achat_non">non</label>
            </div>
        
        <!--    Si oui (achat véhicule)  -->
        <div id="date_achat_vehicule" class="input_boxe">
        <label for="date_vehicule">Date d'achat prévue : </label>
        <input type="date" name="date_vehicule" id="achat_vehicule">
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
            <select class="form-control" name="nom_diplome" id="dipl" onchange="hideshowdipl()">
                <option value="rien">-- Selectionner une option --</option>
                <option value="aucun">Aucun diplôme</option>
                <option value="brevet">Brevet</option>
                <option value="cap">CAP</option>
                <option value="bep">BEP</option>
                <option value="bac">BAC</option>
                <option value="bac+2">BAC +2</option>
                <option value="licence">Licence</option>
                <option value="master">Master 1</option>
                <option value="master2">Master 2</option>
                <option value="autre">Autre</option>
                <option value="formation_continue">Formation continue</option>
            </select>
            <!--    Si CAP   -->
            <div class="input_boxe" id="cap_metier">
            <label for="cap_metier">Renseigner le type de métier : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="cap_metier">
            </div>
            <!--    Si BEP   -->
            <div class="input_boxe" id="bep_metier">
            <label for="bep_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="bep_metier">
            </div>
            <!--    Si BAC   -->
            <div class="input_boxe" id="bac_metier">
            <label for="bac_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="bac_metier">
            </div>
            <!--    Si BAC+2   -->
            <div class="input_boxe" id="bac2_metier">
            <label for="bac2_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="bac2_metier">
            </div>
            <!--    Si Licence   -->
            <div class="input_boxe" id="licence_metier">
            <label for="licence_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="licence_metier">
            </div>
            <!--    Si Master   -->
            <div class="input_boxe" id="master_metier">
            <label for="master_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="master_metier">
            </div>
            <!--    Si Master 2   -->
            <div class="input_boxe" id="master2_metier">
            <label for="master2_metier">Renseigner la spécialité : <span class="obligatoire">*</span></label>
            <input type="text" id="input_cap_metier" name="master2_metier">
            </div>
            <!--    Si formation continue   -->
            <div class="input_boxe" id="form_continue">
            <label for="form_continue">Renseigner la formation : <span class="obligatoire">*</span></label>
            <input type="text" id="input_form_continue" name="form_continue">
            </div>
            <!--    Si autre   -->
            <div id="rens_dipl">
            <label for="dipl_autre">Renseigner le diplôme : <span class="obligatoire">*</span></label>
            <input type="text" id="dipl_autre" name="nom_diplome_autre">
        
            <!--    Si aucun   -->
    </div>
    <div id="niveau">
            <label for="dipl_aucun">Nombre d'années d'études : <span class="obligatoire">*</span></label>
            <input type="text" id="dipl_aucun" name="nb_annee_scolarisation">
        
        
            <label for="dipl_niveau">Renseigner le niveau : <span class="obligatoire">*</span></label>
            <input type="text" id="dipl_niveau" name="niveau_diplome">
        </div>
        </div>
        <hr>
            <!--    
                Connaissance de la langue française  ----------------------------------------------
            -->
            <label for="atelier_fr">Inscrit aux ateliers de français : <span class="obligatoire">*</span></label>
            <input type="radio" id="fr_oui" name="atelier_fr" value="oui">
            <label for="fr_oui">oui</label>
            <input type="radio" id="fr_non" name="atelier_fr" value="non">
            <label for="fr_non">non</label>
            <div>
                <p class="ital">1 à 6 | du plus bas au plus haut niveau</p>
            </div>
            <div class="input_boxe">
                <div class="ecrit">
            <label for="efrancais">Connaissance de la langue française (écrite) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="efrancais" name="langue_fr_ecrite">
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1">A1 | 1</option>
                <option value="A2">A2 | 2</option>
                <option value="B1">B1 | 3</option>
                <option value="B2">B2 | 4</option>
                <option value="C1">C1 | 5</option>
                <option value="C2">C2 | 6</option>
            </select>
            </div>
            </div>
            <div class="parler">
            <label for="pfrancais">Connaissance de la langue française (parlée) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="pfrancais" name="langue_fr_parlee">
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1">A1 | 1</option>
                <option value="A2">A2 | 2</option>
                <option value="B1">B1 | 3</option>
                <option value="B2">B2 | 4</option>
                <option value="C1">C1 | 5</option>
                <option value="C2">C2 | 6</option>
            </select>
            </div>
            <div class="lue">
            <label for="lfrancais" class="petit_lu">Connaissance de la langue française (Lue) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="lfrancais" name="langue_fr_lue">
                <option class="form-control" value="rien">-- Selectionner une option --</option>
                <option value="A1">A1 | 1</option>
                <option value="A2">A2 | 2</option>
                <option value="B1">B1 | 3</option>
                <option value="B2">B2 | 4</option>
                <option value="C1">C1 | 5</option>
                <option value="C2">C2 | 6</option>
            </select>
            </div>
            <!--    
                Connaissance de la langue anglaise  ----------------------------------------------
            -->
            <div class="langue_anglais">
            <div class="input_boxe">
                <div class="ecrit">
            <label for="efrancais">Connaissance de la langue anglaise (écrite) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="eanglais" name="langue_en_ecrite">
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1">A1 | 1</option>
                <option value="A2">A2 | 2</option>
                <option value="B1">B1 | 3</option>
                <option value="B2">B2 | 4</option>
                <option value="C1">C1 | 5</option>
                <option value="C2">C2 | 6</option>
            </select>
            </div>
            </div>
            <div class="parler">
            <label for="panglais">Connaissance de la langue anglaise (parlée) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="panglais" name="langue_en_parlee">
                <option value="rien">-- Selectionner une option --</option>
                <option value="A1">A1 | 1</option>
                <option value="A2">A2 | 2</option>
                <option value="B1">B1 | 3</option>
                <option value="B2">B2 | 4</option>
                <option value="C1">C1 | 5</option>
                <option value="C2">C2 | 6</option>
            </select>
            </div>
            <div class="lue">
            <label for="langlais" class="petit_lu">Connaissance de la langue anglaise (Lue) : <span class="obligatoire">*</span></label>
            <select class="form-control" id="langlais" name="langue_en_lue">
                <option class="form-control" value="rien">-- Selectionner une option --</option>
                <option value="A1">A1 | 1</option>
                <option value="A2">A2 | 2</option>
                <option value="B1">B1 | 3</option>
                <option value="B2">B2 | 4</option>
                <option value="C1">C1 | 5</option>
                <option value="C2">C2 | 6</option>
            </select>
            </div>
            </div>
            <div id="autre_langue1">
                <label class="decal" for="if_lang">Autre(s) langue(s) parlée(s) : <span class="obligatoire">*</span></label>
                <input type="radio" name="if_autre" id="oui_autre" value="oui" onclick="showhideautrelang(1)">
                <label for="oui_autre">oui</label>
                <input type="radio" name="if_autre" id="non_autre" value="non" onclick="showhideautrelang(2)">
                <label for="non_autre">non</label>
            <!--  -->
                <div class="input_boxe" id="oui_langue_autre">
                    <label class="decal" for="input_autre_langue">Langue(s) : <span class="obligatoire">*</span></label>
                    <input type="text" name="autre_langue" id="input_autre_langue">
            </div>
            </div>
            <hr>
            <!--    
                Emplois précédemment occupés (si pas de cv)  ---------------------------------------
            -->

            <h2 class="emplois_prec">Emplois précédemment occupés : </h2>
            <textarea class="form-control" name="emploi_pre_occupe" id="empl_occ"></textarea>
            </div>
            <!--    
                Projet professionel de la personne  ------------------------------------------------
            -->
            <div class="-top">
            <div>
            <hr>
            <label for="reconv">Reconversion professionelle : <span class="obligatoire">*</span></label>
            <input type="radio" id="oui_reconv" name="reconversion" onclick="showhidereconv(1)" value="oui">
            <label for="oui_reconv">oui</label>
            <input type="radio" id="non_reconv" name="reconversion" onclick="showhidereconv(2)" value="non">
            <label for="non_reconv">non</label>
            </div>
            <!--    Si non (rien)   -->

            <!--    
                Formation prévues  -----------------------------------------------------------------
            -->
            <!--    Si oui   -->
            <div id="formati">
            <label for="form_prevue">Formation prévues ? <span class="obligatoire">*</span></label>
            <input type="radio" id="oui_form" name="form_prevue" onclick="showhideformp(1)" value="oui">
            <label for="oui_form">oui</label>
            <input type="radio" id="non_form" name="form_prevue" onclick="showhideformp(2)" value="non">
            <label for="non_form">non</label>
            </div>
            <!--    Si non (rien)   -->
            
            <!--    Si oui   -->
            <div class="input_boxe" id="renseign">
            <label for="form_nom">Renseigner le nom : <span class="obligatoire">*</span></label>
            <input type="text" id="form_nom" name="form_nom">
            <label for="form_date">Renseigner la date : <span class="obligatoire">*</span></label>
            <input type="date" id="form_date" name="form_date">
            <label for="form_duree">Renseigner la durée : <span class="obligatoire">*</span></label>
            <input type="text" id="form_duree" name="form_duree">
            </div>
            
            <!--    
                Reprise d'étude  ------------------------------------------------------------------
            -->
            <label for="etude">Reprise d'étude ? <span class="obligatoire">*</span></label>
            <input type="radio" id="oui_etude" name="reprise" onclick="showhidereprise(1)" value="oui">
            <label for="oui_etude">oui</label>
            <input type="radio" id="non_etude" name="reprise" onclick="showhidereprise(2)" value="non">
            <label for="non_etude">non</label>
            <!--    Si oui   -->
            <div class="input_boxe" id="dipl_prep">
            <label for="dipl_prepa">Diplôme préparé : <span class="obligatoire">*</span></label>
            <input type="text" id="dipl_prepa" name="nom_etudes">
            </div>
            <!--    
                bénéficier formation pro  ------------------------------------------------------------------
            -->
            <div>
            <label for="form_pro">La personne va-t-elle bénéficier d'une formation professionelle ? <span class="obligatoire">*</span></label>
            <input type="radio" id="form_pro_oui" name="form_pro" onclick="showhideformpro(1)" value="oui">
            <label for="form_pro_oui">oui</label>
            <input type="radio" id="form_pro_non" name="form_pro" onclick="showhideformpro(2)" value="non">
            <label for="form_pro_non">non</label>
            </div>
            <!--    Si non (rien)   -->

            <!--    Si oui   -->
            <div class="input_boxe" id="oui_formpro">
            <label for="form_type">Type de formation : <span class="obligatoire">*</span></label>
            <select class="form-control" name="form_type" id="form_type" onchange="hideshowformqd()">
                <option value="rien">-- Selectionner une option --</option>
                <option value="qualifiante">Formation qualifiante</option>
                <option value="diplomante">Formation diplômante</option>
            </select>
            </div>
            <!--    Si qualifiante   -->
            <div class="input_boxe" id="if_qual">
            <label for="nom_form">Nom de la formation qualifiante : <span class="obligatoire">*</span></label>
            <input type="text" id="nom_form" name="form_qual">
            </div>
            <!--    Si diplômante   -->
            <div class="input_boxe" id="if_dipl">
            <label for="nom_diplo">Nom du diplôme : <span class="obligatoire">*</span></label>
            <input type="text" id="nom_diplo" name="form_dipl">
            </div>
            <div class="input_boxe">
            <label for="metier_s">Métier souhaité : <span class="obligatoire">*</span></label>
            <input type="text" id="metier_s" name="metier_souhaite">

            <label for="secteur_act">Secteur d'activité : <span class="obligatoire">*</span></label>
            <input type="text" id="secteur_act" name="secteur_activite">

            <label for="secteur_geo">Secteur géographique souhaité : <span class="obligatoire">*</span></label>
            <input type="text" id="secteur_geo" name="secteur_geo">
            </div>

            <label for="horaire">Horaire de travail souhaité : <span class="obligatoire">*</span></label>
            <select class="form-control" name="moment_journee" id="horaire">
                <option value="rien">-- Selectionner une option --</option>
                <option value="jour">Travail la journée</option>
                <option value="matin">Travail le matin</option>
                <option value="nuit">Travail de nuit</option>
                <option value="2x8">Travail en cycle 2x8</option>
                <option value="3x8">Travail en cycle 3x8</option>
                <option value="5x8">Travail en cycle 5x8</option>
                <option value="VSD">Travail en VSD</option>
                <option value="SD">Travail en SD</option>
            </select>
            </div>
            <div>
            <button type="submit" class="btn_modifier" id="continuer">Valider</button>
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