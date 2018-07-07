<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adopt Un Boss</title>
        <link rel=“stylesheet” href=“/assets/styles/barnav.css”>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/styles/offres.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </head>


    <body>
        <div class="row">
            <div class="col-md-12">
                <div id="content-simple">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card--big js-user-matching-container offer offer--full" itemscope="" itemtype="http://schema.org/JobPosting">
                                <div class="row offer__header">
                                    <div class="row-height">
                                        <div class="col-sm-10 col-sm-height col-sm-middle">
                                            <h1 itemprop="title" class="offer__title top h1"><?= $offre->getIntitule() ?>
                                            </h1><div class="offer__at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                                                chez
                                                <span itemprop="name"><a class="text-link" href="/entreprise/<?= $entreprise->getUser_id() ?>"><?= $entreprise->getNom() ?></a></span>
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
                                <div class="row">
                                    <div class="col-md-12"><div class="text-right"><a data-target="#sign_up_or_sign_in" data-toggle="modal" data-offer="23883" class="btn btn-info inverse white-space-normal" href="#sign_up_or_sign_in"><i class="fa fa-heart"></i> Je like !</a></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>
                                            Le poste
                                        </h2>
                                        <div class="offer__part" itemprop="description">
                                            <p><?= $offre->getDetail() ?> </p>
                                </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center margin-bottom">
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="card" itemscope="" itemtype="http://schema.org/Organization">
                                <div class="center-block thumbnail-xl">
                                    <div class="thumbnail thumbnail-xl thumbnail--light">
                                        <img class="img-responsive" src="<?= $entreprise->getLogo() ?>" alt="logo<?= $entreprise->getNom() ?>" height="200" width="200">
                                    </div>
                                </div>
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
                                <div class="text-center"><a class="btn btn-info inverse white-space-normal" href="/entreprise/<?= $entreprise->getUser_id() ?>">Découvrir <?= $entreprise->getNom() ?></a></div>
                            </div>
                            <!--                            <div class="card card--unpadded m-b-0 map-location">
<!--                                                            <div class="js-map part" data-lat="48.8694724" data-lng="2.33635460000005" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;" class="gm-style"><div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;" tabindex="0"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -85, -172);"><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -85, -172);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 256px;"></div></div></div><div style="width: 27px; height: 43px; overflow: hidden; position: absolute; left: -14px; top: -43px; z-index: 0;"><img style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png" draggable="false"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 1; transform: matrix(1, 0, 0, 1, -85, -172);"><div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;"><img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i8298!3i5636!4i256!2m3!1e0!2sm!3i427129800!3m9!2sen-GB!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyCZ6cSK2B2OXRxENpuukx_KTxGzbXiVmg4&amp;token=58737"></div><div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;"><img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i8297!3i5636!4i256!2m3!1e0!2sm!3i427129800!3m9!2sen-GB!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyCZ6cSK2B2OXRxENpuukx_KTxGzbXiVmg4&amp;token=54067"></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i8297!3i5635!4i256!2m3!1e0!2sm!3i427129800!3m9!2sen-GB!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyCZ6cSK2B2OXRxENpuukx_KTxGzbXiVmg4&amp;token=31843"></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i8298!3i5635!4i256!2m3!1e0!2sm!3i427129800!3m9!2sen-GB!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyCZ6cSK2B2OXRxENpuukx_KTxGzbXiVmg4&amp;token=36513"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i8299!3i5635!4i256!2m3!1e0!2sm!3i427129800!3m9!2sen-GB!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyCZ6cSK2B2OXRxENpuukx_KTxGzbXiVmg4&amp;token=41183"></div><div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;"><img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i8299!3i5636!4i256!2m3!1e0!2sm!3i427129800!3m9!2sen-GB!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0!23i1301875&amp;key=AIzaSyCZ6cSK2B2OXRxENpuukx_KTxGzbXiVmg4&amp;token=63407"></div></div></div></div><div style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;" class="gm-style-pbc"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div style="width: 27px; height: 43px; overflow: hidden; position: absolute; opacity: 0.01; left: -14px; top: -43px; z-index: 0;" class="gmnoprint"><img style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png" draggable="false" usemap="#gmimap6"><map name="gmimap6" id="gmimap6"><area log="miw" coords="13.5,0,4,3.75,0,13.5,13.5,43,27,13.5,23,3.75" shape="poly" title="" style="cursor: pointer; touch-action: none;"></map></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: medium none;" src="about:blank" frameborder="0"></iframe><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a style="position: static; overflow: visible; float: none; display: inline;" target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=48.869472,2.336355&amp;z=14&amp;t=m&amp;hl=en-GB&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps"><div style="width: 66px; height: 26px; cursor: pointer;"><img style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 28px; top: 20px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2018 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 161px; bottom: 0px; width: 121px;"><div draggable="false" style="-moz-user-select: none; height: 14px; line-height: 14px;" class="gm-style-cc"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2018 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2018 Google</div></div><div class="gmnoprint gm-style-cc" style="z-index: 1000001; -moz-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 92px; bottom: 0px;" draggable="false"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);" href="https://www.google.com/intl/en-GB_US/help/terms_maps.html" target="_blank" rel="noopener">Terms of Use</a></div></div><button style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; margin: 10px 14px; padding: 0px; position: absolute; cursor: pointer; -moz-user-select: none; width: 25px; height: 25px; overflow: hidden; top: 0px; right: 0px;" draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button"><img style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png" draggable="false" class="gm-fullscreen-control"></button><div draggable="false" style="-moz-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;" class="gm-style-cc"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;" href="https://www.google.com/maps/@48.8694724,2.3363546,14z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" style="margin: 10px; -moz-user-select: none; position: absolute; bottom: 69px; right: 28px;" draggable="false" controlwidth="28" controlheight="55"><div class="gmnoprint" style="position: absolute; left: 0px; top: 0px;" controlwidth="28" controlheight="55"><div draggable="false" style="-moz-user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;"><button style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; border: 0px none; margin: 0px; padding: 0px; position: relative; cursor: pointer; -moz-user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;" draggable="false" title="Zoom in" aria-label="Zoom in" type="button"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img style="position: absolute; left: 0px; top: 0px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false"></div></button><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;"></div><button style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; border: 0px none; margin: 0px; padding: 0px; position: relative; cursor: pointer; -moz-user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;" draggable="false" title="Zoom out" aria-label="Zoom out" type="button"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img style="position: absolute; left: 0px; top: -15px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false"></div></button></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div style="width: 28px; height: 28px; overflow: hidden; position: absolute; background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; display: none;" title="Rotate map 90 degrees"><img style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false"></div><div style="width: 28px; height: 28px; overflow: hidden; position: absolute; background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; top: 0px; cursor: pointer;" class="gm-tilt"><img style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; -moz-user-select: none; border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false"></div></div></div></div></div></div>-->
<!--                                                        </div>-->-->
                            <div class="card">19 Rue du 4 Septembre, 75002 Paris, France</div>
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
                                    <a class="btn btn-info inverse btn-sm" href="/offre/<?= $otherOffre->getId() ?>">Voir l'offre !</a>
                                </div>
                            </div>
                            <?php endforeach; }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
