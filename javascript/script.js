// Scripts créer suivis


// centre num
// Vérifier l'état initial des boutons radio au chargement de la page
window.addEventListener('DOMContentLoaded', function() {
    var radioOui = document.getElementById('radio_oui');
    var radioNon = document.getElementById('radio_non');
    
    if (radioOui.checked) {
      hideShowDiv(1);
    } else if (radioNon.checked) {
      hideShowDiv(2);
    }
  });
  
  function hideShowDiv(val) {
    if (val == 1 || document.getElementById('radio_oui').checked) {
      document.getElementById('centre_num').style.display = 'block';
      document.getElementById('date_rea1').style.display = 'none';
    }
    if (val == 2 || document.getElementById('radio_non').checked) {
      document.getElementById('centre_num').style.display = 'none';
      document.getElementById('date_rea1').style.display = 'block';
    }
  }
  
// Enfants à charge
window.addEventListener('DOMContentLoaded', function() {
    var enfant_oui = document.getElementById('enfant_oui');
    var enfant_non = document.getElementById('enfant_non');
    
    if (enfant_oui.checked) {
        hideshowkid(1);
    } else if (enfant_non.checked) {
        hideshowkid(2);
    }
  });
function hideshowkid(val) {
  if(val==1 || document.getElementById('enfant_oui').checked) {
      document.getElementById('enfant_naissance').style.display='block';
  }
  if(val==2 || document.getElementById('enfant_non').checked) {
      document.getElementById('enfant_naissance').style.display='none';
      nb_enfant.value = "0";
  }
}
// Nature des revenus
// Appeler hideshowautre() une fois au chargement de la page
window.addEventListener('DOMContentLoaded', function() {
    hideshowautre();
  });
  function hideshowautre() {
    var autre = document.getElementById("revenus").value;
    if (autre == "autre") {
      document.getElementById('preciser').style.display = 'block';
    } else {
      document.getElementById('preciser').style.display = 'none';
    }
  }
  
// Pole emplois
window.addEventListener('DOMContentLoaded', function() {
    var pole_oui = document.getElementById('pole_oui');
    var pole_non = document.getElementById('pole_non');
    
    if (pole_oui.checked) {
        showhideemplois(1);
    } else if (pole_non.checked) {
        showhideemplois(2);
    }
  });
function showhideemplois(val) {
  if(val==1 || document.getElementById('pole_oui').checked) {
      document.getElementById('pole_emplois').style.display='block';
      document.getElementById('date_rea2').style.display='none';
  }
  if(val==2 || document.getElementById('pole_non').checked) {
      document.getElementById('pole_emplois').style.display='none';
      document.getElementById('date_rea2').style.display='block';
  }
}
// CMA
window.addEventListener('DOMContentLoaded', function() {
    var cma_oui = document.getElementById('cma_oui');
    var cma_non = document.getElementById('cma_non');
    
    if (cma_oui.checked) {
        showhidecma(1);
    } else if (cma_non.checked) {
        showhidecma(2);
    }
  });
function showhidecma(val) {
    if(val==1 || document.getElementById('cma_oui').checked) {
        document.getElementById('inscrit_cma').style.display='block';
        document.getElementById('date_rea_cma').style.display='none';
    }
    if(val==2 || document.getElementById('cma_non').checked) {
        document.getElementById('inscrit_cma').style.display='none';
        document.getElementById('date_rea_cma').style.display='block';
    }
  }
// Soélis
    window.addEventListener('DOMContentLoaded', function() {
        var soelis_oui = document.getElementById('soelis_oui');
        var soelis_non = document.getElementById('soelis_non');
        
        if (soelis_oui.checked) {
            showhidesoelis(1);
        } else if (soelis_non.checked) {
            showhidesoelis(2);
        }
      });
