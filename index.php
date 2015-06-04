<!DOCTYPE html>
<?php 
	include("./php/functions.php");
	//findFreeGame('Padres');
	//updateDatabase();
?>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <title>MLB Free Game</title>

	    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  	<script type="text/javascript" src="./js/functions.js"></script>
		<meta name="description" content="Search MLB.TV's free game of the game"/>
		<meta name="author" content="Bryan Qiu"/>
  	</head>
  	<body>
  		
		<!-- <img src="./img/banner.png" /> -->

		<br>
		<br>

	    <div class="ui-widget">
			<label for="tags">Teams: </label>
			<input id="tags" name="tags">
	    </div>
	    
		<!-- do html here -->
  		<?php
  			getFreeGames();
  		?>
		<!-- http://stackoverflow.com/questions/10213095/how-to-animate-divs-when-they-move-to-fill-empty-space-left-by-other-divs-that-f -->
  	</body>
</html>