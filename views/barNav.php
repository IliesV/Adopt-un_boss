
    <link rel="stylesheet" href="/assets/styles/footer.css">
    <link rel="stylesheet" href="/assets/styles/barnav.css">
    <script src="/assets/scripts/animate/animation.js"></script>
    <link rel="stylesheet" href="/assets/styles/hover-min.css">
    <link rel="stylesheet" href="/assets/styles/animate.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">





    <?php
if(isset($_COOKIE['tkn'])):
    $barnav_controller = new \BWB\Framework\mvc\controllers\BarnavController();
    $user = $barnav_controller->get_user();
endif;
?>

<nav class="navbar navbar-expand-sm navbar-dark"  style="background-color: #343539">
    <a class="navbar-brand" href="/"><img id="iconNavBar" src="/assets/imgs/leter-a-inside-a-black-circle.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link hvr-grow hvr-underline-from-center" href="/offres">Nos Offres<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link hvr-grow hvr-underline-from-center" href="#animate" id="top">Comment ça marche ?<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link hvr-grow hvr-underline-from-center" href="/event">Évenements</a>
            </li>



                <?php
                if (!empty($_COOKIE['tkn'])) {
                    ?>

<!--                    btn notification + pastille-->
            <div class="btn-barnav row">
                    <div class="notif-barnav">
                        <i class="far fa-envelope fa-2x hvr-bubble-float-bottom message-notif"></i>
                        <i class="fas fa-circle pastille-notif "></i>

<!--                        <a id="tg" tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>-->


                        <i class="far fa-handshake fa-2x hvr-bubble-float-bottom match-notif"></i>
                        <i class="fas fa-circle pastille-notif"></i>

                        <i class="far fa-thumbs-up fa-2x hvr-bubble-float-bottom like-notif""></i>
                        <i class="fas fa-circle pastille-notif"></i>
                    </div>

                    <div class="dropdown">
                        <img id="photo-profil" class="d-flex rounded-circle hvr-pulse" src="<?= $user->getPhoto(); ?>" style="height: 35px; width: 35px" alt="">
                        <div class="dropdown-content dropdown-left">
                            <a href="/profil" class="nav-link disabled"><button class="btn-deco btn btn-outline">Mon Compte</button></a>
                            <a href="/logout" class="nav-link disabled"><button class="btn-deco btn btn-outline">Deconnexion</button></a>
                        </div>
                    </div>
            </div>

            <?php
            }else{
                ?>
                    <div class="btn-deco row">
                        <a href="/login/candidat" class="nav-link disabled"><button class="btn btn-outline-success btn-co"> Connexion </button></a>
                        <a href="/register" class="nav-link disabled"><button class="btn btn-outline-primary btn-inscription"> Inscrition </button></a>
                    </div>
            <?php
            }
            ?>

            </div>
        </ul>
    </div>
</nav>