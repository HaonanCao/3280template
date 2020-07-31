<?php

class LoginManager  {

    //Check if the user is logged in, 
    //if they are not they are redirected to the login page
    
     static function verifyLogin(){

        // check if there's a session
        if(session_id() == '' && !isset($_SESSION)){
            session_start();
        }

        // if session is started, check if a user is login or not
        if(isset($_SESSION["loggedin"])){
            return true;
        }
        else{
            session_destroy();
            return false;
        }
     }   
    
}

?>