
<?php // include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="http://<?= $_SERVER['SERVER_NAME']?>/assets/styles/profil_public_candidat.css">
<link rel="stylesheet" href="http://<?= $_SERVER['SERVER_NAME']?>/assets/styles/barNav.css">


<body>
<?php include 'views/barNav.php'; ?>
    
    <div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="container-profil-public col-md-12 text-center">
            <div class="panel panel-default">
                <div class="userprofile social ">
                    <div class="userpic"> <img src="<?= $user->getPhoto() ?>" alt="" class="userpicimg"> </div>
                    <h3 class="username"><?= $user->getNom(). " " .$user->getPrenom() ?></h3>
                    <p><?= $user->getAdresse() ?></p>
                    <div class="socials tex-center"> <a href="" class="btn btn-circle btn-primary ">
                            <i class="fab fa-facebook-f"></i></a> <a href="" class="btn btn-circle rounded-circle btn-danger ">
                            <i class="fab fa-google-plus"></i></a> <a href="" class="btn btn-circle btn-info ">
                            <i class="fab fa-twitter"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
                    </div>
<!--                    <div class="col-md-12 border-top border-bottom">
                        <div class="clearfix"></div>
                        <ul class="nav nav-pills pull-left countlist" role="tablist">
                            <li role="presentation">
                                <h3>1452<br>
                                    <small>Follower</small> </h3>
                            </li>
                            <li role="presentation">
                                <h3>245<br>
                                    <small>Following</small> </h3>
                            </li>
                            <li role="presentation">
                                <h3>5000<br>
                                    <small>Activity</small> </h3>
                            </li>
                            <button class="btn btn-outline-primary followbtn">Like <i class="fas fa-heart" style="color: red"></i></button>
                        </ul>
                    </div>-->
                </div>
                <div class="col-md-12 border-top border-bottom">
                <div class="clearfix"></div>
                    <ul class="nav nav-pills pull-left countlist" role="tablist">
                        <li role="presentation">
                            <h3>1452<br>
                                <small>Follower</small> </h3>
                        </li>
                        <li role="presentation">
                            <h3>245<br>
                                <small>Following</small> </h3>
                        </li>
                        <li role="presentation">
                            <h3>5000<br>
                                <small>Activity</small> </h3>
                        </li>
                        <button class="btn btn-outline-primary followbtn">Like <i class="fas fa-heart" style="color: red"></i></button>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col-md-12 -->
        <div class="col-md-4 col-sm-12 pull-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="page-header small">Details personnel</h1>
                    <li><?=$user->getAge()?> Ans</li>
                    <li><?=$user->getTel()?></li>
                    <li><?=$user->getMail()?></li>
                </div>
<!--                <div class="col-md-12 photolist">
                    <div class="row">
                        <div class="col-sm-3 col-xs-3"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="" alt=""> </div>
                        <div class="col-sm-3 col-xs-3"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="" alt=""> </div>
                        <div class="col-sm-3 col-xs-3"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="" alt=""> </div>
                        <div class="col-sm-3 col-xs-3"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="" alt=""> </div>
                    </div>
                </div>-->
                <div class="clearfix"></div>
            </div>
<!--            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="page-header small">Aimé par </h1>
                    <p class="page-subtitle small">Like to work fr different business</p>
                </div>
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item"><span class="fa fa-male"></span> Worked with 1000+ people</li>
                        <li class="list-group-item"><span class="fa fa-institution"></span> 60+ offices</li>
                        <li class="list-group-item"><span class="fa fa-user"></span> 50000+ satify customers</li>
                        <li class="list-group-item"><span class="fa fa-clock-o"></span> Work hours many and many still counting</li>
                        <li class="list-group-item"><span class="fa fa-heart"></span> Customer satisfaction for servics</li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>-->

<!--            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="page-header small">Recently Connected</h1>
                    <p class="page-subtitle small">You have recemtly connected with 34 friends</p>
                </div>
                <div class="col-md-12">
                    <div class="memberblock"> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                            <div class="memmbername">Ajay Sriram</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">Rajesh Sriram</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">Manish Sriram</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">Chandra Amin</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">John Sriram</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">Lincoln Sriram</div>
                        </a> </div>
                </div>
                <div class="clearfix"></div>
            </div>-->
        </div>
        <div class="col-md-8 col-sm-12 pull-left posttimeline">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="status-upload nopaddingbtm">
                        <!--<form>-->
                            <!--<textarea class="form-control" placeholder="What are you doing right now?"></textarea>-->
                        <div class="container">
                            <div class="col-md-12" style="word-wrap: break-word">
                                    <p><?= $user->getDescription() ?></p>                                    
                                </div>
                        </div>
<!--                            <br>
                            <ul class="nav nav-pills pull-left ">
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="glyphicon glyphicon-bullhorn"></i></a></li>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class=" glyphicon glyphicon-facetime-video"></i></a></li>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="glyphicon glyphicon-picture"></i></a></li>
                            </ul>
                            <button type="submit" class="btn btn-success pull-right"> Share</button>
                        </form>-->
                    </div>
                    <!-- Status Upload  --> 
                </div>
            </div>
            <div class="panel panel-default">
<!--                <div class="col-md-12">
                    <div class="media">
                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading">Lucky Sans<br>
                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>

                            <ul class="nav nav-pills pull-left ">
                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>
                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>
                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 commentsblock border-top">
                    <div class="media">
                        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading">Astha Smith</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading">Lucky Sans</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </p>
                            <div class="media">
                                <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Astha Smith</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">

                <div class="col-md-12 border-top">
                    <div class="status-upload">
                        <form>
                            <label>Comment</label>
                            <textarea class="form-control" placeholder="Comment here"></textarea>
                            <br>
                            <ul class="nav nav-pills pull-left ">
                                <li><a title=""><i class="glyphicon glyphicon-bullhorn"></i></a></li>
                                <li><a title=""><i class=" glyphicon glyphicon-facetime-video"></i></a></li>
                                <li><a title=""><i class="glyphicon glyphicon-picture"></i></a></li>
                            </ul>
                            <button type="submit" class="btn btn-success pull-right"> Comment</button>
                        </form>
                    </div>
                     Status Upload   

                </div>
            </div>-->


        </div>
    </div>
</div>
</div>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>