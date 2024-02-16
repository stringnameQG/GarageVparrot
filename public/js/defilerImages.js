window.onload = () => {
    // On crée une liste d'objet qui nous servira à stocker par référence nos chemin d'image
    var carList = {};
    // On 
    var pictureList = [];

    // On récupére toutes nos image
    const pictures = document.querySelectorAll(".picture");
    // On récupére l'id de notre premiére image
    let valeurReference = pictures[0].alt;
    // On boucle sur chaque élément de notre tableau pictures pour récupérer son chemin
    pictures.forEach(element => {
        // On crée une variable qui va récupérer le chemin complet de notre image
        var src = element.id;
        // On tronque la partie inutile du chemin obtenue
        var srcTronquer = src.substring(src.lastIndexOf("/cars_picture/"));
        // On vérifie si l'id de l'image obtenue correspond à l'id de référence pour savoir si elles appartiene à la méme voiture
        if(valeurReference != element.alt){
            carList[valeurReference] = pictureList;
            pictureList = []
            pictureList.push(srcTronquer);
            valeurReference = element.alt;
        } else {
            pictureList.push(srcTronquer);
        }
    });
    // A la fin de notre boucle forEach il nous reste toute les image de la derniére voiture on lui ajoute donc
    carList[valeurReference] = pictureList;
    // puis on vide notre liste d'image
    pictureList = [];



    // Gestion des boutons "Precedent"
    const buttonsPrecedent = document.querySelectorAll(".prev-button")
    let buttonPrevList = Array.from(buttonsPrecedent);
    // On boucle sur les bouttons
    for(button of buttonPrevList){
        // On écoute le clic
        button.addEventListener("click", function(e){ 
            // On crée une promesse
            const maPromesse = new Promise((resolve, reject) => {
                // On récupére L'id du boutton cliqué
                let idButton = this.getAttribute("href");
                // On récupére l'image actuelle qui sera utiliser pour changer le chemin de ça src ce qui changera l'image
                let imgModifie = document.getElementById(idButton);
                // On récupére l'image actuelle de l'image associé au bouton (ce qu'on sait grace à leur id commune)
                let imgCible = document.getElementById(idButton).src;
                // On racourcie notre src pour le comparer à notre liste d'image
                imgCible = imgCible.substring(imgCible.lastIndexOf("/cars_picture/"));

                let numberPicture = carList[idButton];

                if(numberPicture.length == 1){
                    console.log("contient q'une image");
                } else {    
                    let indexActuel = numberPicture.indexOf(imgCible);
                    if(indexActuel == 0){
                        let nouvellePicture = numberPicture[numberPicture.length-1];
                        imgModifie.src = nouvellePicture;
                    } else {
                        let nouvellePicture = numberPicture[indexActuel-1];
                        imgModifie.src = nouvellePicture;
                    }
                }
            });
            maPromesse.then(resultat => {}).catch(erreur => {
                console.log("erreur");
            });
        })
    }




    // Gestion des boutons "Next"
    const buttonsNext = document.querySelectorAll(".next-button")
    let buttonsNextList = Array.from(buttonsNext);
    // On boucle sur les bouttons
    for(button of buttonsNextList){
        // On écoute le clic
        button.addEventListener("click", function(e){ 
            // On crée une promesse 
            const maPromesse = new Promise((resolve, reject) => {
                // On récupére L'id du boutton cliqué
                let idButton = this.getAttribute("href");
                // On récupére l'image actuelle qui sera utiliser pour changer le chemin de ça src ce qui changera l'image
                let imgModifie = document.getElementById(idButton);
                // On récupére l'image actuelle de l'image associé au bouton (ce qu'on sait grace à leur id commune)
                let imgCible = document.getElementById(idButton).src;
                // On racourcie notre src pour le comparer à notre liste d'image
                imgCible = imgCible.substring(imgCible.lastIndexOf("/cars_picture/"));

                let numberPicture = carList[idButton];
                if(numberPicture.length == 1){
                    console.log("contient q'une image");
                } else {    
                    let indexActuel = numberPicture.indexOf(imgCible);
                    if(indexActuel == [numberPicture.length-1]){
                        let nouvellePicture = numberPicture[0];
                        imgModifie.src = nouvellePicture;
                    } else {
                        let nouvellePicture = numberPicture[indexActuel+1];
                        imgModifie.src = nouvellePicture;
                    }
                }
            });
            maPromesse.then(resultat => {}).catch(erreur => {
                console.log("erreur");
            });
        })
    }
}