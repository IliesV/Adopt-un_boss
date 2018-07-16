<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/entreprise.css">
</head>
<body>
    <?php include 'views/barNav.php'; ?>
    <div class="jumbotron jumbotron-perso" style="background-color: #f7faff">
        <div class="container">
            <div class="row">
                <img class="d-flex rounded-circle photo-profil" src="<?= $entrepriseInfos->getLogo() ?>" style="height: 100px; width: 100px" alt="">
                <h2 id="nomprenom" style="font-family: 'Nunito', cursive;"><?= $entrepriseInfos->getNom() . " " ?></h2>
                <button id="edit-profil" class="btn btn-outline-primary btn-edit" data-toggle="modal" data-target="#modalEditProfil" role="button"><i class="fas fa-pencil-alt"></i></button>
            </div>
        </div>
    </div>
    <div id="container-profil" class="row" style="background-color: #f2f6ff">
        <div class="col-md-4">
            <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189671.svg" style="height: 100px; background-color: #1465bc" alt="Quiz 1x">
                <div class="p-a-3">
                    <h3 id="titre-card-profil" class="top hvr-underline-from-center">Nos offres</h3>
                    <div id="container-offre" class="col-md-12">
                        <h3 id="titre-card-profil" class="trigger hvr-underline-from-center">Offres validées</h3>
                        <div class= "toggle">
                            <?php foreach ($offreValide as $offreVal): ?>
                                <div id="card-offre" class="card offer" style="background-color: white">
                                    <div itemprop="title" class="offer-title top h5">
                                        <p id="nomOffre"><a class="corps-event" href="/offre/<?= $offreVal->getId() ?>"><?= $offreVal->getIntitule() ?></a></p>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                    <div id="container-offre" class="col-md-12">
                        <h3 id="titre-card-profil" class="trigger hvr-underline-from-center">Offres en attentes</h3>
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
                    <h3 id="titre-card-profil"class="trigger hvr-underline-from-center">Poster une nouvelle offre.</h3>
                    <div id="container-offre" class="col-md-12 toggle">
                        <div id="card-offre" class="card offer" style="background-color: white">
                            <form action="http://<?= $_SERVER['SERVER_NAME'] ?>/postoffre" method="POST">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Intitulé</label>
                                    <input type="text" class="form-control" id="recipient-name" name="intitule" value="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Poste</label>
                                    <input type="text" class="form-control" id="recipient-name" name="poste" value="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Lieu</label>
                                    <input type="text" class="form-control" id="recipient-name" name="lieu" value="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Salaire Annuel</label>
                                    <input type="text" class="form-control" id="recipient-name" name="salaire" value="">
                                </div>
                                <div class="form-group">
                                    <?php foreach ($technos as $techno): ?>
                                        <input type="checkbox" name="techname[<?= $techno[0] ?>]" value="<?= $techno[1] ?>"> <?= $techno[1] ?>
                                    <?php endforeach; ?>

                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Type de contrat :</label>
                                    <select name="type_de_contrat">
                                        <?php foreach ($types as $type): ?>
                                            <option value=<?= $type[0] ?>><?= $type[0] ?></option>
                                        <?php endforeach; ?>    
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Description</label>
                                    <textarea class="form-control" id="recipient-name" name="detail"></textarea>
                                </div>
                                <input type="submit" value="Sauvegarder" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189706.svg" style="height: 100px; background-color: #1465bc" alt="Barometre landing 1x">
                <div class="p-a-3">
                    <h3 id="titre-card-profil" class="trigger hvr-underline-from-center">Nos Matchs</h3>

                    <div id="container-offre" class="col-md-12 toggle">


                        <?php foreach ($entrepriseMatch as $matchs): ?>
                            <div id="card-offre" class="card offer" style="background-color: white">
                                <div itemprop="title" class="offer-title top h5">

                                    <?php
                                    if ($matchs->getEntreprise_user_id() == 20):
                                        echo "<a href='/chat/" . $matchs->getCandidat_user_id() . "'></a>";
                                    else:
                                        echo "<a href='/chat/" . $matchs->getEntreprise_user_id() . "'></a>";
                                    endif;
                                    ?>
                                    <p id="nomEntreprise"> Vous avez matché avec <?= $matchs->getNom() ." " . $matchs->getPrenom() ?><a href="/chat"><i id="sendMail" class="fas fa-envelope"></i></a></p>
                                    <p id="nomOffre">Par rapport à l'offre : <?= $matchs->getIntitule() ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <a id="btnVoirPlus" class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <script>
        $(document).ready(function () {
            $(".trigger").next(".toggle").slideToggle(1);
            $(".trigger").click(function () {
                $(this).next(".toggle").slideToggle();
            });
        });
    </script> 
            <?php
        include 'assets/scripts/gestion_profil/modal_edition_profil_entreprise.php';
        ?>

</body>
<?php
include 'views/footer.php';
?>
</html>