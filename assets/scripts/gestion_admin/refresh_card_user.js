$(".button_user_update").click(function (e) {
    var id = $(".button_user_update").val();
    requete_ajax_update(id);
});

$(".button_user_delete").click(function (e) {
    var id = $(".button_user_delete").val();
    requete_ajax_delete(id);
});

function requete_ajax_delete(id) {
    $.ajax({
        type: "DELETE",
        url: "http://adopt-un-boss.bwb/api/view/user/" + id,
        dataType: "json",
        success: function (data) {
            refresh_vue(data);
        },
        error: function () {
            console.log("error");
        }
    });
}

function requete_ajax_update(id) {
    $.ajax({
        type: "PUT",
        url: "http://adopt-un-boss.bwb/api/view/user/" + id,
        dataType: "json",
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data)
            console.log("error");
        }
    });
}
