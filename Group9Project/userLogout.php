<?php
require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Booking.class.php");


require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");

// we still need to start the session before we destroy it
session_start();

// unset
unset($_SESSION);

// destroy the session
session_destroy();

Page::header();
echo "<p>Thank you. See you again!</p>";
Page::footer();

?>