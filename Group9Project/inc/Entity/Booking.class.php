<?php

class Booking{

    private $bookingId = "";
    private $userId = "";
    private $carId = "";

    // Getters
    function getBookingId() : string{
        return $this->bookingId;
    }

    function getUserId() : string{
        return $this->userId;
    }

    function getCarId() : string{
        return $this->carId;
    }

    function setBookingId($bookingId){
        $this->bookingId = $bookingId;
    }
    function setuUserId($userId){
        $this->userId = $userId;
    }
    function setcarId($carId){
        $this->carId = $carId;
    }

   


}


?>