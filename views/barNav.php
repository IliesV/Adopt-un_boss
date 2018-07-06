<header>
    <link rel="stylesheet" href="/assets/styles/footer.css">
    <link rel="stylesheet" href="/assets/styles/barnav.css">
</header>

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #333333">
    <a class="navbar-brand" href="/"><img id="iconNavBar" src="/assets/imgs/leter-a-inside-a-black-circle.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/offres">Nos Offres<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/wiki">Comment ça marche ?<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/event">Évenements</a>
            </li>
            <div id="" class="row">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown03"">
                    <a class="dropdown-item" href="/profil">Mon Compte</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>

            </div>
                </li>

            <?php
            if (!empty($_COOKIE)){
            ?>
                <div class="btnIsConnect row" style="margin-left: 700px">
                    <li id="" class="nav-item">
                        <button class="btn btn-outline-danger"><a class="nav-link disabled" href="/logout">Deconnexion</a></button>
                    </li>
                </div>
            <?php
            }else{
                ?>
                <div class="btnIsNotConnect row" style="margin-left: 600px">
                    <li class="nav-item">
                        <button class="btn btn-outline-success"><a class="nav-link disabled" href="/login/candidat">Connexion</a></button>
                    </li>

                    <li class="nav-item" style="margin-left: 10px">
                        <button class="btn btn-outline-primary"><a class="nav-link disabled" href="/register">Inscription</a></button>
                    </li>
                </div>
            <?php
            }
            ?>


        </ul>
    </div>
</nav>