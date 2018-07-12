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

$(".icone_match").click(function () {
    alert("Handler for .click() called.");
});

$(".icone_like").click(function () {
    alert("Handler for .click() called.");
});

function update_notifs() {
    $.ajax({
        type: "PUT",
        url: "http://adopt-un-boss.bwb/api/notification",
        success: function () {
            document.location.href = "http://adopt-un-boss.bwb/profil";
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
    if (data['match']) {
        $(".pastille_match").css("display", "inline-block")
    } else {
        $(".pastille_match").css("display", "none")
    }
}

