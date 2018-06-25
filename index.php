<?php

// import de la classe Routing ( pour l'utiliser)
use BWB\Framework\mvc\Routing;

// pour beneficier de l'autoload de composer
include "vendor/autoload.php";

// A chaque requete emise nous lançons le mecanisme de routage
(new Routing())->execute();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link href="newcss.css" rel="stylesheet">
        <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">-->
    </head>
    <body>
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
            <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                <div class="cards">
                    <div class="card shadow-1"></div>
                    <div class="card shadow-1"></div>
                    <div class="card shadow-1"></div>
                    <div class="card shadow-1"></div>
                    <div class="card shadow-1"></div>
                    <div class="card shadow-1"></div>
                    <div class="card shadow-1"></div>
                    <div class="card shadow-1"></div>
                </div>
            </div>
            <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
            </div>
        </div>
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
            <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
            </div>
            <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="newjavascript.js"></script>
    </body>
</html>