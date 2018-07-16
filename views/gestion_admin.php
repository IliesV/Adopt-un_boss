<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/admin.css"/>

<html>
    <body>
        <?php include 'views/barNav.php'; ?>
        <div class="container-fluid" style="margin-top: 35px;">
            <div class="row">
                <?php
                include './assets/scripts/gestion_admin/dashboard_navbar.php';
                include './assets/scripts/gestion_admin/' . $view . '.php';
                ?>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" type="text/javascript"></script>
        <script src="/assets/scripts/gestion_admin/ajax_newsletter.js" type="text/javascript"></script>
        <script src="/assets/scripts/gestion_admin/refresh_card_user.js" type="text/javascript"></script>
    </body>
</html>