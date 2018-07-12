
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/candidat.css">

    <body>

        <?php include 'views/barNav.php'; ?>

        <div class="jumbotron jumbotron-perso" style="background-color: #f7faff">
            <div class="container">
                <div class="row">
                    <img class="d-flex rounded-circle photo-profil" src="<?= $user->getPhoto() ?>" style="height: 100px; width: 100px" alt="">
                    <h2 id="nomprenom" style="font-family: 'Nunito', cursive;"><?= $user->getNom() . " " ?><?= $user->getPrenom() ?></h2>
                    <button id="edit-profil" class="btn btn-outline-primary btn-edit" data-toggle="modal" data-target="#modalEditProfil" href="#" role="button"><i class="fas fa-pencil-alt"></i></button>
                </div>
            </div>
        </div>


        <div id="container-profil" class="row" style="background-color: #f2f6ff">
            <div class="col-md-4" id="card-offre-home">
                <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189671.svg" style="height: 100px; background-color: #1465bc" alt="Quiz 1x">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil" class="top">Mes Likes</h3>


                            <?php foreach ($offreLiked as $offres): ?>
                                <div id="card-offre" class="hvr-grow" style="background-color: white">
                                    <div itemprop="title" class="offer-title top h5">
                                        <a href="/unlike/<?= $offres->getId() ?>"><i id="coeurOffre" class="fas fa-heart hvr-shrink"></i></a>
                                        <p id="nomOffre"><?= $offres->getIntitule() ?></p>
                                    </div>
                                </div><hr>
                            <?php
                            endforeach;
                            ?>

                            <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization"></div>
                    </div>
                    <a id="btnVoirPlus" class="btn btn-outline-primary" href="/barometre-des-salaires-it">Plus...</a>
                </div>
            </div>





            <div class="col-md-4">
                <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189706.svg" style="height: 100px; background-color: #1465bc" alt="Barometre landing 1x">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil" class="top">Mes Matchs</h3>
                        <div id="container-offre" class="col-md-12">

                            <?php foreach ($matchsCandidat as $matchs):?>
                                <div id="card-offre" class="card offer" style="background-color: white">
                                    <div itemprop="title" class="offer-title top h5">
                                        <a href="/chat"
                                        <?php
                                        if($matchs->getCandidat_user_id()==19):
                                            $matchs->getEntreprise_user_id();
                                        else:
                                            $matchs->getCandidat_user_id();
                                        endif;
                                         ?></a>
                                            <i id="sendMail" class="fas fa-envelope"></i>
                                            <p id="nomEntreprise"><?= $matchs->getNom() ?></p>
                                            <p id="nomOffre"><?= $matchs->getIntitule() ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <a id="btnVoirPlus" class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/139/139035.svg" style="height: 100px; background-color: #1465bc" alt="Devfest2018 cyb homepage">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil">A Regarder Plus Tard</h3>
                        <div id="container-offre" class="col-md-12">
                            <?php foreach ($waitingCandidat as $waitings): ?>
                                <div id="card-offre" class="card offer" style="background-color: white">
                                    <div itemprop="title" class="offer-title top h5">
                                        <a href="/unwait/4/<?= $waitings->getId() ?>"><i id="clock" class="fas fa-clock"></i></a>
                                        <p id="nomEntreprise"><?= $waitings->getNom() ?></p>
                                        <p id="nomOffre"><?= $waitings->getIntitule() ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <a id="btnVoirPlus" class="btn btn-outline-secondary" href="/evenements">Plus...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--voici la modal profil pour editer les infos candidat-->
        <?php
        include 'assets/scripts/gestion_profil/modal_profil_candidat.php';
        ?>
    </body>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</html>