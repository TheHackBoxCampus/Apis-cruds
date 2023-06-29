import "./components/form-area.js";

// EVENT TABLES 
const btnArea = document.querySelector("#table-area"); 
const btnJourney = document.querySelector("#table-journey"); 
const main = document.querySelector("main"); 

const changeTable = (UI) => main.innerHTML = UI;
btnArea.addEventListener("click", () => changeTable("<form-area></form-area>")); 
btnJourney.addEventListener("click", () => changeTable("journey")); 

