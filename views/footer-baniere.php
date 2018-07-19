<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 12/07/2018
 * Time: 09:20
 */
?>
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/footer.css">

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