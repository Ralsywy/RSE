<?php
    // création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    // ordre de mission
    $requete = $mysqlConnection->prepare("SELECT * FROM plan_action");
    //execution de la requete
    $requete->execute();
    $plans = $requete->fetchAll();
    $mysqlConnection = null;
    $requete = null;
    ?>
<div class="addsuivis">
    <h2 class="plan_act">Plan d'action</h2>
    <hr>
<div class="tableau" id="tabl">
    <table class="table" id="monTableau">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Actions à mener</th>
            <th scope="col">Objectifs</th>
            <th scope="col">Moyens mis en oeuvre</th>
            <th scope="col">échéance</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form action="index.php?route=store_plan" method="post" id="plan_act">
                <td></td>
                <td><input type="text" id="action_menee" name="action_menee"></td>
                <td><input type="text" id="objectif" name="objectif"></td>
                <td><input type="text" id="moyen_oeuvre" name="moyen_oeuvre"></td>
                <td><input type="date" id="echeance" name="echeance"></td>
                <td><button type="submit" class="btn_modifier">Ajouter</button></td>
            </form>
        </tr>
        <?php
        foreach ($plans as $ligne){
        ?>
            <tr>
                <td><?= $ligne["id_plan_action"]?></td>
                <td><?= $ligne["action_menee"]?></td>
                <td><?= $ligne["objectif"]?></td>
                <td><?= $ligne["moyen_oeuvre"]?></td>
                <td><?= $ligne["echeance"]?></td>
                <td><a href="index.php?route=delete_plan&id=<?= $ligne["id_plan_action"] ?>"><button class="btn_modifier" id="suppr_creer">Supprimer</button></a></td>
            </tr>
        <?php
        }?>
    </tbody>
    </table>
    </div>
        <hr>
    <div class="after_plan">
        <form action="method">
        <label for="situat_pro">Situation professionel après la cloture du plan d'action : </label>
        <select class="form-control" name="situat_pro" id="situat_pro" onchange="hideshowsituationpro()">
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
        <div id="cdi">
        <div class="input_boxe">
        <label for="type_post">Poste occupé : </label>
        <input type="text" id="type_post">
        <label for="duree_hebdo">Durée hebdomadaire : </label>
        <input type="text" id="duree_hebdo">
        <label for="nom_societe">Nom de la société : </label>
        <input type="text" id="nom_societe">
        </div>
        <label for="help_emploi">Emploi aidé : </label>
        <input type="radio" id="help_oui" name="help_emploi">
        <label for="help_oui">oui</label>
        <input type="radio" id="help_non" name="help_emploi">
        <label for="help_non">non</label>
        </div>
        <!--   Si cdd   -->
        <div id="cdd">
        <div class="input_boxe">
        <label for="type_post2">Poste occupé : </label>
        <input type="text" id="type_post2">
        <label for="duree_hebdo2">Durée hebdomadaire : </label>
        <input type="text" id="duree_hebdo2">
        <label for="nom_societe2">Nom de la société : </label>
        <input type="text" id="nom_societe2">
        </div>
        <label for="help_emploi2">Emploi aidé : </label>
        <input type="radio" id="help_oui2" name="help_emploi2">
        <label for="help_oui2">oui</label>
        <input type="radio" id="help_non2" name="help_emploi2">
        <label for="help_non2">non</label>
        </div>
        <!--   Si formation   -->
        <div id="formation">
        <select class="form-control" name="form_type1" id="form_type1">
            <option value="rien">-- Selectionner une option --</option>
            <option value="qualfiante1">Formation qualifiante</option>
            <option value="diplomante1">Formation diplômante</option>
        </select>
        </div>
        <!--   Si stage   -->
        <div id="stage">
        <div class="input_boxe">
        <label for="type_post2">Nom du stage : </label>
        <input type="text" id="type_post3">
        <label for="duree_hebdo3">Durée : </label>
        <input type="text" id="duree_hebdo3">
        <label for="nom_societe3">Nom de l'organisme : </label>
        <input type="text" id="nom_societe3">
        </div>
        </div>
        <!--   Si abandon   -->
        <div id="abandon">
        <div class="input_boxe">
        <label for="abandon_raison">Raison de l'abandon : </label>
        <input type="text" id="abandon_raison">
        </div>
        </div>
        <!--   Si non retour emploi   -->
        <div id="nonret">
        <div class="input_boxe">
        <label for="non_empl">Raison : </label>
        <input type="text" id="non_empl">
        </div>
        </div>
        <!--   Si autre   -->
        <div id="siautre">
        <div class="input_boxe">
        <label for="autre_situ">Expliquez : </label>
        <input type="text" id="autre_situ">
        </div>
        </div>
        </form>
        </div>
    </div>