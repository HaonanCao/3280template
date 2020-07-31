<?php

class UserDAO   {

    private static $db;

    static function init()  {
        //Initialize the internal PDO Agent
        self::$db = new PDOAgent("User");   //class name (User.class)         
    }    

    static function getUser(INT $userId)  {
       $sql = "SELECT * FROM user WHERE userId = :userid";
       self::$db->query($sql);
       self::$db->bind(":userid", $userId); 
       self::$db->execute();
         //return the User object
       return self::$db->singleResult();
     
    }

    
    
    
}