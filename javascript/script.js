// Scripts créer suivis


// Enfants à charge
function hideShowDiv(val) {
  if(val==1) {
      document.getElementById('centre_num').style.display='block';
      document.getElementById('date_rea1').style.display='none';

  }
  if(val==2) {
      document.getElementById('centre_num').style.display='none';
      document.getElementById('date_rea1').style.display='block';

  }
}
// Enfants à charge
function hideshowkid(val) {
  if(val==1) {
      document.getElementById('enfant_naissance').style.display='block';
  }
  if(val==2) {
      document.getElementById('enfant_naissance').style.display='none';
  }
}
// Nature des revenus
function hideshowautre() {
var autre = document.getElementById("revenus").value;
  if(autre == "autre") {
      document.getElementById('preciser').style.display='block';
  } else {
      document.getElementById('preciser').style.display='none';
  }
}
// Pole emplois
function showhideemplois(val) {
  if(val==1) {
      document.getElementById('pole_emplois').style.display='block';
      document.getElementById('date_rea2').style.display='none';
  }
  if(val==2) {
      document.getElementById('pole_emplois').style.display='none';
      document.getElementById('date_rea2').style.display='block';
  }
}
// Mission locale
function showhidemission(val) {
  if(val==1) {
      document.getElementById('mission').style.display='block';
      document.getElementById('date_rea3').style.display='none';
  }
  if(val==2) {
      document.getElementById('mission').style.display='none';
      document.getElementById('date_rea3').style.display='block';
  }
}
// Cap Emlois
function showhidecap(val) {
  if(val==1) {
      document.getElementById('cap').style.display='block';
      document.getElementById('date_rea4').style.display='none';
  }
  if(val==2) {
      document.getElementById('cap').style.display='none';
      document.getElementById('date_rea4').style.display='block';
  }
}
// CV
function showhidecv(val) {
  if(val==1) {
      document.getElementById('cv').style.display='block';
      document.getElementById('date_cv').style.display='none';
  }
  if(val==2) {
      document.getElementById('cv').style.display='none';
      document.getElementById('date_cv').style.display='block';
  }
}
// Permis de conduire
function hideshowpermis() {
  var permis = document.getElementById("permis").value;
      if(permis == "motos1") {
          document.getElementById('motos').style.display='block';
          document.getElementById('auto').style.display='none';
          document.getElementById('march').style.display='none';
      }
      if (permis == "auto1") {
          document.getElementById('auto').style.display='block';
          document.getElementById('motos').style.display='none';
          document.getElementById('march').style.display='none';
      }
      if (permis == "march1") {
          document.getElementById('march').style.display='block';
          document.getElementById('auto').style.display='none';
          document.getElementById('motos').style.display='none';
      } 
      if (permis == "aucun") {
          document.getElementById('march').style.display='none';
          document.getElementById('auto').style.display='none';
          document.getElementById('motos').style.display='none';
      }
      if (permis == "rien") {
          document.getElementById('march').style.display='none';
          document.getElementById('auto').style.display='none';
          document.getElementById('motos').style.display='none';
      }
  }
// Achat d'un véhicule
  function showhideachat(val) {
    if(val==1) {
        document.getElementById('achat1').style.display='none';
    }
    if(val==2) {
        document.getElementById('achat1').style.display='block';
    }
}
// Diplôme
function hideshowdipl() {
  var dipl = document.getElementById("dipl").value;
      if(dipl == "aucun") {
          document.getElementById('rens_dipl').style.display='block';
          document.getElementById('niveau').style.display='none';
      } else if (dipl == "autre") {
          document.getElementById('rens_dipl').style.display='none';
          document.getElementById('niveau').style.display='block';
      } else {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
      }
  }
