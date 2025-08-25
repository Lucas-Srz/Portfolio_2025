console.log('FooterMobile');

const TITLES = document.querySelectorAll(".divTitle");

const DOM_CONTACT_CHEVRON = document.querySelector("#chevron_cont");
const DOM_CONTACT_DESCRIPTION = document.querySelector(".divDescCont");
const DOM_CONTACT_TITLE = document.querySelector("[data-choix='cont']")

const DOM_CONNEXION_CHEVRON = document.querySelector("#chevron_conn");
const DOM_CONNEXION_DESCRIPTION = document.querySelector(".divDescConn");
const DOM_CONNEXION_TITLE = document.querySelector("[data-choix='conn']")

const DOM_MENTIONLEGAL_CHEVRON = document.querySelector("#chevron_mele");
const DOM_MENTIONLEGAL_DESCRIPTION = document.querySelector(".divDescMele");
const DOM_MENTIONLEGAL_TITLE = document.querySelector("[data-choix='mele']")

let contIsOpen = true;
let connIsOpen = false;
let meleIsOpen = false;
let firstOpen = true;


TITLES.forEach(div => {
    div.addEventListener("click", () => {
        const choixId = div.getAttribute("data-choix");
        choix(choixId);
    });
});

function choix(select) {
    console.log("choix() : " + select);

    // Suppression du contact affiché de base
    if(contIsOpen == true && firstOpen == true){
        console.log("FirstOpen");
        
        DOM_CONTACT_DESCRIPTION.classList.add("notDisplay");
        DOM_CONTACT_CHEVRON.classList.remove("rotate");
        DOM_CONTACT_TITLE.classList.remove("isSelected");
        DOM_CONTACT_TITLE.classList.add("notSelected");
        contIsOpen = false;
        firstOpen = false;
        console.log("FinOpen");
    }

    if (select == "cont") {
        // console.log("Contact");
        if (contIsOpen) {
            // Fermer
            DOM_CONTACT_DESCRIPTION.classList.add("notDisplay");
            DOM_CONTACT_CHEVRON.classList.remove("rotate");
            DOM_CONTACT_TITLE.classList.remove("isSelected");
            DOM_CONTACT_TITLE.classList.add("notSelected");
            contIsOpen = false;
        } else {
            // Fermer les autres
            if (connIsOpen) {
                DOM_CONNEXION_DESCRIPTION.classList.add("notDisplay");
                DOM_CONNEXION_CHEVRON.classList.remove("rotate");
                DOM_CONNEXION_TITLE.classList.remove("isSelected");
                DOM_CONNEXION_TITLE.classList.add("notSelected");
                connIsOpen = false;
            }
            if (meleIsOpen) {
                DOM_MENTIONLEGAL_DESCRIPTION.classList.add("notDisplay");
                DOM_MENTIONLEGAL_CHEVRON.classList.remove("rotate");
                DOM_MENTIONLEGAL_TITLE.classList.remove("isSelected");
                DOM_MENTIONLEGAL_TITLE.classList.add("notSelected");
                meleIsOpen = false;
            }
            // Ouvrir
            DOM_CONTACT_DESCRIPTION.classList.remove("notDisplay");
            DOM_CONTACT_CHEVRON.classList.add("rotate");
            DOM_CONTACT_TITLE.classList.add("isSelected");
            DOM_CONTACT_TITLE.classList.remove("notSelected");
            contIsOpen = true;
        }
    } else if (select == "conn") {
        // console.log("Connexion");
        if (connIsOpen) {
            DOM_CONNEXION_DESCRIPTION.classList.add("notDisplay");
            DOM_CONNEXION_CHEVRON.classList.remove("rotate");
            DOM_CONNEXION_TITLE.classList.remove("isSelected");
            DOM_CONNEXION_TITLE.classList.add("notSelected");
            connIsOpen = false;
        } else {
            if (contIsOpen) {
                DOM_CONTACT_DESCRIPTION.classList.add("notDisplay");
                DOM_CONTACT_CHEVRON.classList.remove("rotate");
                DOM_CONTACT_TITLE.classList.remove("isSelected");
                DOM_CONTACT_TITLE.classList.add("notSelected");
                contIsOpen = false;
            }
            if (meleIsOpen) {
                DOM_MENTIONLEGAL_DESCRIPTION.classList.add("notDisplay");
                DOM_MENTIONLEGAL_CHEVRON.classList.remove("rotate");
                DOM_MENTIONLEGAL_TITLE.classList.remove("isSelected");
                DOM_MENTIONLEGAL_TITLE.classList.add("notSelected");
                meleIsOpen = false;
            }
            DOM_CONNEXION_DESCRIPTION.classList.remove("notDisplay");
            DOM_CONNEXION_CHEVRON.classList.add("rotate");
            DOM_CONNEXION_TITLE.classList.add("isSelected");
            DOM_CONNEXION_TITLE.classList.remove("notSelected");
            connIsOpen = true;
        }
    } else if (select == "mele") {
        // console.log("Mentions légales");
        if (meleIsOpen) {
            DOM_MENTIONLEGAL_DESCRIPTION.classList.add("notDisplay");
            DOM_MENTIONLEGAL_CHEVRON.classList.remove("rotate");
            DOM_MENTIONLEGAL_TITLE.classList.remove("isSelected");
            DOM_MENTIONLEGAL_TITLE.classList.add("notSelected");
            meleIsOpen = false;
        } else {
            if (contIsOpen) {
                DOM_CONTACT_DESCRIPTION.classList.add("notDisplay");
                DOM_CONTACT_CHEVRON.classList.remove("rotate");
                DOM_CONTACT_TITLE.classList.remove("isSelected");
                DOM_CONTACT_TITLE.classList.add("notSelected");
                contIsOpen = false;
            }
            if (connIsOpen) {
                DOM_CONNEXION_DESCRIPTION.classList.add("notDisplay");
                DOM_CONNEXION_CHEVRON.classList.remove("rotate");
                DOM_CONNEXION_TITLE.classList.remove("isSelected");
                DOM_CONNEXION_TITLE.classList.add("notSelected");
                connIsOpen = false;
            }
            DOM_MENTIONLEGAL_DESCRIPTION.classList.remove("notDisplay");
            DOM_MENTIONLEGAL_CHEVRON.classList.add("rotate");
            DOM_MENTIONLEGAL_TITLE.classList.add("isSelected");
            DOM_MENTIONLEGAL_TITLE.classList.remove ("notSelected");
            meleIsOpen = true;
        }
    }
}