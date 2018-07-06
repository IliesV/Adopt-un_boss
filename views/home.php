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
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>Adopt Un Boss</title>
</head>
<body>

<? include 'views/barNav.php'; ?>


<div id="jumbo" class="jumbotron col-12" style="background-color: #f2f6ff">
        <div class="row">
<!--            <img id="photo-profil"class="d-flex rounded-circle" src="http://seasonyourhealth.com/wp-content/uploads/2018/03/free-picture-man-old-person-profile-portrait-homeless-con-photo-de-profil-homme-2017-e-2017-05-12-11-21-17-2849x3561px-photo-de-profil-homme-2017.jpg" style="height: 100px; width: 100px" alt="">-->
            <h1 id="titreSite" style="font-family: 'Comfortaa', cursive;"><b>Bienvenue sur Adopte Un Boss</b>
                <div id="nomPrenomHome">
                <?php
                if (isset($user)) {
                    echo $user->getPrenom(). " " .$user->getNom();
                }
                ?>
            </h1>
        </div>
</div>
<div class="container-home col-12" style="background-color: #ededed">
            <div id="container-profil" class="row">
                <div class="col-md-4" id="card-offre-home">
                    <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/145/145676.svg" style="height: 100px; background-color: #2AFDA9" alt="Quiz 1x">
                        <div class="p-a-3">
                            <h3 id="titre-card-profil" class="top">Evenement A L'affiche</h3>
                            <div id="container-offre" class="col-md-12">



                                    <?php

                                    $carouselItem = true;?>

                                        <?php

                                    foreach ($events as $event): ?>

                                <?php
                                if($carouselItem){
                                ?>
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
<!--                                            <img id="cardCarroussel"class="d-block w-100" src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-check-icon.png" alt="First slide">-->
                                            <div id="card-offre" class="card offer" style="background-color: white">
                                                <div itemprop="title" class="offer-title top h5">
                                                    <p id="data-event"><?= $event->getTitre()?></p>
                                                    <p id="date-event"><?= $event->getDate()?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } else{ ?>
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

                              <?php  } ?>

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
                    <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/426/426346.svg" style="height: 100px; background-color: #2AFDA9" alt="Barometre landing 1x">
                        <div class="p-a-3">
                            <h3 id="titre-card-profil" class="top">Nouvelles Offres</h3>

                            <div id="container-offre" class="col-md-12">


                                <?php
                                foreach ($offres as $offre): ?>
                                    <div id="card-offre" class="card offer" style="background-color: white">
                                        <div itemprop="title" class="offer-title top h5">
                                            <p id="data-event"><?= $offre->getNom()?></p>
                                            <p id="data-event"><?= $offre->getIntitule()?></p>
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

if($candidat){
    ?>
                <div class="col-md-4" id="card-offre-home">
                    <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/236/236822.svg" style="height: 100px; background-color: #2AFDA9
" alt="Devfest2018 cyb homepage">
                        <div class="p-a-3">
                            <h3 id="titre-card-profil">Nouveaux Inscrits</h3>
                            <div id="container-offre" class="col-md-12">
                                <?php
                                foreach ($candidats as $candidat): ?>
                                    <div id="card-offre" class="card offer" style="background-color: white">
                                        <div itemprop="title" class="offer-title top h5">
                                            <div id="test" class="row">
                                                <p id="nomUser"><?= $candidat->getNom() . " " . $candidat->getPrenom()?></p>
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
    <?php
}else{ ?>

    <div class="col-md-3" id="card-offre-home">
        <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/236/236822.svg" style="height: 100px; background-color: #1465bc" alt="Devfest2018 cyb homepage">
            <div class="p-a-3">
                <h3 id="titre-card-profil">Nouveaux Inscrits</h3>
                <div id="container-offre" class="col-md-12">
                    <?php
                    foreach ($entreprises as $entreprise): ?>
                        <div id="card-offre" class="card offer" style="background-color: white">
                            <div itemprop="title" class="offer-title top h5">
                                <div id="test" class="row">
                                    <p id="data-event"><?= $entreprise->getNom()?></p>
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


<?php }?>
</div>
<? include 'views/footer.php'; ?>


