<div class="addsuivis">
<h1 class="titrecreer">création du suivis</h1>
<h2 class="information">Informations personnelles</h2>
    <form class="form" method="post">
    <!--    Information personnelles    -->
<div class="block_enligne">
    <div class="input_boxe">
    <label for="dcontact">Date du contact : </label>
    <input type="date" id="dcontact"  >
    </div>
    <div class="input_boxe">
    <label for="ocontact">Origine du contact : </label>
    <input type="text" name="ocontact" id="ocontact"  >
    </div>
</div>

<div class="radio_button">
    <label for="inscrit">Inscrit aux resto du coeur : </label>
    <input type="radio" id="radio_oui" name="inscrit" class="radio_oui" value="inscrit_oui" onclick="hideShowDiv(1)">
    <label for="inscrit_oui">oui</label>
    <input type="radio" id="radio_non" name="inscrit" class="radio_non" value="inscrit_non" onclick="hideShowDiv(2)">
    <label for="inscrit_non">non</label>



    <!--    Si oui   -->
<div id="centre_num">
    <label id="num_" class="decale" for="num" visibility="false">N° : </label>
    <input id="input_num" class="input_suivis" type="text" id="num">

    <label id="centre" for="centre">Centre : </label>
    <input id="input_centre" class="input_suivis" type="text" id="centre">
</div>

    <!--    Si non    -->
    <div id="date_rea1">
    <label class="decale" for="date_r">Date de réalisation : </label>
    <input class="input_suivis" type="date" id="date_r">
    </div>
</div>
    <div class="input_boxe">
    <label class="accompagnateur" for="accompagnateur">Accompagnateur SRE : </label>
    <select name="accompagnateur" id="accompagnateur" class="form-control"  >
        <option value="rien"> -- Selectionner un accompagnateur -- </option>
    </select>
    </div>


    <hr>



    <!--    
        Information personnelles : Coordonnées de la personne accueillie
    -->
    <div class="infor_pers">  
<h2 class="information">Coordonnées</h2>
<h2 class="information2">Situation personelle</h2>
    <div class="block_enligne">
<div class="input_boxe">
    <label for="civilite">Civilité : </label>
    <select class="form-control" name="civilite" id="civilite"  >
        <option value="rien">-- Selectionner une option --</option>
        <option value="madame">Madame</option>
        <option value="mademoiselle">Mademoiselle</option>
        <option value="monsieur">Monsieur</option>
    </select>
    <div class="input_boxe">

    <label for="nom">Nom : </label>
    <input type="text" id="nom"  >


    <label class="decale" for="prenom">Prénom : </label>
    <input class="decale" type="text" id="prenom"  >
    </div>
    <div class="input_boxe">

    <label for="birth_date">Date de naissance : </label>
    
    <input type="date" id="birth_date"  >

    <label for="age">Age : </label>
    <input type="text" disabled id="age">
    </div>
    <div class="input_boxe">
    <label for="nationalite" id="nationalite">Nationalité : </label>
    <?php
    include('pays.php')
    ?>
</div>
<div class="input_boxe">
    <label id="adresse" for="adresse">Adresse : </label>
    <input type="text" id="adresse"  >


    <label class="decaler" for="zipcode">Code Postal : </label>
    <input class="decaler" type="text" id="zipcode" name="zipcode"  >
    <div id="error-message" style="display: none; color: #f55;"></div>
    <div class="input_boxe">
    <label class="decaler" for="city">Ville : </label>
    <select class="form-control" id="city" placeholder="Ville" name="city"></select>
    </div>
    </div>
    <div class="input_boxe">

    <label class="decaler" for="tel">Téléphone : </label>
    <input class="decaler" type="text" id="tel">

    <label class="decaler" for="email">E-mail : </label>
    <input class="decaler" type="mail" id="email">
    </div>
    
