$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "http://adopt-un-boss.bwb/api/chat/9",
        success: function (data) {
            create_user_card(data);
        },
        error: function () {
            console.log("error");
        }
    });
});

function create_user_card(data) {
    console.log(data);
    for (var i = 0; i < data.length; i++) {
    var id = data[i]['recepteur']['user_id'];
            var timestamp = timestamp_to_date(data[i]['timestamp']);
            console.log(timestamp);
            $(".inbox_chat").append(
            $("<div>").addClass('chat_list').attr('onclick', 'affichage_messages('+id+')').append(
            $("<div>").addClass('chat_people').attr('id', id).append(
            $("<div>").addClass('chat_img').append(
            $("<img>").attr('src', data[i]['recepteur']['logo']))).append(
            $("<div>").addClass('chat_ib').append(
            $("<h5>").addClass('user_name').text(data[i]['recepteur']['nom']))).append(
            $("<p>").addClass('user_message').text(data[i]['message'])).append(
            $("<h5>").addClass('user_date').text(timestamp))));
    }
}

function timestamp_to_date($timestamp) {
    var actual = Math.round(new Date().getTime() / 1000);
    var last_message = actual - $timestamp;
    if (last_message >= 604800) {
        return "il y a plus d'une semaine";
    } else if (604800 > last_message && last_message >= 86400) {
        var jour = last_message / 86400;
        jour = Math.floor(jour);
        if (jour === 1) {
            return  'il y a plus de ' + jour + ' jour';
        } else {
            return  'il y a plus de ' + jour + ' jours';
        }
    } else if (86400 > last_message && last_message >= 3600) {
        var heure = last_message / 3600;
        heure = Math.floor(heure);
        if (heure === 1) {
            return  'il y a ' + heure + ' heure';
        } else {
            return  'il y a plus de ' + heure + 'heures';
        }
    } else {
        var minute = last_message / 3600;
        minute = Math.floor(minute);
        if (minute === 0) {
            return  "il y a moins d'une minute";
        } else if (minute === 1) {
            return  'il y a ' + minute + ' minute';
        } else {
            return  'il y a plus de ' + minute + ' minutes';
        }
    }
}
function affichage_messages(id) {
    $.ajax({
        type: "GET",
        url: "http://adop-un-boss.bwb/api/chat/9/"+id,
        success: function (data) {
            create_user_card(data);
        },
        error: function () {
            console.log("error");
        }
    });
}