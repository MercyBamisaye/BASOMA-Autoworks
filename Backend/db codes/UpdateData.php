<?php
/* Importing other require PHP Files*/
require_once "DBConnector.php";

// Calling the connectToDB static functioin in the DBConnector class
$connect = DBConnector::connectToDB();

/**
 * The function of this class is to perform Update function
 * in the database.
 */
class UpdateData{

    /**
     * This method helps to update the status of the products
     * within the cart table in the database.
     * @param mixed $carts 
     */
    public function cart($carts){
        var_dump($carts);
        foreach($carts as $cart){
            
            $sql = "UPDATE `cart` SET `status` = '1' WHERE (`id` = '$cart')";


            global $connect;
            $result = $connect -> query($sql);

        }
    }
}
?>