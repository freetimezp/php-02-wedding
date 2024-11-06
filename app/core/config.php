<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	/** database config **/
	define('DBNAME', 'wedding_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'http://localhost/php-02-wedding/public');
} else {
	/** database config **/
	define('DBNAME', 'wedding_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');
}

define('APP_NAME', "Wedding");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);