</div>

    <label for="statue">Statue : </label>
    <select class="form-control" name="statue" id="statut"  >
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
    <input type="radio" id="enfant_oui" name="enfant" onclick="hideshowkid(1)">
    <label for="enfant_oui">oui</label>


    <input type="radio" id="enfant_non" name="enfant" onclick="hideshowkid(2)">
    <label for="enfant_non">non</label>
    <div id="enfant_naissance" class="input_boxe">
    <!--    Si oui    -->
    <label for="nombre_enfant">Nombre d'enfants à charge : </label>
    <input type="text" id="nombre_enfant">
    <label for="date_naissance_enfant">Date de naissance</label>
    <input type="date">
    </div>
    <!--    Si non (rien)    -->

    <!--    
        Nature des revenus  ---------------------------------------------------------------
    -->
    <div class="input_boxe">
    <label for="revenus">Nature des revenus : </label>
    <select class="form-control" name="revenus" id="revenus" onchange="hideshowautre()">
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
    <input type="text">
    </div>
    </div>
    <!--    
        Pôle emplois  --------------------------------------------------------------------
    -->
    <label for="pole_emploie">Inscrit à pôle emplois : </label>
    <input type="radio" id="pole_oui" name="pole_emplois" onclick="showhideemplois(1)">
    <label for="pole_oui">oui</label>
    <input type="radio" id="pole_non" name="pole_emplois" onclick="showhideemplois(2)">
    <label for="pole_non">non</label>
    <!--    Si oui    -->
    <div class="input_boxe">
        <div id="pole_emplois">
    <label id="inscri_emplois" for="date_inscription_pole_emplois">Date d'inscription au pôle emplois : </label>
    <input id="input_inscri_emplois" type="date" id="date_inscription_pole_emplois">
    <div class="input_boxe">
    <label id="ref" for="nom_ref">Nom du référent</label>
    <input id="input_ref" type="text" id="nom_ref">
    </div>
</div>
    <!--    Si non    -->
    <div id="date_rea2">
    <label for="date_r2">Date de réalisation : </label>
    <input type="date" id="date_r2">
    </div>
</div>
    <!--    
        Mission local   -------------------------------------------------------------------
    -->
    <label for="local">Inscrit à la mission local : </label>
    <input type="radio" id="mission_oui" name="mission" onclick="showhidemission(1)">
    <label for="mission_oui">oui</label>
    <input type="radio" id="mission_non" name="mission" onclick="showhidemission(2)">
    <label for="mission_non">non</label>
    <!--    Si oui    -->
<div id="date_rea3">
    <div class="input_boxe">
    <label for="date_r3">Date de réalisation : </label>
    <input id="input_date_rea3" type="date" id="date_r3">
</div>
    </div>
    <div id="mission">
    <div class="input_boxe">
    <label id="ref_m" for="ref_mission">Nom du référent de la mission locale pour l'emplois : </label>
    <input type="text" id="ref_mission">
         <div class="input_boxe">
    <label id="datem" for="date_mission">Date d'inscription : </label>
    <input id="input_datem" type="date" id="date_mission">
</div>
    <!--    Si non    -->

    </div>
</div>
    <!--    
        CAP emplois  ----------------------------------------------------------------------
    -->
    <div>
    <label for="cap">Inscrit à CAP emplois : </label>
    
    <input type="radio" id="cap_oui" name="cap_emplois" onclick="showhidecap(1)">
    <label for="cap_oui">oui</label>
    <input type="radio" id="cap_non" name="cap_emplois" onclick="showhidecap(2)">
    <label for="cap_oui">non</label>
    </div>
    <!--    Si oui   -->
    <div class="input_boxe">
    <div id="cap">
    <label for="date_inscription_cap_emplois">Date d'inscription au CAP emplois : </label>
    <input type="date" id="date_inscription_cap_emplois">
    <label for="nom_ref2">Nom du référent : </label>
    <input type="text" id="nom_ref2">
    </div>
    <!--    Si non    -->
    <div id="date_rea4">
    <label for="date_r4">Date de réalisation : </label>
    <input type="date" id="date_r4">
    </div>
    </div>
    <!--    
        CV  -------------------------------------------------------------------------------
    -->
    <label for="cv_inscrit">CV disponible : </label>
    <input type="radio" id="cv_oui" name="cv_inscrit" onclick="showhidecv(1)">
    <label for="cv_oui">oui</label>
    <input type="radio" id="cv_non" name="cv_inscrit" onclick="showhidecv(2)">
    <label for="cv_non">non</label>
    <div class="input_boxe">
    <!--    Si oui   -->
