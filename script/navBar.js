console.log("Entrée dans le fichier navBar.js");

var dom_navBar = document.getElementById('navBar');
var dom_openBtn = document.getElementById('openBtn');
var dom_closeBtn = document.getElementById('closeBtn');
var domNav = document.getElementsByTagName("nav")[0];

var addA, addSpanGroupe, addSpanUn, addSpanDeux, addSpanTrois;


function init(){
    console.log("Fonction : Init");
    
    addA = document.createElement("a");
    addA.setAttribute("href","#");
    addA.setAttribute("id","openBtn");
    addA.setAttribute("onclick","openNav()");
    domNav.appendChild(addA);

    addSpanGroupe = document.createElement("span");
    addSpanGroupe.setAttribute("class","burgerIconeOpen");
    addA.appendChild(addSpanGroupe);

    addSpanUn = document.createElement("span");
    addSpanGroupe.appendChild(addSpanUn);

    addSpanDeux = document.createElement("span");
    addSpanGroupe.appendChild(addSpanDeux);

    addSpanTrois = document.createElement("span");
    addSpanGroupe.appendChild(addSpanTrois);
}

// dom_openBtn.onclick = openNav;
// dom_closeBtn.onclick = closeNav;

function openNav(){
    dom_navBar.classList.add("active");

    addA.remove();

    addA = document.createElement("a");
    addA.setAttribute("href","#");
    addA.setAttribute("id","openBtn");
    addA.setAttribute("onclick","closeNav()");
    domNav.appendChild(addA);

    addSpanGroupe = document.createElement("span");
    addSpanGroupe.setAttribute("class","burgerIconeClose");
    addA.appendChild(addSpanGroupe);

    addSpanUn = document.createElement("span");
    addSpanUn.setAttribute("class","un");
    addSpanGroupe.appendChild(addSpanUn);

    addSpanDeux = document.createElement("span");
    addSpanDeux.setAttribute("class","deux");
    addSpanGroupe.appendChild(addSpanDeux);
}

function closeNav(){
    dom_navBar.classList.remove("active");

    console.log("test2");
    addA.remove();
    init();
}

init();