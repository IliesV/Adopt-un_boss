$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "http://adop-un-boss.bwb/api/chat/9",
        success: function (data) {
            create_user_card(data);
        },
        error: function () {
            console.log("error");
        }
    });
});

function create_user_card(data) {
    for (var i = 0; i < data.length; i++) {
        console.log(data[i]);
//        $("#restaurants").append(
//                $("<div>").addClass('col-sm-4').append(
//                $("<div>").addClass('card mb-4 box-shadow').append(
//                $("<div>").addClass('restaurant').append(
//                $("<p>").addClass('card-text nomRestaurant').text(nom[i])).append(
//                $("<div>").attr('id', 'detailResto' + id[i])).append(
//                $("<div>").addClass('boutons').append(
//                $("<button>").attr('type', 'button')
//                .attr('id', 'addCard' + id[i])
//                .addClass('btn btn-sm btn-outline-secondary')
//                .click(function () {
//                    alert('bijour');
//                })
//                .text("Add Carte")).append(
//                $("<button>").attr('type', 'button')
//                .addClass('btn btn-sm btn-outline-secondary')
//                .click(function () {
//                    detailsResto(id[i]);
//                })
//                .text("Details")
//                )))));
    }
}
