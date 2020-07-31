<?php

class UserDAO   {

    private static $db;

    static function init()  {
        //Initialize the internal PDO Agent
        self::$db = new PDOAgent("User");   //class name (User.class)         
    }    

    static function getBooking( $userId)  {
       $sql = "SELECT * FROM booking WHERE userId = :userid";
       self::$db->query($sql);
       self::$db->bind(":userid", $userId); 
       self::$db->execute();
         //return the User object
       return self::$db->singleResult();
     
    }

    static function getBookings() {

      $selectAll = "SELECT * FROM booking;";

      self::$db->query($selectAll);
      self::$db->execute();
      return self::$db->resultSet(); 
  }

    static function createBooking(Booking $newBooking) {

      // QUERY BIND EXECUTE RETURN
      $sqlInsert = "INSERT INTO booking (bookingId,userId,carId)
                      VALUES (:bookingId, :userId, :carId)";
      //,DeptID  ,:deptID
      self::$db->query($sqlInsert);

      //bind
      self::$db->bind(':bookingId', $newBooking->getBookingId());
      self::$db->bind(':userId', $newBooking->getUserId());
      self::$db->bind(':carId', $newBooking->getCarId());
     
      //self::$db->bind(':deptID', $newFeedback->getDeptID());

      // execute
      self::$db->execute();

      //return self::$db->lastInsertId();
      

  }

    // UPDATE means update    
    static function updateBooking (Booking $BookingToUpdate) {

      //QUERY, BIND, EXECUTE
      $update = "UPDATE * FROM booking
                 SET bookingId = $BookingToUpdate->getBookingId(),
                 userId = $BookingToUpdate->getUerId(),
                 carId = $BookingToUpdate->getCarId()
                 WHERE bookingId = $BookingToUpdate->getBookingId();";

      self::$db->query($update);
      self::$db->execute();
      
      // Return the rowCount
      return self::$db->singleResult(); 
  }

  // DELETE
  static function deleteBooking($BookingId) {

    // Yea...yea... it is a drill like the one before     
    //$sqlDelete = "DELETE FROM Feedback WHERE FeedbackID = ".$FeedbackId;
    $sqlDelete = "DELETE FROM booking WHERE bookingId = :bookingId";

    // careful with delete
    try{
        self::$db->query($sqlDelete);
        self::$db->bind(':bookingId',$BookingId);
        self::$db->execute();
        if(self::$db->rowCount() != 1){
            // we fail in deleting
            throw new Exception("Problem in deleting the feedback $BookingId");
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
        //self::$db->debugDumpParams();
        return false;
    }

    return true;   

}


    
    
    
}