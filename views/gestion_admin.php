<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"/>
        <link href="/assets/styles/admin.css" rel="stylesheet"/>
        <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">-->
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php                
                include './assets/scripts/gestion_admin/dashboard_navbar.php';
                include './assets/scripts/gestion_admin/' . $view . '.php';
                ?>
            </div>
        </div>
    </body>
</html>