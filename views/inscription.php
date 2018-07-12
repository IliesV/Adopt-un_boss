
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/inscription.css">

<body>
    <?php include 'views/barNav.php'; ?>
    <div class="wrapper">
        <div class="container">
            <h1>Bienvenue <br> Vous êtes :</h1>

            <div class="row  register">
                <div class="col-md-4">
                    <img src="assets/imgs/login_candidat.png">
                </div>
                <div class="col-md-4">
                    <button class='perm_button' type="submit" onclick="register('candidat')">Un Candidat</button>
                    <button class='perm_button' type="submit" onclick="register('entreprise')">Une Entreprise</button>
<!--                    <form  action="/login/verif" method="POST">                    
                        <input name="perm" type="text" id="input_perm" style="display:none;">
                        <input name="email" type="text" placeholder="Email">
                        <input name="password" type="text" placeholder="Password">
                        <input name="nom" type="text" placeholder="Nom">
                        <input name="prenom" type="text" placeholder="Prenom">
                        <input name="age" type="text" placeholder="Age">
                        <input name="adresse" type="text" placeholder="Ex : Rue de la Purée">
                        <input name="code_postal" type="text" placeholder="Code Postal">
                        <input name="ville" type="text" placeholder="Ville">
                        <input name="tel" type="text" placeholder="n° téléphone">
                        <textarea name="description" placeholder="Description"></textarea>
                        <input name="photo" type="text" placeholder="Lien des Photos sous forme d'URL">
                        <input type="submit" id="login-button" value="Login">
                    </form>-->
                </div>
                <div class="col-md-4">
                    <img src="assets/imgs/login_entreprise.png">
                </div>
            </div>
        </div>
    </div> <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script > $("#login-button").click(function (event) {
            event.preventDefault();

            $('form').fadeOut(5);
            $('.wrapper').addClass('form-success');
        });
        #sourceURL = "/profil";
    </script>
    <script src="/assets/scripts/register/register.js"></script>
</body>


