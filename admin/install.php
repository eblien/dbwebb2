<?php
//
// Install info page
//
// Eilif L
//

// Interception Filter, access, authorithy 
if(!isset($indexIsVisited)) die('No direct access to pagecontroller is allowed.');

$database = DB_DATABASE;
$prefix	= DB_PREFIX;

$html = <<<EOD
<h2>Installation</h2>
<h3>Create tables</h3>
<p>Proceed to delete Cloamax and create new tables.</p>
<p>Database: '{$database}'</p>
<p>Table prefix: '{$prefix}'</p>
<p>
<a href='?p=installp'>OK, empty the database and give me new tables!</a>
</p>
EOD;

// show page

$page = new CHTMLPage();
$page->printHTMLHeader();
$page->printPageHeader();
$page->printPageBody($html);
$page->printPageFooter();

?>

