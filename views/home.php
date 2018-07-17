<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/home.css">
<html>
    <body>

        <?php include 'views/barNav.php'; ?>



        <div id="jumbo" class="jumbotron col-12" style="background-color: #f2f6ff">
            <div class="row">
                <h1 id="titreSite" class="animated bounceInRight">Laissez les jobs tech <br>venir à vous <b>
                        <a class="nomprenom" href="/profil"><?php
                            if (isset($user) && $user->getRoles() == 'candidat') {
                                echo $user->getPrenom() . " " . $user->getNom();
                            } else if (isset($user) && $user->getRoles() == 'entreprise') {
                                echo $user->getNom();
                            }
                            ?></b></a>
                </h1>
            </div>
        </div>

        <div id="animate">
            <div class="card card--big div-pub"><div id="how-it-work">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="titre-pub" id="how-it-works" style="font-size: 45px;">Comment ça marche ?</h2>
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
        </div>


        <div class="container-home col-12">
            <div class="row">
                <div class="col-md-4" id="card-offre-home">
                    <div class="card card-size card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/145/145676.svg" alt="Quiz 1x">
                        <div class="p-a-3">
                            <h3 id="titre-card-profil" class="top">Evenement A L'affiche</h3>
                            <div class="col-md-12 container-card">


                                <?php
                                foreach ($events as $event):
                                    $date = date('l j \of F Y h:i:s A', strtotime($event->getDate()));
                                    ?>
                                    <div id="card-offre" class="hvr-shadow">
                                        <a href="/event"<p class="titre-event"><?= $event->getTitre() ?></p></a>
                                        <a href="/event"<p class="date-event"><?= $date ?></p></a>
                                    </div><hr>

                                    <?php
                                endforeach;
                                ?>

                                <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization"></div>
                            </div>
                        </div>
                        <!--<a id="btnVoirPlus" class="btn btn-outline-primary" href="/evenements">Plus...</a>-->
                    </div>
                </div>


                <div class="col-md-4" id="card-offre-home">
                    <div class="card card-size card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/426/426346.svg">
                        <div class="p-a-3">
                            <h3 id="titre-card-profil" class="top">Nouvelles Offres</h3>
                            <div class="container-card col-md-12">


                                <?php foreach ($offres as $offre): ?>
                                    <div class=" hvr-shadow offre">
                                        <a href="/offre/<?= $offre->getId() ?>"<p class="offre"><?= $offre->getNom() ?></p></a>
                                        <a href="/offre/<?= $offre->getId() ?>"<p class="offre"><?= $offre->getIntitule() ?></p></a>
                                    </div><hr>
                                    <?php
                                endforeach;
                                ?>

                                <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization"></div>
                            </div>
                        </div>
                        <!--<a id="btnVoirPlus" class="btn btn-outline-primary" href="/barometre-des-salaires-it">Plus...</a>-->
                    </div>
                </div>

                <?php
                //$candidat = true;
//                if ($candidat) {
//                    
                ?>
                <div class="col-md-4" id="card-offre-home">
                    <div class="card card-size card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/236/236822.svg" alt="Devfest2018 cyb homepage">
                        <h3 id="titre-card-profil">Nouveaux Inscrits</h3>
                        <div class="p-a-3">
                            <div class="container-card col-md-12">

                                <?php foreach ($candidats as $candidat): ?>
                                    <div id="card-offre" class="hvr-shadow">
                                        <img id="photo-user" class="d-flex rounded-circle" src="<?= $candidat->getPhoto() ?>" style="height: 100px; width: 100px" alt=""></a>
                                        <a href="/profil/<?= $candidat->getUser_id() ?>"><p id="nomUser"><?= $candidat->getNom() . " " . $candidat->getPrenom() ?></p></a>
                                    </div><hr>
                                    <?php
                                endforeach;
                                ?>

                                <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization"></div>
                            </div>
                        </div>
                        <!--<a id="btnVoirPlus" class="btn btn-outline-primary" href="/evenements">Plus...</a>-->
                    </div>
                </div>
            </div>
        </div>

        <!--                <?php // }else {
                                ?>
        
                            <div class="col-md-3" id="card-offre-home">
                                <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/236/236822.svg">
                                    <div class="p-a-3">
                                        <h3 id="titre-card-profil">Nouveaux Inscrits</h3>
                                        <div id="container-offre" class="col-md-12">
        
        <?php // foreach ($entreprises as $entreprise): ?>
                                                <div id="card-offre" class="hvr-wobble-horizontal">
                                                    <p id="data-event"><?//= $entreprise->getNom() ?></p>
                                                    <img id="photo-user" class="d-flex rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8q6ubfJnmAxhUpBY2dNDaytSJ1ZtnnBsuWILottosnyLnuO8Y" alt="" >
                                                </div><hr>
        <?php
        //endforeach;
        ?>
        
                                            <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization"></div>
                                        </div>
                                        <a id="btnVoirPlus" class="btn btn-outline-primary" href="/evenements">Plus...</a>
                                    </div>
        
        
        <?php // } ?>
                            </div>
                        </div>-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="/assets/scripts/animate/animation.js"></script>
        <script src="/assets/scripts/animate/popover.js"></script>

    </body>
    <?php include 'views/footer-baniere.php'; ?>
    <?php include 'views/footer.php'; ?>

</html>