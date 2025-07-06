let domFooter = document.getElementsByTagName("footer")[0];
let connIsOpen = false;
let contIsOpen = false;
let meleIsOpen = false;
let firstOpen = true;

/**
 * Fonction qui affiche le footer de taille mobile
 */
export function footerLaptop(){
    console.log(domFooter);
    console.log("Laptop");

    let divChoix, div, divGene;
    let titres = ["Contact", "Connexion", "Mentions Legales"];
    let liens = ["cont", "conn", "mele"];

    // divChoix
    divChoix = document.createElement("div");
    divChoix.setAttribute("id", "Choix");
    domFooter.appendChild(divChoix);

        // Affichage des titres
        for (let i = 0; i < 3; i++) {
            console.log(i);
            
            // Div
            div = document.createElement("div");
            div.innerText = titres[i];
            if(i == 0){
                div.setAttribute("class", liens[i] + " isSelected");
            }else{
                div.setAttribute("class", liens[i] + " notSelected");
            }
            div.addEventListener("click", () => choix(liens[i]));
            divChoix.appendChild(div);
        }

    // divGene
    divGene = document.createElement("div");
    divGene.setAttribute("id", "Gene");
    domFooter.appendChild(divGene);

    cont();
    contIsOpen = true;
}

/* Fonction choix */
function choix(select){
    // console.log("choix() : " + select);

    // console.log("START | Cont : " + contIsOpen + " | Conn : " + connIsOpen + " | Mele : " + meleIsOpen + " | FirstOpen : " + firstOpen);

    let domContact = document.getElementById("reseaux");
    let domConnexion = document.getElementById("formulaire");
    let domMentionLegal = document.getElementById("texte");

    let domBtnCont = document.getElementsByClassName("cont")[0];
    let domBtnConn = document.getElementsByClassName("conn")[0];
    let domBtnMele = document.getElementsByClassName("mele")[0];

    // Suppression du contact affiché de base
    if(contIsOpen == true && firstOpen == true){
        console.log("FirstOpen");
        
        domContact.remove();
        domBtnCont.setAttribute("class", "cont notSelected");
        contIsOpen = false;
        firstOpen = false;
        console.log("FinOpen");
    }

    if (select == "cont") {
        // console.log("Contact");
        if(!contIsOpen){
            if (connIsOpen) {
                domConnexion.remove();
                domBtnConn.setAttribute("class", "conn notSelected");
                connIsOpen = false;
            }
            if (meleIsOpen) {
                domMentionLegal.remove();
                domBtnMele.setAttribute("class", "mele notSelected");
                meleIsOpen = false;
            }
            // Ouvrir
            cont();
            domBtnCont.setAttribute("class", "cont isSelected");
            contIsOpen = true;
        }
    } else if (select == "conn") {
        // console.log("Connexion");
        if(!connIsOpen){
            if (contIsOpen) {
                domContact.remove();
                domBtnCont.setAttribute("class", "cont notSelected");
                contIsOpen = false;
            }
            if (meleIsOpen) {
                domMentionLegal.remove();
                domBtnMele.setAttribute("class", "mele notSelected");
                meleIsOpen = false;
            }
            conn();
            domBtnConn.setAttribute("class", "conn isSelected");
            connIsOpen = true;
        }
    } else if (select == "mele") {
        // console.log("Mentions légales");
        if(!meleIsOpen){
            if (contIsOpen) {
                domContact.remove();
                domBtnCont.setAttribute("class", "cont notSelected");
                contIsOpen = false;
            }
            if (connIsOpen) {
                domConnexion.remove();
                domBtnConn.setAttribute("class", "conn notSelected");
                connIsOpen = false;
            }
            mele();
            domBtnMele.setAttribute("class", "mele isSelected");
            meleIsOpen = true;
        }
    }
}




/* Fonction cont qui permet d'afficher la partie correspondante */
function cont(){
    console.log("cont");
    let div, img, lien;
    let images = ["mail", "telephone", "linkedin", "github"];
    let domGeneral = document.getElementById("Gene");

    // Div
    div = document.createElement("div");
    div.setAttribute("id", "reseaux");
    domGeneral.appendChild(div);
    for (let i = 0; i < 4; i++) {
        // A
        lien = document.createElement("a");
        if(i == 0){lien.setAttribute("href", "mailto:suarez.lucas.pro@gmail.com");} else
        if(i == 1){lien.setAttribute("href", "tel:0651453617");} else
        if(i == 2){lien.setAttribute("href", "https://www.linkedin.com/in/lucas-srz/");} else
        if(i == 3){lien.setAttribute("href", "https://github.com/Lucas-Srz");}
        lien.setAttribute("target", "_blank");
        div.appendChild(lien);
            // Img
            img = document.createElement("img");
            img.setAttribute("src", "../media/img/" + images[i] + ".svg");
            img.setAttribute("alt", "Icon " + images[i]);
            lien.appendChild(img);
    }
    
}

