<!-- Footer -->
<footer>
    <section>
        <!-- <article id="contact"> -->
        <div class="divTitle isSelected" data-choix="cont">
            <h2>Contact</h2>
            <img src="../../media/img/angle.svg" alt="Image du cheveron" id="chevron_cont" class="rotate">
        </div>
        <span class="ligne"></span>
        <div class="divDescCont">
            <div class="link">
                <a href="mailto:suarez.lucas.pro@gmail.com" target="_blank">
                    <img src="../media/img/mail.svg" alt="Icon mail">
                </a>
                <a href="tel:0651453617" target="_blank">
                    <img src="../../media/img/telephone.svg" alt="Icon Telephone">
                </a>
                <a href="https://www.linkedin.com/in/lucas-srz/" target="_blank">
                    <img src="../../media/img/linkedin.svg" alt="Icon Linkedin">
                </a>
                <a href="https://github.com/Lucas-Srz" target="_blank">
                    <img src="../../media/img/github.svg" alt="Icon Github">
                </a>
            </div>
        </div>
        <!-- </article> -->
        <!-- <article id="connexion"> -->
        <div class="divTitle notSelected" data-choix="conn">
            <h2>Connexion</h2>
            <img src="../../media/img/angle.svg" alt="Image du cheveron" id="chevron_conn">
        </div>
        <span class="ligne"></span>
        <div class="divDescConn notDisplay">
            <div class="troisFormulaire">
                <div>
                    <form action="#" method="POST">
                        <label for="idEmailCon">Adresse mail :</label>
                        <input type="email" id="idEmailCon" name="emailCon">

                        <label for="idPasswordCon">Mot de passe :</label>
                        <input type="password" id="idPasswordCon" name="passwordCon">

                        <a href="#">Mot de passe oublié</a>

                        <input type="submit" value="Se connecter" name="CONNEXION">
                    </form>
                </div>
                <div class="divLigne">
                    <div class="lin">
                        <div class="cer"></div>
                    </div>
                </div>
                <div>
                    <form action="/view/signup.php" method="POST">
                        <label for="idLastNameIns">Nom :</label>
                        <input type="text" name="lastNameIns" id="idLastNameIns" placeholder="<?= isset($errorsChampsIns['lastNameIns']) ? $errorsChampsIns['lastNameIns'] : "" ?>">

                        <label for=" idfirstNameIns">Prénom :</label>
                        <input type="text" name="firstNameIns" id="idfirstNameIns" placeholder="<?= isset($errorsChampsIns['firstNameIns']) ? $errorsChampsIns['firstNameIns'] : "" ?>">

                        <label for=" idEmailIns">Adresse mail :</label>
                        <input type="email" name="emailIns" id="idEmailIns" placeholder="<?= isset($errorsChampsIns['emailIns']) ? $errorsChampsIns['emailIns'] : "" ?>">

                        <label for=" idPasswordIns">Mot de passe :</label>
                        <input type="password" name="passwordIns" id="idPasswordIns" placeholder="<?= isset($errorsChampsIns['passwordIns']) ? $errorsChampsIns['passwordIns'] : "" ?>">

                        <label for=" idPasswordConfIns">Confirmation du mot de passe :</label>
                        <input type="password" name="passwordConfIns" id="idPasswordConfIns" placeholder="<?= isset($errorsChampsIns['passwordConfIns']) ? $errorsChampsIns['passwordConfIns'] : "" ?>">

                        <div class="check">
                            <label for=" idCheck" class="check"></label>
                            <input type="checkbox" name="check" id="idCheck">
                            <a href="#">J'accepte les conditions d'utilisation</a>
                        </div>

                        <p class="messageError"><?= isset($errorsChampsIns['messageError']) ? $errorsChampsIns['messageError'] : "" ?></p>

                        <input type="submit" value="Valider votre inscription" name="INSCRIPTION">

                        <p class="messageValid"><?= isset($errorsChampsIns['messageValid']) ? $errorsChampsIns['messageValid'] : "" ?></p>

                    </form>
                </div>
            </div>
        </div>
        <!-- </article> -->
        <!-- <article id="mentionLegal"> -->
        <div class="divTitle notSelected" data-choix="mele">
            <h2>Mentions Legales</h2>
            <img src="../../media/img/angle.svg" alt="Image du cheveron" id="chevron_mele">
        </div>
        <span class="ligne"></span>
        <div class="divDescMele notDisplay">
            <ol>
                <a href="#">
                    <li>Information Générales</li>
                </a>
                <a href="#">
                    <li>Propriété Intellectuelle</li>
                </a>
                <a href="#">
                    <li>Protection des données personnelles</li>
                </a>
                <a href="#">
                    <li>Cookies</li>
                </a>
                <a href="#">
                    <li>Responsabilités</li>
                </a>
            </ol>
        </div>
        </article>
    </section>
</footer>