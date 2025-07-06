let domFooter = document.getElementsByTagName("footer")[0];
let connIsOpen = false;
let contIsOpen = false;
let meleIsOpen = false;


/**
 * Fonction qui affiche le footer de taille mobile
 */
export function footerMobile(){
    // console.log(domFooter);

    // Variables de footerMobile()
    let div, div2, titre, img, span;
    let titres = ["Contact", "Connexion", "Mentions Legales"];
    let liens = ["cont", "conn", "mele"];

    // Affichage des titres
    for (let i = 0; i < 3; i++) {
        // console.log(liens[i]);
        
        // Div
        div = document.createElement("div");
        div.setAttribute("class", "section");
        div.setAttribute("id", liens[i]);
        domFooter.appendChild(div);
            // Div
            div2 = document.createElement("div");
            div2.setAttribute("class", "boxTitre");
            // Fonctionnement à changer en fonction 
            // if(i == 0){div2.addEventListener("click", cont);} else
            // if(i == 1){div2.addEventListener("click", conn);} else
            // if(i == 2){div2.addEventListener("click", mele);}
            div2.addEventListener("click", () => choix(liens[i]));
            div.appendChild(div2);
                // Titre
                titre = document.createElement("h2");
                titre.innerText = titres[i];
                div2.appendChild(titre);
                // Image
                img = document.createElement("img");
                img.setAttribute("src", "../media/img/angle.svg");
                img.setAttribute("alt", "Image du chevrons");
                img.setAttribute("id", "chevron_" + liens[i]);
                div2.appendChild(img);
            // Span
            span = document.createElement("span");
            span.setAttribute("class", "ligne");
            div.appendChild(span);
    }
}

/* Fonction choix */
function choix(select){
    // console.log("choix() : " + select);

    let domContact = document.getElementById("reseaux");
    let domConnexion = document.getElementById("formulaire");
    let domMentionLegal = document.getElementById("texte");
    
    let chevCont = document.getElementById("chevron_cont")
    let chevConn = document.getElementById("chevron_conn")
    let chevMele = document.getElementById("chevron_mele")

    if (select == "cont") {
        // console.log("Contact");
        if (contIsOpen) {
            // Fermer
            domContact.remove();
            chevCont.setAttribute("class", "");
            contIsOpen = false;
        } else {
            // Fermer les autres
            if (connIsOpen) {
                domConnexion.remove();
                chevConn.setAttribute("class", "");
                connIsOpen = false;
            }
            if (meleIsOpen) {
                domMentionLegal.remove();
                chevMele.setAttribute("class", "");
                meleIsOpen = false;
            }
            // Ouvrir
            cont();
            contIsOpen = true;
        }
    } else if (select == "conn") {
        // console.log("Connexion");
        if (connIsOpen) {
            domConnexion.remove();
            chevConn.setAttribute("class", "");
            connIsOpen = false;
        } else {
            if (contIsOpen) {
                domContact.remove();
                chevCont.setAttribute("class", "");
                contIsOpen = false;
            }
            if (meleIsOpen) {
                domMentionLegal.remove();
                chevMele.setAttribute("class", "");
                meleIsOpen = false;
            }
            conn();
            connIsOpen = true;
        }
    } else if (select == "mele") {
        // console.log("Mentions légales");
        if (meleIsOpen) {
            domMentionLegal.remove();
            chevMele.setAttribute("class", "");
            meleIsOpen = false;
        } else {
            if (contIsOpen) {
                domContact.remove();
                chevCont.setAttribute("class", "");
                contIsOpen = false;
            }
            if (connIsOpen) {
                domConnexion.remove();
                chevConn.setAttribute("class", "");
                connIsOpen = false;
            }
            mele();
            meleIsOpen = true;
        }
    }
}

/* Fonction cont qui permet d'afficher la partie correspondante */
function cont(){
    console.log("cont");
    let domCont = document.getElementById("cont");
    let div, img, lien;
    let images = ["mail", "telephone", "linkedin", "github"];

    // Changement du sense du chevrons
    let domChevrons = document.getElementById("chevron_cont");
    domChevrons.setAttribute("class", "rotation");
    
    // Div
    div = document.createElement("div");
    div.setAttribute("id", "reseaux");
    domCont.appendChild(div);
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
    let domConn = document.getElementById("conn");
    let div, divConnexion, divLigne, divInscription, form, label, input, divLin, divCer, lien;

    // Changement du sense du chevrons
    let domChevrons = document.getElementById("chevron_conn");
    domChevrons.setAttribute("class", "rotation");
    
    // Div
    div = document.createElement("div");
    div.setAttribute("id", "formulaire");
    domConn.appendChild(div);
        // Div Connexion
        divConnexion = document.createElement("div");
        divConnexion.setAttribute("class", "div2");
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
                input.setAttribute("name", "inscription");
                form.appendChild(input);
}

/* Fonction mele qui permet d'afficher la partie correspondante */
function mele(){
    console.log("mele");
    let domMele = document.getElementById("mele");
    let txtMl = [
        "Information Générales",
        "Propriété Intellectuelle",
        "Protection des données personnelles",
        "Cookies",
        "Responsabilités",
        "Droit applicable et juridiction",
    ]
    let div, ol, li;

    // Changement du sense du chevrons
    let domChevrons = document.getElementById("chevron_mele");
    domChevrons.setAttribute("class", "rotation");
    
    // Div
    div = document.createElement("div");
    div.setAttribute("id", "texte")
    domMele.appendChild(div);
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