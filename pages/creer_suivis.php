<style>

</style>
<div class="addsuivis">
    <form>
    <!--    Information personnelles    -->
    <label for="dcontact">Date du contact : </label>
    <input type="date" id="dcontact" required>
    <label for="ocontact">Origine du contact : </label>
    <input type="text" name="ocontact" id="ocontact" required>
    <label for="inscrit">Inscrit aux resto du coeur : </label>
    <select name="inscrit" id="inscrit" required>
        <option value="rien"> -- Veuillez selectionner une option -- </option>
        <option value="oui">oui</option>
        <option value="non">non</option>
    </select>
    <!--    Si oui   -->
    <label for="num">N° : </label>
    <input type="text" id="num">
    <label for="centre">Centre : </label>
    <input type="text" id="centre">
    <!--    Si non    -->
    <label for="date_r">Date de réalisation : </label>
    <input type="date" id="date_r">

    <label for="accompagnateur">Accompagnateur SRE : </label>
    <select name="accompagnateur" id="accompagnateur" required>
        <option value="rien"> -- Veuillez selectionner un accompagnateur -- </option>
    </select>
    <!--    
        Information personnelles : Coordonnées de la personne accueillie
    -->
    <label for="civilite">Civilité : </label>
    <select name="civilite" id="civilite" required>
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="madame">Madame</option>
        <option value="mademoiselle">Mademoiselle</option>
        <option value="monsieur">Monsieur</option>
    </select>
    <label for="nom">Nom : </label>
    <input type="text" id="nom" required>
    <label for="prenom">Prénom : </label>
    <input type="text" id="prenom" required>
    <label for="birth">Date de naissance : </label>
    <input type="date" id="birth" required>
    <label for="age">Age : </label>
    <input type="text" disabled id="age">
    <label for="nationalite">Nationalité : </label>
    <?php
    include('pays.php')
    ?>
        <label for="adresse">Adresse : </label>
    <input type="text" required>
    <label for="postal">Code Postal : </label>
    <input type="text" id="postal" required>
    <label for="ville">Ville : </label>
    <input type="text" id="ville" required>
    <label for="tel">Téléphone : </label>
    <input type="text" id="tel">
    <label for="email">E-mail : </label>
    <input type="mail" id="email">
    <!--    Situation personnelle    -->
    <label for="statue">Statue : </label>
    <select name="statue" id="statut" required>
        <option value="rien">-- Veuillez selectionner un statut --</option>
        <option value="celibataire">Célibataire</option>
        <option value="marie">Marié(e)</option>
        <option value="divorce">Concubin(e)</option>
        <option value="veuf">Veuf(ve)</option>
        <option value="pacse">Pacsé(e)</option>
    </select>
    <!--    
        Enfants à charge  ------------------------------------------------------------------
    -->
    <label>Enfants à charge : </label>
    <input type="radio" id="enfant_oui" name="enfant">
    <label for="enfant_oui">Oui</label>
    <label for="enfant_non">Non</label>
    <input type="radio" id="enfant_non" name="enfant">
    <!--    Si oui    -->
    <label for="nombre_enfant">Nombre d'enfants à charge : </label>
    <input type="text" id="nombre_enfant">
    <label for="date_naissance_enfant">Date de naissance</label>
    <input type="date">
    <!--    Si non (rien)    -->

    <!--    
        Nature des revenus  ---------------------------------------------------------------
    -->
    <label for="revenus">Nature des revenus : </label>
    <select name="revenus" id="revenus">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="salaire">Salaire</option>
        <option value="RSA">RSA</option>
        <option value="ARE">ARE</option>
        <option value="AAH">AAH</option>
        <option value="retraite">Pension de retraite</option>
        <option value="autre">Autre</option>
        <option value="aucun">Aucun</option>
    </select>
    <!--    Si "autre"    -->
    <label for="preciser">Préciser : </label>
    <input type="text" id="preciser">
    <!--    
        Pôle emplois  --------------------------------------------------------------------
    -->
    <label for="pole_emploie">Inscrit à pôle emplois : </label>
    <input type="radio" id="pole_oui" name="pole_emplois">
    <label for="pole_oui">oui</label>
    <input type="radio" id="pole_non" name="pole_emplois">
    <label for="pole_non">non</label>
    <!--    Si oui    -->
    <label for="date_inscription_pole_emplois">Date d'inscription au pôle emplois : </label>
    <input type="text" id="date_inscription_pole_emplois">
    <label for="nom_ref">Nom du référent</label>
    <input type="text" id="nom_ref">
    <!--    Si non    -->
    <label for="date_r2">Date de réalisation : </label>
    <input type="date" id="date_r2">
    <!--    
        Mission local   -------------------------------------------------------------------
    -->
    <label for="local">Inscrit à la mission local : </label>
    <input type="radio" id="mission_oui" name="mission">
    <label for="mission_oui">oui</label>
    <input type="radio" id="mission_non" name="mission">
    <label for="mission_non">non</label>
    <!--    Si oui    -->
    <label for="ref_mission">Nom du référent de la mission locale pour l'emplois</label>
    <input type="text" id="ref_mission">
    <label for="date_mission">Date d'inscription : </label>
    <input type="date" id="date_mission">
    <!--    Si non    -->
    <label for="date_r3">Date de réalisation : </label>
    <input type="date" id="date_r3">
    <!--    
        CAP emplois  ----------------------------------------------------------------------
    -->
    <label for="cap">Inscrit à CAP emplois : </label>
    <input type="radio" id="cap_oui" name="cap_emplois">
    <label for="cap_oui">oui</label>
    <input type="radio" id="cap_non" name="cap_emplois">
    <label for="cap_oui">non</label>
    <!--    Si oui   -->
    <label for="date_inscription_cap_emplois">Date d'inscription au CAP emplois : </label>
    <input type="text" id="date_inscription_cap_emplois">
    <label for="nom_ref2">Nom du référent</label>
    <input type="text" id="nom_ref2">
    <!--    Si non    -->
    <label for="date_r4">Date de réalisation : </label>
    <input type="date" id="date_r4">
    <!--    
        CV  -------------------------------------------------------------------------------
    -->
    <label for="cv_inscrit">CV disponible : </label>
    <input type="radio" id="cv_oui" name="cv_inscrit">
    <label for="cv_oui">oui</label>
    <input type="radio" id="cv_non" name="cv_inscrit">
    <label for="cv_non">non</label>
    <!--    Si oui   -->
    <label for="cv">Insérer le cv scanné (format PDF uniquement) : </label>
    <input type="file" id="cv" name="cv" accept="cv/pdf">
    <!--    Si non   -->
    <label for="date_cv">Date programmé pour travailler le CV : </label>
    <input type="date" id="date_cv">
    <!--    
        Permis de conduire  ---------------------------------------------------------------
    -->
    <label for="permis">Permis : </label>
    <select name="permis" id="permis">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="motos">Permis motos</option>
        <option value="auto">Permis auto</option>
        <option value="march">Permis marchandises ou de personnes</option>
        <option value="aucun">aucun</option>
    </select>
    <!--    Si motos   -->
    <label for="moto">Permis motos : </label>
    <select name="moto" id="moto">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="a">A</option>
        <option value="a1">A1</option>
        <option value="a2">A2</option>
    </select>
    <!--    Si auto   -->
    <label for="aut">Permis autos : </label>
    <select name="aut" id="aut">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="b">B</option>
        <option value="b1">B1</option>
        <option value="be">BE</option>
    </select>
    <!--    Si march   -->
    <label for="marchandise">Permis pour le transport de marchandises ou de personnes : </label>
    <select name="marchandise" id="marchandise">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="c">C</option>
        <option value="ce">CE</option>
        <option value="c1">C1</option>
        <option value="c1e">C1E</option>
        <option value="d">D</option>
        <option value="de">DE</option>
        <option value="d1">D1</option>
        <option value="d1e">D1E</option>
    </select>
    <!--    
        Véhicule disponible  -------------------------------------------------------------
    -->
    <label for="vehicule">Véhicule disponible : </label>
    <input type="radio" id="vehicule_oui" name="vehicule">
    <label for="vehicule_oui">oui</label>
    <input type="radio" id="vehicule_non" name="vehicule">
    <label for="vehicule_non">non</label>
    <!--    Si oui (rien)  -->

    <!--    Si non   -->
    <label for="achat_vehicule">Achat prévu d'un véhicule ?</label>
    <input type="radio" id="achat_oui" name="achat_vehicule">
    <label for="achat_oui">oui</label>
    <input type="radio" id="achat_non" name="achat_vehicule">
    <label for="achat_non">non</label>
    <!--    
        Diplome  -------------------------------------------------------------------------
    -->
    <label for="dipl">Diplôme obtenus</label>
    <select name="dipl" id="dipl">
        <option value="rien">-- Veuillez selectionner une option --</option>
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
    <label for="dipl_autre">Renseigner le nom : </label>
    <input type="text" id="dipl_autre">
    <!--    Si aucun   -->
    <label for="dipl_aucun">Nombre d'années d'études</label>
    <input type="text" id="dipl_aucun">
    <label for="dipl_niveau">Renseigner le niveau : </label>
    <input type="text" id="dipl_niveau">
    <!--    
        Connaissance de la langue française  ----------------------------------------------
    -->
    <label for="efrancais">Connaissance de la langue française (écrite) : </label>
    <select name="efrancais" id="efrancais">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="e1">1</option>
        <option value="e2">2</option>
        <option value="e3">3</option>
        <option value="e4">4</option>
        <option value="e5">5</option>
    </select>
    <label for="pfrancais">Connaissance de la langue française (parlée) : </label>
    <select name="pfrancais" id="pfrancais">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="p1">1</option>
        <option value="p2">2</option>
        <option value="p3">3</option>
        <option value="p4">4</option>
        <option value="p5">5</option>
    </select>
    <label for="lfrancais">Connaissance de la langue française (Lue) : </label>
    <select name="lfrancais" id="lfrancais">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="l1">1</option>
        <option value="l2">2</option>
        <option value="l3">3</option>
        <option value="l4">4</option>
        <option value="l5">5</option>
    </select>
    <!--    
        Emplois précédemment occupés (si pas de cv)  ---------------------------------------
    -->
    <label for="empl_occ">Emplois précédemment occupés : </label>
    <textarea name="empl_occ" id="empl_occ" cols="50" rows="3"></textarea>
    <!--    
        Projet professionel de la personne  ------------------------------------------------
    -->
    <label for="reconv">Reconversion professionelle ?</label>
    <input type="radio" id="oui_reconv" name="reconv">
    <label for="oui_reconv">oui</label>
    <input type="radio" id="non_reconv" name="reconv">
    <label for="non_reconv">non</label>
    <!--    Si non (rien)   -->

    <!--    
        Formation prévues  -----------------------------------------------------------------
    -->
    <!--    Si oui   -->
    <label for="form_prevue">Formation prévues ?</label>
    <input type="radio" id="oui_form" name="form_prevue">
    <label for="oui_form">oui</label>
    <input type="radio" id="non_form" name="form_prevue">
    <label for="non_form">non</label>
    <!--    Si non (rien)   -->
    
    <!--    Si oui   -->
    <label for="form_nom">Renseigner le nom : </label>
    <input type="text" id="form_nom">
    <label for="form_date">Renseigner la date : </label>
    <input type="date" id="form_date">
    <label for="form_duree">Renseigner la durée : </label>
    <input type="text" id="form_duree">
    <!--    
        Reprise d'étude  ------------------------------------------------------------------
    -->
    <label for="etude">Reprise d'étude ?</label>
    <input type="radio" id="oui_etude" name="etude">
    <label for="oui_etude">oui</label>
    <input type="radio" id="non_etude" name="etude">
    <label for="non_etude">non</label>
    <!--    Si oui   -->
    <label for="dipl_prep">Diplôme préparé : </label>
    <input type="text" id="dipl_prep">
    <!--    
        bénéficier formation pro  ------------------------------------------------------------------
    -->
    <label for="form_pro">La personne va-t-elle bénéficier d'une formation professionelle ?</label>
    <input type="radio" id="form_pro_oui" name="form_pro">
    <label for="form_pro_oui">oui</label>
    <input type="radio" id="form_pro_non" name="form_pro">
    <label for="form_pro_non">non</label>
    <!--    Si non (rien)   -->

    <!--    Si oui   -->
    <select name="form_type" id="form_type">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="qualfiante">Formation qualifiante</option>
        <option value="diplomante">Formation diplômante</option>
    </select>
    <!--    Si qualifiante   -->
    <label for="nom_form">Nom de la formation : </label>
    <input type="text" id="nom_form">
    <!--    Si diplômante   -->
    <label for="nom_diplo">Nom du diplôme : </label>
    <input type="text" id="nom_diplo">

    <label for="metier_s">Métier souhaité : </label>
    <input type="text" id="metier_s">

    <label for="secteur_act">Secteur d'activité : </label>
    <input type="text" id="secteur_act">

    <label for="secteur_geo">Secteur géographique souhaité</label>
    <input type="text" id="secteur_geo">

    <label for="horaire">Horaire de travail souhaité : </label>
    <select name="horaire" id="horaire">
        <option value="rien">-- Veuillez selectionner une option --</option>
        <option value="jour">Travail la journée</option>
        <option value="matin">Travail le matin</option>
        <option value="nuit">Travail de nuit</option>
        <option value="2x8">Travail en cycle 2x8</option>
        <option value="3x8">Travail en cycle 3x8</option>
        <option value="5x8">Travail en cycle 5x8</option>
        <option value="VSD">Travail en VSD</option>
        <option value="SD">Travail en SD</option>
    </select>
        <!--    
        Plan d'action   ------------------------------------------------------------------

        -->












    <!--   Après cloture du plan d'action   -->
    <label for="situat_pro">Situation professionel après la cloture du plan d'action : </label>
    <select name="situat_pro" id="situat_pro">
        <option value="rien">-- Veuillez selectionner une option --</option>
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
    <select name="form_type1" id="form_type1">
        <option value="rien">-- Veuillez selectionner une option --</option>
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