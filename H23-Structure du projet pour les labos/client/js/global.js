console.info("info");
console.error("error");
console.warn("warn");
console.log("log");

console.debug("debug");
console.assert(document.getElementById("Test"), "No element found with ID 'Test'");
console.count("compte=");
console.count("compte=");
console.count("compte=");
console.count("compte=");
console.trace("La trace est?");
console.time("MyTimer")
console.timeLog("MyTimer")
console.timeEnd("MyTimer")

console.log("This is the first level");
console.group("First group");
console.log("In the first group");
console.group("Second group");
console.log("In the second group under first group");
console.warn("Still in the second group");
console.groupEnd();
console.log("Back to the first group");
console.groupEnd();

var user = {
    name:"Ravidu",
    age:25,
    job:"writer",
}
console.table(user);
var cities =["Washington","Delhi","London","Stockholm"];
console.table(cities);
var Destinations =[["USA", "Washington"],["India","Delhi"],["UK","London"],["Sweden","Stockholm"]];
console.table(Destinations);
var users = [
    {
        name: "Sam",
        age: 30
    },
    {
        name: "John",
        age: 45
    },
    {
        name: "Peter",
        age: 20
    }
 ];
 console.table(users);
 var roles = {
    writer: {
     firstname: "Ravindu",
     lastname: "Shehan", 
     email: "ravindu@gmail.com"
    }, 
    reviewer: {
     firstname: "Ravindu",
     lastname: "Shehan", 
     email: "ravindu@gmail.com"
    }
  }

  console.table (roles);

//   console.clear() // affiche : Console was cleared.