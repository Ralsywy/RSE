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
    $requete = $mysqlConnection->prepare('SELECT * FROM accompagnateur');
    //execution de la requete
    $requete->execute();
    $accompagnateurs = $requete->fetchAll();
    $mysqlConnection = null;
    $requete = null;
    ?>

    <div class="page_acc">
        <div class="creer_acc">
            <h1 class="titre_acc">Créer un accompagnateur</h1>
                <form action="index.php?route=store_accompagnateur" class="form_acc" method="post">
                    <div class="input-box_acc">
                        <label for="libelle_acc" class="acc_name">NOM Prénom</label>
                        <input class="tbx_acc" type="text" id="name_acc" name="name_acc" placeholder="NOM Prénom de l'accompagnateur">
                    </div>
                    <div class="input-box_acc">
                        <label for="password" class="acc_name">Mot de passe</label>
                        <input class="tbx_acc" type="password" id="pwd_acc" name="pwd_acc" placeholder="Mot de passe">
                    </div>
                    <div class="input-box_acc">
                    <button type="submit" class="btn_acc_c">Créer</button>
                    </div>
                </form>
        </div>
        <section class="liste_acc">
            <h1 class="titre_acc">Liste des accompagnateurs</h1>
            <!-- UN ACCOMPAGNATEUR -->
            <?php
            foreach ($accompagnateurs as $ligne){
                if($ligne["is_admin"]==0){
                    ?>
                    <div class="un_acc">
                    <div class="box_liste_acc">
                        <label class="liste_name_acc"><?= $ligne["name_acc"] ?></label>
                    </div>
                    <div class="btn_liste_acc">
                        <a href="index.php?route=supp_accompagnateur&id=<?= $ligne["id_accompagnateur"] ?>" class="btn_acc_s">Supprimer</a>
                    </div>
                    </div>
                <?php
                }
            }
            ?>
            <!-- FIN D'UN ACCOMPAGNATEUR -->
        </section>
    </div>

<?php
}
else
{
    $_SESSION["error"]="il faut être connecté pour avoir acces";
    header("location:index.php");
}
?>