function supprimerAncienneRecherche() {
    let elementSupprime = document.querySelectorAll(".vehicule");
    elementSupprime.forEach(element => {
        element.remove(); 
    });
}

function vehiculeStyle(vehiculeList) {

    supprimerAncienneRecherche();

    const vehiculeAffichage = document.querySelector(".affichage-vehicule");
    const vehiculeContentImg = "vehicule-content-img";
    const vehiculeImg = "vehicule-img";
    const vehicule = "vehicule";
    const vehiculeTitre = "vehicule-titre";
    const vehiculePrixKilometrage = "vehicule__prix-kilometrage";
    const vehiculePrix = "vehicule__prix";
    const vehiculeKilometrage = "vehicule__Kilometrage";
    const infosSuplementaire = "infos-suplementaire";
    const infosSuplementaireColonne = "infos-suplementaire__colonne";
    const infosSuplementaireColonneStyle = "infos-suplementaire__colonne__style";
    const infosStyle = "infos-style";
    const infosAutre = "autres-infos";
    const infosAutreTitre = "autres-infos__titre";
    const formulaireDeContacteDiv = "formulaire-vehicule";
    const formulaireDeContactePhrase = "";
    const formulaireDeContacte = "formulaire-btn-vehicule";
    
    for (const property in vehiculeList) {
        let divVehicule = document.createElement("div");
        let imgVehiculeImg = document.createElement("img");
        let divVehiculeContentImg = document.createElement("div");
        let spanVehiculeTitre = document.createElement("span");
        let divVehiculePrixKilometrage = document.createElement("div");
        let pVehiculePrix = document.createElement("p");
        let pVehiculeKilometrage = document.createElement("p");
        let pVehiculeMiseEnCirculation = document.createElement("p");
        let h2InfosSuplementaire = document.createElement("h2");
        let divInfosSuplementaire = document.createElement("div");
        let divInfosSuplementaireColonne1 = document.createElement("div");
        let divInfosSuplementaireColonneStyleMarque = document.createElement("div");
        let pInfosSuplementaireColonneStyleMarque = document.createElement("p");
        let pInfosSuplementaireColonneStyleInfosStyleMarque = document.createElement("p");
        let divInfosSuplementaireColonneStyleCarburant = document.createElement("div");
        let pInfosSuplementaireColonneStyleCarburant = document.createElement("p");
        let pInfosSuplementaireColonneStyleInfosStyleCarburant = document.createElement("p");
        let divInfosSuplementaireColonneStyleCouleur = document.createElement("div");
        let pInfosSuplementaireColonneStyleCouleur = document.createElement("p");
        let pInfosSuplementaireColonneStyleInfosStyleCouleur = document.createElement("p");
        let divInfosSuplementaireColonneStylePuissanceFiscale = document.createElement("div");
        let pInfosSuplementaireColonneStylePuissanceFiscale = document.createElement("p");
        let pInfosSuplementaireColonneStyleInfosStylePuissanceFiscale = document.createElement("p");
        let divInfosSuplementaireColonne2 = document.createElement("div");
        let divInfosSuplementaireColonneStyleModele = document.createElement("div");
        let pInfosSuplementaireColonneStyleModele = document.createElement("p");
        let pInfosSuplementaireColonneStyleInfosStyleModele = document.createElement("p");
        let divInfosSuplementaireColonneStyleBoiteDeVitesse = document.createElement("div");
        let pInfosSuplementaireColonneStyleBoiteDeVitesse = document.createElement("p");
        let pInfosSuplementaireColonneStyleInfosStyleBoiteDeVitesse = document.createElement("p");
        let divInfosSuplementaireColonneStyleNombreDePorte = document.createElement("div");
        let pInfosSuplementaireColonneStyleNombreDePorte = document.createElement("p");
        let pInfosSuplementaireColonneStyleInfosStyleNombreDePorte = document.createElement("p");
        let divInfosSuplementaireColonneStylePuissanceDin = document.createElement("div");
        let pInfosSuplementaireColonneStylePuissanceDin = document.createElement("p");
        let pInfosSuplementaireColonneStyleInfosStylePuissanceDin = document.createElement("p");
        let divInfosAutre = document.createElement("div");
        let h3InfosAutre = document.createElement("h3");
        let pInfosAutre = document.createElement("p");
        let divformulaireDeContactePhrase = document.createElement("div");
        let pformulaireDeContactePhrase = document.createElement("p");
        let spanFormulairecontacte = document.createElement("span");

        divVehicule.className = vehicule;
        divVehiculeContentImg.className = vehiculeContentImg;
        imgVehiculeImg.className = vehiculeImg;
        spanVehiculeTitre.className = vehiculeTitre;
        divVehiculePrixKilometrage.className = vehiculePrixKilometrage;
        pVehiculePrix.className = vehiculePrix;
        pVehiculeKilometrage.className = vehiculeKilometrage;
        divInfosSuplementaire.className = infosSuplementaire;
        divInfosSuplementaireColonne1.className = infosSuplementaireColonne;
        divInfosSuplementaireColonneStyleMarque.className = infosSuplementaireColonneStyle;
        pInfosSuplementaireColonneStyleInfosStyleMarque.className = infosStyle;
        divInfosSuplementaireColonneStyleCarburant.className = infosSuplementaireColonneStyle;
        pInfosSuplementaireColonneStyleInfosStyleCarburant.className = infosStyle;
        divInfosSuplementaireColonneStyleCouleur.className = infosSuplementaireColonneStyle
        pInfosSuplementaireColonneStyleInfosStyleCouleur.className = infosStyle;
        divInfosSuplementaireColonneStylePuissanceFiscale.className = infosSuplementaireColonneStyle;
        pInfosSuplementaireColonneStyleInfosStylePuissanceFiscale.className = infosStyle;
        divInfosSuplementaireColonne2.className = infosSuplementaireColonne;
        divInfosSuplementaireColonneStyleModele.className = infosSuplementaireColonneStyle;
        pInfosSuplementaireColonneStyleInfosStyleModele.className = infosStyle;
        divInfosSuplementaireColonneStyleBoiteDeVitesse.className = infosSuplementaireColonneStyle
        pInfosSuplementaireColonneStyleInfosStyleBoiteDeVitesse.className = infosStyle;
        divInfosSuplementaireColonneStyleNombreDePorte.className = infosSuplementaireColonneStyle
        pInfosSuplementaireColonneStyleInfosStyleNombreDePorte.className = infosStyle;
        divInfosSuplementaireColonneStylePuissanceDin.className = infosSuplementaireColonneStyle
        pInfosSuplementaireColonneStyleInfosStylePuissanceDin.className = infosStyle;
        divInfosAutre.className = infosAutre;
        h3InfosAutre.className = infosAutreTitre;
        pInfosAutre.className = infosStyle;
        divformulaireDeContactePhrase.className = formulaireDeContacteDiv;
        pformulaireDeContactePhrase.className = formulaireDeContactePhrase;
        spanFormulairecontacte.className = formulaireDeContacte;
        
        imgVehiculeImg.src = "/cars_picture/".concat('', vehiculeList[property]["picturecar_name"][0]);
        spanVehiculeTitre.textContent = vehiculeList[property]["name"];
        pVehiculePrix.textContent = "".concat('Prix: ', vehiculeList[property]["price"]);
        pVehiculeKilometrage.textContent = "".concat('Kilométrage: ', vehiculeList[property]["killometering"]);
        pVehiculeMiseEnCirculation.textContent = "".concat('mise en circulation: ', vehiculeList[property]["circulation"]);
        h2InfosSuplementaire.textContent = "informations suplémentaire:";
        pInfosSuplementaireColonneStyleMarque.textContent = "Marque";
        if(vehiculeList[property]["brand"] == null){
            pInfosSuplementaireColonneStyleInfosStyleMarque.textContent = "non renseigné";
        } else {
            pInfosSuplementaireColonneStyleInfosStyleMarque.textContent = vehiculeList[property]["brand"];
        }
        pInfosSuplementaireColonneStyleCarburant.textContent = "Carburant";
        if(vehiculeList[property]["fuel"] == null){
            pInfosSuplementaireColonneStyleInfosStyleCarburant.textContent = "non renseigné";
        } else {
            pInfosSuplementaireColonneStyleInfosStyleCarburant.textContent = vehiculeList[property]["fuel"];
        }
        pInfosSuplementaireColonneStyleCouleur.textContent = "Couleur";
        if(vehiculeList[property]["color"] == null){
            pInfosSuplementaireColonneStyleInfosStyleCouleur.textContent = "non renseigné";
        } else {
            pInfosSuplementaireColonneStyleInfosStyleCouleur.textContent = vehiculeList[property]["color"];
        }
        pInfosSuplementaireColonneStylePuissanceFiscale.textContent = "Puissance fiscale";
        if(vehiculeList[property]["fiscalpower"] == null){
            pInfosSuplementaireColonneStyleInfosStylePuissanceFiscale.textContent = "non renseigné";
        } else {
            pInfosSuplementaireColonneStyleInfosStylePuissanceFiscale.textContent = vehiculeList[property]["fiscalpower"];
        }
        pInfosSuplementaireColonneStyleModele.textContent = "Modéle";
        if(vehiculeList[property]["model"] == null){
            pInfosSuplementaireColonneStyleInfosStyleModele.textContent = "non renseigné";
        } else {
            pInfosSuplementaireColonneStyleInfosStyleModele.textContent = vehiculeList[property]["model"];
        }
        pInfosSuplementaireColonneStyleBoiteDeVitesse.textContent = "Boite de vitresse";
        if(vehiculeList[property]["gearbox"] == null){
            pInfosSuplementaireColonneStyleInfosStyleBoiteDeVitesse.textContent = "non renseigné";
        } else {
            pInfosSuplementaireColonneStyleInfosStyleBoiteDeVitesse.textContent = vehiculeList[property]["gearbox"];
        }
        pInfosSuplementaireColonneStyleNombreDePorte.textContent = "Nombre de porte";
        if(vehiculeList[property]["numberofdoors"] == null){
            pInfosSuplementaireColonneStyleInfosStyleNombreDePorte.textContent = "non renseigné";
        } else {
            pInfosSuplementaireColonneStyleInfosStyleNombreDePorte.textContent = vehiculeList[property]["numberofdoors"];
        }
        pInfosSuplementaireColonneStylePuissanceDin.textContent = "Puissance DIN";
        if(vehiculeList[property]["powerdin"] == null){
            pInfosSuplementaireColonneStyleInfosStylePuissanceDin.textContent = "non renseigné";
        } else {
            pInfosSuplementaireColonneStyleInfosStylePuissanceDin.textContent = vehiculeList[property]["powerdin"];
        }
        h3InfosAutre.textContent = "Autre infos";
        if(vehiculeList[property]["otherinfo"] == null){
            pInfosAutre.textContent = "non renseigné";
        } else {
            pInfosAutre.textContent = vehiculeList[property]["otherinfo"];
        }
        pformulaireDeContactePhrase.textContent = "des questions sur ce vehicule ?";
        spanFormulairecontacte.textContent = "formulaire";

    vehiculeAffichage.prepend(divVehicule); 
        divVehicule.prepend(divVehiculeContentImg);
            divVehiculeContentImg.prepend(imgVehiculeImg);
        divVehiculeContentImg.after(spanVehiculeTitre);
        spanVehiculeTitre.after(divVehiculePrixKilometrage);
            divVehiculePrixKilometrage.prepend(pVehiculePrix);
            pVehiculePrix.after(pVehiculeKilometrage);
        divVehiculePrixKilometrage.after(pVehiculeMiseEnCirculation);
        pVehiculeMiseEnCirculation.after(h2InfosSuplementaire);
        h2InfosSuplementaire.after(divInfosSuplementaire);
            divInfosSuplementaire.prepend(divInfosSuplementaireColonne1);
                divInfosSuplementaireColonne1.prepend(divInfosSuplementaireColonneStyleMarque);
                    divInfosSuplementaireColonneStyleMarque.prepend(pInfosSuplementaireColonneStyleMarque);
                    pInfosSuplementaireColonneStyleMarque.after(pInfosSuplementaireColonneStyleInfosStyleMarque);
                divInfosSuplementaireColonneStyleMarque.after(divInfosSuplementaireColonneStyleCarburant);
                    divInfosSuplementaireColonneStyleCarburant.prepend(pInfosSuplementaireColonneStyleCarburant);
                    pInfosSuplementaireColonneStyleCarburant.after(pInfosSuplementaireColonneStyleInfosStyleCarburant);
                divInfosSuplementaireColonneStyleCarburant.after(divInfosSuplementaireColonneStyleCouleur);
                    divInfosSuplementaireColonneStyleCouleur.prepend(pInfosSuplementaireColonneStyleCouleur);
                    pInfosSuplementaireColonneStyleCouleur.after(pInfosSuplementaireColonneStyleInfosStyleCouleur);
                divInfosSuplementaireColonneStyleCouleur.after(divInfosSuplementaireColonneStylePuissanceFiscale);
                    divInfosSuplementaireColonneStylePuissanceFiscale.prepend(pInfosSuplementaireColonneStylePuissanceFiscale);
                    pInfosSuplementaireColonneStylePuissanceFiscale.after(pInfosSuplementaireColonneStyleInfosStylePuissanceFiscale);
            divInfosSuplementaireColonne1.after(divInfosSuplementaireColonne2);
                divInfosSuplementaireColonne2.prepend(divInfosSuplementaireColonneStyleModele);
                    divInfosSuplementaireColonneStyleModele.prepend(pInfosSuplementaireColonneStyleModele);
                    pInfosSuplementaireColonneStyleModele.after(pInfosSuplementaireColonneStyleInfosStyleModele);
                divInfosSuplementaireColonneStyleModele.after(divInfosSuplementaireColonneStyleBoiteDeVitesse);
                    divInfosSuplementaireColonneStyleBoiteDeVitesse.prepend(pInfosSuplementaireColonneStyleBoiteDeVitesse);
                    pInfosSuplementaireColonneStyleBoiteDeVitesse.after(pInfosSuplementaireColonneStyleInfosStyleBoiteDeVitesse);
                divInfosSuplementaireColonneStyleBoiteDeVitesse.after(divInfosSuplementaireColonneStyleNombreDePorte);
                    divInfosSuplementaireColonneStyleNombreDePorte.prepend(pInfosSuplementaireColonneStyleNombreDePorte);
                    pInfosSuplementaireColonneStyleNombreDePorte.after(pInfosSuplementaireColonneStyleInfosStyleNombreDePorte);
                divInfosSuplementaireColonneStyleNombreDePorte.after(divInfosSuplementaireColonneStylePuissanceDin);
                    divInfosSuplementaireColonneStylePuissanceDin.prepend(pInfosSuplementaireColonneStylePuissanceDin);
                    pInfosSuplementaireColonneStylePuissanceDin.after(pInfosSuplementaireColonneStyleInfosStylePuissanceDin);
            divInfosSuplementaire.after(divInfosAutre);
                divInfosAutre.prepend(h3InfosAutre);
                h3InfosAutre.after(pInfosAutre);
            divInfosAutre.after(divformulaireDeContactePhrase);
                divformulaireDeContactePhrase.prepend(pformulaireDeContactePhrase);
                pformulaireDeContactePhrase.after(spanFormulairecontacte);
    };
    formulaireContacteAffichageVehicule();
}