function showhidesoelis(val) {

    if(val==1 || document.getElementById('soelis_oui').checked) {
        document.getElementById('inscrit_soelis').style.display='block';
        document.getElementById('date_rea_soelis').style.display='none';
    }
    if(val==2 || document.getElementById('soelis_non').checked) {
        document.getElementById('inscrit_soelis').style.display='none';
        document.getElementById('date_rea_soelis').style.display='block';
    }
  }
// Mission locale
    window.addEventListener('DOMContentLoaded', function() {
        var mission_oui = document.getElementById('mission_oui');
        var mission_non = document.getElementById('mission_non');
        
        if (mission_oui.checked) {
            showhidemission(1);
        } else if (mission_non.checked) {
            showhidemission(2);
        }
      });
function showhidemission(val) {

  if(val==1 || document.getElementById('mission_oui').checked) {
      document.getElementById('mission').style.display='block';
      document.getElementById('date_rea3').style.display='none';
  }
  if(val==2 || document.getElementById('mission_non').checked) {
      document.getElementById('mission').style.display='none';
      document.getElementById('date_rea3').style.display='block';
  }
}
// Cap Emlois
    window.addEventListener('DOMContentLoaded', function() {
        var cap_oui = document.getElementById('cap_oui');
        var cap_non = document.getElementById('cap_non');
        
        if (cap_oui.checked) {
            showhidecap(1);
        } else if (cap_non.checked) {
            showhidecap(2);
        }
      });
function showhidecap(val) {

  if(val==1 || document.getElementById('cap_oui').checked) {
      document.getElementById('cap').style.display='block';
      document.getElementById('date_rea4').style.display='none';
  }
  if(val==2 || document.getElementById('cap_non').checked) {
      document.getElementById('cap').style.display='none';
      document.getElementById('date_rea4').style.display='block';
  }
}
// CV
    window.addEventListener('DOMContentLoaded', function() {
        var cv_oui = document.getElementById('cv_oui');
        var cv_non = document.getElementById('cv_non');
        
        if (cv_oui.checked) {
            showhidecv(1);
        } else if (cv_non.checked) {
            showhidecv(2);
        }
      });
function showhidecv(val) {

  if(val==1 || document.getElementById('cv_oui').checked) {
      document.getElementById('cv').style.display='block';
      document.getElementById('date_cv').style.display='none';
  }
  if(val==2 || document.getElementById('cv_non').checked) {
      document.getElementById('cv').style.display='none';
      document.getElementById('date_cv').style.display='block';
  }
}
// Permis de conduire
document.addEventListener('DOMContentLoaded', function() {
    hideshowpermis();
  });
  
  function hideshowpermis() {
    var permis = document.getElementById("permis").value;
    if (permis == "motos1") {
      document.getElementById('motos').style.display = 'block';
      document.getElementById('auto').style.display = 'none';
      document.getElementById('march').style.display = 'none';
    }
    if (permis == "auto1") {
      document.getElementById('auto').style.display = 'block';
      document.getElementById('motos').style.display = 'none';
      document.getElementById('march').style.display = 'none';
    }
    if (permis == "march1") {
      document.getElementById('march').style.display = 'block';
      document.getElementById('auto').style.display = 'none';
      document.getElementById('motos').style.display = 'none';
    }
    if (permis == "aucun") {
      document.getElementById('march').style.display = 'none';
      document.getElementById('auto').style.display = 'none';
      document.getElementById('motos').style.display = 'none';
    }
    if (permis == "rien") {
      document.getElementById('march').style.display = 'none';
      document.getElementById('auto').style.display = 'none';
      document.getElementById('motos').style.display = 'none';
    }
  }
  
