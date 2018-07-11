
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/inscription.css">

<body>
<?php include 'views/barNav.php'; ?>



    <div class="container col-md-10" style="margin-left: 350px; margin-top: 50px">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form role="form">
                    <h2 style="text-align: center">Merci de vous inscrire <small>c'est gratuit !</small></h2>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">

                            <div class="form-group">
                                <input type="text" name="nom" id="nom" class="form-control input-lg" placeholder="Nom" tabindex="1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="prenom" id="prenom" class="form-control input-lg" placeholder="Prenom" tabindex="2">
                            </div>
                        </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="age" id="age" class="form-control input-lg" placeholder="Age" tabindex="3">
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="adresse" id="adresse" class="form-control input-lg" placeholder="Adresse" tabindex="4">
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="tel" id="tel" class="form-control input-lg" placeholder="Tel" tabindex="5">
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="mail" id="mail" class="form-control input-lg" placeholder="Mail" tabindex="6">
                            </div>
                        </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="password" id="password" class="form-control input-lg" placeholder="Mot De Pass" tabindex="7">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="photo" name="photo" id="password" class="form-control input-lg" placeholder="Photo" tabindex="9">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
<!--                                <label for="exampleInputFile">Photo</label>-->
                                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            </div>
                        </div>

<!--                        <div class="input-prepend" >-->
<!--                            <span class="add-on"><i class="icon-music"></i></span>-->
<!--                            <input type="text" placeholder="Style musical" class="input-large" id="menu-deroulant-style">-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div id="menu-deroulant-style-on">-->
<!--                            <label for="checkbox1">Option 1 </label><input type="checkbox" name="checkbox1" id="checkbox1" value="1"/><br />-->
<!--                            <label for="checkbox2">Option 2 </label><input type="checkbox" name="checkbox2" id="checkbox2" value="2"/><br />-->
<!--                            <label for="checkbox3">Option 3 </label><input type="checkbox" name="checkbox3" id="checkbox3" value="3"/>-->
<!---->
<!--                            <button type="submit" class="btn" id="bouton-valid-style">OK</button>-->
<!---->
<!--                        </div>-->

                        <!--                        <div class="col-xs-12 col-sm-6 col-md-6">-->
<!--                            <div class="form-group">-->
<!--                                <input type="techno" name="techno" id="techno" class="form-control input-lg" placeholder="Techno" tabindex="10">-->
<!--                            </div>-->
<!--                        </div>-->




                    </div>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" name="inscription" value="Inscription" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
                        <div class="col-xs-12 col-md-6"><a href="/login/candidat" class="btn btn-success btn-block btn-lg">Connexion</a></div>
                    </div>
            </div>
        </div>


        </div>
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                    </div>
                    <div class="modal-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>


