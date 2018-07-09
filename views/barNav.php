<head>
    <link rel="stylesheet" href="/assets/styles/footer.css">
    <link rel="stylesheet" href="/assets/styles/barnav.css">
</head>

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

<!--            <div id="" class="row">-->
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>-->
<!--                    <div class="dropdown-menu" aria-labelledby="dropdown03"">-->
<!--                    <a class="dropdown-item" href="/profil">Mon Compte</a>-->
<!--                </li>-->
<!--            </div>-->



<div class="btn-barnav">


            <?php
            if (!empty($_COOKIE)){
            ?>

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<!--                        <img src="http://lorempixel.com/75/50/abstract/">-->
                        <img id="photo-profil" class="d-flex rounded-circle" src="http://seasonyourhealth.com/wp-content/uploads/2018/03/free-picture-man-old-person-profile-portrait-homeless-con-photo-de-profil-homme-2017-e-2017-05-12-11-21-17-2849x3561px-photo-de-profil-homme-2017.jpg" style="height: 20px; width: 20px" alt="">

                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </button>

                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Member name (you)</li>
                        <a class="dropdown-item" href="/profil">Mon Compte</a>
                        <a href="/logout" class="nav-link disabled"><button class="btn-deco btn btn-outline-danger ">Deconnexion</button></a>
                    </ul>
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
            }else{
                ?>

                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Espace Perso</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a href="/login/candidat" class="nav-link disabled"><button class="btn btn-outline-success btn-co"> Connexion </button></a>
                        <a href="/register" class="nav-link disabled"><button class="btn btn-outline-primary btn-inscription"> Inscrition </button></a>
                    </div>
                </div>
            <?php
            }
            ?>


</div>


        </ul>
    </div>
</nav>