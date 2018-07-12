function register(role) {
    if (role === "candidat") {
        register_candidat();
    } else {
        register_entreprise();
    }
}

function register_candidat() {
    $(".container").empty();
}

function register_entreprise() {
$(".register").empty();
        $(".register")
        .append($("<div>").addClass('img_entreprise').addClass('col-md-3')
                .append($("<img>").attr("src", "assets/imgs/login_entreprise.png")))
        .append($("<div>").addClass('form_entreprise').addClass('col-md-7')
                .append($("<form>").attr("action", "http://adopt-un-boss/register/verif").attr("method", "POST")
                        .append($("<input>").attr("name", "perm").attr("type", "text"))
                        .append($("<input>").attr("name", "email").attr("type", "email").attr("placeholder", "Email"))
                        .append($("<input>").attr("name", "password").attr("type", "text").attr("placeholder", "Password"))
                        .append($("<input>").attr("name", "nom").attr("type", "text").attr("placeholder", "Nom"))
                        .append($("<input>").attr("name", "prenom").attr("type", "text").attr("placeholder", "Prenom"))
                        .append($("<input>").attr("name", "age").attr("type", "text").attr("placeholder", "Age"))
                        .append($("<input>").attr("name", "adresse").attr("type", "text").attr("placeholder", "Ex : Rue de la Purée"))
                        .append($("<input>").attr("name", "code_postal").attr("type", "text").attr("placeholder", "Code Postal"))
                        .append($("<input>").attr("name", "ville").attr("type", "text").attr("placeholder", "Ville"))
                        .append($("<input>").attr("name", "tel").attr("type", "text").attr("placeholder", "N° Téléphone"))
                        .append($("<textarea>").attr("name", "description").attr("type", "text").attr("placeholder", "Description"))
                        .append($("<input>").attr("name", "photo").attr("type", "text").attr("placeholder", "photo"))
                        .append($("<input>").attr("name", "newsletter").attr("type", "text").attr("placeholder", "Ville"))));
                        .append($("<input>").attr("name", "newsletter").attr("type", "submit").attr("placeholder", "Submi"))));
        }