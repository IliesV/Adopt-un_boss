function register(role) {
    if (role === "candidat") {
        register_candidat();
    } else {
        register_entreprise();
    }
}

function register_candidat() {
    $(".img_entreprise").css("display","none");
    $(".form_candidat").css("display","inline-block");
    $(".form").attr("value", "candidat");
}

function register_entreprise() {
    $(".img_candidat").css("display","none");
    $(".form_entreprise").css("display","inline-block");
    $(".form").attr("value", "entreprise");
        }