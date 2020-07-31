<?php

class User{

    private $userId = 0;
    private $firstName = "";
    private $lastName = "";
    private $password ="";

    // Getters
    function getUserId() : int {
        return $this->userId;
    }

    function getFirstName() : string{
        return $this->firstName;
    }

    function getLastName() : string{
        return $this->lastName;
    }

    function getPassword() : string{
        return $this->password;
    }

    // verify the password
    function verifyPassword(string $pass){
        return password_verify($pass, $this->password);
    }


}


?>