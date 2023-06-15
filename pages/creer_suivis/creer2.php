<?php
if (isset($_SESSION["login"])){
    // création de le lien entre serv web et serv bd
    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM rdv where fk_id_inscrit_rdv=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $rdv = $requete->fetchAll();

    $requete = null;
    ?>
<div class="addsuivis">
<h2 class="plan_act">Suivi du plan d'actions</h2>
<div class="tableau" id="tabl">
    <table class="table" id="monTableau">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Actions à mener</th>
            <th scope="col">Objectifs</th>
            <th scope="col">Moyens mis en oeuvre</th>
            <th scope="col">Echeance</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form method="post" id="plan_act" action="index.php?route=store_plan&id=<?=$_GET["id"]?>">
                <td></td>
                <td><input type="text" class="form-control" id="action_menee" name="action_menee"></td>
                <td><input type="text" class="form-control" id="objectif" name="objectif"></td>
                <td><input type="text" class="form-control" id="moyen_oeuvre" name="moyen_oeuvre"></td>
                <td><input type="date" id="echeance" name="echeance"></td>
                <td><button type="submit" class="btn_modifier">Ajouter</button></td>
            </form>
        </tr>
     <!--
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="acti"></td>
                <td><a href="index.php?route=delete_plan&id="><button class="btn_modifier" id="suppr_creer">Supprimer</button></a></td>
            </tr>
    -->
    </tbody>
    </table>
    </div>
           <hr> 
    <h2 class="plan_act">Suivi des rendez-vous</h2>

<div class="tableau" id="tabl">
    <table class="table" id="monTableau">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form method="post" id="plan_act" action="index.php?route=store_rdv&id=<?=$_GET["id"]?>">
                <td></td>
                <td><input type="date" id="rdv" name="rdv"></td>
                <td><textarea class="form-control" id="context" name="context"></textarea></td>
                <td><button type="submit" class="btn_modifier">Ajouter</button></td>
            </form>
        </tr>
        <?php
        foreach ($rdv as $ligne){
        ?>
            <tr>
                <td><?= $ligne["id_rdv"]?></td>
                <td><?= $ligne["rdv"]?></td>
                <td class="acti"><?= $ligne["context"]?></td>
                <td><a href="index.php?route=delete_rdv&id=<?= $ligne["id_rdv"] ?>"><button class="btn_modifier" id="suppr_creer">Supprimer</button></a></td>
            </tr>
        <?php
        }?>
    </tbody>
    </table>
    </div>
        <hr>
    <?php
    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM inscrit WHERE id_inscrit=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $info_comp = $requete->fetchAll();
    $requete = null;
    
    foreach($info_comp as $ligne2){

    
    ?>
    <div class="after_plan">
    <form class="form" method="post" action="index.php?route=store_inscrit2&id=<?=$_GET["id"]?>">

        <h2 class="info_cmpl">Informations complémentaires : </h2>
        <textarea class="form-control" name="info_comp" id="empl_occ"><?php echo $ligne2["info_comp"] ?></textarea>
    <?php
    }
    ?>
    <hr>
    <?php
    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM resultat where id_resultat=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);
    $resultat = $requete->fetchAll();
    $requete = null;

    foreach($resultat as $ligne3){
    ?>

        <label for="situat_pro">Situation professionnelle après la clôture du plan d'action : </label>
        <select class="form-control" name="type_formation" id="situat_pro" onchange="hideshowsituationpro()">
            <option value="<?php echo $ligne3["type_formation"] ?>">-- Selectionner une option --</option>
            <option value="cdi" <?php
        if($ligne3["type_formation"]=="cdi"){
            echo "selected";
        }
        ?>>C.D.I</option>
            <option value="cdd" <?php
        if($ligne3["type_formation"]=="cdd"){
            echo "selected";
        }
        ?>>C.D.D</option>
            <option value="formation" <?php
        if($ligne3["type_formation"]=="formation"){
            echo "selected";
        }
        ?>>Formation</option>
            <option value="stage" <?php
        if($ligne3["type_formation"]=="stage"){
            echo "selected";
        }
        ?>>Stage d'immersion</option>
            <option value="abandon" <?php
        if($ligne3["type_formation"]=="abandon"){
            echo "selected";
        }
        ?>>Abandon du plan d'action</option>
            <option value="non_retour"<?php
        if($ligne3["type_formation"]=="non_retour"){
            echo "selected";
        }
        ?>>Non-retour à l'emploi</option>
            <option value="autre_s" <?php
        if($ligne3["type_formation"]=="autre_s"){
            echo "selected";
        }
        ?>>Autre situation</option>
        </select>
        <!--   Si cdi   -->
        <div id="cdi">
        <div class="input_boxe">
        <label for="type_post">Poste occupé : </label>
        <input type="text" id="type_post" name="poste_occupe" value="<?php echo $ligne3["poste_occupe"] ?>">
        <label for="duree_hebdo">Durée hebdomadaire : </label>
        <input type="text" id="duree_hebdo" name="duree_hebdo" value="<?php echo $ligne3["duree_hebdo"] ?>">
        <label for="nom_societe">Nom de la société : </label>
        <input type="text" id="nom_societe" name="nom_societe" value="<?php echo $ligne3["nom_societe"] ?>">
        </div>
        <label for="emploi_aide">Emploi aidé : </label>
        <input type="radio" id="help_oui" name="emploi_aide" value="oui" <?php
        if($ligne3["emploi_aide"]=="oui"){
            echo "checked";
        }
        ?>>
        <label for="help_oui">oui</label>
        
        <input type="radio" id="help_non" name="emploi_aide" value="non" <?php
        if($ligne3["emploi_aide"]=="non"){
            echo "checked";
        }
        ?>>
        <label for="help_non">non</label>
        
        </div>
        <!--   Si cdd   -->
        <div id="cdd">
        <div class="input_boxe">
        <label for="type_post2">Poste occupé : </label>
        <input type="text" id="type_post2" name="poste_occupe_cdd" value="<?php echo $ligne3["poste_occupe_cdd"] ?>">
        <label for="duree_hebdo2">Durée hebdomadaire : </label>
        <input type="text" id="duree_hebdo2" name="duree_hebdo_cdd" value="<?php echo $ligne3["duree_hebdo_cdd"] ?>">
        <label for="nom_societe2">Nom de la société : </label>
        <input type="text" id="nom_societe2" name="nom_societe_cdd" value="<?php echo $ligne3["nom_societe_cdd"] ?>">
        </div>
        <label for="emploi_aide_cdd">Emploi aidé : </label>
        <input type="radio" id="help_oui2" name="emploi_aide_cdd" value="oui" <?php
        if($ligne3["emploi_aide_cdd"]=="oui"){
            echo "checked";
        }
        ?>>
        <label for="help_oui2">oui</label>
        <input type="radio" id="help_non2" name="emploi_aide_cdd" value="non" <?php
        if($ligne3["emploi_aide_cdd"]=="non"){
            echo "checked";
        }
        ?>>
        <label for="help_non2">non</label>
        </div>
        <!--   Si formation   -->
        <div id="formation">
        <label for="form_type1">Type de formation : </label>
        <select class="form-control" name="type_form_after" id="form_type1" onchange="hideshowformqd1()">
            <option value="<?php echo $ligne3["type_form_after"] ?>">-- Selectionner une option --</option>
            <option value="qualifiante1">Formation qualifiante</option>
            <option value="diplomante1">Formation diplômante</option>
        </select>
        </div>
        <!--    Si qualifiante   -->
        <div class="input_boxe" id="if_qual1">
        <div>
        <label for="nom_form">Nom de la formation qualifiante : </label>
        <input type="text" id="nom_form" name="nom_form_qual" value="<?php echo $ligne3["nom_form_qual"] ?>">
        </div>
        <label for="duree_qual">Durée de la formation qualifiante : </label>
        <input type="text" id="duree_qual" name="duree_form_qual" value="<?php echo $ligne3["duree_form_qual"] ?>">
        </div>
        <!--    Si diplômante   -->
        <div class="input_boxe" id="if_dipl1">
        <label for="nom_diplo1">Nom de la formation diplômante : </label>
        <input type="text" id="nom_diplo1" name="nom_form_dipl" value="<?php echo $ligne3["nom_form_dipl"] ?>">
        
        <div class="input_boxe">
        <label for="duree_dipl">Durée de la formation diplômante : </label>
        <input type="text" id="duree_dipl" name="duree_form_dipl" value="<?php echo $ligne3["duree_form_dipl"] ?>">
        </div>
        </div>
        <!--   Si stage   -->
        <div id="stage">
        <div class="input_boxe">
        <label for="type_post2">Nom du stage : </label>
        <input type="text" id="type_post3" name="nom_stage" value="<?php echo $ligne3["nom_stage"] ?>">
        <label for="duree_hebdo3">Durée : </label>
        <input type="text" id="duree_hebdo3" name="duree_stage" value="<?php echo $ligne3["duree_stage"] ?>">
        <label for="nom_societe3">Nom de l'organisme : </label>
        <input type="text" id="nom_societe3" name="nom_org_stage" value="<?php echo $ligne3["nom_org_stage"] ?>">
        </div>
        </div>
        <!--   Si abandon   -->
        <div id="abandon">
        <div class="input_boxe">
        <label for="abandon_raison">Raison de l'abandon : </label>
        <input type="text" id="abandon_raison" name="abandon" value="<?php echo $ligne3["abandon"] ?>">
        </div>
        </div>
        <!--   Si non retour emploi   -->
        <div id="nonret">
        <div class="input_boxe">
        <label for="non_empl">Raison : </label>
        <input type="text" id="non_empl" name="non_retour" value="<?php echo $ligne3["non_retour"] ?>">
        </div>
        </div>
        <!--   Si autre   -->
        <div id="siautre">
        <div class="input_boxe">
        <label for="autre_situ">Expliquez : </label>
        <input type="text" id="autre_situ" name="autre" value="<?php echo $ligne3["autre"] ?>">
        <?php
    }
    ?>
    </div>
    </div>
    <button type="submit" class="btn_modifier" id="finir">Valider</button></a>
    </form>
    </div>
    </div>
<?php
}
$mysqlConnection = null;
?>