</div>
<div id="cv">
    <label for="pdfFile">Insérer le cv scanné (format PDF uniquement) : </label> 
    <input type="file" id="pdfFile" name="pdfFile" accept="cv/pdf">
    <input type="submit" value="Envoyer">
</div>
    <!--    Si non   -->
    <div id="date_cv">
    <div class="input_boxe">
    <label for="date_cv">Date programmé pour travailler le CV : </label>
    <input type="date">
    </div>
    </div>

    <!--    
        Permis de conduire  ---------------------------------------------------------------
    -->
    <div class="input_boxe">
    <label for="permis">Permis : </label>
    <select class="form-control" name="permis" id="permis" onchange="hideshowpermis()">
        <option value="rien" id="rien">-- Selectionner une option --</option>
        <option value="motos1" id="motos1">Permis motos</option>
        <option value="auto1" id="auto1">Permis auto</option>
        <option value="march1" id="march1">Permis marchandises ou de personnes</option>
        <option value="aucun" id="aucun" >aucun</option>
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
    <select class="form-control" name="aut">
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
    <input type="radio" id="vehicule_oui" name="vehicule" onclick="showhideachat(1)">
    <label for="vehicule_oui">oui</label>
    <input type="radio" id="vehicule_non" name="vehicule" onclick="showhideachat(2)">
    <label for="vehicule_non">non</label>
    <!--    Si oui (rien)  -->

    <!--    Si non   -->
<div id="achat1">
    <div class="input_boxe">
    <label for="achat_vehicule">Achat prévu d'un véhicule ?</label>
    </div>
    <input type="radio" id="achat_oui" name="achat_vehicule">
    <label for="achat_oui">oui</label>
    <input type="radio" id="achat_non" name="achat_vehicule">
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
    <select class="form-control" name="dipl" id="dipl" onchange="hideshowdipl()">
        <option value="rien">-- Selectionner une option --</option>
        <option value="aucun">aucun diplôme</option>
        <option value="cap">CAP</option>
        <option value="bep">BEP</option>
        <option value="bac">BAC</option>
        <option value="bac+2">BAC +2</option>
        <option value="licence">Licence</option>
        <option value="master1">Master 1</option>
        <option value="master2">Master 2</option>
        <option value="autre">Autre</option>
    </select>
    <!--    Si autre   -->
    <div id="rens_dipl">
    <label for="dipl_autre">Renseigner le diplôme : </label>
    <input type="text" id="dipl_autre">
 
    <!--    Si aucun   -->

    <label for="dipl_aucun">Nombre d'années d'études : </label>
    <input type="text" id="dipl_aucun">
   </div>
   <div id="niveau">
    <label for="dipl_niveau">Renseigner le niveau : </label>
    <input type="text" id="dipl_niveau">
