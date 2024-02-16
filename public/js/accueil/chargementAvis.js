function avisStyle(pesonne) { 
    let avis = document.querySelector(".avis__commentaire-btn");
    let avisDiv = "avis__commentaire-affichage";
    let avisDivNomPrenom = "avis__commentaire-affichage__nom-prenom";
    let avisP = "avis__commentaire-affichage__nom-prenom__item";
    let avisSpan = "avis__commentaire-affichage__commentaire";

    pesonne.forEach(element => {
        let divAvis = document.createElement("div");
        divAvis.className = avisDiv;
        avis.before(divAvis);

        let divNomPrenom = document.createElement("div");
        divNomPrenom.className = avisDivNomPrenom;
        divAvis.prepend(divNomPrenom);
        
        let pNomPrenom = document.createElement("p");
        pNomPrenom.textContent = element["first_name"] + " " + element["name"];
        pNomPrenom.className = avisP;
        divNomPrenom.append(pNomPrenom);
        
        let pNote = document.createElement("p");
        pNote.className = avisP;
        pNote.textContent = element["score"] + "/5";
        divNomPrenom.append(pNote);
        
        let spanComment = document.createElement("span");
        spanComment.className = avisSpan;
        spanComment.textContent = element["comment"];
        divAvis.append(spanComment);
    });
}


var infos = 0;
function appelSciptPhp() {
    let form = {"limite" : infos};
    $.ajax({
        url: 'php/accueil/avisAffichage.php',
        method: "GET",
        data: form,
        dataType: "json",
        timeout: 1000,
        success: function(data) {
            avisStyle(data);
            infos += 3;
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function btnPlusDeCommentaire(){
    const avis = document.querySelector("#PlusDeCommentaires");
    avis.addEventListener("click", function(e){
        appelSciptPhp();
    })
}