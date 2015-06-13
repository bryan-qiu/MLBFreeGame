function hideTeams(query) {
    $('.card').each(function() {
        var id = $(this).attr('id').toLowerCase();
        query = query.toLowerCase();
        // make the card visible
        if (id.indexOf(query) >= 0) {
            if ($(this).hasClass('hidden')) {
                $(this).slideToggle('slow');
                $(this).removeClass('hidden');
            }

        }
        // hide the card
        else {
            if (!$(this).hasClass('hidden')) {
                $(this).slideToggle('slow');
                $(this).addClass('hidden');
            }
        }
    });
}

function checkGames() {
    if ($(".card").length == 0) 
        $('#nogames').show();
    else
        $('#nogames').hide();
}

function formatDay(time) {
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "June",
        "July", "Aug", "Sept", "Oct", "Nov", "Dec"
    ];

    date = new Date(time * 1000);

    month = date.getMonth();
    day = date.getDate();

    return months[month] + " " + day;
}

function formatTime(time) {
    date = new Date(time * 1000);

    hours = date.getHours();
    minutes = date.getMinutes();

    if (hours == 0)
        hours = 12;
    else if (hours == 12)
        hours = 24;

    min = "";

    if (minutes < 10)
        min = "0" + minutes;
    else
        min = minutes;

    if (hours > 12)
        return hours - 12 + ":" + min + " PM";
    else
        return hours + ":" + min + " AM";
}

function toTimezone() {
    offset = new Date().getTimezoneOffset();
    $('.day').each(function() {
        $(this).html(formatDay($(this).html()));
    });

    $('.time').each(function() {
        $(this).html(formatTime($(this).html()));
    });
}

$(document).ready(function() {
    checkGames();

    $('#tags').on('keyup',function() {
        hideTeams($(this).val());
    });

    toTimezone();
});