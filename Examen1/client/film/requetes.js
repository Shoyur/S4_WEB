let listeFilms;
let reqEnregistrer = (action) => {
	 
    var formFilm = new FormData(document.getElementById('formEnreg'));
	formFilm.append("action", action);
	$.ajax({
		type : "POST",
		url : "serveur/film/filmControleur.php",
		data : formFilm, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	}).done((reponse)  => { //alert(reponse);
		creerVue('enregistrer',reponse);
	})
	.fail(function() {
    	alert( "error" );
  	})
	.always(function() {
		
	});
}

let reqLister = (action) => {
	var formFilm = new FormData();
	formFilm.append("action", action);
	$.ajax({
		type : "POST",
		url : "serveur/film/filmControleur.php",
		data : formFilm, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	}).done((reponse)  => {
		//alert(reponse);
		if(reponse.OK){
			//alert(JSON.stringify(reponse.listeFilms));
			listeFilms = reponse.listeFilms;
			creerVue('lister',listeFilms);
		}else{
			alert("Problème pour lister");
		}
	})
	.fail(function() {
    	alert( "error" );
  	})
	.always(function() {
		
	});
}

let reqEnlever = (action) => {
	 
    var formFilm = new FormData(document.getElementById('formEnlever'));
	formFilm.append("action", action);
	let idFilm = formFilm.get('num');
	$.ajax({
		type : "POST",
		url : "serveur/film/filmControleur.php",
		data : formFilm, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	}).done((reponse)  => {
		reponse['idFilm'] = idFilm;
		creerVue('enlever',reponse);
	})
	.fail(function() {
    	alert( "error" );
  	})
	.always(function() {
		
	});
}

// Contrôleur de requêtes
let requeteFilmServeur = (action) => {
    switch(action){
        case "enregistrer":
            reqEnregistrer(action);
        break;
        case "lister":
            reqLister(action);
        break;
		case "enlever":
            reqEnlever(action);
        break;
    }
}