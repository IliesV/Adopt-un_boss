
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/inscription.css">

<body>
    <?php include 'views/barNav.php'; ?>
    <div class="wrapper">
        <div class="container">
            <h1>Bienvenue <br> Vous êtes :</h1>

            <div class="row  register">
                <input id="perm" type="text" style="display:none;">
                <div class="col-md-4 img_entreprise">
                    <button class='btn_entreprise btn hvr-bounce-to-right' type="submit" onclick="permission('entreprise')">Une Entreprise</button>
                    <img src="assets/imgs/login_entreprise.png">
                    <p class="link_candidat" style="display:none;" onclick="permission('candidat')">Vous êtes un Candidat ?</p>
                </div>
                <div class="col-md-4 img_candidat">
                    <button class='btn_candidat btn hvr-bounce-to-left' type="submit" onclick="permission('candidat')">Un Candidat</button>
                    <img src="assets/imgs/login_candidat.png">
                    <a><p class="link_entreprise" style="display:none;" onclick="permission('entreprise')">Vous êtes une Entreprise ?</p></a>
                </div>
                <div class="col-md-8 form_entreprise input-group" style="display:none;" role="alert">
                    <form>
                        <div class="form-group">
                            <label for="email_entreprise">Adresse Mail</label>
                            <input type="email" class="form-control" id="email_entreprise" onclick='remove_class("email_entreprise")'>
                        </div>
                        <div class="form-group">
                            <label for="password_entreprise">Password</label>
                            <input type="password" class="form-control" id="password_entreprise" onclick='remove_class("password_entreprise")'>
                        </div>
                        <div class="form-group">
                            <label for="nom_entreprise">Nom</label>
                            <input type="text" class="form-control" id="nom_entreprise" onclick='remove_class("nom_entreprise")'>
                        </div>
                        <div class="form-group">
                            <label for="salarie_entreprise">Salarié</label>
                            <input type="text" class="form-control" id="salarie_entreprise" onclick='remove_class("salarie_entreprise")'>
                        </div>
                        <div class="form-group">
                            <label for="site_web_entreprise">Site Web</label>
                            <input type="text" class="form-control" id="site_web_entreprise" onclick='remove_class("site_web_entreprise")'>
                        </div>
                        <div class="form-group">
                            <label for="adresse_entreprise">Adresse</label>
                            <input type="text" class="form-control" id="adresse_entreprise" onclick='remove_class("adresse_entreprise")'>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="code_postal_entreprise">Code Postal</label>
                                    <input type="text" class="form-control" id="code_postal_entreprise" onclick='remove_class("code_postal_entreprise")'>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="ville_entreprise">Ville</label>
                                    <input type="text" class="form-control" id="ville_entreprise" onclick='remove_class("ville_entreprise")'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel_entreprise">Numéro de Téléphone</label>
                            <input type="text" class="form-control" id="tel_entreprise" onclick='remove_class("tel_entreprise")'>
                        </div>
                        <div class="form-group">
                            <label for="description_entreprise">Description</label>
                            <textarea type="text" class="form-control" id="description_entreprise" onclick='remove_class("description_entreprise")'></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo_entreprise">Photo</label>
                            <input type="text" class="form-control" id="photo_entreprise" placeholder="La photo doit être sous forme d'une URL" onclick='remove_class("photo_entreprise")'>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="newsletter_entreprise">
                            <label class="form-check-label" for="newsletter_entreprise">
                                S'inscrire à la newsletter.
                            </label>
                        </div>
                    </form>
                    <button id="button_login" onclick="registerUser('entreprise')">Log In</button>                 
                </div>
                <div class="col-md-8 form_candidat input-group" style="display:none;" role="alert">
                    <form>
                        <div class="form-group">
                            <label for="email_candidat">Adresse Mail</label>
                            <input type="email" class="form-control" id="email_candidat" onclick='remove_class("email_candidat")'>
                        </div>
                        <div class="form-group">
                            <label for="password_candidat">Password</label>
                            <input type="password" class="form-control" id="password_candidat" onclick='remove_class("password_candidat")'>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nom_candidat">Nom</label>
                                    <input type="text" class="form-control" id="nom_candidat" onclick='remove_class("nom_candidat")'>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="prenom_candidat">Prenom</label>
                                    <input type="text" class="form-control" id="prenom_candidat" onclick='remove_class("prenom_candidat")'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age_candidat">Age</label>
                            <input type="text" class="form-control" id="age_candidat" onclick='remove_class("age_candidat")'>
                        </div>
                        <div class="form-group">
                            <label for="adresse_candidat">Adresse</label>
                            <input type="text" class="form-control" id="adresse_candidat" onclick='remove_class("adresse_candidat")'>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="code_postal_candidat">Code Postal</label>
                                    <input type="text" class="form-control" id="code_postal_candidat" onclick='remove_class("code_postal_candidat")'>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="ville_candidat">Ville</label>
                                    <input type="text" class="form-control" id="ville_candidat" onclick='remove_class("ville_candidat")'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel_candidat">Numéro de Téléphone</label>
                            <input type="text" class="form-control" id="tel_candidat" onclick='remove_class("tel_candidat")'>
                        </div>
                        <div class="form-group">
                            <label for="description_candidat">Description</label>
                            <input type="text" class="form-control" id="description_candidat" onclick='remove_class("description_candidat")'>
                        </div>
                        <div class="form-group">
                            <label for="photo_candidat">Photo</label>
                            <input type="text" class="form-control" id="photo_candidat" placeholder="La photo doit être sous forme d'une URL" onclick="remove_class('photo_candidat')">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="newsletter_candidat">
                            <label class="form-check-label" for="newsletter_candidat">
                                S'inscrire à la newsletter.
                            </label>
                        </div>
                    </form>
                    <button id="button_login" onclick='registerUser("candidat")'>Log In</button>                 
                </div>
            </div>
        </div>
    </div>
    <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="/assets/scripts/register/register.js"></script>
</body>


