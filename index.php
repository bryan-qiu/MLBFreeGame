<!DOCTYPE html>
<?php 
	include("./php/functions.php");
	//include("./php/update.php"); uncomment this for local testing
?>
<!-- work in progress -->
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="description" content="Website for checking the upcoming MLB.TV Free Game of the Days">	

	    <title>MLB Free Game</title>

	    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	  	<script type="text/javascript" src="./js/functions.js"></script>
	  	<script type="text/javascript" src="./js/analytics.js"></script>

	  	
		<!--<meta name="viewport" content="width=640px, initial-scale=.5, maximum-scale=.5" />-->

    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Search MLB.TV's free game of the game"/>
		<meta name="author" content="Bryan Qiu"/>
  	</head>
  	<body>
	    <div class="navbar">
	    	<p>MLB Free Game of the Day</p>
    		<input id="tags" placeholder="Search Teams..." spellcheck="false"/>
	    </div>
	    
	   	<div style="height:120px;"></div>

	    <div id="nogames">
	    	<p>There are no free games coming up at the moment.</p>
	    </div>

  		<?php
		  	$result = getFreeGames();
		  	$backmap = getBackMap();
		  	$citymap = getCity();
			while($row = $result->fetch_array()){
	  			$awayurl = '&quot;./img/' . strtolower($row['away_team']) . '.jpg&quot;';
	  			$homeurl = '&quot;./img/' . strtolower($row['home_team']) . '.jpg&quot;';
	  			$awayurl2 = '&quot;./img/' . strtolower($row['away_team']) . '2.png&quot;';
				$homeurl2 = '&quot;./img/' . strtolower($row['home_team']) . '2.png&quot;';
		?>
		<div class="card" id=<?php echo '"' . $citymap[$row['away_team']] . ' ' . $row['away_team'] . '-' . $citymap[$row['home_team']] . ' ' . $row['home_team'] . '"'; ?>>
			<div class="date">
				<p class="day"><?php echo strtotime($row['date'] . ' ' . $row['time']); ?></p>
			</div>
			<div class="whitebackground">
				
				<div id="away-team" style=<?php echo '"background:url(' . $awayurl . ') no-repeat center center; background-size:120px;"'; ?>></div>
			 
			    <div class = "text">
			    	<p style="text-align:left;">
			    		<span><?php echo $citymap[$row['away_team']]; ?></span><br>
			    		<span style="font-weight:bold"><?php echo $row['away_team']; ?></span>
			    	</p>

			    	<p>
			    		<span class="time" style="font-weight:bold;"><?php echo strtotime($row['date'] . ' ' . $row['time']); ?></span><br>
			    		<?php echo $row['venue'];?><br>
			    		<!-- http://m.mlb.com/tv/e14-414458-2015-06-04/?&media_type=video&clickOrigin=Media%20Grid&team=mlb -->
			    		<a href=<?php echo '"http://m.mlb.com/tv/e' . $row['event_id'] . '/?&media_type=video&clickOrigin=Media%20Grid&team=mlb"'; ?> target="_blank">Watch Here</a>
			    	</p>
 
			    	<p style="text-align:right">
			    		<span><?php echo $citymap[$row['home_team']]; ?></span><br>
			    		<span style="font-weight:bold"><?php echo $row['home_team']; ?></span>
			    	</p>
			    </div>
	
				<div id="home-team" style=<?php echo '"background:url(' . $homeurl . ') no-repeat center center; background-size:120px;"'; ?>></div>
				
				<div class="awaypic" style=<?php echo '"border-top: 120px solid' . $backmap[$row['away_team']] . ';"'; ?>></div>
				<div class="awaypicteam"style=<?php echo '"background:url(' . $awayurl2 . ') no-repeat center center; background-size: 250px;"'; ?>></div>
				<div class="homepic" style=<?php echo '"border-bottom: 120px solid' . $backmap[$row['home_team']] . ';"'; ?>></div>
				<div class="homepicteam"style=<?php echo '"background:url(' . $homeurl2 . ') no-repeat center center; background-size: 250px;"'; ?>></div>
			</div>
		</div>
		<?php
			}
  		?>
  	</body>
</html>