<?php
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

	// connect to database first
	$config = parse_ini_file("./liveconfig.ini");
	$host = $config['host'];
	$username = $config['username'];
	$password = $config['password'];
	$dbname = $config['dbname'];

	@ $db = new mysqli($host, $username, $password, $dbname);

	if(mysqli_connect_errno())
	{
	    die("Connection could not be established");
	}

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
		$event_id = $todayGame['calendar_event_id'];

		$query = 'INSERT INTO games (date,home_team,away_team,time,venue,event_id) VALUES (\'' . date('Ymd',$date) . '\',\'' . $home_team . '\',\'' . $away_team . '\',\'' . $time . '\',\'' . $venue . '\',\'' . $event_id . '\');';
		$db->query($query);
	}

	// close database connection
	$db->close();
?>