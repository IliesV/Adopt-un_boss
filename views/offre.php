<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/offre_id.css">


<body style="background-color: #F5F5F5">
<?php include 'views/barNav.php'; ?>
<div class="container-offre">
    <div class="col-md-12">
        <div id="content-simple">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card--big js-user-matching-container offer offer--full card-perso" itemscope="" itemtype="http://schema.org/JobPosting">
                        <div class="row offer__header">
                            <div class="row-height">
                                <div class="col-sm-10 col-sm-height col-sm-middle">
                                    <h1 itemprop="title" class="offer__title top h1"><?= $offre->getIntitule() ?>
                                    </h1>
                                    <div class="offer__at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                                        chez
                                        <span itemprop="name"><a class="text-link" href="/profil/<?= $entreprise->getUser_id() ?>"><?= $entreprise->getNom() ?></a></span>
                                    </div>
                                    <div class="profile">
                                        <div class="row skills no-gutter">
                                            <div class="col-md-12">
                                                <ul class="list-inline" itemprop="skills">

                                                    <?php foreach ($offre->getTechnos() as $key => $value): ?>
                                                        <li class="skill">
                                                            <a href="/offres/<?= $value[0] ?>"> <?= $value[0] ?></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row others">
                                            <div class="col-md-12">
                                                <ul class="list-inline">
                                                    <li itemprop="employmentType">
                                                        <i class="fas fa-file-contract"></i>
                                                        <?= $offre->getTypeContrat() ?>
                                                    </li>
                                                    <li itemprop="baseSalary">
                                                        <i class="fas fa-money-bill-alt"></i>
                                                        Environ <?= $offre->getSalaire() ?> €
                                                    </li>
                                                    <li class="locations">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    <li itemprop="jobLocation">
                                                        <?= $offre->getLieu() ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <?php if($permission == 'candidat'): ?>
                                <?php if(!$bool): ?>
                                <div class="col-md-12"><div class="text-right"><a class="btn btn-outline-primary white-space-normal" href="/like/<?= $offre->getId()?>"><i class="fa fa-heart" style="color: red"></i> Je like !</a></div>
                                    <?php else : ?>
                                    <div class="col-md-12"><div class="text-right"><a class="btn btn-outline-danger white-space-normal" href="/unlike/<?= $offre->getId()?>"><i class="fas fa-ban" style="color: red"></i> Cela ne m'intéresse plus</a></div>
                                        <?php endif ?>
                                    </div>
                                        <?php endif ?>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-12 text-offre">
                                            <h2>
                                                Le poste
                                            </h2>
                                            <div class="offer__part" itemprop="description">
                                                <p><?= $offre->getDetail() ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php //if($author): ?>
                            <?php foreach($usersLiking as $like): ?>
                        <div class="card" style="width: 13rem;">
  <img class="card-img-top" src="<?= $like->getPhoto() ?>" alt="Card image cap" height="120">
  <div class="card-body">
    <h5 class="card-title"><?= $like->getNom() . " ". $like->getPrenom() ?></h5>
    <p class="card-text">Est interessé par cette offre !</p>
    <a href="/profil/<?= $like->getId() ?>" class="btn btn-primary">Consulter son profil !</a>
  </div>
</div>
                            <?php endforeach;?>
                            <?php //endif; ?>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card-perso" style="background-color: white" itemscope="" itemtype="http://schema.org/Organization">
                            <div class="center-block thumbnail-xl">
                                <div class="thumbnail thumbnail-xl thumbnail--light">
                                    <img class="img-responsive" src="<?= $entreprise->getLogo() ?>" alt="logo<?= $entreprise->getNom() ?>" height="200" width="200">
                                </div>
                            </div>
                            <div class="container">

                                <div class="text-center h1">
                                    <?= $entreprise->getNom() ?>
                                </div>
                                <div class="text-center"><ul class="list-inline">
                                        <li><?= $entreprise->getSalarie() ?> employés</li>
                                        <li>•</li>
                                        <li><?= $secteur ?></li>
                                    </ul>
                                </div>
                                <p itemprop="description"><?= $entreprise->getDescription() ?></p>
                                <div class="text-center">
                                    <a class="btn btn-outline-dark" href="/profil/<?= $entreprise->getUser_id() ?>">Découvrir <?= $entreprise->getNom() ?></a><br><br></div>

                            </div>
                        </div>

                        <?php if(isset($otherOffres)){
                            foreach($otherOffres as $otherOffre): ?>
                                <div class="card"><h3>Autres offres de <?= $entreprise->getNom() ?></h3></div>
                                <div class="similar-offers card">
                                    <div><div class="list-item--bordered offer-small p-y-1">
                                            <div itemprop="title" class="offer__title top h4"><a href="/candidates/offers/developpeur-big-data-h-f-daveo"><?= $otherOffre->getIntitule() ?></a>
                                            </div><div class="offer__at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                                                chez
                                                <span itemprop="name"><a class="text-link" href=""><?= $otherOffre->getNomBoite() ?></a></span>
                                            </div>
                                            <div class="profile">
                                                <div class="row skills no-gutter">
                                                    <div class="col-md-12">
                                                        <ul class="list-inline" itemprop="skills">
                                                            <?php foreach ($otherOffre->getTechnos() as $key => $value): ?>
                                                                <li class="skill">
                                                                    <a href="/offres/<?= $value[0] ?>"> <?= $value[0] ?></a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row others">
                                                    <div class="col-md-12">
                                                        <ul class="list-inline">
                                                            <li itemprop="employmentType">
                                                                <i class="fas fa-file-contract"></i>
                                                                <?= $otherOffre->getTypeContrat() ?>
                                                            </li>
                                                            <li itemprop="baseSalary">
                                                                <i class="fas fa-money-bill-alt"></i>
                                                                Environ <?= $otherOffre->getSalaire() ?>€
                                                            </li>
                                                            <li class="locations">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            <li itemprop="jobLocation">
                                                                <?= $otherOffre->getLieu() ?>
                                                            </li>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a class="btn btn-outline-primary" href="/offre/<?= $otherOffre->getId() ?>">Voir l'offre !</a>
                                    </div>
                                </div>
                            <?php endforeach; }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
