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
    public function agricProdt($prodtDetail, $userId){
        $name = $prodtDetail['productName'];
        $description = $prodtDetail['productDescription'];
        $quantity = $prodtDetail['productQuantity'];
        $price = $prodtDetail['productPrice'];
        $address = $prodtDetail['productAddress'];
        $image = $prodtDetail['imgId'];

        $sql = "INSERT INTO `agriculture` (`id`,`user_id`,`name`,`description`,`quantity`,`image_id`,`price`,`address`) VALUES(NULL,'$userId','$name','$description','$quantity','$image','$price','$address')";
        global $connect;
        if($connect -> query($sql)==true){
            return true;
        }
        else{

            return $connect->error;
        }
    }
    public function techProdt($prodtDetail, $userId){
        $name = $prodtDetail['productName'];
        $description = $prodtDetail['productDescription'];
        $type = $prodtDetail['productType'];
        $price = $prodtDetail['productPrice'];
        $address = $prodtDetail['productAddress'];
        $image = $prodtDetail['imgId'];
        $sql = "INSERT INTO `technology` (`id`,`name`,`type`,`description`,`address`,`image_id`,`price`,`user_id`) VALUES(NULL,'$name','$type','$description','$address','$image','$price','$userId')";
        global $connect;
        if($connect -> query($sql)==true){
            return true;
        }
        else{

            return $connect->error;
        }
    }
    public function wearProdt($prodtDetail, $userId){
        $name = $prodtDetail['productName'];
        $size = $prodtDetail['productSize'];
        $type = $prodtDetail['productType'];
        $price = $prodtDetail['productPrice'];
        $address = $prodtDetail['productAddress'];
        $color = $prodtDetail['productColor'];
        $brand = $prodtDetail['productBrand'];
        $texture = $prodtDetail['productTexture'];
        $image = $prodtDetail['imgId'];
        $sql = "INSERT INTO `wear` (`id`,`texture`,`brand`,`type`,`color`,`size`,`user_id`,`image_id`,`price`,`name`,`address`) VALUES(NULL,'$texture','$brand','$type','$color','$size','$userId','$image','$price','$name','$address')";
        global $connect;
        if($connect -> query($sql)==true){
            return true;
        }
        else{

            return $connect->error;
        }
    }
    public function serviceProdt($prodtDetail, $userId){
        $name = $prodtDetail['serviceName'];
        $description = $prodtDetail['serviceDescription'];
        $price = $prodtDetail['servicePrice'];
        $contact = $prodtDetail['serviceContact'];
        $address = $prodtDetail['serviceAddress'];
        $image = $prodtDetail['imgId'];

        var_dump($prodtDetail);

        $sql = "INSERT INTO `service` (`id`,`name`,`description`,`price`,`image_id`,`company_contact`,`user_id`,`address`) VALUES(NULL,'$name','$description','$price','$image','$contact','$userId','$address')";
        global $connect;
        if($connect -> query($sql)==true){
            return true;
        }
        else{

            return $connect->error;
        }
    }
    public function image($imgId1, $imgId2, $imgId3){

        $sql = "INSERT INTO `image` (`id`,`image_1`,`image_2`,`image_3`) VALUES(NULL,'$imgId1','$imgId2','$imgId3')";
        global $connect;
        return $connect -> query($sql);
    }

}

?>