<?php
require_once "./db codes/UpdateData.php";
require_once "./db codes/InsertData.php";
require_once "./db codes/DuplicateExist.php";
require_once "./tasks handler/ImageSaver.php";
require_once "./Encryption/Encryption.php";

class UpdateUser{
    private array $userDetails = [], $OriginalUserDetails = [];
    // A constructor to help assign values into the private variables above.
    public function __construct($userDetails){
        $this->OriginalUserDetails = $userDetails;
        
        foreach($userDetails as $key=>$value){

            if($key == "userId"){$this->userDetails[$key]= $value;continue;}
            $enc = new Encryption();
            $this->userDetails[$key] = $enc->getAESEncrypt($value);

        }
    }

    // Register new User
    public function update(){
        $update = new UpdateData();
        $update->user($this->userDetails);
        return true;

    }
}

?>