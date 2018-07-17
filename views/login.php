<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.js"></script>
        <link rel="stylesheet" href="/assets/styles/home.css">
        <link rel="stylesheet" href="/assets/styles/barnav.css">
        <link rel="stylesheet" href="/assets/styles/login.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
        <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php include 'views/barNav.php'; ?>


        <div class="wrapper">
            <div class="container">
                <h1>Bienvenue vous êtes</h1>


                <div class="row">
                    <input id="perm" type="text" style="display:none;">
                    <div class="col-md-6 img_entreprise">
                        <button class='btn_entreprise btn hvr-bounce-to-right' type="submit" onclick="permission('entreprise')">Une Entreprise</button>
                        <img src="assets/imgs/login_entreprise.png">
                        <p class="link_candidat" style="display:none;" onclick="permission('candidat')">Vous êtes un Candidat ?</p>
                    </div>
                    <div class="col-md-6 img_candidat">
                        <button class='btn_candidat btn hvr-bounce-to-left' type="submit" onclick="permission('candidat')">Un Candidat</button>
                        <img src="assets/imgs/login_candidat.png">
                        <a><p class="link_entreprise" style="display:none;" onclick="permission('entreprise')">Vous êtes une Entreprise ?</p></a>
                    </div>
                    <div class="col-md-6 form input-group" style="display:none;" role="alert">
                        <form>
                            <div class="form-group">
                                <label for="email">Adresse Mail</label>
                                <input type="email" class="form-control" id="email" placeholder="manu@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="********">
                            </div>
                        </form>
                        <button id="button_login" class="btn btn-success" onclick="connect_user()">Log In</button>                 
                    </div>
                </div>


            </div>

    </body>
            <script src="/assets/scripts/login/login.js"></script>
</html>







