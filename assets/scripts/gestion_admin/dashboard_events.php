<div class="container_card col-md-3 bg-dark ">
    <?php
    foreach ($datas as $data):
            echo '<a href="/gestion/view/events/' . $data->getId() . '">'
            . '<div class="card">'
            . '<h3 class="titre_event">' . $data->getTitre()
            . '</h3></div></a>';
    endforeach;
    ?>
</div>
<div class="col-md-7 bg-dark ">
    <?php
    if (!$data_by_id):
        echo '<div class="div_erreur"><h3 class="message_erreur">Veuillez sélectionner une offre en attente de validation.</h3></div>';
    else:?>
            <div class="nom_candidat"><?= $data_by_id->getTitre() ?></div>
            <div class="button_candidat">
                <a href="/gestion/offre/<?= $data_by_id->getId() ?>/valid"><div>Valider Offre</div></a>
                <a href="/gestion/offre/<?= $data_by_id->getId() ?>/delete"><div>Supprimer Offre</div></a> 
            </div>
    <?php endif; ?>
</div>