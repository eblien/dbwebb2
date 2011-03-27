<?php
//
// Website specific configurations
// config except database connection
//
// Eilif L
//

// Paths
define('WS_SITELINK', './'); // Sitelink for redirect
define('WS_HTTPLINK', 'http://www.student.bth.se/~eili05/dbwebb2/'); // Sitelink for external use

// Settings for website, used as default values in CHTMPLPage.php
define('WS_TITLE', 'dbwebb2');	// The H1 label of this site.
define('WS_TITLE2', '- work in progress ...');
define('WS_STYLESHEET', 'stylesheet.css');	// Default stylesheet of the site.
define('WS_FOOTER', '<a href="/~eili05/dbwebb2/" class="menu">8-E 2011</a>');
define('WS_IMGDIR', '/~eili05/dbwebb2/img/');

// Menu-array
$wsMenu = Array (
	'Home' => '?p=home',
	'Forum' => '?p=forum',
	'Reports' => '?p=report',
	'View Source' => '?p=source',
	'Nuke db' => '?p=install'
);

define('WS_MENU', serialize($wsMenu));		// The menu
?>
