let reqEnregistrer = (action) => {
	 
    var formFilm = new FormData(document.getElementById('formEnreg'));
	formFilm.append("action","enregistrer");
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
		creerVue('enregistrer',reponse);
	})
	.fail(function() {
    	alert( "error" );
  	})
	.always(function() {
		alert( "complete" );
	});
}

let reqLister = (action) => {
	var formFilm = new FormData();
	formFilm.append("action","lister");
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
			creerVue('lister',reponse.listeFilms);
		}else{
			alert("Problème pour lister");
		}
	})
	.fail(function() {
    	alert( "error" );
  	})
	.always(function() {
		alert( "complete" );
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
    }
}