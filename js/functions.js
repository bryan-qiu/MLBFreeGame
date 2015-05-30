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
        $.ajax({
            url: "./php/functions.php",
            type: 'post',
            data: { "callFunc": ui.item.value},
            success: function(response) { 
              $("#list").html(response); 
            }
        });
      }
  });
});