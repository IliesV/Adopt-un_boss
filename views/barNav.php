<head>
    <link rel="stylesheet" href="/assets/styles/footer.css">
    <link rel="stylesheet" href="/assets/styles/barnav.css">
</head>

<nav class="navbar navbar-expand-sm navbar-dark"  style="background-color: #333333">
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

            <!--            <div id="" class="row">-->
            <!--                <li class="nav-item dropdown">-->
            <!--                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>-->
            <!--                    <div class="dropdown-menu" aria-labelledby="dropdown03"">-->
            <!--                    <a class="dropdown-item" href="/profil">Mon Compte</a>-->
            <!--                </li>-->
            <!--            </div>-->



            <div class="btn-barnav">


                <?php
                if (!empty($_COOKIE['tkn'])) {
                    ?>



                    <div class="dropdown icon-profil">
                        <img id="photo-profil" class="d-flex rounded-circle" src="<?php 
//                        if (isset($user)):
                    echo '$user->getPhoto()';
//                endif;
                ?>" style="height: 35px; width: 35px" alt="">
                        <div class="dropdown-content dropdown-left">
                            <a href="/profil" class="nav-link disabled"><button class="btn-deco btn btn-outline-success ">Mon Compte</button></a>
                            <a href="/logout" class="nav-link disabled"><button class="btn-deco btn btn-outline-danger ">Deconnexion</button></a>
                        </div>
                    </div>


                    <!--                <div class="btn-group">-->
                    <!--                    <button type="button" class="btn btn-primary">Espace Perso</button>-->
                    <!--                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--                        <span class="sr-only">Toggle Dropdown</span>-->
                    <!--                    </button>-->
                    <!--                </div>-->

                    <!--                <div class=" row">-->
                    <!--                    <li class="nav-item">-->
                    <!--                    </li>-->
                    <!--                </div>-->
                    <?php
                }else {
                    ?>
                    <div class="row">
                        <a href="/login/candidat" class="nav-link disabled"><button class="btn btn-outline-success btn-co"> Connexion </button></a>
                        <a href="/register" class="nav-link disabled"><button class="btn btn-outline-primary btn-inscription"> Inscrition </button></a>
                    </div>

                    <?php
                }
                ?>


            </div>


        </ul>
    </div>
</nav>