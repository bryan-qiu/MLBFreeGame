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
					return $game['home_team_name'] . " - " . $game['away_team_name'];
				}
			}
		}
	}

	function toTwoDigitString($num) {
		if ($num < 10) 
			return '0' . (string)$num;
		else
			return (string)$num;
	}

	function findFreeGame($team) {

		//http://www.mlb.com/gdcross/components/game/mlb/year_2015/month_05/day_30/grid.json
		for ($month = 6; $month <= 6; $month++) {
			// 6: 30, 7: 31, 8: 31, 9: 30
			$count = 31;
			if ($month == 6 or $month == 9)
				$count = 30;
			for ($day = 1; $day <= $count; $day++) {
				$url = 'http://www.mlb.com/gdcross/components/game/mlb/year_2015/month_' . toTwoDigitString($month) . '/day_' . toTwoDigitString($day) . '/grid.json';
				$todayGame = getFreeGame($url);
				if (strpos($todayGame,$team) != false) {
					print_r ($month . '/' . $day . '/15: ' . $todayGame . '!!!!!!');
				}
				else {
					print_r ($month . '/' . $day . '/15: ' . $todayGame);
				}
				echo '<br/>';
			}
		}
	}

	if (isset($_POST['callFunc'])) {
        echo findFreeGame($_POST['callFunc']);
    }
?>