<?php
//
// Forum front-page
//
// Eilif L
//

// Interception Filter, access, authorithy 
if(!isset($indexIsVisited)) die('No direct access to pagecontroller is allowed.');

// 


// New post form

$html = <<<EOD
<h2>Forum</h2>
<div class='newpost'>
<fieldset>
<legend><h3>Say something!</h3></legend>
<form action="?p=postp" method="post">
<table>
<tr>
<td class="input">Title:</td>
<td><input type="text" name="title" size="55" maxlength="250"/></td>
</tr>
<tr>
<td class="input">Post:</td>
<td><textarea name="content" rows="6" cols="45"></textarea></td>
</tr>
<tr>
<td colspan="2" style="text-align: right"><button type="submit" name="submit">Go!</button></td>
</tr>
</table>
</form>
</fieldset>
</div>
EOD;

// Show page

$page = new CHTMLPage();
$page->printHTMLHeader();
$page->printPageHeader();
$page->printPageBody($html);
$page->printPageFooter();

?>

