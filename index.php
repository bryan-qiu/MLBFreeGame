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
		<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	  	<!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->	
	  	<script type="text/javascript" src="./js/functions.js"></script>
		<meta name="description" content="Search MLB.TV's free game of the game"/>
		<meta name="author" content="Bryan Qiu"/>
  	</head>
  	<body>
  		
		<!-- <img src="./img/banner.png" /> -->

		<br>
		<br>

	    <div>
			<label for="tags">Teams: </label>
			<input id="tags" name="tags">
	    </div>
	    
	    <br>
	    <br>

  		<?php
  			$result = getFreeGames();

			while($row = $result->fetch_array()){
				echo '<div class="card" id = "' . $row['away_team'] . '-' . $row['home_team'] .'">';

				
				
				$awayurl = '&quot;./img/' . $row['away_team'] . '.jpg&quot;';
				echo '<div id="away-team" style="background:url(' . $awayurl . ') no-repeat center center;"></div>';
			    
			    echo '<div class = "text">';
			    echo '<p>' . $row['away_team'] . ' @ ' . $row['home_team'] . '<br>';
			    echo $row['date'] . ' ' . $row['time'] . '<br>';
			    echo $row['venue'] . '<br>';
			    //http://m.mlb.com/tv/e14-414458-2015-06-04/?&media_type=video&clickOrigin=Media%20Grid&team=mlb
			    echo '<a href="http://m.mlb.com/tv/e' . $row['event_id'] . '/?&media_type=video&clickOrigin=Media%20Grid&team=mlb" target="_blank">Watch Here</a></p>';
			    echo '</div>';

				$homeurl = '&quot;./img/' . $row['home_team'] . '.jpg&quot;';
				echo '<div id="home-team" style="background:url(' . $homeurl . ') no-repeat center center;"></div>';

				echo '<div class="awaypic" style="background-color:blue"></div>';
				echo '<div class="homepic" style="background-color:green"></div>';
				//echo '<div class="vs"><p>vs</p></div>';

			    echo '</div>';
			}
  		?>
  	</body>
</html>