<footer>
    <?php
        $dao_stat = new BWB\Framework\mvc\dao\DAOStat();
    ?>
    <!--Pre-Footer-->

    <div class="col-md-12" style="background-color: #24d1fd">
        <div class="container-fluid">
            <section id="statistics">
                <div class="row">
                    <div class="col-sm-2 col-sm-height col-middle text-right hidden-xs">
                        <i class="fas fa-user fa-3x icon-candidate wow bounceIn" style="visibility: visible; animation-name: bounceIn;"></i>
                    </div>
                    <div class="col-sm-2 col-sm-height col-middle">
                        <div class="metric"><p style="margin-top: 10px; font-size: 20px"><?= $dao_stat->count_candidat() ?> Candidats</p></div>
                    </div>
                    <div class="col-sm-2 col-sm-height col-middle text-right hidden-xs">
                        <i class="fas fa-briefcase fa-3x icon-recruiter wow bounceIn" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceIn;"></i>
                    </div>
                    <div class="col-sm-2 col-sm-height col-middle">
                        <div class="metric"><p style="margin-top: 10px; font-size: 20px"><?= $dao_stat->count_entreprise() ?> Recruteurs</p></div>
                    </div>
                    <div class="col-sm-2 col-sm-height col-middle text-right hidden-xs">
                        <i class="fas fa-handshake fa-3x icon-matching wow bounceIn" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceIn;"></i>
                    </div>
                    <div class="col-sm-2 col-sm-height col-middle">
                        <div class="metric"><p style="margin-top: 10px; font-size: 20px"><?= $dao_stat->count_match() ?> Rencontres</p></div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <section id="footer" class="col-md-12">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Nous suivre</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="./adopt-un-boss/views/About.php"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="/../FAQ.php"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="/../inscription.php"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="https://www.youtube.com/"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Lien utile</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="https://www.pole-emploi.fr/accueil/"><i class="fa fa-angle-double-right"></i>Pole-emploi</a></li>
                        <li><a href="https://www.mission-locale.fr/"><i class="fa fa-angle-double-right"></i>Mission locale</a></li>
                        <li><a href="http://travail-emploi.gouv.fr/"><i class="fa fa-angle-double-right"></i>Ministere du travail-emploi</a></li>
                        <li><a href="https://www.govoyages.com/?mktportal=google-brand&gclid=EAIaIQobChMI4MXi7YeU3AIVxZkbCh3Z1gw4EAAYASAAEgI0PfD_BwE"><i class="fa fa-angle-double-right"></i>Go voyages</a></li>
                        <li><a href="http://www.compagniedesspas.fr/?gclid=EAIaIQobChMI45_LuYiU3AIVSJnVCh2CFAWjEAAYASAAEgI6RPD_BwE"><i class="fa fa-angle-double-right"></i>Détente et bien-etre</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>besoin d'aide ?</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="http://www.sixrevisions.com"><i class="fa fa-angle-double-right"></i>Sixrevisions</a></li>
                        <li><a href="http://www.WebResourcesDepot"><i class="fa fa-angle-double-right"></i>WebResourcesDepot</a></li>
                        <li><a href="http://www.phpied.com();"><i class="fa fa-angle-double-right"></i>phpied</a></li>
                        <li><a href="http://www.scotch.io();"><i class="fa fa-angle-double-right"></i>Scotch.io</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                </hr>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.adopt-un-boss" target="_blank">Adopt-un-boss</a></p>
                </div>
                </hr>
            </div>
        </div>
    </section>
</footer>
