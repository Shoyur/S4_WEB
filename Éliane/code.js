function changer() {
    let valeur1 = document.getElementById("in1").value;
    let valeur2 = document.getElementById("in2").value;
    let reponse = parseInt(valeur1) + parseInt(valeur2);
    document.getElementById("span1").textContent = reponse;
    console.log("reponse= " + reponse);
    
}