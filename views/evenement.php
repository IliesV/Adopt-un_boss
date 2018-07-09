<!DOCTYPE html>
<html>
<head>
<!--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
    <link rel="stylesheet" href="/assets/styles/event.css">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/styles/barnav.css">
    <link rel="stylesheet" href="/assets/styles/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

   <?php include 'views/barNav.php'; ?>


<div class="container event">
    <div class="row">
        <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
            <ul class="event-list">


                    <?php

//                    $date = date('d', strtotime($date_in_dd));
//                    $date = $event->getDate();


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
</body>
