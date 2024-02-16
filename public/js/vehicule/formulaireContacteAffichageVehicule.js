formulaireContacteAffichageVehicule = () => {
    // On crée une variable liée a l'élément .formulaire-btn
    let btn = document.querySelectorAll(".formulaire-btn-vehicule");
    btn = Array.from(btn);
    let vehiculeNom = document.querySelectorAll(".vehicule-titre");
    // On crée une variable liée à l'élément .formulaire-contacte__content
    let vehiculeNomList = [];
    vehiculeNom.forEach(element => {
        vehiculeNomList.push(element.textContent);
    }) 
    
    let vehiculePrix = document.querySelectorAll(".vehicule__prix");
    // On crée une variable liée à l'élément .formulaire-contacte__content
    let vehiculePrixList = [];
    vehiculePrix.forEach(element => {
        vehiculePrixList.push(element.textContent);
    }) 

    let formulaireContacte = document.querySelector(".formulaire-contacte");
    // On crée une variable liée à l'élément formulaire-avis__close-icon
    let formulaireContacteClose = document.querySelector(".formulaire-contacte__close-icon");
    // On crée une variable liée à l'élément header
    let header = document.querySelector("header");
    // On crée une variable liée à l'élément main
    let main = document.querySelector("main");
    // On crée une variable liée à l'élément footer
    let footer = document.querySelector("footer");
    // On crée une variable liée à l'élément body
    let body = document.querySelector("body"); 
    // On détecte le clique sur l'icon nav
    let sujetFormulaireDeContacte = document.querySelector(".input__formulairecontacte-subject");

    btn.forEach(element => {
        element.addEventListener('click', () => {
            // On met le display de l'élément nav en flex pour l'afficher
            let index = btn.indexOf(element) + "";
            let sujet = vehiculeNomList[index];
            let prix = vehiculePrixList[index];
            formulaireContacte.style.display = "flex";
            // On ajoute pour les élément header main nav la class avis-floux qui créra l'effet de floux
            header.className = 'floux';
            main.className = 'floux';
            footer.className = 'floux';
            // On bloque le scoll lors de l'activation du formulaire
            body.style.overflow = 'hidden';
            sujetFormulaireDeContacte.value = sujet + " - " + prix + " €";
            sujetFormulaireDeContacte.readOnly = true;
        })
    });
    
    // On détecte le clique sur l'icon close
    formulaireContacteClose.addEventListener('click', () => {
        // On met le display de l'élément nav en none pour le cacher
        sujetFormulaireDeContacte.readOnly = false;
        sujetFormulaireDeContacte.value = "";
        formulaireContacte.style.display = "none";
        // On retire pour les élément header main nav la class avis-floux qui créra l'effet de floux
        header.className = '';
        main.className = '';
        footer.className = '';
        // On réactive le scroll
        body.style.overflow = 'auto';
    })
}
