
function permission(perm) {
    $("#perm").attr("value", perm);
    if (perm === 'entreprise') {
        $(".img_entreprise").css("display", "inline-block");
        $(".btn_entreprise").css("display", "none");
        $(".form_entreprise").css("display", "inline-block");
        $(".form_candidat").css("display", "none");
        $(".img_candidat").css("display", "none");
        $(".link_candidat").css("display", "inline-block");
    } else if (perm === 'candidat') {

        $(".img_candidat").css("display", "inline-block");
        $(".btn_candidat").css("display", "none");
        $(".form_entreprise").css("display", "none");
        $(".form_candidat").css("display", "inline-block");
        $(".img_entreprise").css("display", "none");
        $(".link_entreprise").css("display", "inline-block");
    }
}

function register_candidat() {
    $(".img_entreprise").css("display", "none");
    $(".form_candidat").css("display", "inline-block");
    $(".form").attr("value", "candidat");
}

function register_entreprise() {
    $(".img_candidat").css("display", "none");
    $(".form_entreprise").css("display", "inline-block");
    $(".form").attr("value", "entreprise");
}

function register_user(role) {
    if (role === "candidat") {
        var data = {
            "perm": $("#perm").val(),
            "email": $("#email_candidat").val(),
            "password": $("#password_candidat").val(),
            "nom": $("#nom_candidat").val(),
            "prenom": $("#prenom_candidat").val(),
            "age": $("#age_candidat").val(),
            "adresse": $("#adresse_candidat").val(),
            "code_postal": $("#code_postal_candidat").val(),
            "ville": $("#ville_candidat").val(),
            "tel": $("#tel_candidat").val(),
            "description": $("#description_candidat").val(),
            "photo": $("#photo_candidat").val(),
            "newsletter": $("#newsletter_candidat").val()
        };
        check_data(data, role);
    } else {
        var data = {
            "perm": $("#perm").val(),
            "email": $("#email_entreprise").val(),
            "password": $("#password_entreprise").val(),
            "nom": $("#nom_entreprise").val(),
            "salarie": $("#salarie_entreprise").val(),
            "site_web": $("#site_web_entreprise").val(),
            "adresse": $("#adresse_entreprise").val(),
            "code_postal": $("#code_postal_entreprise").val(),
            "ville": $("#ville_entreprise").val(),
            "tel": $("#tel_entreprise").val(),
            "description": $("#description_entreprise").val(),
            "photo": $("#photo_entreprise").val(),
            "newsletter": $("#newsletter_entreprise").val()
        };
        console.log(check_data(data, role));
    }
}

function check_data(data, role) {
    var error = false;
    var key = Object.keys(data);
    console.log(data);
    console.log(key);
    for (var i = 0; i < key.length; i++) {
        if (data[key[i]] === "") {
            $("#" + key[i] + "_" + role).addClass("alert-danger");
            error = true;
        }
    }
    if (isNaN(parseInt(data["tel"]))) {
        $('#tel_' + role).addClass("alert-danger");
            error = true;
    }
    if (isNaN(parseInt(data["code_postal"]))) {
        $('#code_postal_' + role).addClass("alert-danger");
            error = true;
    }
    if (role === "candidat") {
        if (isNaN(parseInt(data["age"]))) {
            $('#age_' + role).addClass("alert-danger");
            error = true;
        }
    } else if (role === "entreprise") {
        if (isNaN(parseInt(data["salarie"]))) {
            $('#salarie_' + role).addClass("alert-danger");
            error = true;
        }
    }
    if(!error){
        return (data["adresse"] + " " + data["code_postal"] + " " + data["ville"]);
    }else{
        return error;
    }
}

function remove_class(name) {
    $("#" + name).removeClass("alert-danger");
}
