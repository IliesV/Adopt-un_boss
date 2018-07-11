
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/candidat.css">

    <body>
    <?php include 'views/barNav.php'; ?>
        <div class="jumbotron" style="background-color: #f7faff">
            <div class="container">
                <div class="row">
                    <img id="photo-profil"class="d-flex rounded-circle" src="http://seasonyourhealth.com/wp-content/uploads/2018/03/free-picture-man-old-person-profile-portrait-homeless-con-photo-de-profil-homme-2017-e-2017-05-12-11-21-17-2849x3561px-photo-de-profil-homme-2017.jpg" style="height: 100px; width: 100px" alt="">
                    <h2 id="nomprenom" style="font-family: 'Comfortaa', cursive;">Nom Prenom</h2>
                    <p><a id="edit-profil" class="btn btn-primary btn-lg" href="#" role="button">Edit</a></p>
                </div>
            </div>
        </div>

        <div id="container-profil" class="row" style="background-color: #f2f6ff">
            <div class="col-md-4">
                <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189671.svg" style="height: 100px; background-color: #1465bc" alt="Quiz 1x">
                    <div class="p-a-3">
                        <h3 id="titre-card-profil" class="top">Mes Likes</h3>

                        <div id="container-offre" class="col-md-12">
                            <div id="card-offre" class="card offer" style="background-color: white">
                                <div itemprop="title" class="offer-title top h5">
                                    <i id="coeurOffre" class="fas fa-heart"></i></button>
                                    <?php
                                    ?>
                                    <?php foreach ($offreLiked as $offres): ?>
                                        <p id="nomOffre"><?= $offres->getIntitule() ?></p>
                                        <?php
                                    endforeach;
                                    ?>
                                </div>

                                <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                                </div>
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




                            <div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                            </div>
                        </div>



                        <a class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189706.svg" style="height: 100px; background-color: #1465bc" alt="Barometre landing 1x">            <div class="p-a-3">
                        <h3 id="titre-card-profil">Vos Matchs</h3>
                        <div id="container-offre" class="col-md-12">
<?php foreach ($entrepriseMatch as $matchs): ?>
                                <div id="card-offre" class="card offer" style="background-color: white">
                                    <div itemprop="title" class="offer-title top h5">
                                        <i id="sendMail" class="fas fa-envelope"></i>
                                        <p id="nomEntreprise"><?= $matchs->getPrenom() . " " . $matchs->getNom() ?></p>                                <p id="nomOffre"><?= $matchs->getIntitule() ?></p>
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
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./assets/javascripts/candidat.js"></script>
    </body>
</html>


