	<?php

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'u875731674_noby');
	define('DB_USERNAME', 'u875731674_nobyz');
	define('DB_PASSWORD', '2Lsa66%r');
	define('ERROR_MESSAGE', ';w;');
try {
		$odb = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
	} catch( PDOException $Exception ) {
		error_log('ERROR: '.$Exception->getMessage().' - '.$_SERVER['REQUEST_URI'].' at '.date('l jS \of F, Y, h:i:s A')."\n", 3, 'error.log');
		die(ERROR_MESSAGE);
	}


?>
