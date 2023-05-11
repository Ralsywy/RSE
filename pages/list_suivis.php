<div class="grille">
    <div class="grid-item">
        <p class="nom">Nom</p>
        <p class="prenom">Prénom</p>
        <a href="#" class="btn1">Modifier</a>
    </div>
    <div class="grid-item">
    <p class="nom">Nom</p>
    <p class="prenom">Prénom</p>
        <a href="#" class="btn1">Modifier</a>
    </div>
    <div class="grid-item">
    <p class="nom">Nom</p>
    <p class="prenom">Prénom</p>
        <a href="#" class="btn1">Modifier</a>
    </div>
    <div class="grid-item">
    <p class="nom">Nom</p>
    <p class="prenom">Prénom</p>
        <a href="#" class="btn1">Modifier</a>
    </div>
</div>
<style>
.grille {
    margin-top: 100px;
    width: 100%;
    height: auto;



    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-flow: wrap;


}
.grid-item {
    width: 800px;
    height: 200px;
    background: #DBDDDF;
    margin: 20px;
    box-sizing: border-box;
    font-size: 20px;
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    position: relative;
    border-radius: 20px;
}
.grille p.nom {
    position: absolute;
    left: 15px;
    top: 10px;
}
.grille p.prenom {
    position: absolute;
    left: 15px;
    top: 40px;
}
.grille a {
    position: absolute;
    right:30px;
    bottom: 10px;
}
.btn1 {
    font-size: 18px;
    font-weight: bold;
    background: #1e90ff;
    width: 160px;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    color: #fff;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-property: box-shadow, transform;
    transition-property: box-shadow, transform;

}
.btn1:hover, .btn1:focus, .btn1:active{
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

@media screen and (max-width:1200px) {
    .box {
        width: 40%;
    }
}
@media screen and (max-width:600px) {
    .box {
        width: 90%;
    }
}
</style>