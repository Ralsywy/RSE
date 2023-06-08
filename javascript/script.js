// Scripts créer suivis


// centre num
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
      nb_enfant.value = "0";
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
// CMA
function showhidecma(val) {
    if(val==1) {
        document.getElementById('inscrit_cma').style.display='block';
        document.getElementById('date_rea_cma').style.display='none';
    }
    if(val==2) {
        document.getElementById('inscrit_cma').style.display='none';
        document.getElementById('date_rea_cma').style.display='block';
    }
  }
// Soélis
function showhidesoelis(val) {
    if(val==1) {
        document.getElementById('inscrit_soelis').style.display='block';
        document.getElementById('date_rea_soelis').style.display='none';
    }
    if(val==2) {
        document.getElementById('inscrit_soelis').style.display='none';
        document.getElementById('date_rea_soelis').style.display='block';
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
          document.getElementById('rens_dipl').style.display='none';
          document.getElementById('form_continue').style.display='none';
          document.getElementById('cap_metier').style.display='none';
          document.getElementById('niveau').style.display='block';
      } else if (dipl == "autre") {
          document.getElementById('form_continue').style.display='none';
          document.getElementById('rens_dipl').style.display='block';
          document.getElementById('cap_metier').style.display='none';
          document.getElementById('niveau').style.display='none';
      } else if (dipl == "cap") {
        document.getElementById('form_continue').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('cap_metier').style.display='block';
    } else if (dipl == "forma_continue") {
        document.getElementById('form_continue').style.display='block';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
    } else {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
      }
  }
// Reconversion pro
  function showhidereconv(val) {
    if(val==1) {
        document.getElementById('formati').style.display='block';
    }
    if(val==2) {
        document.getElementById('formati').style.display='none';
        document.getElementById('renseign').style.display='none';
        non_form.checked = true;

    }
  }
// Formation prévue
function showhideformp(val) {
    if(val==1) {
        document.getElementById('renseign').style.display='block';
    }
    if(val==2) {
        document.getElementById('renseign').style.display='none';
    }
  }
// Reprise d'étude
function showhidereprise(val) {
    if(val==1) {
        document.getElementById('dipl_prep').style.display='block';
    }
    if(val==2) {
        document.getElementById('dipl_prep').style.display='none';
        dipl_prepa.value = "";
    }
  }
// Bénéficier d'une formation pro                oui non
function showhideformpro(val) {
    if(val==1) {
        document.getElementById('oui_formpro').style.display='block';
    }
    if(val==2) {
        document.getElementById('oui_formpro').style.display='none';
        document.getElementById('if_qual').style.display='none';
        document.getElementById('if_dipl').style.display='none';
        form_type.selectedIndex = 0;

    }
  }
// Bénéficier d'une formation pro               select


function hideshowformqd() {
    var formqd = document.getElementById("form_type").value;
        if(formqd == "diplomante") {
            document.getElementById('if_qual').style.display='none';
            document.getElementById('if_dipl').style.display='block';
        } 
        if (formqd == "qualifiante") {
            document.getElementById('if_qual').style.display='block';
            document.getElementById('if_dipl').style.display='none';
        }
        if (formqd == "rien") {
            document.getElementById('if_qual').style.display='none';
            document.getElementById('if_dipl').style.display='none';
        }
    }
function hideshowsituationpro() {
    var situa = document.getElementById("situat_pro").value;
        if(situa == "rien") {
            document.getElementById('cdd').style.display='none';
            document.getElementById('cdi').style.display='none';
            document.getElementById('formation').style.display='none';
            document.getElementById('stage').style.display='none';
            document.getElementById('abandon').style.display='none';
            document.getElementById('nonret').style.display='none';
            document.getElementById('siautre').style.display='none';
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
            form_type1.selectedIndex = 0;
        } 
        if(situa == "cdi") {
            document.getElementById('cdd').style.display='none';
            document.getElementById('cdi').style.display='block';
            document.getElementById('formation').style.display='none';
            document.getElementById('stage').style.display='none';
            document.getElementById('abandon').style.display='none';
            document.getElementById('nonret').style.display='none';
            document.getElementById('siautre').style.display='none';
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
            form_type1.selectedIndex = 0;
        } 
        if(situa == "cdd") {
            document.getElementById('cdd').style.display='block';
            document.getElementById('cdi').style.display='none';
            document.getElementById('formation').style.display='none';
            document.getElementById('stage').style.display='none';
            document.getElementById('abandon').style.display='none';
            document.getElementById('nonret').style.display='none';
            document.getElementById('siautre').style.display='none';
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
            form_type1.selectedIndex = 0;
        } 
        if(situa == "formation") {
            document.getElementById('cdd').style.display='none';
            document.getElementById('cdi').style.display='none';
            document.getElementById('formation').style.display='block';
            document.getElementById('stage').style.display='none';
            document.getElementById('abandon').style.display='none';
            document.getElementById('nonret').style.display='none';
            document.getElementById('siautre').style.display='none';
        } 
        if(situa == "stage") {
            document.getElementById('cdd').style.display='none';
            document.getElementById('cdi').style.display='none';
            document.getElementById('formation').style.display='none';
            document.getElementById('stage').style.display='block';
            document.getElementById('abandon').style.display='none';
            document.getElementById('nonret').style.display='none';
            document.getElementById('siautre').style.display='none';
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
            form_type1.selectedIndex = 0;
        } 
        if(situa == "abandon") {
            document.getElementById('cdd').style.display='none';
            document.getElementById('cdi').style.display='none';
            document.getElementById('formation').style.display='none';
            document.getElementById('stage').style.display='none';
            document.getElementById('abandon').style.display='block';
            document.getElementById('nonret').style.display='none';
            document.getElementById('siautre').style.display='none';
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
            form_type1.selectedIndex = 0;
        } 
        if(situa == "non_retour") {
            document.getElementById('cdd').style.display='none';
            document.getElementById('cdi').style.display='none';
            document.getElementById('formation').style.display='none';
            document.getElementById('stage').style.display='none';
            document.getElementById('abandon').style.display='none';
            document.getElementById('nonret').style.display='block';
            document.getElementById('siautre').style.display='none';
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
            form_type1.selectedIndex = 0;
        } 
        if(situa == "autre_s") {
            document.getElementById('cdd').style.display='none';
            document.getElementById('cdi').style.display='none';
            document.getElementById('formation').style.display='none';
            document.getElementById('stage').style.display='none';
            document.getElementById('abandon').style.display='none';
            document.getElementById('nonret').style.display='none';
            document.getElementById('siautre').style.display='block';
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
            form_type1.selectedIndex = 0;
        } 
    }
function hideshowformqd1() {
    var formqd1 = document.getElementById("form_type1").value;
        if(formqd1 == "diplomante1") {
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='block';
        } 
        if (formqd1 == "qualfiante1") {
            document.getElementById('if_qual1').style.display='block';
            document.getElementById('if_dipl1').style.display='none';
        }
        if (formqd1 == "rien") {
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
        }
    }

