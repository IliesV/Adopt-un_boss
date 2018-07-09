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
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
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
                    <p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
                    <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
                </div>
                </hr>
            </div>
        </div>
    </section>
</footer>
