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
    <label for="accompagnateur">Accompagnateur SRE : </label>
    <select name="accompagnateur" id="accompagnateur" required>
        <option value="rien2"> -- Veuillez selectionner un accompagnateur -- </option>
    </select>
    <!--    Information personnelles    -->
    <label for="civilite">Civilité : </label>
    <select name="civilite" id="civilite" required>
        <option value="rien2">-- Veuillez selectionner une option --</option>
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
    <input type="text" disabled>

    </form>
</div>