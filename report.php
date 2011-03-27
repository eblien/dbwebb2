<?php
//
// Redovisning
//
// Eilif L
//

// Interception Filter, access, authorithy 
if(!isset($indexIsVisited)) die('No direct access to pagecontroller is allowed.');

$link = WS_HTTPLINK;

$html = <<<EOD
<h2>Lesson Reports</h2>
<hr>
<ul>
<li><a href="#kmom01" class='clean'>Lesson 1: Ordning och reda (Git, Template and IRC log demo)</a></li>
</ul>
<hr>
<br>	

<a id="kmom01"></a>
<h3>Lesson 1: Git, Template and IRC log demo</h3>
<p>
I've decided to use my template from last year, clean it up and make it more HTML5. 
</p>
<p>
What I've done this lesson: Created a 
<a href="https://github.com/eblien/dbwebb2">repository at GitHub</a>, cloned mos 
<a href="../greco/index.php">Greco</a> and <a href="../persia/index.php">Persia</a>, 
fixed the database connection in Persia, made config unreadable to others, 
copied my template from last year, tried validate HTML5, cleaned up, added header, 
doctype, nav-tags in top menu and footer, made the <a href="?p=irclog">IRC log demo page</a>, 
made a new <a href="?p=home">me-page</a> (in English this time, because my Swedish is somewhat slow). 
Validate HTML5 again.
</p>
<ul>
<li><a href="?p=home">Me-page</a></li>
<li><a href="../greco/index.php">My copy of Greco</a></li>
<li><a href="../persia/index.php">My copy of Persia</a></li>
<li><a href="https://github.com/eblien/dbwebb2">My files at GitHub</a></li>
<li><a href="?p=irclog">IRC log demo page</a></li>
</ul>
<p>
Problems: Encoding error: server says iso-8859-1 and my code said utf-8. 
I'll have to fix that later.
</p>
<p>
My thoughts: Git feels like magic. The nice thing is that each developer is given a local copy of the 
entire project history. And it is extremely fast. I started this lecture by watching 
<a href="http://www.youtube.com/watch?v=4XpnKHJAok8">techtalk</a> 
by Linus Torvalds and what we should know is that if we stick to CVS 
it is probably because we are ugly and stupid. 
He hates it "with a passion", even tarballs and patches are better. Unfortunately, 
he does not explain very much what Git is or how it works. 
My experience with revision control is limited; I've used SVN and I have looked at Git before.
</p>
<p>
HTML5 definitely feels like the way to go as it is the new standard and I think 
it will be good. Persia uses pagecontroller while Greco does not (not in the same way at least), 
so I somewhat prefer Persia even though it seems like there will be more files 
and more difficult to follow.
</p>
<p>
Useful hints: How to delete a repository: rm -rf .git
</p>
<p>
Todo for next time: I have to read through and make myself 
a todo-list for next lesson, makes it so much easier.
Make web server report utf-8. Clean up some more. 
Make code more compliant to HTML5, read about and add article, section and dialog tags.
</p>
<br>
<hr>
EOD;


// Show page

$page = new CHTMLPage();
$page->printHTMLHeader();
$page->printPageHeader();
$page->printPageBody($html);
$page->printPageFooter();

?>

