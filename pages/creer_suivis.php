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

    <label for="pole_emploie">Inscrite à pôle emplois : </label>
    <input type="radio" id="pole_oui" name="pole_emplois">
    <label for="pole_oui">oui</label>
    <input type="radio" id="pole_non" name="pole_emplois">
    <label for="pole_non">non</label>
    <!--    Si oui    -->
    <label for="date_inscription_pole_emplois">Date d'inscription au pôle emplois : </label>
    <input type="text" id="date_inscription_pole_emplois">
    <!--    Si non    -->
    <label for="date_r2">Date de réalisation : </label>
    <input type="date" id="date_r2">
    <!--    Si moins de 26 ans    -->
    <label for="local">Inscrite à la mission local : </label>
    <input type="radio" id="mission_oui" name="mission">
    <label for="mission_oui">oui</label>
    <input type="radio" id="mission_non" name="mission">
    <label for="mission_non">non</label>
    <!--    Si oui    -->
    <label for="ref_mission">Nom du référent de la mission locale pour l'emplois</label>
    <input type="text" id="ref_mission">
    <label for="date_mission">Date d'inscription : </label>
    <input type="date" id="date_mission">
    <!--    Si non (rien)    -->

</form>
</div>