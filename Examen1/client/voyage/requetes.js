let listeVoyages;

let reqEnregistrer = (action) => {
    var formVoyage = new FormData(document.getElementById('formEnreg'));
	formVoyage.append("action", action);
	$.ajax({
		type : "POST",
		url : "serveur/voyage/voyageControleur.php",
		data : formVoyage, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	}).done((reponse)  => { creerVue('enregistrer', reponse); })
	.fail(function() { alert( "error" ); })
	.always(function() {  });
}

let reqLister = (action) => {
	var formVoyage = new FormData();
	formVoyage.append("action", action);
	$.ajax({
		type : "POST",
		url : "serveur/voyage/voyageControleur.php",
		data : formVoyage, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	}).done((reponse)  => {
		//alert(reponse);
		if (reponse.OK) {
			//alert(JSON.stringify(reponVoyage));
			listeVoyages = reponse.listeVoyages;
			creerVue('lister', listeVoyages);
		}
		else { alert("Problème à lister les voyages au niveau de requetes.js reqLister()..."); }
	})
	.fail(function() { alert("error"); })
	.always(function() {  });
}

let reqEnlever = (action) => {
    var formVoyage = new FormData(document.getElementById('formEnlever'));
	formVoyage.append("action", action);
	let idVoyage = formVoyage.get('num');
	$.ajax({
		type : "POST",
		url : "serveur/voyage/voyageControleur.php",
		data : formVoyage, //$('#formEnreg').serialize();
		dataType : "json", //text pour le voir en format de string
		async: false,
		cache: false,
		contentType : false,
		processData : false
	}).done((reponse)  => {
		reponse['idVoyage'] = idVoyage;
		creerVue('enlever', reponse);
	})
	.fail(function() { alert("error"); })
	.always(function() {  });
}

let requeteVoyageServeur = (action) => {
	switch(action){
		case "enregistrer": reqEnregistrer(action); break;
		case "lister": reqLister(action); break;
		case "enlever": reqEnlever(action); break;
	}
}