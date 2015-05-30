<?php

	// Gets free game from MLB
	function getFreeGame() {
		//http://www.mlb.com/mediacenter/#date=5/29/2015
		$json = file_get_contents('http://www.mlb.com/gdcross/components/game/mlb/year_2015/month_05/day_30/grid.json');
		$obj = json_decode($json,true);

		// Loop through today's game, checking for which game is free based on the json structure

		foreach ($obj['data']['games']['game'] as $game) {
			foreach ($game['game_media']['homebase']['media'] as $media) {
				if (!empty($media['free']) && $media['free'] == 'ALL') {
					print_r($game['home_team_name'] . " - " . $game['away_team_name']);
					break;
				}
			}
		}

		return 1;

	}

?>