let afficherMessage = (donnees) => {
    document.getElementById('msg').innerHTML = donnees.message;
    alert(document.getElementById('msg').innerHTML);
    // setTimeout(
    //     () => {
    //          document.getElementById('msg').innerHTML = "";
    //     }, 3000
    // );
}

let creerCard = (unFilm) => {
    return `
        <div class="card" style="width: 18rem;">
        <img src="serveur/pochettes/${unFilm.pochette}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">${unFilm.titre}</h5>
            <p class="card-text">${unFilm.id}</p>
            <p class="card-text">${unFilm.duree}</p>
        </div>
        </div>
    `;
}

let lister = (listeFilms) => {
    let contenu = `<div class='row'>`;
    for(let unFilm  of listeFilms){
        contenu += creerCard(unFilm);
    }
    contenu += `</div>`;
    document.getElementById('contenu').innerHTML = contenu;
}

let creerVue = (action, donnees) => {
    // Contrôleur vue
    switch(action){
        case "enregistrer":
        case "modifier":
        case "enlever" :
            afficherMessage(donnees);
        break;
        case "lister" :
            //alert(donnees[0].titre);
            lister(donnees);
        break;
    }
}