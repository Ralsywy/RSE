<?php
// création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );



?>
<div class="addsuivis">
    <a href="index.php?route=creer2">Accès suivis page 2</a>
    <h1 class="titrecreer">Création du suivi</h1>
    <h2 class="information">Informations personnelles</h2>
    <form class="form" method="post" id="suiviss" action="index.php?route=store_inscrit" enctype="multipart/form-data">
        <!--    Information personnelles    -->
    <div class="block_enligne">
        <div class="input_boxe">
        <label for="dte_contact">Date du contact : </label>
        <input type="date" id="dte_contact"  name="dte_contact">
        </div>
        <div class="input_boxe">
        <label for="origine_contact">Origine du contact : </label>
        <input type="text" name="origine_contact" id="origine_contact"  >
        </div>
    </div>

    <div class="radio_button">
        <label for="inscrit">Inscrit aux resto du coeur : </label>
        <input type="radio" id="radio_oui" name="inscrit_rdc" class="radio_oui" value="oui" onclick="hideShowDiv(1)">
        <label for="inscrit_oui">oui</label>
        <input type="radio" id="radio_non" name="inscrit_rdc" class="radio_non" value="non" onclick="hideShowDiv(2)">
        <label for="inscrit_non">non</label>

    <div>
        <label for="benevole">Bénévole aux resto du coeur : </label>
        <input type="radio" id="_oui" name="benevole_rdc" class="oui" value="oui">
        <label for="benevole_oui">oui</label>
        <input type="radio" id="_non" name="benevole_rdc" class="non" value="non">
        <label for="benevole_non">non</label>
    </div>

        <!--    Si oui   -->
    <div id="centre_num">
        <label id="num_" class="decale" for="num">N° : </label>
        <input id="input_num" class="input_suivis" type="text" id="num" name="numero">

        <label id="centre" for="centre">Centre : </label>
        <input id="input_centre" class="input_suivis" type="text" id="centre" name="centre">
    </div>

        <!--    Si non    -->
        <div id="date_rea1">
        <label class="decale" for="date_r">Date de réalisation : </label>
        <input class="input_suivis" type="date" id="date_r" name="dte_realisation_rdc">
        </div>
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
        <label class="accompagnateur" for="accompagnateur">Accompagnateur SRE : </label>
        <select name="accompagnateur" id="accompagnateur" class="form-control">
            <option value="rien"> -- Selectionner un accompagnateur -- </option>
            <?php
            foreach($accompagnateurs as $ligne){?>
                <option value=<?= $ligne["id_accompagnateur"]?>><?= $ligne["name_acc"]?></option>
            <?php
            }
            ?>
        </select>
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
        <label for="civilite">Civilité : </label>
        <select class="form-control" name="civilite" id="civilite">
            <option value="rien">-- Selectionner une option --</option>
            <option value="Madame">Madame</option>
            <option value="Mademoiselle">Mademoiselle</option>
            <option value="Monsieur">Monsieur</option>
        </select>
        <div class="input_boxe">

        <label for="nom">Nom : </label>
        <input type="text" id="nom" name="nom">


        <label class="decale" for="prenom">Prénom : </label>
        <input class="decale" type="text" id="prenom" name="prenom">
        </div>
        <div class="input_boxe">
        
        <label for="birth_date">Date de naissance : </label>
        
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
        <label for="nationalite" id="nationalite">Nationalité : </label>
        <?php
        include('pays.php')
        ?>
    </div>
    <div class="input_boxe">
        <label id="adresse" for="adresse">Adresse : </label>
        <input type="text" id="adresse" name="adresse">


        <label class="decaler" for="zipcode">Code Postal : </label>
        <input class="decaler" type="text" id="zipcode" name="code_postal"  >
        <div id="error-message" style="display: none; color: #f55;"></div>
        <div class="input_boxe">
        <label class="decaler" for="city">Ville : </label>
        <select class="form-control" id="city" placeholder="Ville" name="ville"></select>
        </div>
        </div>
        <div class="input_boxe">

        <label class="decaler" for="tel">Téléphone : </label>
        <input class="decaler" type="text" id="tel" name="telephone">

        <label class="decaler" for="email">E-mail : </label>
        <input class="decaler" type="mail" id="email" name="email">
        </div>
        
    </div>

        <label for="statue">Statue : </label>
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
        <label>Enfants à charge : </label>
        <input type="radio" id="enfant_oui" name="enfant_charge" onclick="hideshowkid(1)" value="oui">
        <label for="enfant_oui">oui</label>


        <input type="radio" id="enfant_non" name="enfant_charge" onclick="hideshowkid(2)" value="non">
        <label for="enfant_non">non</label>
        <div id="enfant_naissance" class="input_boxe">
        <!--    Si oui    -->
        <label for="nombre_enfant">Nombre d'enfants à charge : </label>
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
        <label for="revenus">Nature des revenus : </label>
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
        <label for="preciser">Préciser : </label>
        <input type="text" name="autre_revenus">
        </div>
        </div>
        <!--    
            Pôle emplois  --------------------------------------------------------------------
        -->
        <label for="inscrit_pole_emploi">Inscrit à pôle emploi : </label>
        <input type="radio" id="pole_oui" name="inscrit_pole_emploi" onclick="showhideemplois(1)" value="oui">
        <label for="pole_oui">oui</label>
        <input type="radio" id="pole_non" name="inscrit_pole_emploi" onclick="showhideemplois(2)" value="non">
        <label for="pole_non">non</label>
        <!--    Si oui    -->
        <div class="input_boxe">
            <div id="pole_emplois">
        <label id="inscri_emplois" for="date_inscription_pole_emplois">Date d'inscription au pôle emplois : </label>
        <input id="input_inscri_emplois" type="date" id="date_inscription_pole_emplois" name="dte_inscription">
        <div class="input_boxe">
        <label id="ref" for="nom_ref">Nom du référent</label>
        <input id="input_ref" type="text" id="nom_ref" name="nom_referent">
        </div>
    </div>
        <!--    Si non    -->
        <div id="date_rea2">
        <label for="date_r2">Date de réalisation : </label>
        <input type="date" id="date_r2" name="dte_realisation_pole">
        </div>
    </div>
        <!--    
            Soélis  --------------------------------------------------------------------
        -->
        <label for="inscrit_soelis">Inscrit à Soélis : </label>
        <input type="radio" id="soelis_oui" name="inscrit_soelis" onclick="showhidesoelis(1)" value="oui">
        <label for="soelis_oui">oui</label>
        <input type="radio" id="soelis_non" name="inscrit_soelis" onclick="showhidesoelis(2)" value="non">
        <label for="soelis_non">non</label>
        <!--    Si oui    -->
        <div class="input_boxe">
            <div id="inscrit_soelis">
        <label id="inscri_soelis" for="date_inscription_soelis">Date d'inscription à soelis : </label>
        <input id="input_inscri_soelis" type="date" id="date_inscription_soelis" name="dte_inscription_soelis">
        <div class="input_boxe">
        <label id="ref" for="nom_ref">Nom du référent</label>
        <input id="input_ref" type="text" id="nom_ref" name="nom_referent_soelis">
        </div>
    </div>
        <!--    Si non    -->
        <div id="date_rea_soelis">
        <label for="date_rea_s">Date de réalisation : </label>
        <input type="date" id="date_rea_s" name="dte_realisation_soelis">
        </div>
    </div>
        <!--    
            CMA  --------------------------------------------------------------------
        -->
        <label for="inscrit_cma">Inscrit à CMA : </label>
        <input type="radio" id="cma_oui" name="inscrit_cma" onclick="showhidecma(1)" value="oui">
        <label for="cma_oui">oui</label>
        <input type="radio" id="cma_non" name="inscrit_cma" onclick="showhidecma(2)" value="non">
        <label for="cma_non">non</label>
        <!--    Si oui    -->
        <div class="input_boxe">
            <div id="inscrit_cma">
        <label id="inscrit_cma1" for="date_inscription_pole_emplois">Date d'inscription à CMA : </label>
        <input id="input_inscri_cma" type="date" id="date_inscription_cma" name="dte_inscription_cma">
        <div class="input_boxe">
        <label id="ref" for="nom_ref_cma">Nom du référent</label>
        <input id="input_ref" type="text" id="nom_ref_cma" name="nom_referent_cma">
        </div>
    </div>
        <!--    Si non    -->
        <div id="date_rea_cma">
        <label for="date_cma">Date de réalisation : </label>
        <input type="date" id="date_cma" name="dte_realisation_cma">
        </div>
    </div>
        <!--    
            Mission local   -------------------------------------------------------------------
        -->
        <label for="inscrit_mission_local">Inscrit à la mission locale : </label>
        <input type="radio" id="mission_oui" name="inscrit_mission_local" onclick="showhidemission(1)" value="oui">
        <label for="mission_oui">oui</label>
        <input type="radio" id="mission_non" name="inscrit_mission_local" onclick="showhidemission(2)" value="non">
        <label for="mission_non">non</label>
        <!--    Si oui    -->
    <div id="date_rea3">
        <div class="input_boxe">
        <label for="date_r3">Date de réalisation : </label>
        <input id="input_date_rea3" type="date" id="date_r3" name="dte_realisation_mission">
    </div>
        </div>
        
        <div id="mission">
        <div class="input_boxe">
        <div class="input_boxe">
        <label id="datem" for="date_mission">Date d'inscription : </label>
        <input id="input_datem" type="date" id="date_mission" name="dte_inscription_mission">
        </div>
        <label id="ref_m" for="ref_mission">Nom du référent de la mission locale pour l'emploi : </label>
        <input type="text" id="ref_mission" name="nom_referent_mission">
        <!--    Si non    -->

        </div>
    </div>
        <!--    
            CAP emplois  ----------------------------------------------------------------------
        -->
        <div>
        <label for="inscrit_cap_emploi">Inscrit à CAP emploi : </label>
        
        <input type="radio" id="cap_oui" name="inscrit_cap_emploi" onclick="showhidecap(1)" value="oui">
        <label for="cap_oui">oui</label>
        <input type="radio" id="cap_non" name="inscrit_cap_emploi" onclick="showhidecap(2)" value="non">
        <label for="cap_oui">non</label>
        </div>
        <!--    Si oui   -->
        <div class="input_boxe">
        <div id="cap">
        <label for="date_inscription_cap_emplois">Date d'inscription à CAP emploi : </label>
        <input type="date" id="date_inscription_cap_emplois" name="dte_inscription_cap">
        <label for="nom_ref2">Nom du référent : </label>
        <input type="text" id="nom_ref2" name="nom_referent_cap">
        </div>
        <!--    Si non    -->
        <div id="date_rea4">
        <label for="date_r4">Date de réalisation : </label>
        <input type="date" id="date_r4" name="dte_realisation_cap">
        </div>
        </div>
        <!--    
            CV  -------------------------------------------------------------------------------
        -->
        <label for="cv_oui_non">CV disponible : </label>
        <input type="radio" id="cv_oui" name="cv_oui_non" onclick="showhidecv(1)" value="oui">
        <label for="cv_oui">oui</label>
        <input type="radio" id="cv_non" name="cv_oui_non" onclick="showhidecv(2)" value="non">
        <label for="cv_non">non</label>
        <div class="input_boxe">
        <!--    Si oui   -->
    </div>
    <div id="cv">
        <label for="pdfFile">Insérer le cv scanné (format PDF uniquement) : </label> 
        <input type="file" id="pdfFile" name="pdfFile" accept="cv/pdf">
    </div>



        <!--    Si non   -->
        <div id="date_cv">
        <div class="input_boxe">
        <label for="date_cv">Date programmé pour travailler le CV : </label>
        <input type="date" name="dte_travailler_cv">
        </div>
        </div>

        <!--    
            Permis de conduire  ---------------------------------------------------------------
        -->
        <div class="input_boxe">
        <label for="permis">Permis : </label>
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
        <label for="moto">Permis motos : </label>
        <select class="form-control" name="moto">
            <option value="rien">-- Selectionner une option --</option>
            <option value="a">A</option>
            <option value="a1">A1</option>
            <option value="a2">A2</option>
        </select>
        </div>
        <!--    Si auto   -->
        <div class="input_boxe" id="auto">
        <label for="aut">Permis autos : </label>
        <select class="form-control" name="auto">
            <option value="rien">-- Selectionner une option --</option>
            <option value="b">B</option>
            <option value="b1">B1</option>
            <option value="be">BE</option>
        </select>
        </div>
        <!--    Si march   -->
        <div class="input_boxe" id="march">
        <label for="marchandise">Permis pour le transport de marchandises ou de personnes : </label>
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
        <label for="vehicule">Véhicule disponible : </label>
        </div>
        <input type="radio" id="vehicule_oui" name="vehicule_dispo" onclick="showhideachat(1)" value="oui">
        <label for="vehicule_oui">oui</label>
        <input type="radio" id="vehicule_non" name="vehicule_dispo" onclick="showhideachat(2)" value="non">
        <label for="vehicule_non">non</label>
        <!--    Si oui (rien)  -->

        <!--    Si non   -->
    <div id="achat1">
        <div class="input_boxe">
        <label for="achat_vehicule">Achat prévu d'un véhicule ?</label>
        </div>
        <input type="radio" id="achat_oui" name="achat_prevu" value="oui">
        <label for="achat_oui">oui</label>
        <input type="radio" id="achat_non" name="achat_prevu" value="non">
        <label for="achat_non">non</label>
        </div>
    </div>
    
    <div class="partie3">
    <hr>
        <!--    
            Diplome  -------------------------------------------------------------------------
        -->
        <h2 class="niveau_form">Niveau de formation : </h2>
        <div class="input_boxe">
        <label for="dipl">Diplôme obtenus :</label>
        <select class="form-control" name="nom_diplome" id="dipl" onchange="hideshowdipl()">
            <option value="rien">-- Selectionner une option --</option>
            <option value="aucun">Aucun diplôme</option>
            <option value="brevet">Brevet</option>
            <option value="cap">CAP</option>
            <option value="bep">BEP</option>
            <option value="bac">BAC</option>
            <option value="bac+2">BAC +2</option>
            <option value="licence">Licence</option>
            <option value="master1">Master 1</option>
            <option value="master2">Master 2</option>
            <option value="autre">Autre</option>
            <option value="formation_continue">Formation continue</option>
        </select>
        <!--    Si CAP   -->
        <div class="input_boxe" id="cap_metier">
        <label for="cap_metier">Renseigner le type de métier : </label>
        <input type="text" id="input_cap_metier" name="cap_metier">
        </div>
        <!--    Si formation continue   -->
        <div class="input_boxe" id="form_continue">
        <label for="form_continue">Renseigner la formation : </label>
        <input type="text" id="input_form_continue" name="form_continue">
        </div>
        <!--    Si autre   -->
        <div id="rens_dipl">
        <label for="dipl_autre">Renseigner le diplôme : </label>
        <input type="text" id="dipl_autre" name="nom_diplome_autre">
    
        <!--    Si aucun   -->
