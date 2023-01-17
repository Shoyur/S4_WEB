let validerFormEnreg = () => {
    let msgErrEnreg="";
    let valide = true;
    let res = document.getElementById('res').value;
    if (res.length < 5 ) {
        valide = false;
        msgErrEnreg+="Le nom du réalisateur doit avoir au moins 5 caractères!<br/>";
    }
    if (!valide) {
        document.getElementById('msgErrEnreg').innerHTML=msgErrEnreg;
        setInterval(()=>{
            document.getElementById('msgErrEnreg').innerHTML="";
        }, 5000);
    }
    return valide;
}

let lister = () => {
    document.getElementById('formLister').submit();
}