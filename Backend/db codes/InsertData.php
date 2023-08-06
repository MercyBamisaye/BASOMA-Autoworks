<?php
/* Importing other require PHP Files*/
require_once "./db codes/DBConnector.php";

// Calling the connectToDB static functioin in the DBConnector class
$connect = DBConnector::connectToDB();

class InsertData{
    private string $sName,$email,$phoneNumber,$password;

    /**
     * The below method helps to send New User's informations
     * into the user table in the database taking an input
     * of array.
     *
     * @param mixed $userDetails
     * @return mixed
     */
    public function user($userDetails){
        $this->sName = $userDetails['username'];
        $this->email = $userDetails['email'];
        $this->password= $userDetails['password'];
        $this->phoneNumber = $userDetails['phoneNumber'];

        $sql = "INSERT INTO `user` (`id`,`username`,`email`,`phoneNumber`,`password`) VALUES(NULL,'$this->sName','$this->email','$this->phoneNumber','$this->password')";

        global $connect;

        if($connect -> query($sql)==true){
            return true;
        }else{
            //var_dump('failed: '.$connect->error);
            return false;
        }

    }


    /**
     * The below method helps to send New User's informations
     * into the user table in the database taking an input
     * of array.
     *
     * @param mixed $userDetails
     * @return mixed
     */
    public function business($businessDetails){
        $businessName = $businessDetails['username'];
        $businessEmail = $businessDetails['email'];
        $businessPhoneNumber = $businessDetails['phoneNumber'];
        $businessAddress = $businessDetails['businessAddress'];
        $userId = $businessDetails["userId"];

        $sql = "INSERT INTO `business` (`id`,`user_id`,`businessName`,`businessEmail`,`businessPhoneNumber`,`businessAddress`) VALUES(NULL,'$userId','$businessName','$businessEmail','$businessPhoneNumber','$businessAddress')";

        global $connect;

        if($connect -> query($sql)==true){
            return true;
        }else{
            //var_dump('failed: '.$connect->error);
            return false;
        }

    }

    /**
     * The method below helps to send add a new product the
     * cart table in the database taking the product and user
     * id as input.
     *
     * @param mixed $productId
     * @param mixed $userId
     * @return mixed
     */
    public function cart($productId, $userId){

        $sql = "INSERT INTO `cart` (`id`,`product_id`,`user_id`,`status`) VALUES(NULL,'$productId','$userId','0')";
        global $connect;
        return $connect -> query($sql);
    }

    public function image($imgId1, $imgId2, $imgId3){

        $sql = "INSERT INTO `image` (`id`,`image_1`,`image_2`,`image_3`) VALUES(NULL,'$imgId1','$imgId2','$imgId3')";
        global $connect;
        return $connect -> query($sql);
    }

}

?>