</div>
</div>
<hr>
    <!--    
        Connaissance de la langue française  ----------------------------------------------
    -->
    <div class="input_boxe">
    <label for="efrancais">Connaissance de la langue française (écrite) : </label>
    <select class="form-control" name="efrancais" id="efrancais">
        <option value="rien">-- Selectionner une option --</option>
        <option value="e1">1</option>
        <option value="e2">2</option>
        <option value="e3">3</option>
        <option value="e4">4</option>
        <option value="e5">5</option>
    </select>
    </div>
    <label for="pfrancais">Connaissance de la langue française (parlée) : </label>
    <select class="form-control" name="pfrancais" id="pfrancais">
        <option value="rien">-- Selectionner une option --</option>
        <option value="p1">1</option>
        <option value="p2">2</option>
        <option value="p3">3</option>
        <option value="p4">4</option>
        <option value="p5">5</option>
    </select>
    <div>
    <label for="lfrancais">Connaissance de la langue française (Lue) : </label>
    <select class="form-control" name="lfrancais" id="lfrancais">
        <option class="form-control" value="rien">-- Selectionner une option --</option>
        <option value="l1">1</option>
        <option value="l2">2</option>
        <option value="l3">3</option>
        <option value="l4">4</option>
        <option value="l5">5</option>
    </select>
    </div>
    <hr>
    <!--    
        Emplois précédemment occupés (si pas de cv)  ---------------------------------------
    -->

    <h2 class="emplois_prec">Emplois précédemment occupés : </h2>
    <textarea class="form-control" name="empl_occ" id="empl_occ"></textarea>
    </div>
    <!--    
        Organismes contactés et resultats  -----------------------------------------------------------------
    -->
    <div class="orga">
    <hr>
    <h2 class="org">Organismes contactés et résultats : </h2>
    <textarea class="form-control" name="org" id="org"></textarea>
    </div>
    <!--    
        Entreprises contactés et resultats  -----------------------------------------------------------------
    -->
    <div class="entr_c">
    <hr>
    <h2 class="entr">Entreprises contactés et résultats : </h2>
    <textarea class="form-control" name="entr" id="entr"></textarea>
    </div>
    <!--    
        Projet professionel de la personne  ------------------------------------------------
    -->
    <hr>
    <div>
    <label for="reconv">Reconversion professionelle :</label>
    <input type="radio" id="oui_reconv" name="reconv" onclick="showhidereconv(1)">
    <label for="oui_reconv">oui</label>
    <input type="radio" id="non_reconv" name="reconv" onclick="showhidereconv(2)">
    <label for="non_reconv">non</label>
    </div>
    <!--    Si non (rien)   -->

    <!--    
        Formation prévues  -----------------------------------------------------------------
    -->
    <!--    Si oui   -->
    <div id="formati">
    <label for="form_prevue">Formation prévues ?</label>
    <input type="radio" id="oui_form" name="form_prevue" onclick="showhideformp(1)">
    <label for="oui_form">oui</label>
    <input type="radio" id="non_form" name="form_prevue" onclick="showhideformp(2)">
    <label for="non_form">non</label>
    </div>
    <!--    Si non (rien)   -->
    
    <!--    Si oui   -->
    <div class="input_boxe" id="renseign">
    <label for="form_nom">Renseigner le nom : </label>
    <input type="text" id="form_nom">
    <label for="form_date">Renseigner la date : </label>
    <input type="date" id="form_date">
    <label for="form_duree">Renseigner la durée : </label>
    <input type="text" id="form_duree">
    </div>
    
    <!--    
        Reprise d'étude  ------------------------------------------------------------------
    -->
    <label for="etude">Reprise d'étude ?</label>
    <input type="radio" id="oui_etude" name="etude" onclick="showhidereprise(1)">
    <label for="oui_etude">oui</label>
    <input type="radio" id="non_etude" name="etude" onclick="showhidereprise(2)">
    <label for="non_etude">non</label>
    <!--    Si oui   -->
    <div class="input_boxe" id="dipl_prep">
    <label for="dipl_prepa">Diplôme préparé : </label>
    <input type="text" id="dipl_prepa">
    </div>
    <!--    
        bénéficier formation pro  ------------------------------------------------------------------
    -->
    <div>
    <label for="form_pro">La personne va-t-elle bénéficier d'une formation professionelle ?</label>
    <input type="radio" id="form_pro_oui" name="form_pro" onclick="showhideformpro(1)">
    <label for="form_pro_oui">oui</label>
    <input type="radio" id="form_pro_non" name="form_pro" onclick="showhideformpro(2)">
    <label for="form_pro_non">non</label>
    </div>
    <!--    Si non (rien)   -->

    <!--    Si oui   -->
    <div class="input_boxe" id="oui_formpro">
    <label for="form_type">Type de formation : </label>
    <select class="form-control" name="form_type" id="form_type" onchange="hideshowformqd()">
        <option value="rien">-- Selectionner une option --</option>
        <option value="qualfiante">Formation qualifiante</option>
        <option value="diplomante">Formation diplômante</option>
    </select>
    </div>
    <!--    Si qualifiante   -->
    <div class="input_boxe" id="if_qual">
    <label for="nom_form">Nom de la formation : </label>
    <input type="text" id="nom_form">
    </div>
    <!--    Si diplômante   -->
    <div class="input_boxe" id="if_dipl">
    <label for="nom_diplo">Nom du diplôme : </label>
    <input type="text" id="nom_diplo">
    </div>
    <div class="input_boxe">
    <label for="metier_s">Métier souhaité : </label>
    <input type="text" id="metier_s">

    <label for="secteur_act">Secteur d'activité : </label>
    <input type="text" id="secteur_act">

    <label for="secteur_geo">Secteur géographique souhaité</label>
    <input type="text" id="secteur_geo">
    </div>

    <label for="horaire">Horaire de travail souhaité : </label>
    <select class="form-control" name="horaire" id="horaire">
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
    
