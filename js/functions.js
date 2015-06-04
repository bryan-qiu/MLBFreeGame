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
});