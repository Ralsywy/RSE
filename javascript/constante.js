document.addEventListener('DOMContentLoaded', function() {
const inscrit = document.getElementsByName('inscrit');
const radio_inscrit1 = document.getElementsByClassName('radio_oui');
const radio_inscrit2 = document.getElementsByClassName('radio_non');
var form_type = document.getElementById("form_type");
var form_type1 = document.getElementById("form_type1");
var dipl_prepa = document.getElementById("dipl_prepa");
var non_form = document.getElementById("non_form");
var non_reconv = document.getElementById("non_reconv");
var tableau = document.getElementById("monTableau");
var nb_enfant = document.getElementById("nombre_enfant");
var achat_non = document.getElementById("achat_non");
var radio_non = document.getElementById("radio_non");
var radio_oui = document.getElementById("radio_oui");
const inputPrenom = document.getElementById('prenom');

inputPrenom.addEventListener('input', () => {
    const valeurSaisie = inputPrenom.value;
    const premiereLettreMajuscule = valeurSaisie.charAt(0).toUpperCase() + valeurSaisie.slice(1);
    inputPrenom.value = premiereLettreMajuscule;
  });

// test



});