<?php
//
// Description: Create HTML for a page
//
// Eilif L
//

error_reporting(E_ALL); // on
// error_reporting(0); // off

class CHTMLPage {
	protected $myTitle;
	protected $myHeader;
	protected $myStylesheet;
	protected $myMenu;
	protected $myFooter;
	protected $myPageBodyLeft;
	protected $myPageBodyRight;
	protected $myPageBodyMiddle;
	
	// Constructor
	// Optional parameters:
	// 		$style: filename.css
	//		$login: TRUE/FALSE show login 
	
	public function __construct($style = WS_STYLESHEET, $login = FALSE) {
		$this->myTitle = WS_TITLE;
		$this->myHTTPLink = WS_HTTPLINK;
		$this->myStylesheet = $style;
		$this->myLogin = $login;
		$this->myMenu = unserialize(WS_MENU);
		$this->myFooter = WS_FOOTER;
		$this->myPageBodyLeft = "";
		$this->myPageBodyRight = "";
		$this->myPageBodyMain = "";
	}

	public function __destruct() {
	}
	
	// HTML Header - Titles defined in config
	
	public function printHTMLHeader($header = WS_TITLE, $header2 = WS_TITLE2)	{
		$this->myHeader = $header;
		$this->myHeader2 = $header2;
		// use charset utf-8
		// charset iso-8859-1 to avoid error ...
		$html = <<<EOD
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="iso-8859-1" /> 
        <title>{$this->myTitle}</title> 
        <link rel="stylesheet" href="{$this->myStylesheet}" /> 
        <link rel="shortcut icon" href="favicon.ico" /> 
        <!--[if lt IE 9]>
        	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]--> 
    </head>
EOD;
	// PS: The "if lt IE 9" thingy seems to be a IE compatibility thingy (less than ver 9)
	
		header("Content-Type: text/html; charset=ISO-8859-1");
		echo $html;
	}
	
	// Produces the top of the page with header
	// login if login set
	
	public function printPageHeader()
	{
		$html = <<<EOD
<body>
<div class='page'>
{$this->getLoginLogoutMenu()}
<div class='pageHeader'>
<h1><a href="{$this->myHTTPLink}" class="header">{$this->myHeader}</a></h1>
<h3>{$this->myHeader2}</h3>
<div class='pageHeaderMenu'>
<nav>
EOD;
		foreach ($this->myMenu as $item => $link) {
			$html .= "<a href='".$link."' class='menu'> ".$item." </a>|";
		}
		$html = substr($html, 0, -1);
		$html .= "</nav></div></div>";
		echo $html;
	}
	
	// Produces the login-menu, wether user is logged in or not

	private function getLoginLogoutMenu() {
		if (isset($_SESSION['name'])) {
			// logged in
			$htmlMenu = "Välkommen tillbaks {$_SESSION['name']}!
			| <a href='?p=editpost' class='login'> Skapa nytt inlägg</a>
			| <a href='?p=logoutp' class='login'> Logga ut</a>";
		} else if ($this->myLogin) {
			// login is set, not yet logged in
			$htmlMenu = "<a href='?p=login' class='login'>Logga in</a>";
			$html = "<div class='login'>{$htmlMenu}</div>";
			return $html;
		}
	}

	// Produces the page body with content and error message if any

	public function printPageBody($aBody = "")
	{
		
		// 1, 2 or 3-column layout? Always expect the middle column to be set.
		$cols  = 1;
		$cols += empty($this->myPageBodyLeft)  ? 0 : 1;
		$cols += empty($this->myPageBodyRight) ? 0 : 1;

		// Get content for each column, if defined, else empty
		$pageBodyLeft = empty($this->myPageBodyLeft)  ? "" : "<div class='pageBodyLeft{$cols}'>{$this->myPageBodyLeft}</div>";
		$pageBodyRight = empty($this->myPageBodyRight) ? "" : "<div class='pageBodyRight{$cols}'>{$this->myPageBodyRight}</div>";
		$pageBodyMain = empty($this->myPageBodyMain) ? "" : "<div class='pageBodyMain{$cols}'>{$this->myPageBodyMain}</div>";

		$html = <<<EOD
<div class='pageBody'>
	{$this->getStatusMessage()}
	{$aBody}
	{$pageBodyLeft}
	{$pageBodyMain}
	{$pageBodyRight}
	<div class='clear'></div>
</div>
EOD;
		echo $html;
	}
	
	// Produces the footer
	
	public function printPageFooter()
	{
		$refToThisPage = "http://" .$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$html = <<<EOD
<footer>
<nav>{$this->myFooter} |
<a href='http://jigsaw.w3.org/css-validator/validator?uri={$refToThisPage}' class='menu'>CSS</a> |
<a href='http://validator.w3.org/check?uri={$refToThisPage}' class='menu'>XHTML</a> |
<a href='http://html5.validator.nu/?doc={$refToThisPage}' class='menu'>HTML5</a> |
<a href='http://validator.w3.org/checklink?uri={$refToThisPage}' class='menu'>Links</a>
</nav>
</footer>
</div>
</body>
</html>
EOD;
		echo $html;
	}
	
	// Produces status and/or error message if set in the SESSION
	
	private function getStatusMessage() {
		$html = "";
		if (isset($_SESSION['errorMessage'])) {
			$html .= "<div class='error'>{$_SESSION['errorMessage']}</div>";
			unset($_SESSION['errorMessage']);
		}
		if (isset($_SESSION['statusMessage'])) {
			$html .= "<div class='status'>{$_SESSION['statusMessage']}</div>";
			unset($_SESSION['statusMessage']);
		}
		return $html;
	}
	
	// Add body left
	public function addPageBodyLeft($html = "") {
		$this->myPageBodyLeft .= $html;
	}

	// Add body right
	
	public function addPageBodyRight($html = "") {
		$this->myPageBodyRight .= $html;
	}

	// Add body middle
	
	public function addPageBodyMain($html = "") {
		$this->myPageBodyMain .= $html;
	}

}

?>
