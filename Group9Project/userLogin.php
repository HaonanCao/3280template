<?php

require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");

require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");

Page::header();

UserDAO::init();

// check if there's $_POST
if(!empty($_POST['userid'])){
    //get User object
    $authUser = UserDAO::getUser($_POST['userid']);

    //check the password
    if($authUser->verifyPassword($_POST['password'])){
        //start teh session
        session_start();
        // set the session login
        $_SESSION['loggedin'] = $authUser->getUserId();
    }
}

// check whether a user really login to display the user details
if(LoginManager::verifyLogin()){
   // $user = UserDAO::getUser($_SESSION['loggedin']);
    //Page::showUserDetails($user);
}
else
    Page::showLogin();

Page::footer();

?>