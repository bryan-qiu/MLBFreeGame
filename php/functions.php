<?php
	// sets default time for game times
	date_default_timezone_set('America/Toronto');

	// database table setup: http://i.imgur.com/Mcb3aWm.png

	// finds all the free games for a given team
	function getFreeGames() {
		// connect to database first
		$config = parse_ini_file("./liveconfig.ini");
		//$config = parse_ini_file("./localconfig.ini");
		$host = $config['host'];
		$username = $config['username'];
		$password = $config['password'];
		$dbname = $config['dbname'];

		@ $db = new mysqli($host, $username, $password, $dbname);

		if(mysqli_connect_errno())
		{
		    die("Connection could not be established");
		}

		$query = 'SELECT * FROM games WHERE date >= \'' . date('Ymd') . '\' ORDER BY date;'; 
		$result = $db->query($query);

		// close database connection
		$db->close();
		return $result;
	}

	// returns team colours
	function getBackMap() {
		$backmap = array(
		    "Orioles" => "#FC4E04",
		    "Red Sox" => "#C6122C",
		    "White Sox" => "#A4AAAC",
		    "Indians" => "#002144",
		    "Tigers" => "#949E9C",
		    "Astros" => "#E24912",
		    "Royals" => "#67ABE5",
		    "Angels" => "#B80E2C",
		    "Twins" => "#002144",
		    "Yankees" => "#A5ACB0",
		    "Athletics" => "#B0B6BB",
		    "Mariners" => "#002A5C",
		    "Rays" => "#001D42",
		    "Rangers" => "#002B73",
		    "Blue Jays" => "#003DA5",
		    "D-backs" => "#A8152B",
		    "Braves" => "#F4F2DC",
		    "Cubs" => "#929F9F",
		    "Reds" => "#EC164C",
		    "Rockies" => "#030204",
		    "Dodgers" => "#032D6B",
		    "Marlins" => "#F9433C",
		    "Brewers" => "#00225D",
		    "Mets" => "#002C74",
		    "Phillies" => "#D31145",
		    "Pirates" => "#231F20",
		    "Padres" => "#041E44",
		    "Giants" => "#FC4614",
		    "Cardinals" => "#002A5C",
		    "Nationals" => "#052048",
		);
		return $backmap;
	}

	// returns city names
	function getCity() {
		$citymap = array(
		    "Orioles" => "Baltimore",
		    "Red Sox" => "Boston",
		    "White Sox" => "Chicago",
		    "Indians" => "Cleveland",
		    "Tigers" => "Detroit",
		    "Astros" => "Houston",
		    "Royals" => "Kansas City",
		    "Angels" => "Los Angeles",
		    "Twins" => "Minnesota",
		    "Yankees" => "New York",
		    "Athletics" => "Oakland",
		    "Mariners" => "Seattle",
		    "Rays" => "Tampa Bay",
		    "Rangers" => "Texas",
		    "Blue Jays" => "Toronto",
		    "D-backs" => "Arizona",
		    "Braves" => "Atlanta",
		    "Cubs" => "Chicago",
		    "Reds" => "Cincinnati",
		    "Rockies" => "Colorado",
		    "Dodgers" => "Los Angeles",
		    "Marlins" => "Miami",
		    "Brewers" => "Milwaukee",
		    "Mets" => "New York",
		    "Phillies" => "Philladelphia",
		    "Pirates" => "Pittsburgh",
		    "Padres" => "San Diego",
		    "Giants" => "San Francisco",
		    "Cardinals" => "St. Louis",
		    "Nationals" => "Washington",
		);
		return $citymap;
	}
?>