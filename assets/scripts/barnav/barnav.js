$(document).ready(function () {
    get_notifs();
});

function get_notifs() {
    $.ajax({
        type: "GET",
        url: "http://adopt-un-boss.bwb/api/notification",
        success: function (data) {
            create_user_card(data);
            setTimeout(function () {
                get_users();
            }, 500);
        },
        error: function () {
            console.log("error");
        }
    });
}

