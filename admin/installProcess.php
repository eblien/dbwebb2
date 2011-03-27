<?php
//
// Install database process
//
// Eilif L
//

// Interception Filter, access, authorithy 
if(!isset($indexIsVisited)) die('No direct access to pagecontroller is allowed.');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_error()) {
   echo "Connect failed: ".mysqli_connect_error()."<br>";
   exit();
}

// Prepare and perform a SQL query.

// Cloamax tables
$tablePost = DB_PREFIX . 'Post';

$query = <<<EOD
-- Drop tables
DROP TABLE IF EXISTS {$tablePost};

-- Drop views
-- DROP VIEW IF EXISTS someViewThatWeWillPutHereVerySoonIPromise;

--
-- Table for posts / InnoDB because 
--
CREATE TABLE {$tablePost} (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  author INT,
  title VARCHAR(255),
  content LONGTEXT,
  timestamp DATETIME
) ENGINE=InnoDB;

EOD;

$res = $mysqli->multi_query($query)
                    or die("Could not query database");

// Count the number of succeded statements 

$statements = 0;
do {
	$res = $mysqli->store_result();
	$statements++;
} while($mysqli->more_results() && $mysqli->next_result());

// Prepare html

$html = "<h2>Install Cloamax</h2>";
$html .= "<h3>Query:</h3><pre>{$query}</pre></p>";
$html .= "<p>Successful statements: {$statements}</p><p>";
if ($mysqli->errno == 0) {
	$html .= "Ok! Everything is fine ....";
} else {
	$html .= "Error code: {$mysqli->errno} ({$mysqli->error})";
}
$html .= "</p><p><a href='?p=home'>Home</a></p>";

$mysqli->close();

// Show page

$page = new CHTMLPage();
$page->printHTMLHeader();
$page->printPageHeader();
$page->printPageBody($html);
$page->printPageFooter();

?>

