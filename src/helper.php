<?php
//
// Helper functions
//
// Eilif L
//

function destroySession() {
	// Unsets all session variables
	$_SESSION = array(); 
	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	// Destroy the session
	session_destroy();
}


?>

