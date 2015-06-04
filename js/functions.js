function hideTeam(team) {
  $('.card').each(function() {
    var id = $(this).attr('id');
    // make the card visible
    if (id.indexOf(team) >= 0) {
      if ($(this).hasClass('hidden'))
        $(this).removeClass('hidden');
      $(this).addClass('visible');
    }
    // hide the card
    else {
      if ($(this).hasClass('visible'))
        $(this).removeClass('visible');
      $(this).addClass('hidden');
    }
  });
}

$(document).ready(function() {
  // do this from database later?
  var teams = [
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
        /*$.ajax({
            url: "./php/functions.php",
            type: 'post',
            data: { "callFunc": ui.item.value},
            success: function(response) { 
              $("#list").html(response); 
            }
        });*/
      }
  });
});