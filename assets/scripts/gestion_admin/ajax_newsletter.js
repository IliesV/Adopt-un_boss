$("#button_newsletter").click(function (e) {
    var data = {
            "titre": $("#titre_newsletter").val(),
            "texte": $("#texte_newsletter").val(),
            "user": $("#user_newsletter").val()
        };
    $.ajax({
        type: "POST",
        url: "http://adop-un-boss.bwb/api/newsletter",
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