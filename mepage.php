<?php
//
// My obligatory Me-page!
//
// Eilif L
//

// Interception Filter, access, authorithy 
if(!isset($indexIsVisited)) die('No direct access to pagecontroller is allowed.');

$img = WS_IMGDIR;

$html = <<<EOD
<h2>About</h2>
<p><img class='right' src='{$img}eilif.jpg' alt='Eilif' width='160'/>
<p>
This is my <b>Me-Page</b> in English this time. 
I decided to do the whole thing in English because it is easier than trying 
to translate from Norwegian to Swedish or whatever.
</p>
<p>
My name is Eilif Lien, 43 years old and from Norway. 
I did <a href='../dbwebb'>part 1</a> of this course last year, final version of 
the blogg can be found here: <a href='../dbwebb/blogv2'>foogler's blog</a>.
By the way, the content of foogler's blog is Beatles lyrics google translated to Swedish.
Somewhat scary to look at.
</p>
<p>
For reports: <a href='?p=report'>Redovisning!</a> (or use the top menu)
</p>
<p>
<a href='?p=forum'>Forum here!</a>
</p>
EOD;

// Show page

$page = new CHTMLPage();
$page->printHTMLHeader();
$page->printPageHeader();
$page->printPageBody($html);
$page->printPageFooter();

?>

