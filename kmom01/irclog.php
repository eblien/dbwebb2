<?php
//
// My obligatory Me-page!
//
// Eilif L
//

// Interception Filter, access, authorithy 
if(!isset($indexIsVisited)) die('No direct access to pagecontroller is allowed.');

$numrows = 100; // number of rows

// Unix command
$command = "tail -".$numrows." kmom01/log.txt | cat -n";
exec($command, $output);
// Fix htmlentities and a break at each end-of-row
$str = "";
foreach($output AS $row) {
    $str .= htmlentities($row, ENT_NOQUOTES, 'UTF-8') . "<br>";
}

$html = <<<EOD
<div>
<h2>The IRC log demo</h2>
<h3>
Latest {$numrows} lines of irc log file
</h3>
<div class='code'>
Command: {$command}<br>{$str}
</div>
</div>
EOD;

// Show page

$page = new CHTMLPage(WS_STYLESHEET, FALSE);
$page->printHTMLHeader(WS_TITLE, WS_TITLE2);
$page->printPageHeader();
$page->printPageBody($html);
$page->printPageFooter();

?>

