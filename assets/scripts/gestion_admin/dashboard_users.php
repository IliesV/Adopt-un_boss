<div class="container_card col-md-3 bg-dark ">
    <?php
    foreach ($datas as $data):
        $object_name = (new ReflectionClass($data))->getShortName();
        if ($object_name == 'Candidat'):
            echo '<a class="card_user' . $data->getUser_id() . '" href="/gestion/view/users/' . $data->getUser_id() . '">'
            . '<div class="card">'
            . '<h3 class="nom_candidat">' . $data->getNom()
            . '<h3 class="prenom_candidat">' . $data->getPrenom()
            . '</h3></div></a>';
        elseif ($object_name == 'Entreprise'):
            echo '<a class="card_user' . $data->getUser_id() . '" href="/gestion/view/users/' . $data->getUser_id() . '">'
            . '<div class="card">'
            . '<h3 class="nom_candidat">' . $data->getNom()
            . '</h3></div></a>';
        endif;
    endforeach;
    ?>
</div>
<div class="col-md-7 bg-dark ">
    <?php
    if (!$data_by_id):
        echo '<div class="div_erreur"><h3 class="message_erreur">Veuillez sélectionner un membre en attente de validation.</h3></div>';
    else:
        $object_name = (new ReflectionClass($data_by_id))->getShortName();
        if ($object_name == 'Candidat'):
            ?>
            <div class="image_candidat"><img src="<?= $data_by_id->getPhoto() ?>"/></div>
            <div class="nom_candidat"><?= $data_by_id->getNom() ?></div>
            <div class="prenom_candidat"><?= $data_by_id->getPrenom() ?></div>
            <div class="age_candidat"><?= $data_by_id->getAge() ?></div>
            <div class="adresse_candidat"><?= $data_by_id->getAdresse() ?></div>
            <div class="mail_candidat"><?= $data_by_id->getMail() ?></div>
            <div class="tel_candidat"><?= $data_by_id->getTel() ?></div>
            <div class="description_candidat"><?= $data_by_id->getDescription() ?></div>
            <div class="date_creation_candidat"><?= $data_by_id->getDate_creation() ?></div>
            <button class="btn btn-primary button_user_update" value="<?= $data_by_id->getUser_id() ?>">Valider Candidat</button>
            <button class="btn btn-primary button_user_delete" value="<?= $data_by_id->getUser_id() ?>">Supprimer Candidat</button> 

        <?php elseif ($object_name == 'Entreprise'): ?>
            <div class="image_entreprise"><img src="<?= $data_by_id->getLogo() ?>"/></div>
            <div class="nom_entreprise"><?= $data_by_id->getNom() ?></div>
            <div class="salarie_entreprise"><?= $data_by_id->getSalarie() ?></div>
            <div class="site_web_entreprise"><?= $data_by_id->getSite_web() ?></div>
            <div class="adresse_entreprise"><?= $data_by_id->getAdresse() ?></div>
            <div class="mail_entreprise"><?= $data_by_id->getMail() ?></div>
            <div class="tel_entreprise"><?= $data_by_id->getTel() ?></div>
            <div class="description_candidat"><?= $data_by_id->getDescription() ?></div>
            <div class="date_creation_entreprise"><?= $data_by_id->getDate_creation() ?></div>
            <div class="button_entreprise">
                <button class="btn btn-primary button_user_update" value="<?= $data_by_id->getUser_id() ?>">Valider Candidat</button>
                <button class="btn btn-primary button_user_delete" value="<?= $data_by_id->getUser_id() ?>">Supprimer Candidat</button>              
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>