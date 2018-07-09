<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/assets/styles/home.css">
        <link rel="stylesheet" href="/assets/styles/barnav.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <title>Adopt Un Boss</title>
    </head>
    <body>

        <?php include 'views/barNav.php'; ?>


        <div id="jumbo" class="jumbotron col-12" style="background-color: #f2f6ff">
            <div class="row">
    <!--            <img id="photo-profil"class="d-flex rounded-circle" src="http://seasonyourhealth.com/wp-content/uploads/2018/03/free-picture-man-old-person-profile-portrait-homeless-con-photo-de-profil-homme-2017-e-2017-05-12-11-21-17-2849x3561px-photo-de-profil-homme-2017.jpg" style="height: 100px; width: 100px" alt="">-->
                    <h1 id="titreSite">Laissez les jobs tech <br>venir à vous <b>
                    <a class="nomprenom" href="/profil/candidat"><?php
                    if (isset($user)) {
                        echo $user->getPrenom() . " " . $user->getNom();
                    }
                    ?>
                    </b></a>
                    </h1>
            </div>
        </div>

        <div class="card card--big div-pub"><div id="how-it-works">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="titre-pub" style="font-size: 45px;">Comment ça marche ?</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="it-works">
                            <i class="fas fa-link fa-4x icon-matching wow bounceIn icon-pub" style="visibility: visible; animation-name: bounceIn;"></i>
                            <h3>Un matching 100% IT</h3>
                            <p>Inscrivez-vous et recevez les offres qui matchent sur les compétences, le salaire, l'expérience et le type de société.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="it-works">
                            <i class="fas fa-ban fa-4x icon-yes-no wow bounceIn icon-pub" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;"></i>
                            <h3>Pas de spam</h3>
                            <p>Vous êtes libre d’accepter ou de refuser de lever votre anonymat suite à une demande recruteur.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="it-works">
                            <i class="far fa-smile-wink fa-4x icon-interessed-mix wow bounceIn icon-pub" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: bounceIn;"></i>
                            <h3>Déclarez-vous intéressé</h3>
                            <p>Vous avez aussi l'opportunité de vous déclarer intéressé par un matching auprès d'un recruteur en un clic !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-home col-12" style="background-color: #ededed">
            <div id="container-profil" class="row">
                <div class="col-md-4" id="card-offre-home">
                    <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/145/145676.svg" alt="Quiz 1x">
                        <div class="p-a-3">
                            <h3 id="titre-card-profil" class="top">Evenement A L'affiche</h3>
                            <div id="container-offre" class="col-md-12">



                                <?php $carouselItem = true; ?>

                                <?php foreach ($events as $event): ?>

                                    <?php
                                    if ($carouselItem) {
                                        ?>
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
        <!--                                            <img id="cardCarroussel"class="d-block w-100" src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-check-icon.png" alt="First slide">-->
                                                    <div id="card-offre" class="card offer" style="background-color: white">
                                                        <div itemprop="title" class="offer-title top h5">
                                                            <p id="data-event"><?= $event->getTitre() ?></p>
                                                            <p id="date-event"><?= $event->getDate() ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <?php } else { ?>
        <?php $carouselItem = false ?>
                                        <!--                                        <div class="carousel-item">-->
                                        <!--<!--                                            <img id="cardCarroussel" class="d-block w-100" src="http://icons.iconarchive.com/icons/graphicloads/100-flat/256/home-icon.png" alt="Second slide">-->-->
                                        <!--                                            <div itemprop="title" class="offer-title top h5">-->
                                        <!--                                                <p id="data-event">--><?//= $event->getTitre()?><!--</p>-->
                                        <!--                                                <p id="date-event">--><?//= $event->getDate()?><!--</p>-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                    </div>
                                    <!--                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">-->
                                    <!--                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                                    <!--                                        <span class="sr-only">Previous</span>-->
                                    <!--                                    </a>-->
                                    <!--                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">-->
                                    <!--                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                                    <!--                                        <span class="sr-only">Next</span>-->
                                    <!--                                    </a>-->
                                </div>

    <?php } ?>

    <?php
endforeach;
?>






                        <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                        </div>
                    </div>
                    <a id="btnVoirPlus" class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>

                </div>
            </div>
        </div>

        <div class="col-md-4" id="card-offre-home">
            <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/426/426346.svg">
                <div class="p-a-3">
                    <h3 id="titre-card-profil" class="top">Nouvelles Offres</h3>

                    <div id="container-offre" class="col-md-12">


<?php foreach ($offres as $offre): ?>
                            <div id="card-offre" class="card offer" style="background-color: white">
                                <div itemprop="title" class="offer-title top h5">
                                    <p id="data-event"><?= $offre->getNom() ?></p>
                                    <p id="data-event"><?= $offre->getIntitule() ?></p>
                                </div>
                            </div>
    <?php
endforeach;
?>

                        <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                        </div>
                    </div>



                    <a id="btnVoirPlus" class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>
                </div>
            </div>
        </div>

<?php
$candidat = true;

if ($candidat) {
    ?>
            <div class="col-md-4" id="card-offre-home">
                <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/236/236822.svg" alt="Devfest2018 cyb homepage">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil">Nouveaux Inscrits</h3>
                        <div id="container-offre" class="col-md-12">
    <?php foreach ($candidats as $candidat): ?>
                                <div id="card-offre" class="card offer" style="background-color: white">
                                    <div itemprop="title" class="offer-title top h5">
                                        <div id="test" class="row">
                                            <p id="nomUser"><?= $candidat->getNom() . " " . $candidat->getPrenom() ?></p>
                                            <img id="photo-user" class="d-flex rounded-circle" src="Https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w" style="height: 100px; width: 100px" alt="">
                                        </div>
                                    </div>
                                </div>
        <?php
    endforeach;
    ?>
                            <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                            </div>
                        </div>
                        <a id="btnVoirPlus" class="btn btn-outline-secondary" href="/evenements">Plus...</a>
                    </div>
                </div>
            </div>
    <?php }else {
    ?>

            <div class="col-md-3" id="card-offre-home">
                <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/236/236822.svg">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil">Nouveaux Inscrits</h3>
                        <div id="container-offre" class="col-md-12">
    <?php foreach ($entreprises as $entreprise): ?>
                                <div id="card-offre" class="card offer" style="background-color: white">
                                    <div itemprop="title" class="offer-title top h5">
                                        <div id="test" class="row">
                                            <p id="data-event"><?= $entreprise->getNom() ?></p>
                                            <img id="photo-user"class="d-flex rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8q6ubfJnmAxhUpBY2dNDaytSJ1ZtnnBsuWILottosnyLnuO8Y" alt="">
                                        </div>
                                    </div>
                                </div>
        <?php
    endforeach;
    ?>
                            <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                            </div>
                        </div>
                        <a id="btnVoirPlus" class="btn btn-outline-secondary" href="/evenements">Plus...</a>
                    </div>
                </div>
            </div>


<?php } ?>
        </div>
    </div>

</body>

    <? include 'views/footer.php'; ?>

</html>