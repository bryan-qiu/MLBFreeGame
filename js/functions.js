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
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    checkGames();

    $('#tags').on('keyup',function() {
        hideTeams($(this).val());
    });

    if(isMobile.any()) {
        $('.navbar').css('background','#17171b');
        $('body').css('background','#17171b');
    }

    toTimezone();
});