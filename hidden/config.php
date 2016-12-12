<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'jcrovo2019');
	define('DB_PASSWORD', 'Soccer20152019');
	define('DB_DATABASE', 'noteside');
	mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	mysql_select_db(DB_DATABASE);
?>