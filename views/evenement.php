<!DOCTYPE html>
<html>
<head>
<!--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
    <link rel="stylesheet" href="/assets/styles/event.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/styles/hover-min.css">
    <link rel="stylesheet" href="/assets/styles/animate.min.css"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" crossorigin="anonymous">

<!------ Include the above in your HEAD tag ---------->
</head>
<body>

   <?php include 'views/barNav.php'; ?>

<div class="container event">
<h2 class="titre-event-h2">Les derniers évènements ChooseYourBoss</h2>
    <h6 class="titre-event-h6">ChooseYourBoss organise plus de 20 évènements par an</h6>
    <div class="row">
        <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
            <ul class="event-list hvr-grow">


                    <?php

                    foreach ($events as $event):
                    $date = date('d m', strtotime($event->getDate()));

                    ?>
                        <li>
                            <time datetime="2014-07-20">
                                <span class="day"><?= $date ?></span>
                                <span class="time"><?= $event->getHeure() ?></span>
                                <span class="lieu"><?= $event->getLieu()?></span>
                            </time>
                            <img src="<?= $event->getImage()?>" style="height: 120px; width: 120px" />
                            <div class="info" onclick="document.location='/event/<?= $event->getId()?> '">
                                <h2 class="title"><?= $event->getTitre()?></h2>
                                <p class="desc"><?= $event->getDescription()?></p>
                            </div>
                            <div class="social">
                                <ul>
                                    <li class="facebook" style="width:33%;"><a href="#facebook"><span class="fab fa-facebook-f"></span></a></li>
                                    <li class="twitter" style="width:34%;"><a href="#twitter"><span class="fab fa-twitter"></span></a></li>
                                    <li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fab fa-google-plus-g"></span></a></li>
                                </ul>
                            </div>
                        </li>
                    <?php
                    endforeach;
                    ?>

            </ul>
        </div>
    </div>
</div>
   <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" crossorigin="anonymous"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.js"crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.js" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.js"></script>
</body>
