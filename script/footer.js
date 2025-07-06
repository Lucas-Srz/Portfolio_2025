console.log('footer.js');
import {footerMobile} from './footerMobile.js';
import {footerLaptop} from './footerLaptop.js';
window.onload = loadFooter;

/**
 * Fonction utilisée au changement de la page qui va permettre la sélection du bon affichage du footer en fonction de la taille de l'écran
 */
function loadFooter(){
    let taille = window.innerWidth;
    
    /* Sélection de la bonne fonction grâce à la taille */
    if(taille <= 425 ){
        console.log("Taille : " + taille +" (Mobile)");
        footerMobile();
    } else if(taille >= 426 && taille <= 768 ){
        console.log("Taille : " + taille +" (Tablette)");
        // footerTablette();
        footerMobile();
    } else if(taille >= 769 && taille <= 1024 ){
        console.log("Taille : " + taille +" (Laptop)");
        footerLaptop();
    } else if(taille >= 1025 ){
        console.log("Taille : " + taille +" (Desktop)");
        // footerDesktop();
        footerLaptop();
    }
}