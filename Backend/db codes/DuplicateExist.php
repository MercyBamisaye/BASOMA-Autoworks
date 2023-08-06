<?php

/* Importing other require PHP Files*/
require_once "./db codes/DBConnector.php";

// Calling the connectToDB static functioin in the DBConnector class
$connect = DBConnector::connectToDB();

class DuplicateExist{
    /**
     * The method below helps to check if there exist a user with
     * the same email passed as an input within the table passed as
     * the second parameter ,and returns true if yes
     * else returns false.
     *
     * @param mixed $email
     * @param mixed $table
     * @return bool
     */
    public static function exists($email, $table){
        // Query the Database
        $sql = "SELECT * FROM `$table` WHERE `email`='$email'";

        global $connect;
        $result = $connect -> query($sql);

        if ($result->num_rows > 0) {
            //return $result->fetch_all(MYSQLI_ASSOC);
            return true; // Returns true if the email already exists.
        }
        else{
            return false;// Returns false if the email does not exists.
        }

    }

}
?>