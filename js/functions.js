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

  $('#tags').keyup(function() {
     hideTeams($(this).val());
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
      $(this).find('.awaypicteam').animate({ width: "45%" });
      $(this).find('.homepic').animate({ width: "47%" });
      $(this).find('.homepicteam').animate({ width: "45%" });
      //$(this).find('.homepic').animate({ width: homewidth});
      //$(this).find('.vs').toggleClass('hidden');
  });

  //make sure that card width is always even


});