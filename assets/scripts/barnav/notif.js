$(document).ready(function () {
    get_notifs();
});

function get_notifs() {
    $.ajax({
        type: "GET",
        url: "http://adopt-un-boss.bwb/api/notification",
        success: function (data) {
            affichage_pastille(data);
            clearTimeout(refreshNotif);
            var refreshNotif = setTimeout(function () {

                get_notifs();
            }, 2000);
        },
        error: function () {
            console.log("error");
        }
    });
}

function affichage_pastille(data) {
    if (data['message']) {
        $(".pastille_message").css("display", "inline-block")
    } else {
        $(".pastille_message").css("display", "none")
    }
    if (data['like']) {
        $(".pastille_like").css("display", "inline-block")
    } else {
        $(".pastille_like").css("display", "none")
    }
    if (data['message']) {
        $(".pastille_match").css("display", "inline-block")
    } else {
        $(".pastille_match").css("display", "none")
    }
}