<!--                <div class="col-3" style="float: right">-->
<!--                    <div class="list-group panel">-->
<!--                        <a href="#menu1" class="list-group-item collapsed" data-toggle="collapse" aria-expanded="false"><svg class="svg-inline--fa fa-dashboard fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="dashboard" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><g><path fill="currentColor" d="M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"></path><circle fill="currentColor" cx="256" cy="364" r="20.3202"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="r" values="28;14;28;28;14;28;"></animate><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="1;0;1;1;0;1;"></animate></circle><path fill="currentColor" opacity="1" d="M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="1;0;0;0;0;1;"></animate></path><path fill="currentColor" opacity="0" d="M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="0;0;1;1;0;0;"></animate></path></g></svg><!-- <i class="fa fa-dashboard"></i> -->
<!--<span class="hidden-sm-down">Item 1</span></a>-->
<!--                        <div class="collapse" id="menu1">-->
<!--                            <a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a>-->
<!--                            <div class="collapse" id="menu1sub1">-->
<!--                                <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 1 a</a>-->
<!--                                <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 2 b</a>-->
<!--                                <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 c </a>-->
<!--                                <div class="collapse" id="menu1sub1sub1">-->
<!--                                    <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.1</a>-->
<!--                                    <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.2</a>-->
<!--                                </div>-->
<!--                                <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 4 d</a>-->
<!--                                <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 5 e </a>-->
<!--                                <div class="collapse" id="menu1sub1sub2">-->
<!--                                    <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.1</a>-->
<!--                                    <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.2</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <a href="#" class="list-group-item" data-parent="#menu1">Subitem 2</a>-->
<!--                            <a href="#" class="list-group-item" data-parent="#menu1">Subitem 3</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="list-group-item collapsed"><svg class="svg-inline--fa fa-film fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="film" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M488 64h-8v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12V64H96v20c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12V64h-8C10.7 64 0 74.7 0 88v336c0 13.3 10.7 24 24 24h8v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h320v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h8c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24zM96 372c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm272 208c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm0-168c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm112 152c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40z"></path></svg><!-- <i class="fa fa-film"></i> -->
<!--<span class="hidden-sm-down">Item 2</span></a>-->
<!--                        <a href="#menu3" class="list-group-item collapsed" data-toggle="collapse" aria-expanded="false"><svg class="svg-inline--fa fa-book fa-w-14" aria-hidden="true" data-prefix="fa" data-icon="book" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path></svg><!-- <i class="fa fa-book"></i> -->
<!--<span class="hidden-sm-down">Item 3 </span></a>-->
<!--                        <div class="collapse" id="menu3">-->
<!--                            <a href="#" class="list-group-item" data-parent="#menu3">3.1</a>-->
<!--                            <a href="#menu3sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">3.2 </a>-->
<!--                            <div class="collapse" id="menu3sub2">-->
<!--                                <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 a</a>-->
<!--                                <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 b</a>-->
<!--                                <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 c</a>-->
<!--                            </div>-->
<!--                            <a href="#" class="list-group-item" data-parent="#menu3">3.3</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="list-group-item collapsed"><svg class="svg-inline--fa fa-heart fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path></svg><!-- <i class="fa fa-heart"></i> -->
<!--<span class="hidden-sm-down">Item 4</span></a>-->
<!--                        <a href="#" class="list-group-item collapsed"><svg class="svg-inline--fa fa-list fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M128 116V76c0-8.837 7.163-16 16-16h352c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H144c-8.837 0-16-7.163-16-16zm16 176h352c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H144c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h352c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H144c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zM16 144h64c8.837 0 16-7.163 16-16V64c0-8.837-7.163-16-16-16H16C7.163 48 0 55.163 0 64v64c0 8.837 7.163 16 16 16zm0 160h64c8.837 0 16-7.163 16-16v-64c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v64c0 8.837 7.163 16 16 16zm0 160h64c8.837 0 16-7.163 16-16v-64c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v64c0 8.837 7.163 16 16 16z"></path></svg><!-- <i class="fa fa-list"></i> -->
<!--<span class="hidden-sm-down">Item 5</span></a>-->
<!--                        <a href="#" class="list-group-item collapsed"><svg class="svg-inline--fa fa-clock-o fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="clock-o" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><g><path fill="currentColor" d="M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"></path><circle fill="currentColor" cx="256" cy="364" r="20.3202"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="r" values="28;14;28;28;14;28;"></animate><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="1;0;1;1;0;1;"></animate></circle><path fill="currentColor" opacity="1" d="M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="1;0;0;0;0;1;"></animate></path><path fill="currentColor" opacity="0" d="M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"><animate attributeType="XML" repeatCount="indefinite" dur="2s" attributeName="opacity" values="0;0;1;1;0;0;"></animate></path></g></svg><!-- <i class="fa fa-clock-o"></i> -->
<!--<span class="hidden-sm-down">Link</span></a>-->
<!---->
<!--                    </div>-->
<!--                </div>-->

</body>
</html>