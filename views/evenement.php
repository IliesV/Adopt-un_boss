
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/event.css">


<body>

   <?php include 'views/barNav.php'; ?>

<div class="container event">
<h2 class="titre-event-h2">Les derniers évènements AdoptUnBoss</h2>
    <h6 class="titre-event-h6">AdoptUnBoss organise plus de 10 évènements par an</h6>
    <div class="row">
        <div class="[ col-xs-12 col-sm-offset-2 col-sm-10 ]">
            <ul class="event-list">


                    <?php

                    foreach ($events as $event):
                    $date = date('d m', strtotime($event->getDate()));

                    ?>
                        <li class="hvr-forward" onclick="openNav(<?= $event->getId() ?>)">
                            <time datetime="2014-07-20">
                                <span class="day"><?= $date ?></span>
                                <span class="time"><?= $event->getHeure() ?></span>
                                <span class="lieu"><?= $event->getLieu()?></span>
                            </time>

                            <img src="<?= $event->getImage()?>" style="height: 120px; width: 120px" />
                            <div class="info" >
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


   <style>
       body {
           font-family: 'Lato', sans-serif;
           background-color: #EDEDED;
       }

       .overlay {
           height: 100%;
           width: 0;
           position: fixed;
           z-index: 1;
           top: 0;
           left: 0;
           /*background-color: rgb(0,0,0);*/
           background-color: rgba(255,255,255, 1);
           overflow-x: hidden;
           transition: 0.4s;
       }

       .overlay-content {
           position: relative;
           top: 25%;
           width: 100%;
           text-align: center;
           margin-top: 30px;
       }

       .overlay a {
           /*padding: 8px;*/
           text-decoration: none;
           font-size: 36px;
           color: #818181;
           display: block;
           transition: 0.3s;
       }

       .overlay a:hover, .overlay a:focus {
           color: #f1f1f1;
       }

       .overlay .closebtn {
           position: absolute;
           top: 30px;
           right: 35px;
           font-size: 35px;
       }

       @media screen and (max-height: 450px) {
           .overlay a {font-size: 20px}
           .overlay .closebtn {
               font-size: 40px;
               top: 15px;
               right: 35px;
           }
       }
   </style>
   </head>
   <body>

<?php
    foreach ($events as $event){?>
   <div id="myNav<?=$event->getId() ?>" class="overlay">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav(<?=$event->getId() ?>)">&times;</a>
       <div class="col-md-11">
                           <div class="center-block thumbnail-lg">
                               <div class="thumbnail thumbnail-lg thumbnail--light">
                                   <div class="container">
                                       <img class="img-responsive background-event">
                                   </div>
                               </div>
                           </div>


                           <div class="row">
                               <div class="col-md-12 col-md-offset-2">
                                   <h1 class="titre-event"><?= $event->getTitre() ?></h1>
                               </div>
                           </div>
                           <ul class="info-event">
                               <li><?= $date ?></li>
                               <li></li>
                               <li><?= $event->getLieu() ?></li>
                           </ul>
                           <div class="row corps-event">
                               <div class="col-md-12">
                                   <h2>L'évènement</h2>
                                   <p><?= $event->getDescription() ?></p>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-10">
                                   <img class="img-responsive center-block image-corps" src="https://assets.chooseyourboss.com/events/pictures/000/000/075/big/DevFest2018_CYB_HomePage.jpg?1524754207" alt="Devfest2018 cyb homepage"></div>
                           </div>

                           <?php
                            }
                           ?>
<!--                           <section id="how-it-works">-->
<!--                               <div class="row text-center">-->
<!--                                   <h2>Comment ça marche ?</h2>-->
<!--                               </div>-->
<!--                               <div class="row">-->
<!--                                   <div class="col-md-4">-->
<!--                                       <div class="it-works">-->
<!--                                           <i class="fas fa-link fa-4x  wow bounceIn text-primary" style="visibility: visible; animation-name: bounceIn; color: black"></i>-->
<!--                                           <h3>Le matching</h3>-->
<!--                                           <p>ChooseYourBoss matche les candidats et les recruteurs de l'évènement <strong>DevFest Nantes 2018</strong> sur les compétences, le salaire et l'expérience</p>-->
<!--                                       </div>-->
<!--                                   </div>-->
<!--                                   <div class="col-md-4">-->
<!--                                       <div class="it-works">-->
<!--                                           <i class="fas fa-4x icon-yes-no wow bounceIn text-primary" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;"></i>-->
<!--                                           <h3>Une feuille de route</h3>-->
<!--                                           <p>Nous vous proposons le jour de l'évènement, <strong>une feuille de route</strong> avec l'ensemble des offres qui matchent.</p>-->
<!--                                       </div>-->
<!--                                   </div>-->
<!--                                   <div class="col-md-4">-->
<!--                                       <div class="it-works">-->
<!--                                           <i class="fad fa-4x icon-interessed-mix wow bounceIn text-primary" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: bounceIn;"></i>-->
<!--                                           <h3>Rencontrez-vous !</h3>-->
<!--                                           <p>A vous de choisir votre boss et le rencontrer le jour de l'évènement.</p>-->
<!--                                       </div>-->
<!--                                   </div>-->
<!--                               </div>-->
<!--                           </section>-->
                       </div>
                   </div>


 



   </body>

   <script>
       function openNav(id) {
           document.getElementById("myNav"+id).style.width = "100%";
       }

       function closeNav(id) {
           document.getElementById("myNav"+id).style.width = "0%";
       }
   </script>

   <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" crossorigin="anonymous"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.js"crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.js" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.js"></script>
</body>
