<?php

	// database table setup: http://i.imgur.com/SCQcG6G.png

	// Gets free game from MLB
	function getFreeGame($url) {
		//http://www.mlb.com/mediacenter/#date=5/29/2015
		$json = file_get_contents($url);
		$obj = json_decode($json,true);

		// Loop through today's game, checking for which game is free based on the json structure

		// no data yet on mlb's website
		if (empty($obj['data']['games']['game'])) {
			return 'No Free Game Scheduled Yet';
		}

		foreach ($obj['data']['games']['game'] as $game) {
			// no data yet on mlb's website
			if (empty($game['game_media']) or empty($game['game_media']['homebase'])) {
				return 'No Free Game Scheduled Yet';
			}

			foreach ($game['game_media']['homebase']['media'] as $media) {
				if (!empty($media['free']) && $media['free'] == 'ALL') {
					//return $game['home_team_name'] . " - " . $game['away_team_name'];
					return $game;
				}
			}
		}
	}

	// updates the database with free games listed on mlb's website
	function updateDatabase() {
		// connect to database (WAMP) first
		$host = "localhost";
		$username = "admin";
		$password = "password";
		$dbname = "mlbfree";

		@ $db = new mysqli($host, $username, $password, $dbname);

		if(mysqli_connect_errno())
		{
		    die("Connection could not be established");
		}

		//http://www.mlb.com/gdcross/components/game/mlb/year_2015/month_05/day_30/grid.json
		for ($date = strtotime(date('Y-m-d')); $date < strtotime("2015-09-01"); $date = strtotime("+1 day", $date)) {
 			//get date values
 			$year = date('Y',$date);
 			$month = date('m',$date);
 			$day = date('d',$date);

 			$url = 'http://www.mlb.com/gdcross/components/game/mlb/year_' . $year . '/month_' . $month . '/day_' . $day . '/grid.json';
			$todayGame = getFreeGame($url);

			// no more games at the moment
			if ($todayGame == 'No Free Game Scheduled Yet')
				break;

			$home_team = $todayGame['home_team_name'];
			$away_team = $todayGame['away_team_name'];
			$time = $todayGame['event_time'];
			$venue = $todayGame['venue'];

			// Figure out a way to insert or update if it already exists
			//$query = 'INSERT OR REPLACE INTO games (game, date) VALUES (COALESCE((SELECT game FROM games WHERE date = \'' . date('Ymd',$date) . '\'), \'' . $todayGame . '\'),\'' . date('Ymd',$date) . '\');';
			$query = 'INSERT INTO games (date,home_team,away_team,time,venue) VALUES (\'' . date('Ymd',$date) . '\',\'' . $home_team . '\',\'' . $away_team . '\',\'' . $time . '\',\'' . $venue . '\');';
			$db->query($query);
 		}

		// close database connection
		$db->close();
	}

	// finds all the free games for a given team
	function getFreeGames() {
		// connect to database (WAMP) first
		$host = "localhost";
		$username = "admin";
		$password = "password";
		$dbname = "mlbfree";

		@ $db = new mysqli($host, $username, $password, $dbname);

		if(mysqli_connect_errno())
		{
		    die("Connection could not be established");
		}

		// select the games that match the user team selection after today's date
		//$query = 'SELECT date,game FROM games WHERE game like \'%' . $team . '%\' and date >= \'' . date('Ymd') . '\' ORDER BY date;'; 

		$query = 'SELECT * FROM games WHERE date >= \'' . date('Ymd') . '\' ORDER BY date;'; 
		$result = $db->query($query);

		/*if ($result->num_rows == 0) {
			echo "There are no upcoming games";
		}
		else {
			echo "The upcoming free games are: <br>";
			while($row = $result->fetch_array()){
			    echo $row['date'] . ': ' . $row['game'];
			    echo "<br>";
			}
		}*/

		// close database connection
		$db->close();
		return $result;
	}

	// allow ajax calls from jquery
	if (isset($_POST['callFunc'])) {
        echo findFreeGame($_POST['callFunc']);
    }
?>