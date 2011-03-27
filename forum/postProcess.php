<?php
//
// Add post
//
// Eilif L
//

// Interception Filter, access, authorithy 
if(!isset($indexIsVisited)) die('No direct access to pagecontroller is allowed.');

// GET & POST variables
$title = isset($_POST['title']) ? $_POST['title'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';

// Connect and prepare

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
   echo "Connect failed: ".mysqli_connect_error()."<br>";
   exit();
}

// Prevent SQL injections

$title = $mysqli->real_escape_string($title);
$content = $mysqli->real_escape_string($content);

// SQL: insert new post

$tablePost = DB_PREFIX . 'Post'; 
$query = <<< EOD
INSERT INTO {$tablePost} (author, title, content, timestamp)
	VALUES (0,"{$title}","{$content}",NOW());
EOD;

// Query and close

if (strlen($title) > 0 || strlen($content) > 0) {
	$res = $mysqli->query($query) 
		or die("<p>Could not query database,</p><code>{$query}</code>");
	$_SESSION['statusMessage'] = "New post added";
} else {
	$_SESSION['statusMessage'] = "No post to add";
}

$mysqli->close();

// Redirect

$redirect = isset($_POST['redirect']) ? $_POST['redirect'] : 'forum';
header('Location: ' . WS_SITELINK . "?p={$redirect}");
exit;

?>

