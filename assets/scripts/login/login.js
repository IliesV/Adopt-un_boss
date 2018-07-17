function permission(perm) {
    $("#perm").attr("value", perm);
    if (perm === 'entreprise') {
        $(".img_entreprise").css("display", "inline-block");
        $(".btn_entreprise").css("display", "none");
        $(".form").css("display", "inline-block");
        $(".img_candidat").css("display", "none");
        $(".link_candidat").css("display", "inline-block");
    } else if (perm === 'candidat') {

        $(".img_candidat").css("display", "inline-block");
        $(".btn_candidat").css("display", "none");
        $(".form").css("display", "inline-block");
        $(".img_entreprise").css("display", "none");
        $(".link_entreprise").css("display", "inline-block");
    }
}

function connect_user() {
    $("#password").css("background-color", "");
    $("#email").css("background-color", "");
    if ($("#email").val() === "" && $("#password").val() === "") {
        $("#email").addClass("alert-danger");
        $("#password").addClass("alert-danger");
    } else if ($("#email").val() === "") {
        $("#email").empty;
        $("#email").addClass("alert-danger");
    } else if ($("#password").val() === "") {
        $("#password").empty;
        $("#password").addClass("alert-danger");
    } else {
        var data = {
            "perm": $("#perm").val(),
            "email": $("#email").val(),
            "password": $("#password").val()
        };
        $.ajax({
            type: "POST",
            url: "http://adopt-un-boss.bwb/api/login",
            dataType: "json",
            data: data,
            success: function (data) {
                affichage_erreur(data);
            },
            error: function (data) {
                console.log("error");
            }
        });
    }
}

function affichage_erreur(data) {
    if (!data['statut']) {
        alert("Vous n'avez toujours pas été validé par l'administrateur de l'application.")
    } else if (data['connected']) {
        document.location = "http://adopt-un-boss.bwb/";
    } else if (!data['mail']) {
        $("#email").val('');
        $("#password").val('');
        $("#email").addClass("alert-danger");
    } else {
        $("#password").val('');
        $("#password").addClass("alert-danger");
    }
}