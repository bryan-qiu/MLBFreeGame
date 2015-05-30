<!DOCTYPE html>
<?php 
	include("./php/functions.php");
	//findFreeGame('Padres');
?>
<html>
<head>
	<title>MLB Free Game</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.11.1.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<script type="text/javascript" src="./js/functions.js"></script>
	<meta name="description" content="Search MLB.TV's free game of the game"/>
	<meta name="author" content="Bryan Qiu"/>
	<meta charset="UTF-8">
</head>
<body>
	<div class="ui-widget">
	  <label for="tags">Tags: </label>
	  <input id="tags" name="tags">
	</div>
	<div id="list"></div>
</body>
</html>