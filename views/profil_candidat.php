<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adopt Un Boss</title>
    <link rel="stylesheet" href="/assets/styles/candidat.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>


    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Expand at sm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </nav>



    <div class="jumbotron" style="background-color: #f7faff">
        <div class="container">
            <div class="row">
                <img id="photo-profil"class="d-flex rounded-circle" src="http://seasonyourhealth.com/wp-content/uploads/2018/03/free-picture-man-old-person-profile-portrait-homeless-con-photo-de-profil-homme-2017-e-2017-05-12-11-21-17-2849x3561px-photo-de-profil-homme-2017.jpg" style="height: 100px; width: 100px" alt="">
                <h2 id="nomprenom" style="font-family: 'Comfortaa', cursive;"><?= $user->getNom()." "?><?= $user->getPrenom()?></h2>
                <p><a id="edit-profil" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalEditProfil" href="#" role="button">Editer</a></p>
            </div>
        </div>
    </div>


    <div id="container-profil" class="row" style="background-color: #f2f6ff">

        <div class="col-md-4">
            <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189671.svg" style="height: 100px; background-color: #1465bc" alt="Quiz 1x">
                <div class="p-a-3">
                    <h3 id="titre-card-profil" class="top">Mes Likes</h3>
                        <div id="container-offre" class="col-md-12">
                                    <?php
                                    foreach ($offreLiked as $offres): ?>
                            <div id="card-offre" class="card offer" style="background-color: white">
                                <div itemprop="title" class="offer-title top h5">
                                        <a href="/unlike/4/<?= $offres->getId()?>"><i id="coeurOffre" class="fas fa-heart"></i></a>
                                        <p id="nomOffre"><?= $offres->getIntitule()?></p>
                                </div>
                            </div>
                                    <?php
                                    endforeach;
                                    ?>

                        <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                        </div>
                </div><br>
                    <a class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>

                </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189706.svg" style="height: 100px; background-color: #1465bc" alt="Barometre landing 1x">
            <div class="p-a-3">
                <h3 id="titre-card-profil" class="top">Mes Matchs</h3>

                <div id="container-offre" class="col-md-12">


                            <?php
                            foreach ($matchsCandidat as $matchs): ?>
                    <div id="card-offre" class="card offer" style="background-color: white">
                        <div itemprop="title" class="offer-title top h5">
                            <i id="sendMail" class="fas fa-envelope"></i>
                            <p id="nomEntreprise"><?= $matchs->getNom()?></p>
                            <p id="nomOffre"><?= $matchs->getIntitule()?></p>
                        </div>
                    </div>
                            <?php
                            endforeach;
                            ?>

                        <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                        </div>
                </div>



                <a class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/139/139035.svg" style="height: 100px; background-color: #1465bc" alt="Devfest2018 cyb homepage">
            <div class="p-a-3">
                <h3 id="titre-card-profil">A Regarder Plus Tard</h3>
                <div id="container-offre" class="col-md-12">
                    <?php
                    foreach ($waitingCandidat as $waitings): ?>
                        <div id="card-offre" class="card offer" style="background-color: white">
                            <div itemprop="title" class="offer-title top h5">
                                <i id="clock" class="fas fa-clock"></i>
                                <p id="nomEntreprise"><?= $waitings->getNom()?></p>
                                <p id="nomOffre"><?= $waitings->getIntitule()?></p>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                    </div>
                </div>
                <a class="btn btn-outline-secondary" href="/evenements">Plus...</a>
            </div>
        </div>
    </div>
</div>

<!--voici la modal editer-->

<div class="modal fade" id="modalEditProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
            $candidat = $user->to_array();

             ?>
            <form action="http://<?= $_SERVER['SERVER_NAME']?>/profil/update" method="POST">
            <?php

            foreach ($candidat as $key => $value):?>
                <?php

                if ($key!=='user_id' & $key!=='password' & $key!=='date_creation') {

                    ?>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label"><?= $key ?></label>
                                <input type="text" class="form-control" id="recipient-name" name="<?=$key ?>" value="<?= $candidat->get.ucfirst($value) ?>">
                            </div>
                    </div>

                    <?php

                }
            ?>

            <?php
            endforeach;
            ?>

                    <input type="submit" value="Sauvegarder" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>