<div class="off">
        <!--    
        Plan d'action   ------------------------------------------------------------------

        -->












    <!--   Après cloture du plan d'action   -->
    <label for="situat_pro">Situation professionel après la cloture du plan d'action : </label>
    <select class="form-control" name="situat_pro" id="situat_pro">
        <option value="rien">-- Selectionner une option --</option>
        <option value="cdi">C.D.I</option>
        <option value="cdd">C.D.D</option>
        <option value="formation">Formation</option>
        <option value="stage">Stage d'immersion</option>
        <option value="abandon">Abandon du plan d'action</option>
        <option value="non_retour">Non-retour à l'emploi</option>
        <option value="autre_s">Autre situation</option>
    </select>
    <!--   Si cdi   -->
    <label for="type_post">Poste occupé : </label>
    <input type="text" id="type_post">
    <label for="duree_hebdo">Durée hebdomadaire : </label>
    <input type="text" id="duree_hebdo">
    <label for="nom_societe">Nom de la société : </label>
    <input type="text" id="nom_societe">
    <label for="help_emploi">Emploi aidé : </label>
    <input type="radio" id="help_oui" name="help_emploi">
    <label for="help_oui">oui</label>
    <input type="radio" id="help_non" name="help_emploi">
    <label for="help_non">non</label>
    <!--   Si cdd   -->
    <label for="type_post2">Poste occupé : </label>
    <input type="text" id="type_post2">
    <label for="duree_hebdo2">Durée hebdomadaire : </label>
    <input type="text" id="duree_hebdo2">
    <label for="nom_societe2">Nom de la société : </label>
    <input type="text" id="nom_societe2">
    <label for="help_emploi2">Emploi aidé : </label>
    <input type="radio" id="help_oui2" name="help_emploi2">
    <label for="help_oui2">oui</label>
    <input type="radio" id="help_non2" name="help_emploi2">
    <label for="help_non2">non</label>
    <!--   Si formation   -->
    <select class="form-control" name="form_type1" id="form_type1">
        <option value="rien">-- Selectionner une option --</option>
        <option value="qualfiante1">Formation qualifiante</option>
        <option value="diplomante1">Formation diplômante</option>
    </select>
    <!--   Si stage   -->
    <label for="type_post2">Nom du stage : </label>
    <input type="text" id="type_post3">
    <label for="duree_hebdo3">Durée : </label>
    <input type="text" id="duree_hebdo3">
    <label for="nom_societe3">Nom de l'organisme : </label>
    <input type="text" id="nom_societe3">
    <!--   Si abandon   -->
    <label for="abandon_raison">Raison de l'abandon : </label>
    <input type="text" id="abandon_raison">
    <!--   Si non retour emploi   -->
    <label for="non_empl">Raison : </label>
    <input type="text" id="non_empl">
    <!--   Si autre   -->
    <label for="autre_situ">Expliquez : </label>
    <input type="text" id="autre_situ">
</form>
</div>
</div>