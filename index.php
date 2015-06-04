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

	    <!-- <link rel="stylesheet" href="bootstrap-3.3.4-dist/css/bootstrap.min.css"> -->
	    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	    <!-- <script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script> -->
	  	<script type="text/javascript" src="./js/functions.js"></script>
		<meta name="description" content="Search MLB.TV's free game of the game"/>
		<meta name="author" content="Bryan Qiu"/>
  	</head>
  	<body>
  		
  		<div class="content">
  			<div class="container">
			    <!--<div class="row">
  					<img src="./img/banner.png" class="img-responsive center-block" />
  				</div>-->
  				<br>
  				<br>
  				<div class="row row-centered">
  					<div class="col-lg-3 col-centered">
					    <div class="ui-widget">
							<label for="tags">Teams: </label>
							<input id="tags" name="tags" style="width:100%; text-align:center">
					    </div>

  						<div id = "list"></div>
					</div>
			    </div>
			</div>

  		</div>


  		<?php
  			getFreeGames();
  		?>


  		<!--<div class="ui-widget">
  			<label for="tags">Teams: </label>
		  	<input id="tags" name="tags">
		</div>
		<div id="list"></div>-->

		<div class="footer">
			<div class="container-fluid">
			</div>
		</div>

		<!-- http://stackoverflow.com/questions/10213095/how-to-animate-divs-when-they-move-to-fill-empty-space-left-by-other-divs-that-f -->
  	</body>
</html>