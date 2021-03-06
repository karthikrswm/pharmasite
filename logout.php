<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("db_connection.php"); ?>

<?php
	// v1: simple logout
	// session_start();

	$_SESSION["user_id"] = null;
	$_SESSION["username"] = null;
    session_destroy();
	redirect_to("login.php");
        
        echo "Logged out successfully!!";
?>

<?php
	// v2: destroy session
	// assumes nothing else in session to keep
	// session_start();
	// $_SESSION = array();
	// if (isset($_COOKIE[session_name()])) {
	//   setcookie(session_name(), '', time()-42000, '/');
	// }
	// session_destroy(); 
	// redirect_to("login.php");
?>
