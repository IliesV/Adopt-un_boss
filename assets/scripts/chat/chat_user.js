$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "http://adop-un-boss.bwb/api/chat/user",
        dataType: "json",
        data: data,
        success: function (data) {
            alert('La Newsletter a bien été envoyé.');
        },
        error: function () {
            console.log("error");
        }
    });
});
