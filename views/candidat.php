<html>
<head>

</head>
<body>
<h1> FRAMEWORK MVC PHP beWeb </h1>

<?php
//var_dump($offreLiked);
foreach ($offreLiked as $offres):

?>
<p><?= $offres->getIntitule()?></p>
<?php
endforeach;
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Adopt Un Boss</title>
    <link rel="stylesheet" href="/assets/styles/candidat.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>

</head>
<div>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Expand at sm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </nav>



    <div class="jumbotron" style="background-color: #f7faff">
        <div class="container">
            <div class="row">
                <img id="photo-profil"class="d-flex rounded-circle" src="http://seasonyourhealth.com/wp-content/uploads/2018/03/free-picture-man-old-person-profile-portrait-homeless-con-photo-de-profil-homme-2017-e-2017-05-12-11-21-17-2849x3561px-photo-de-profil-homme-2017.jpg" style="height: 100px; width: 100px" alt="">
                <h2 id="nomprenom" style="font-family: 'Comfortaa', cursive;">Nom Prenom</h2>
                <p><a id="edit-profil" class="btn btn-primary btn-lg" href="#" role="button">Edit</a></p>
            </div>
        </div>
    </div>

    <div id="container-profil" class="row" style="background-color: #f2f6ff">
        <div class="col-md-4">
            <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189671.svg" style="height: 100px; background-color: #1465bc" alt="Quiz 1x">
                <div class="p-a-3">
                    <h3 id="titre-card-profil" class="top">Mes Likes</h3>
                    <p></p>
                    <p></p>

                    <div id="container-offre" class="col-md-12">
                        <div id="card-offre" class="card offer" style="background-color: white">
                            <a><div itemprop="title" class="offer-title top h5">
                                    <i id="coeurOffre" class="fas fa-heart"></i>



                            </a>
                        </div><div class="offer-at" itemprop="hiringOrganization" itemscope="" itemtype="http://schema.org/Organization">
                            <a class="text-link" href="/companies/melanie-prestat-it-factor-tech-recruiteuse">

                                <?php


                                try {
                                    $dbh = new PDO('mysql:host=127.0.0.1;dbname=adopt_un_boss',"root","rootroot");
                                    $dbh->exec("SET CHARACTER SET utf8");
                                    $sql = "SELECT nom FROM entreprise WHERE nom='nintendo';";
                                    // j'envoi la requette
                                    $statement = $dbh->query($sql);
                                    $results = $statement->fetchAll();
                                } catch (PDOException $e) {
                                    print "Erreur !: " . $e->getMessage() . "<br/>";
                                    die();
                                }
                                foreach ($results as $element){
                                    echo "<tr>";
                                    echo "<td>".$element['nom']."</td>";
//                                          echo "<td>".$element['id']."</td>";
                                    echo "</tr>";
                                }

                                ?>
                            </a>
                            recrute pour son client
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card--unpadded"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/189/189706.svg" style="height: 100px; background-color: #1465bc" alt="Barometre landing 1x">
            <div class="p-a-3">
                <h3 id="titre-card-profil" class="top">Mes Matchs</h3>
                <p>
                    Quels sont les métiers / langages qui payent le plus ? Quelles responsabilités va-t-on vous demander dans les prochaines années ? Quelles sont les pistes d'évolution ?
                </p>
                <p>
                    Retrouvez toutes ces infos dans notre baromètre des salaires.
                </p>
                <a class="btn btn-outline-secondary" href="/barometre-des-salaires-it">Plus...</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card--unpadded" id="events"><img id="img-card-profil" class="img-responsive center-block" src="https://image.flaticon.com/icons/svg/139/139035.svg" style="height: 100px; background-color: #1465bc" alt="Devfest2018 cyb homepage">
            <div class="p-a-3">
                <h3 id="titre-card-profil">En Attente</h3>
                <p>Le DevFest est un festival de développeurs accueillant plus de 1800 participants à la Cité des Congrès de Nantes en 2018 les 18 &amp; 19 Octobre.
                    Ouverture du CFP, de la billetterie et du site du...</p>
                <br>
                <a class="btn btn-outline-secondary" href="/evenements">Plus...</a>
            </div>
        </div>
    </div>
</div>
</html>
</body>
</html>
