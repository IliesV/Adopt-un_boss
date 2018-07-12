
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/candidat.css">

    <body>
    <?php include 'views/barNav.php'; ?>
        <div class="jumbotron" style="background-color: #f7faff">
            <div class="container">
                <div class="row">
                    <img class="d-flex rounded-circle photo-profil" src="<?= $entrepriseInfos->getLogo() ?>" style="height: 100px; width: 100px" alt="">
                    <h2 id="nomprenom" style="font-family: 'Nunito', cursive;"><?= $entrepriseInfos->getNom() . " " ?></h2>
                    <button id="edit-profil" class="btn btn-outline-primary btn-edit" data-toggle="modal" data-target="#modalEditProfil" href="#" role="button"><i class="fas fa-pencil-alt"></i></button>

                </div>
            </div>
        </div>


        <div id="container-profil" class="row" style="background-color: #f2f6ff">
            <div class="col-md-4">
                <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189671.svg" style="height: 100px; background-color: #1465bc" alt="Quiz 1x">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil" class="top">Nos offres</h3>
                        <div id="container-offre" class="col-md-12">
                            <h3 id="titre-card-profil" class="trigger">Offres validées</h3>
                            <div class= "toggle">
                                <?php foreach ($offreValide as $offreVal): ?>
                                    <div id="card-offre" class="card offer" style="background-color: white">
                                        <div itemprop="title" class="offer-title top h5">
                                            <p id="nomOffre"><?= $offreVal->getIntitule() ?></p>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                        <div id="container-offre" class="col-md-12">
                            <h3 id="titre-card-profil" class="trigger">Offres en attentes</h3>
                            <div class= "toggle">
                                <?php foreach ($offreWaiting as $offreWait): ?>
                                    <div id="card-offre" class="card offer" style="background-color: white">
                                        <div itemprop="title" class="offer-title top h5">
                                            <a href="/unlike/<?= $offreWait->getId() ?>"><i id="coeurOffre" class="fas fa-edit"></i></a>
                                            <p id="nomOffre"><?= $offreWait->getIntitule() ?></p>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/235/235252.svg" style="height: 100px; background-color: #1465bc" alt="Devfest2018 cyb homepage">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil">Poster une nouvelle offre.</h3>
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

            <div class="col-md-4">
                <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189706.svg" style="height: 100px; background-color: #1465bc" alt="Barometre landing 1x">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil" class="top">Nos Matchs</h3>

                        <div id="container-offre" class="col-md-12">


                            <?php foreach ($entrepriseMatch as $matchs): ?>
                                <div id="card-offre" class="card offer" style="background-color: white">
                                    <div itemprop="title" class="offer-title top h5">
                                        <a href="/chat"
                                        <?php
                                        if ($matchs->getEntreprise_user_id() == 20):
                                            $matchs->getCandidat_user_id();
                                        else:
                                            $matchs->getEntreprise_user_id();
                                        endif;
                                        ?></a>
                                        <i id="sendMail" class="fas fa-envelope"></i>
                                        <p id="nomEntreprise"> <?= $matchs->getNom() ?> </p>
                                        <p id="nomOffre"><?= $matchs->getIntitule() ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <a id="btnVoirPlus" class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./assets/javascripts/candidat.js"></script>
    </body>
</html>