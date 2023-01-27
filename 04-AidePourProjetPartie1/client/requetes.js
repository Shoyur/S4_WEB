const chargerFilms = () => {
    $.ajax({
        url:"serveur/films/controleurFilms.php",
        type:POST,
        data:{"action":"lister"},
        dataType:'json',
        success: (listeFilms) => {
            afficherCardsFilms(listeFilms);
        },
        fail: (e) => {
            alert(`Gros probléme!!! : ${e.message()}`);
        }
    });
}