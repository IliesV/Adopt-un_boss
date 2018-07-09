<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adopt Un Boss</title>
        <link rel="stylesheet" href="/assets/styles/offres.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>

           <?php include 'views/barNav.php'; ?>



    <div class="container  search-container">
        <h1>
            Toutes nos offres
        </h1>
        <div class="offers" id=""><form action="" accept-charset="UTF-8" method="get"><input name="utf8" value="✓" type="hidden">
                <table>
                    <tbody>
                        <tr>
                            <td class="what">
                                <input name="tag" id="offer-search-skill" class="search-offres form-control input-lg ui-autocomplete-input" placeholder="Quoi ? Java, PHP, Ruby, Infrastructure, ..." require="true" autocomplete="off" type="text">
                            </td>
                            <td class="where">
                                <input name="" id="offer-search-location" class="search-villes form-control input-lg" placeholder="Où ? Ville, Département, Région" autocomplete="off" type="text">
                            </td>
                            <td>
                                <button name="button" type="submit" class="btn btn-default btn-lg btn-search btn-block" id="search-button"><i class="fas fa-search"></i>
                                </button></td>
                        </tr>
                    </tbody></table>
            </form>
        </div>
    </div>




    <div class="row container-offres">
        <div class="col-md-4 col-md-offset-1">
            <aside id="resume">
                <div class="card">
                    <h4 class="top">
                        <i class="far fa-dot-circle"></i>
                        Technologies
                    </h4>
                    <ul class="list-inline">
                        <li>
                            <span class="badge badge-secondary">
                                <a class="color-badge-skill" rel="nofollow" href="/offres">Tous</a>
                            </span>
                        </li>
                        <?php foreach($technos as $techno): ?>
                        <li>
                            <span class="badge badge-secondary">
                                <a class="color-badge-skill" rel="nofollow" href="/offres/<?= $techno[0] ?>"><?= $techno[0] ?></a>
                            </span>
                        </li>
                        <?php endforeach; ?>
                        <li>
                            <span class="badge badge-secondary">
                                <a rel="nofollow" class="color-badge-skill" href="/offres/emploi-it?source=navbar&amp;specialization=backend">Backend</a>
                            </span>
                        </li>
                    </ul>
                    <hr>
                    <h4 class="top">
                        <i class="fas fa-file-alt"></i>
                        Type de contrat
                    </h4>
                    <ul class="list-inline">
                        <li>
                            <span class="badge badge-secondary">
                                <a class="color-badge-skill" rel="nofollow" href="/offres">Tous</a>
                            </span>
                        </li>
                       <?php foreach($contrats as $contrat): ?>

                        <li>
                            <span class="badge badge-secondary">
                                <a class="color-badge-skill" rel="nofollow" href="/offres/<?= $contrat[0]?>"><?= $contrat[0] ?></a>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
            </aside>
        </div>


        <div class="col-md-8 col-md-offset-1">
            <?php foreach($offres as $offre): ?>
                <div class="card-offre" style="background-color: white">
                    <div itemprop="title" class="offer__title top h3"><a class="color-href-offre" href="/offre/<?= $offre->getId() ?>"><?= $offre->getIntitule() ?></a>
                    </div>
                        <div class="offer__at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                            <a class="text-link" href="/profil/<?= $offre->getEntreprise_user_id() ?>"><?= $offre->getNomBoite() ?></a>
                            recrute, n'hésitez pas à liker cette offre.
                        </div>
                        <div class="profile">
                            <div class="row skills no-gutter">
                                <div class="col-md-12">
                                    <ul class="list-inline" itemprop="skills">
                                            <?php foreach($offre->getTechnos() as $key => $value): ?>
                                        <li class="skill">
                                            <?php echo $value[0] ?>
                                        </li>
                                            <?php endforeach; ?>
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
                <?php
            endforeach;
            ?>
        </div>
    </div>
    </body>
    </html>