function creationListVehicule(data){
    var imgListAll = {};
    var imgList = [];
    var idRef = data[0]["car_id"];
    data.forEach(element => {
        let img = element["picturecar_name"];
        if( element["car_id"] != idRef ){
            imgListAll[idRef] = imgList;
            imgList = [];
        }
        imgList.push(img);
        idRef = element["car_id"];
    }) 
    imgListAll[idRef] = imgList; 

    var vehiculeList = {};
    for (const property in data) {
        idRef = data[property]["car_id"];
        vehiculeList[idRef] = data[property];
        vehiculeList[idRef]["picturecar_name"] = imgListAll[idRef];
    }
    vehiculeStyle(vehiculeList);
}

function tableauForm() {
    const prixMinimum = document.querySelector("#prix-minimum").value;
    const prixMaximum = document.querySelector("#prix-maximum").value;
    const killometrageMinimum = document.querySelector("#killometrage-minimum").value;
    const killometrageMaximum = document.querySelector("#killometrage-maximum").value;
    const anneeMiseEnciculationMinimum = document.querySelector("#anneeMiseEnCirculation-minimum").value;
    const anneeMiseEnciculationMaximum = document.querySelector("#anneeMiseEnCirculation-maximum").value;

    let form = {
        "prixMinimum" : prixMinimum,
        "prixMaximum" : prixMaximum,
        "killometrageMinimum" : killometrageMinimum,
        "killometrageMaximum" : killometrageMaximum,
        "anneeMiseEnciculationMinimum" : anneeMiseEnciculationMinimum,
        "anneeMiseEnciculationMaximum" : anneeMiseEnciculationMaximum
    };
    return form;
}

function AppelSciptPhp() {
    let form = tableauForm();
    $.ajax({
        url: '/php/vehicule/filtreVehicule.php', // 'php/vehicule/filtreVehicule.php'
        method: "GET",
        data: form,
        dataType: "json",
        timeout: 1500,
        success: function(data) {
            creationListVehicule(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function BtnRechercher(){
    const btnRechercher = document.querySelector("#Serialisation");
    btnRechercher.addEventListener("click", function(e){
        AppelSciptPhp();
    })
}