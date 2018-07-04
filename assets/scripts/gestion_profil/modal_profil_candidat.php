<div class="modal fade" id="modalEditProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
            $candidat = $user->to_array();

            ?>
            <form action="http://<?= $_SERVER['SERVER_NAME']?>/profil/update" method="POST">
                <?php

                foreach ($candidat as $key => $value):?>
                    <?php

                    if ($key!=='user_id' & $key!=='password' & $key!=='date_creation') {

                        ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label"><?= $key ?></label>
                                <input type="text" class="form-control" id="recipient-name" name="<?=$key ?>" value="<?= $candidat->get.ucfirst($value) ?>">
                            </div>
                        </div>

                        <?php

                    }
                    ?>

                <?php
                endforeach;
                ?>

                <input type="submit" value="Sauvegarder" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>