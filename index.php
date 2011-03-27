<?php
//
// Frontcontroller
//
// Eilif L
//

session_start();  // start or resume a session

$page = isset($_GET['p']) ? $_GET['p'] : 'home';

// After edit config.php: sudo chgrp_www-data
require_once('src/config.php');		// Database connection 
require_once('src/settings.php');	// Website specific configurations
require_once('src/CHTMLPage.php');	// Class CHTMLPage to create html 

$indexIsVisited = TRUE;

switch($page) {

	// Report / Redovisning
	case 'report': require_once('report.php'); break;
	case 'irclog': require_once('kmom01/irclog.php'); break;
	case 'source': require_once('ViewSource.php'); break;
		
	// Admin
	case 'install': require_once('admin/install.php'); break;
	case 'installp': require_once('admin/installProcess.php'); break;
		
	// Forum
	case 'forum': require_once('forum/forum.php'); break;
	case 'postp': require_once('forum/postProcess.php'); break;

	// home is default - use keyword 'home' or anything you like
	default: require_once('mepage.php'); break;
}

?>
