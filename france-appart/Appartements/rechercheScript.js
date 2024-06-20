/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function myFunctionlanguagefr() {
    window.close();
    window.open("recherche_An.html");

}

function myFunctionlanguageAn() {
    window. close();
    window.open("recherche.html");
}

function mapDisplay() {
    document.getElementById("Map").style.display = "block";
    document.getElementById("Map").style.height = "850px";
    document.getElementById("logements_Trouve").style.display = "none";
    document.getElementById("btnLogements").style.display = "flex";
    document.getElementById("btnMap").style.display = "none";
}

function logementsDisplay() {
    document.getElementById("Map").style.display = "none";
    document.getElementById("logements_Trouve").style.display = "block";
    document.getElementById("btnLogements").style.display = "none";
    document.getElementById("btnMap").style.display = "block ";
}
