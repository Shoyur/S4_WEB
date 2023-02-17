let afficherMessage = (donnees, num) => {
    document.getElementById(`msg${num}`).innerHTML = donnees.message;
    setTimeout(
        () => {
             document.getElementById(`msg${num}`).innerHTML = "";
        }, 5000
    );
}

let creerCard = (unVoyage) => {
    return `
        <div id="${unVoyage.code}" class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Client #${unVoyage.code}</h5>
            <p class="card-text">Transporteur: ${unVoyage.transporteur}</p>
            <p class="card-text">Départ: ${unVoyage.depart}</p>
            <p class="card-text">Destination: ${unVoyage.destination}</p>
        </div>
        </div>
    `;
}

let lister = (listeVoyages) => {
    let contenu = `<div class='row'>`;
    let codes = [];
    for(let unVoyage  of listeVoyages){
        contenu += creerCard(unVoyage);
        if (!codes.includes(unVoyage.code)) { codes.push(unVoyage.code); }
    }
    contenu += `</div>`;
    document.getElementById('contenu').innerHTML = contenu;

    let codesList = document.getElementById('codeD').options;

    codes.forEach(option =>
        codesList.add(new Option(option))
    );
}

let listerDepMtl = (listeVoyages) => {
    let contenu = `<div class='row'>`;
    for(let unVoyage  of listeVoyages){
        if (unVoyage.depart == "Montreal") {
            contenu += creerCard(unVoyage);
        }
    }
    contenu += `</div>`;
    document.getElementById('contenu').innerHTML = contenu;
}

let reponseEnregistrer = (donnees) => {
    afficherMessage(donnees, 1);
    if (donnees.OK) {
        let cardNouveauVoyage = creerCard(donnees.voyageInsere);
        document.getElementById('contenu').firstElementChild.innerHTML += cardNouveauVoyage;
        listeVoyages.push(donnees.voyageInsere);
    }
}

let reponseEnlever = (donnees) => {
    afficherMessage(donnees, 3);
    if (donnees.OK) {
        let cardEnlever = document.getElementById(donnees.idVoyage);
        cardEnlever.parentNode.removeChild(cardEnlever);
        listeVoyagesActuelle = listeVoyages.filter((unVoyage) => { 
            return unVoyage.code != donnees.idVoyage;
        });
        listeVoyages = listeVoyagesActuelle;
        alert(JSON.stringify(listeVoyages));
    }
}

let creerVue = (action, donnees) => {
    switch(action) {
        case "enregistrer": reponseEnregistrer(donnees); break;
        case "lister": lister(donnees); break;
        case "listerDepMtl": listerDepMtl(donnees); break;
        case "enlever": reponseEnlever(donnees); break;
    }
}