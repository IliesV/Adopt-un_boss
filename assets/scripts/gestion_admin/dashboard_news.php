<div class="container_card col-md-3 bg-dark ">
    <a href="/gestion/creation/news">
        <div class="card">
            <h3 class="create_news">Créer une Actualité>
        </div>
    </a>
    <?php
    foreach ($datas as $data):
        echo '<a href="/gestion/view/news/' . $data->getId() . '">'
        . '<div class="card">'
        . '<h3 class="titre_news">' . $data->getTitre()
        . '</h3></div></a>';
    endforeach;
    ?>
</div>
<div class="col-md-7 bg-dark ">
    <?php if ($data_by_id == null): ?>
        <form action="http://adopt-un-boss.bwb/gestion/creation/news" method="post">
            titre: <input type="text" name="titre_news"><br>
            texte: <input type="text" name="texte_news"><br>
            <input type="submit">
        </form>
    <?php else: ?>
        <div class="titre_news"><?= $data_by_id->getTitre() ?></div>
        <div class="texte_news"><?= $data_by_id->getTexte() ?></div>
        <div class="date_creation_news"><?= $data_by_id->getDate_creation() ?></div>
        <div class="button_candidat">
            <a href="/gestion/validation/news/<?= $data_by_id->getId() ?>"><div>Valider Offre</div></a>
            <a href="/gestion/delete/news/<?= $data_by_id->getId() ?>"><div>Supprimer Offre</div></a> 
        </div>
    <?php endif; ?>
</div>