/* Fonction conn qui permet d'afficher la partie correspondante */
function conn(){
    console.log("conn");
    let domGeneral = document.getElementById("Gene");
    let div, divConnexion, divLigne, divInscription, form, label, input, divLin, divCer, lien;
    
    // Div
    div = document.createElement("div");
    div.setAttribute("id", "formulaire");
    domGeneral.appendChild(div);
        // Div Connexion
        divConnexion = document.createElement("div");
        divConnexion.setAttribute("class", "connexion");
        div.appendChild(divConnexion);
            // Form
            form = document.createElement("form");
            form.setAttribute("action", "#");
            form.setAttribute("method", "post");
            divConnexion.appendChild(form);
                // Label Pseudo
                label = document.createElement("label");
                label.setAttribute("for", "idPseudoC");
                label.innerText = "Pseudo :";
                form.appendChild(label);
                // Input Pseudo
                input = document.createElement("input");
                input.setAttribute("type", "text");
                input.setAttribute("id", "idPseudoC");
                input.setAttribute("name", "pseudoC");
                form.appendChild(input);
                // Label Mot de passe
                label = document.createElement("label");
                label.setAttribute("for", "idMdpC");
                label.innerText = "Mot de passe :";
                form.appendChild(label);
                // Input Mot de passe
                input = document.createElement("input");
                input.setAttribute("type", "password");
                input.setAttribute("id", "idMdpC");
                input.setAttribute("name", "mdpC");
                form.appendChild(input);
                // Input Submit
                input = document.createElement("input");
                input.setAttribute("type", "submit");
                input.setAttribute("value", "Se connecter");
                input.setAttribute("name", "connexion");
                input.setAttribute("id", "btn");
                form.appendChild(input);

        // Div Ligne
        divLigne = document.createElement("div");
        divLigne.setAttribute("class", "divLigne");
        div.appendChild(divLigne);
            // Div Lin
            divLin = document.createElement("div");
            divLin.setAttribute("class", "lin");
            divLigne.appendChild(divLin);
                // Div Cer
                divCer = document.createElement("div");
                divCer.setAttribute("class", "cer");
                divLin.appendChild(divCer);

        // Div Inscription
        divInscription = document.createElement("div");
        divInscription.setAttribute("class", "divForm")
        div.appendChild(divInscription);
            // Form
            form = document.createElement("form");
            form.setAttribute("action", "#");
            form.setAttribute("method", "post");
            divInscription.appendChild(form);
                // Label Pseudo
                label = document.createElement("label");
                label.setAttribute("for", "idPseudoI");
                label.innerText = "Pseudo :";
                form.appendChild(label);
                // Input Pseudo
                input = document.createElement("input");
                input.setAttribute("type", "text");
                input.setAttribute("id", "idPseudoI");
                input.setAttribute("name", "pseudoI");
                form.appendChild(input);
                // Label Email
                label = document.createElement("label");
                label.setAttribute("for", "idEmailI");
                label.innerText = "Adresse mail :";
                form.appendChild(label);
                // Input Email
                input = document.createElement("input");
                input.setAttribute("type", "email");
                input.setAttribute("id", "idEmailI");
                input.setAttribute("name", "emailI");
                form.appendChild(input);
                // Label Mot de passe
                label = document.createElement("label");
                label.setAttribute("for", "idMdpI");
                label.innerText = "Mot de passe :";
                form.appendChild(label);
                // Input Mot de passe
                input = document.createElement("input");
                input.setAttribute("type", "password");
                input.setAttribute("id", "idMdpI");
                input.setAttribute("name", "mdpI");
                form.appendChild(input);
                // Label Confirmation Mot de passe
                label = document.createElement("label");
                label.setAttribute("for", "idConfMdpI");
                label.innerText = "Confirmation du mot de passe :";
                form.appendChild(label);
                // Input Confirmation Mot de passe
                input = document.createElement("input");
                input.setAttribute("type", "password");
                input.setAttribute("id", "idConfMdpI");
                input.setAttribute("name", "confMdpI");
                form.appendChild(input);
                // Label Ckeckbox
                label = document.createElement("label");
                label.setAttribute("for", "idCheck");
                form.appendChild(label);
                // Input Checkbox
                input = document.createElement("input");
                input.setAttribute("type", "checkbox");
                input.setAttribute("id", "idCheck");
                input.setAttribute("name", "check");
                label.appendChild(input);
                    // A lien
                    lien = document.createElement("a");
                    lien.setAttribute("href", "#");
                    lien.innerText = "J'accepte les conditions d'utilisation";
                    label.appendChild(lien);
                // Input Submit
                input = document.createElement("input");
                input.setAttribute("type", "submit");
                input.setAttribute("value", "Valider votre inscription");
                input.setAttribute("name", "connexion");
                form.appendChild(input);
}

/* Fonction mele qui permet d'afficher la partie correspondante */
function mele(){
    console.log("mele");

    let domGeneral = document.getElementById("Gene");
    let txtMl = [
        "Information Générales",
        "Propriété Intellectuelle",
        "Protection des données personnelles",
        "Cookies",
        "Responsabilités",
        "Droit applicable et juridiction",
    ]
    let div, ol, li;
    
    // Div
    div = document.createElement("div");
    div.setAttribute("id", "texte")
    domGeneral.appendChild(div);
        // Ol
        ol = document.createElement("ol");
        div.appendChild(ol);
            // Li
            for (let i = 0; i < 5; i++) {
                li = document.createElement("li");
                li.innerText = txtMl[i];
                ol.appendChild(li);
            }
}