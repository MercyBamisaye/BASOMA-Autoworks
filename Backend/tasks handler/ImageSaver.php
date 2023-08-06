<?php


//Importing the required PHP Files;
require_once "./db codes/GetData.php";
require_once "./Encryption/Encryption.php";

class ImageSaver{
    private array $userDetails = [];
    public function __construct($userDetails){
        foreach($userDetails as $key=>$value){
            $enc = new Encryption($value);
            if($key == "password"){
                $this->userDetails[$key] = $enc->getBBWiSEEncrypt();
            }
            else{
                $this->userDetails[$key] = $enc->getAESEncrypt();
            }
        }
    }
    public function save($image){

        $userId = $this->getUserId();

        move_uploaded_file($image, "../profile Pictures/$userId.png");

    }
    private function getUserId(){
        $getData = new GetData();
        $retrievedData = $getData->user($this->userDetails);

        return $retrievedData['id'];
    }
    public function productImageSave($image, $imageName){

        move_uploaded_file($image, "../product Pictures/$imageName.png");

    }
}
?>