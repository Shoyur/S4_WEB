let listeFilms;
let numTemp = 0;

// CREATE
let reqEnregistrer = (action) => {
    var formFilm = new FormData(document.getElementById('formEnreg'));
	formFilm.append("action", action);
	formFilm.append("fichier", formFilm.get("image").name);
	$.ajax({
		type : "POST",
		url : "Films/filmsControleur.php",
		data : formFilm, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	})
	.done((reponse)  => { creerVue('enregistrer', reponse); })
	.fail(function() { alert( "error[C]" ); })
	.always(function() {  });
}

// READ
let reqLister = () => {
	var formFilm = new FormData();
	formFilm.append("action", "lister");
	$.ajax({
		type : "POST",
		url : "Films/filmsControleur.php",
		data : formFilm,
		dataType : "json",
		async: false,
		cache: false,
		contentType : false,
		processData : false
	})
	.done((reponse)  => {
		// alert(reponse);
		if (reponse.OK) {
			// alert(JSON.stringify(reponse));
			listeFilms = reponse.listeFilms;
			creerVue('lister', listeFilms);
		}
		else { alert("Problème à lister les films au niveau de requetes.js reqLister()..."); }
	})
	.fail(function($d) { alert("error[R]\n",$d); })
	.always(function() {  });
}

// UPDATE MAIS SEULEMENT PRENDRE LE NUMÉRO
let reqModifierN = () => {
    var formFilm = new FormData(document.getElementById('formUpdateN'));
	numTemp = formFilm.get("numFilmUQ");
	for (let unFilm  of listeFilms) { 
		if (unFilm.numFilm == numTemp) {
			document.getElementById("titreU").value = unFilm.titre;
			document.getElementById("classementU").value = unFilm.classement;
			document.getElementById("categorieU").value = unFilm.categorie;
		}
	}
}

// UPDATE
let reqModifier = (action) => {
    var formFilm = new FormData(document.getElementById('formModifier'));
	formFilm.append("action", action);
	let numFilmD = formFilm.get('numFilmD');
	$.ajax({
		type : "POST",
		url : "Films/filmsControleur.php",
		data : formFilm, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	})
	.done((reponse)  => {
		// reponse['numFilmD'] = numFilmD;
		// creerVue('enlever', reponse);
	})
	.fail(function() { alert("error[U]"); })
	.always(function() {  });
}

// DELETE
let reqEnlever = (action) => {
    var formFilm = new FormData(document.getElementById('formEnlever'));
	formFilm.append("action", action);
	let numFilmD = formFilm.get('numFilmD');
	$.ajax({
		type : "POST",
		url : "Films/filmsControleur.php",
		data : formFilm, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	})
	.done((reponse)  => {
		reponse['numFilmD'] = numFilmD;
		creerVue('enlever', reponse);
	})
	.fail(function() { alert("error[D]"); })
	.always(function() {  });
}

let requeteFilmServeur = (action) => {
	switch(action){
		case "enregistrer": reqEnregistrer(action); break;
		case "lister": reqLister(); break;
		case "modifierN": reqModifierN(); break;
		case "modifier": reqModifier(action); break;
		case "enlever": reqEnlever(action); break;
	}
}