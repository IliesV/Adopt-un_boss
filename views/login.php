<!DOCTYPE html><html>
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
                <h1>Bienvenue <br> Vous êtes :</h1>

                <button class='perm_button' type="submit" onclick="permission('entreprise')">Une Entreprise</button>
                <button class='perm_button' type="submit" onclick="permission('candidat')">Un Candidat</button>

                <form  action="/login/verif" method="POST">                    
                    <input name="perm" type="text" id="input_perm">
                    <input name="email" type="text" placeholder="Username">
                    <input name="password" type="password" placeholder="Password">
                    <input type="submit" id="login-button" value="Login">
                </form>
            </div>


        </div>
        <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script > $("#login-button").click(function (event) {
                        event.preventDefault();

                        $('form').fadeOut(5);
                        $('.wrapper').addClass('form-success');
                    });
                    #sourceURL = "/profil";
        </script>
        <script src="/assets/scripts/login/login.js"></script>

    </body>
</html>