// Achat d'un véhicule
    window.addEventListener('DOMContentLoaded', function() {
        var vehicule_oui = document.getElementById('vehicule_oui');
        var vehicule_non = document.getElementById('vehicule_non');
        
        if (vehicule_oui.checked) {
            showhideachat(1);
        } else if (vehicule_non.checked) {
            showhideachat(2);
        }
      });
  function showhideachat(val) {

    if(val==1 || document.getElementById('vehicule_oui').checked) {
        document.getElementById('achat1').style.display='none';
        document.getElementById('date_achat_vehicule').style.display='none';
        achat_non.checked = true;
    }
    if(val==2 || document.getElementById('vehicule_non').checked) {
        document.getElementById('achat1').style.display='block';
    }
}
// Diplôme
document.addEventListener('DOMContentLoaded', function() {
    hideshowdipl();
  });
function hideshowdipl() {
  var dipl = document.getElementById("dipl").value;
      if(dipl == "aucun") {
          document.getElementById('rens_dipl').style.display='none';
          document.getElementById('form_continue').style.display='none';
          document.getElementById('cap_metier').style.display='none';
          document.getElementById('bep_metier').style.display='none';
          document.getElementById('bac_metier').style.display='none';
          document.getElementById('bac2_metier').style.display='none';
          document.getElementById('licence_metier').style.display='none';
          document.getElementById('master_metier').style.display='none';
          document.getElementById('master2_metier').style.display='none';
          document.getElementById('niveau').style.display='block';
      } else if (dipl == "autre") {
          document.getElementById('form_continue').style.display='none';
          document.getElementById('rens_dipl').style.display='block';
          document.getElementById('cap_metier').style.display='none';
          document.getElementById('niveau').style.display='none';
          document.getElementById('bep_metier').style.display='none';
          document.getElementById('bac_metier').style.display='none';
          document.getElementById('bac2_metier').style.display='none';
          document.getElementById('licence_metier').style.display='none';
          document.getElementById('master_metier').style.display='none';
          document.getElementById('master2_metier').style.display='none';
      } else if (dipl == "cap") {
        document.getElementById('form_continue').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('cap_metier').style.display='block';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='none';
    } else if (dipl == "formation_continue") {
        document.getElementById('form_continue').style.display='block';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='none';
    } else if (dipl == "rien") {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='none';
    } else if (dipl == "bep") {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('bep_metier').style.display='block';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='none';
    } else if (dipl == "bac") {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='block';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='none';
    } else if (dipl == "bac+2") {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='block';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='none';
    } else if (dipl == "licence") {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='block';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='none';
    } else if (dipl == "master") {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='block';
        document.getElementById('master2_metier').style.display='none';
    } else if (dipl == "master2") {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='block';
    } else if (dipl == "brevet") {
        document.getElementById('rens_dipl').style.display='none';
        document.getElementById('niveau').style.display='none';
        document.getElementById('form_continue').style.display='none';
        document.getElementById('cap_metier').style.display='none';
        document.getElementById('bep_metier').style.display='none';
        document.getElementById('bac_metier').style.display='none';
        document.getElementById('bac2_metier').style.display='none';
        document.getElementById('licence_metier').style.display='none';
        document.getElementById('master_metier').style.display='none';
        document.getElementById('master2_metier').style.display='none';
    }
  }
// Reconversion pro
    window.addEventListener('DOMContentLoaded', function() {
        var oui_reconv = document.getElementById('oui_reconv');
        var non_reconv = document.getElementById('non_reconv');
        
        if (oui_reconv.checked) {
            showhidereconv(1);
        } else if (non_reconv.checked) {
            showhidereconv(2);
        }
      });
 function showhidereconv(val) {

    if(val==1 || document.getElementById('oui_reconv').checked) {
        document.getElementById('formati').style.display='block';
    }
    if(val==2 || document.getElementById('non_reconv').checked) {
        document.getElementById('formati').style.display='none';
        document.getElementById('renseign').style.display='none';
        non_form.checked = true;

    }
  }
// Formation prévue
    window.addEventListener('DOMContentLoaded', function() {
        var oui_form = document.getElementById('oui_form');
        var non_form = document.getElementById('non_form');
        
        if (oui_form.checked) {
            showhideformp(1);
        } else if (non_form.checked) {
            showhideformp(2);
        }
      });
