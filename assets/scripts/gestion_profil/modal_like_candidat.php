<div class="modal fade" id="modalEditProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Liker ce candidat.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

<?php if(count($offres)>0): ?>
            
            <form action="http://<?= $_SERVER['SERVER_NAME'] ?>/likecandidat/<?= $user->getUser_id() ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Par rapport à quelle offre souhaiter vous liker ce candidat ?</label>
                        <br><select name="intitule">
                            <?php var_dump($offres) ?>
                            <?php foreach ($offres as $offre): ?>
                            <option value='<?= $offre->getIntitule() ?>'><?= $offre->getIntitule() ?></option>
                            <?php endforeach; ?>    
                        </select>     
                    </div>
                </div>
                <input type="submit" value="Sauvegarder" class="btn btn-primary">
            </form>
                
                <?php else: ?>
                <p>Vous n'avez pas d'offres en ligne actuellement :(</p>
                <?php endif; ?>


        </div>
    </div>
</div>