</div>
<div id="niveau">
        <label for="dipl_aucun">Nombre d'années d'études : </label>
        <input type="text" id="dipl_aucun" name="nb_annee_scolarisation">
    
    
        <label for="dipl_niveau">Renseigner le niveau : </label>
        <input type="text" id="dipl_niveau" name="niveau_diplome">
    </div>
    </div>
    <hr>
        <!--    
            Connaissance de la langue française  ----------------------------------------------
        -->
        <label for="atelier_fr">Inscrit aux ateliers de français : </label>
        <input type="radio" id="fr_oui" name="atelier_fr" value="oui">
        <label for="fr_oui">oui</label>
        <input type="radio" id="fr_non" name="atelier_fr" value="non">
        <label for="fr_non">non</label>
        <div class="input_boxe" id="ecrit">
        <label for="efrancais">Connaissance de la langue française (écrite) : </label>
        <select class="form-control" id="efrancais" name="langue_fr_ecrite">
            <option value="rien">-- Selectionner une option --</option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="C1">C1</option>
            <option value="C2">C2</option>
        </select>
        </div>
        <div id="parler">
        <label for="pfrancais">Connaissance de la langue française (parlée) : </label>
        <select class="form-control" id="pfrancais" name="langue_fr_parlee">
            <option value="rien">-- Selectionner une option --</option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="C1">C1</option>
            <option value="C2">C2</option>
        </select>
        </div>
        <div id="lue">
        <label for="lfrancais" class="petit_lu">Connaissance de la langue française (Lue) :   </label>
        <select class="form-control" id="lfrancais" name="langue_fr_lue">
            <option class="form-control" value="rien">-- Selectionner une option --</option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="C1">C1</option>
            <option value="C2">C2</option>
        </select>
        </div>
        <hr>
        <!--    
            Emplois précédemment occupés (si pas de cv)  ---------------------------------------
        -->

        <h2 class="emplois_prec">Emplois précédemment occupés : </h2>
        <textarea class="form-control" name="emploi_pre_occupe" id="empl_occ"></textarea>
        </div>
        <!--    
            Organismes contactés et resultats  -----------------------------------------------------------------
        -->
        <div class="orga">
        <hr>
        <h2 class="org">Organismes contactés et résultats : </h2>
        <textarea class="form-control" name="organisme_contacte" id="org"></textarea>
        </div>
        <!--    
            Entreprises contactés et resultats  -----------------------------------------------------------------
        -->
        <div class="entr_c">
        <hr>
        <h2 class="entr">Entreprises contactés et résultats : </h2>
        <textarea class="form-control" name="entreprise_contactee" id="entr"></textarea>
        </div>
        <!--    
            Projet professionel de la personne  ------------------------------------------------
        -->
        <hr>
        <div>
        <label for="reconv">Reconversion professionelle :</label>
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
        <label for="form_prevue">Formation prévues ?</label>
        <input type="radio" id="oui_form" name="form_prevue" onclick="showhideformp(1)" value="oui">
        <label for="oui_form">oui</label>
        <input type="radio" id="non_form" name="form_prevue" onclick="showhideformp(2)" value="non">
        <label for="non_form">non</label>
        </div>
        <!--    Si non (rien)   -->
        
        <!--    Si oui   -->
        <div class="input_boxe" id="renseign">
        <label for="form_nom">Renseigner le nom : </label>
        <input type="text" id="form_nom" name="form_nom">
        <label for="form_date">Renseigner la date : </label>
        <input type="date" id="form_date" name="form_date">
        <label for="form_duree">Renseigner la durée : </label>
        <input type="text" id="form_duree" name="form_duree">
        </div>
        
        <!--    
            Reprise d'étude  ------------------------------------------------------------------
        -->
        <label for="etude">Reprise d'étude ?</label>
        <input type="radio" id="oui_etude" name="reprise" onclick="showhidereprise(1)" value="oui">
        <label for="oui_etude">oui</label>
        <input type="radio" id="non_etude" name="reprise" onclick="showhidereprise(2)" value="non">
        <label for="non_etude">non</label>
        <!--    Si oui   -->
        <div class="input_boxe" id="dipl_prep">
        <label for="dipl_prepa">Diplôme préparé : </label>
        <input type="text" id="dipl_prepa" name="nom_etudes">
        </div>
        <!--    
            bénéficier formation pro  ------------------------------------------------------------------
        -->
        <div>
        <label for="form_pro">La personne va-t-elle bénéficier d'une formation professionelle ?</label>
        <input type="radio" id="form_pro_oui" name="form_pro" onclick="showhideformpro(1)" value="oui">
        <label for="form_pro_oui">oui</label>
        <input type="radio" id="form_pro_non" name="form_pro" onclick="showhideformpro(2)" value="non">
        <label for="form_pro_non">non</label>
        </div>
        <!--    Si non (rien)   -->

        <!--    Si oui   -->
        <div class="input_boxe" id="oui_formpro">
        <label for="form_type">Type de formation : </label>
        <select class="form-control" name="form_type" id="form_type" onchange="hideshowformqd()">
            <option value="rien">-- Selectionner une option --</option>
            <option value="qualifiante">Formation qualifiante</option>
            <option value="diplomante">Formation diplômante</option>
        </select>
        </div>
        <!--    Si qualifiante   -->
        <div class="input_boxe" id="if_qual">
        <label for="nom_form">Nom de la formation qualifiante : </label>
        <input type="text" id="nom_form" name="form_qual">
        </div>
        <!--    Si diplômante   -->
        <div class="input_boxe" id="if_dipl">
        <label for="nom_diplo">Nom du diplôme diplômante : </label>
        <input type="text" id="nom_diplo" name="form_dipl">
        </div>
        <div class="input_boxe">
        <label for="metier_s">Métier souhaité : </label>
        <input type="text" id="metier_s" name="metier_souhaite">

        <label for="secteur_act">Secteur d'activité : </label>
        <input type="text" id="secteur_act" name="secteur_activite">

        <label for="secteur_geo">Secteur géographique souhaité</label>
        <input type="text" id="secteur_geo" name="secteur_geo">
        </div>

        <label for="horaire">Horaire de travail souhaité : </label>
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
        <div>
        <button type="submit" class="btn_modifier" id="continuer">Créer</button>
        </div>
    </form>      
</div>
<?php
    var_dump($_FILES, $_POST);
$mysqlConnection = null;
?>
            <!--    
            Plan d'action   ------------------------------------------------------------------

            -->


        <!--   Après cloture du plan d'action   -->





