let afficherMessage = (donnees, num) => {
    document.getElementById(`msg${num}`).innerHTML = donnees.message;
    setTimeout(
        () => {
             document.getElementById(`msg${num}`).innerHTML = "";
        }, 5000
    );
}

// OK
let creerCard = (unFilm) => {
    return `
        <div id="${unFilm.numFilm}" class="card" style="width: 18rem;">
        <div class="card-body">
            <img class="card-img-top" src="pochettes/${unFilm.image}" alt="PAS D'IMAGE"><br><br>
            <h5 class="card-title">${unFilm.titre}</h5>
            <p class="card-text"># ${unFilm.numFilm}<br>
            Catégorie: ${unFilm.categorie}<br>
            Classement: ${unFilm.classement}</p>
        </div>
        </div>
    `;
}

// OK
let listerFilms = (listeFilms) => {
    let contenu = `<div class='row'>`;
    for (let unFilm  of listeFilms) { contenu += creerCard(unFilm); }
    contenu += `</div>`;
    document.getElementById('contenu').innerHTML = contenu;
}

let reponseEnregistrer = (donnees) => {
    afficherMessage(donnees, 1);
    if (donnees.OK) {
        let cardNouveauFilm = creerCard(donnees.filmInsere);
        document.getElementById('contenu').firstElementChild.innerHTML += cardNouveauFilm;
        listeFilms.push(donnees.filmInsere);
    }
}

let reponseEnlever = (donnees) => {
    afficherMessage(donnees, 4);
    if (donnees.OK) {
        let cardEnlever = document.getElementById(donnees.numFilmD);
        cardEnlever.parentNode.removeChild(cardEnlever);
        listeFilmsActuelle = listeFilms.filter((unFilm) => { 
            return unFilm.numFilm != donnees.numFilmD;
        });
        listeFilms = listeFilmsActuelle;
        alert(JSON.stringify(listeFilms));
    }
}

let creerVue = (action, donnees) => {
    switch(action) {
        case "enregistrer": reponseEnregistrer(donnees); break;
        case "lister": listerFilms(donnees); break;
        case "enlever": reponseEnlever(donnees); break;
    }
}