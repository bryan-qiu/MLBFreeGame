function hideTeams(query) {
  $('.card').each(function() {
    var id = $(this).attr('id').toLowerCase();
    query = query.toLowerCase();
    // make the card visible
    if (id.indexOf(query) >= 0) {
        if ($(this).hasClass('hidden')) {
          $(this).slideToggle('slow');
          //$(this).animate({width: 'toggle'});
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
  if ($(".card" ).length == 0)
    $('#nogames').html("There are no free games coming up at the moment.");
  else
    $('#nogames').html("");
}

function formatDay(time) {
  var months = [ "Jan", "Feb", "Mar", "Apr", "May", "June", 
               "July", "Aug", "Sept", "Oct", "Nov", "Dec" ];

  date = new Date(time*1000);

  month = date.getMonth();
  day = date.getDate();

  return months[month] + " " + day;
}

function formatTime(time) {
    date = new Date(time*1000);

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
      return hours-12 + ":" + min + " PM";
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
  // do this from database later?
  /*var teams = [
      "Orioles",
      "Red Sox",
      "White Sox",
      "Indians",
      "Tigers",
      "Astros",
      "Royals",
      "Angels",
      "Twins",
      "Yankees",
      "Athletics",
      "Mariners",
      "Rays",
      "Rangers",
      "Blue Jays",
      "Diamondbacks",
      "Braves",
      "Cubs",
      "Reds",
      "Rockies",
      "Dodgers",
      "Marlins",
      "Brewers",
      "Mats",
      "Phillies",
      "Pirates",
      "Padres",
      "Giants",
      "Cardinals",
      "Nationals"
    ];
  $( "#tags" ).autocomplete({
      source: teams,
      select: function(event,ui) {
        hideTeam(ui.item.value);
      }
  });*/


  checkGames();

  $('#tags').keyup(function() {
     hideTeams($(this).val());
     checkGames();
  });


  // to avoid width percent rounding mistakes

  
  /*$(window).on('load resize', function() {
    homewidth = $('.card').width()-$('.homepic').width();
    $('.awaypic').each(function() {
      $('.awaypic').css('width',homewidth);
    });
  });*/

  //https://css-tricks.com/examples/jQueryStop/
  $('.card').hover(function(){
      $(this).find('.awaypic').filter(':not(:animated)').animate({ width: "0px" });
      $(this).find('.awaypicteam').filter(':not(:animated)').animate({ width: "0px" });
      $(this).find('.homepic').filter(':not(:animated)').animate({ width: "0px" });
      $(this).find('.homepicteam').filter(':not(:animated)').animate({ width: "0px" });
      //$(this).find('.vs').toggleClass('hidden');
  }, function() {
      $(this).find('.awaypic').animate({ width: "47%" });
      $(this).find('.awaypicteam').animate({ width: "47%" });
      $(this).find('.homepic').animate({ width: "47%" });
      $(this).find('.homepicteam').animate({ width: "47%" });
      //$(this).find('.homepic').animate({ width: homewidth});
      //$(this).find('.vs').toggleClass('hidden');
  });  

  toTimezone();
});