function showhideformp(val) {

    if(val==1 || document.getElementById('oui_form').checked) {
        document.getElementById('renseign').style.display='block';
    }
    if(val==2 || document.getElementById('non_form').checked) {
        document.getElementById('renseign').style.display='none';
    }
  }
// Reprise d'étude
    window.addEventListener('DOMContentLoaded', function() {
        var oui_etude = document.getElementById('oui_etude');
        var non_etude = document.getElementById('non_etude');
        
        if (oui_etude.checked) {
            showhidereprise(1);
        } else if (non_etude.checked) {
            showhidereprise(2);
        }
      });
function showhidereprise(val) {

    if(val==1 || document.getElementById('oui_etude').checked) {
        document.getElementById('dipl_prep').style.display='block';
    }
    if(val==2 || document.getElementById('non_etude').checked) {
        document.getElementById('dipl_prep').style.display='none';
        dipl_prepa.value = "";
    }
  }
// Bénéficier d'une formation pro                oui non
    window.addEventListener('DOMContentLoaded', function() {
        var form_pro_oui = document.getElementById('form_pro_oui');
        var form_pro_non = document.getElementById('form_pro_non');
        
        if (form_pro_oui.checked) {
            showhideformpro(1);
        } else if (form_pro_non.checked) {
            showhideformpro(2);
        }
      });
function showhideformpro(val) {

    if(val==1 || document.getElementById('form_pro_oui').checked) {
        document.getElementById('oui_formpro').style.display='block';
    }
    if(val==2 || document.getElementById('form_pro_non').checked) {
        document.getElementById('oui_formpro').style.display='none';
        document.getElementById('if_qual').style.display='none';
        document.getElementById('if_dipl').style.display='none';
        form_type.selectedIndex = 0;

    }
  }
// Bénéficier d'une formation pro               select
document.addEventListener('DOMContentLoaded', function() {
    hideshowformqd();
  });
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
// Bénéficier Situation après cloture
    document.addEventListener('DOMContentLoaded', function() {
        hideshowsituationpro();
      });
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
    document.addEventListener('DOMContentLoaded', function() {
        hideshowformqd1();
      });
function hideshowformqd1() {

    var formqd1 = document.getElementById("form_type1").value;
        if(formqd1 == "diplomante1") {
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='block';
        } 
        if (formqd1 == "qualifiante1") {
            document.getElementById('if_qual1').style.display='block';
            document.getElementById('if_dipl1').style.display='none';
        }
        if (formqd1 == "rien") {
            document.getElementById('if_qual1').style.display='none';
            document.getElementById('if_dipl1').style.display='none';
        }
    }
    window.addEventListener('DOMContentLoaded', function() {
        var oui_autre = document.getElementById('oui_autre');
        var non_autre = document.getElementById('non_autre');
        
        if (oui_autre.checked) {
            showhideformpro(1);
        } else if (non_autre.checked) {
            showhideformpro(2);
        }
      });
function showhideautrelang(val) {

    if(val==1 || document.getElementById('oui_autre').checked) {
        document.getElementById('oui_langue_autre').style.display='block';
    }
    if(val==2 || document.getElementById('non_autre').checked) {
        document.getElementById('oui_langue_autre').style.display='none';

    }
  }
    window.addEventListener('DOMContentLoaded', function() {
        var achat_oui = document.getElementById('achat_oui');
        var achat_non = document.getElementById('achat_non');
        
        if (achat_oui.checked) {
            showhidedatevehi(1);
        } else if (achat_non.checked) {
            showhidedatevehi(2);
        }
      });
  function showhidedatevehi(val) {

    if(val==1 || document.getElementById('achat_oui').checked) {
        document.getElementById('date_achat_vehicule').style.display='block';
    }
    if(val==2 || document.getElementById('achat_non').checked) {
        document.getElementById('date_achat_vehicule').style.display='none';
    }
  }

