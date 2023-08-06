<?php
require_once "./db codes/InsertData.php";
require_once "./db codes/DuplicateExist.php";
require_once "./tasks handler/ImageSaver.php";
require_once "./Encryption/Encryption.php";

class RegisterBusiness{
    private array $businessDetails = [], $OriginalbusinessDetails = [];
    // A constructor to help assign values into the private variables above.
    public function __construct($businessDetails){
        $this->OriginalbusinessDetails = $businessDetails;

        foreach($businessDetails as $key=>$value){
            if($key == "userId"){$this->businessDetails[$key] = $value;continue;}
            $enc = new Encryption();
            $this->businessDetails[$key] = $enc->getAESEncrypt($value);

        }
    }


    // Returns business's first name
    private function getfName(): string{
        return $this->businessDetails['fName'];
    }

    // Returns business's first name
    private function getlName(): string{
        return $this->businessDetails['lName'];
    }

    // Returns business's email
    private function getEmail(): string{
        return $this->businessDetails['email'];
    }
    // Returns business's user id
    private function getUserId(): int{
        return $this->businessDetails['userId'];
    }

    // Returns business's phoneNumber
    private function getPhoneNumber(): string{
        return $this->businessDetails['phoneNumber'];
    }
    // Returns business's Permanent Address
    private function getPAddress(): string{
        return $this->businessDetails['pAddress'];
    }
    // Returns business's Contact Address
    private function getCAddress(): string{
        return $this->businessDetails['cAddress'];
    }

    // Returns business's Password
    private function getPassword(): string{
        return $this->businessDetails['password'];
    }

    // Check if business already exists
    private function existence(){
        $exists = DuplicateExist::exists_($this->getUserId(), "business");
        if($exists){
            return true;
        }
        else{

            return false;
        }
    }

    // Register new business
    public function register(){
        if($this->existence()){
            $_SESSION['SELLER_REG_ERROR'] = "You already have an existing Business registered.";
            return false;
        }
        else{

            $register = new InsertData();
            $register->business($this->businessDetails);
            return true;

        }

    }
}

?>