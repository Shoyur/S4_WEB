// Si nombre pair:
function isEven(num: number): boolean {
    if (num % 2 === 0) { return true; }
    return false;
    // ou mieux :
    return !(num % 2);
    // si on envoie 5, 5 mod 2 = 1, !1 = 0, donc false, donc 5 n'est pas pair
}


// si mot plus long que 6 :
function isAcceptablePassword(password: string): boolean {
    return (password.length > 6);
}


// retourne seulement 1er mot
function firstWord(text: string): string {
    return text.split(" ")[0];
}


// string inversé :
function backwardString(value: string): string {
    return value.split("").reverse().join("");
    // split crée un array, reverse inverse un array, join mets tout l'array ensemble
}


// la longueur d'un number :
function numberLength(value: number): number {
    return value.toString().length;
}

// ********** J'ai oublié les parenthèses () à reverse() et toString()
// ********** Ne jamais les oublier, et essayer ça si j'ai un bug !!!!


// savoir le mot contient une ou des minuscules
function isAllUpper(text: string): boolean {
    return text.toUpperCase() == text;
    // on aurait pas pu prendre
    // return (/[a-z]/.test(text));
    // ou
    // return text.match(/[a-z]/);
    // cela ne fonctionnerait qu'avec a-z sans accents ou autres exceptions
}   


// trouver un string entre 2 caractères :
function betweenMarkers(text: string, start: string, end: string): string {
    return text.split(start)[1].split(end)[0];
}


// combien il y a de zéros à la fin d'un number :
function endZeros(a: number): number {
    let b: string[] = a.toString().split("");
    let c: number = 0;
    for (let i = b.length-1; i>=0; i--) {
        if (b[i] == "0") { c++; }
        else { break; }
    }
    return c;
}


// combien de zéros au début d'un string :
function beginningZeros(a: string): number {
    let b: string[] = a.split("");
    let c: number = 0;
    for (let i = 0; i < b.length; i++) {
        if (b[i] == "0") { c++; }
        else { break; }
    }
    return c;
}


// s'assurer que la phrase début par une majuscule et se termine par un point :
function correctSentence(text: string): string {
    return text.charAt(0).toUpperCase() + text.slice(1) + (text.endsWith(".") ? "": ".");
}



// trouver le chiffre le plus grand dans un nombre :
function maxDigit(value: number): number {
    let s: string[] = value.toString().split("");
    let p: number = 0;
    for (let i = 0; i < s.length; i++) {
       if (parseInt(s[i]) > p) {
           p = parseInt(s[i]);
       }
    }
    return p;
}



// si n est dans ar, retourner ar[n] à la n, sinon retourner -1 :`
function indexPower(ar: number[], n: number): number {
    if (!ar.includes(n)) { return -1; }
    return Math.pow(ar[n], n);
}



// mais j'avais mal compris la question
// c'était plutôt, s'il existe un nombre à l'index n, retourner ar[n] à la n, sinon retourner -1 :
function indexPower2(ar: number[], n: number): number {
    if (n >= ar.length) { return -1; }
    return Math.pow(ar[n], n);
    // et on peut aussi faire :
    // return ar[n]**n;
}



// s'il y plus qu'une correspondance à un caractère, erreur et donc pas isométrique :
function isometricStrings(line1: string, line2: string): boolean {
    if (line1 == "") { return true; }
    let map = new Map<string, string>();
    for (let i = 0; i < line1.length; i++) {
        if (map.has(line1.charAt(i)) && (map.get(line1.charAt(i)) != line2.charAt(i))) { return false; }
        else { map.set(line1.charAt(i), line2.charAt(i)); }
    }
    return true;
}
// console.log(isometricStrings("add", "egg"), true);
// console.log(isometricStrings("foo", "bar"), false);
// console.log(isometricStrings("bar", "foo"), true);



// cherche seulement les nombres seuls dans un string et les additionne :
function sumNumbers(text: string): number {
    let reponse: number = 0;
    let t: string[] = text.split(" ");
    for (let i = 0; i < t.length; i++) {
        if (Number(t[i])) {
            reponse += parseInt(t[i]);
        }
    }
    return reponse;
}



// chercher premier mot, mais il peut y avoir des points ou espaces ou virgules n'importe où,
// et en n'importe quelle quantité, et un mot peut contenir un apostrophe :
function firstWord2(text: string): string {
    return text.replace(/\./g, " ").trim().split(/[\s,]+/)[0];
    // remplace tous (g) les points (\.) par espace
    // enlève les espaces au début et à la fin
    // prend le 1er après avoir séparé par espace ou virgule
    // qu'est ce que le "+" ?
}



// 