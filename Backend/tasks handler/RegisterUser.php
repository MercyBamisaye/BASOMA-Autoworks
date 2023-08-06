<?php
require_once "./db codes/InsertData.php";
require_once "./db codes/DuplicateExist.php";
require_once "./tasks handler/ImageSaver.php";
require_once "./Encryption/Encryption.php";

class RegisterUser{
    private array $userDetails = [], $OriginalUserDetails = [];
    // A constructor to help assign values into the private variables above.
    public function __construct($userDetails){
        $this->OriginalUserDetails = $userDetails;
        foreach($userDetails as $key=>$value){

            $enc = new Encryption();
            $this->userDetails[$key] = $enc->getAESEncrypt($value);
            
        }
    }

    
    // Returns User's first name
    private function getfName(): string{
        return $this->userDetails['fName'];
    }

    // Returns User's first name
    private function getlName(): string{
        return $this->userDetails['lName'];
    }

    // Returns User's email
    private function getEmail(): string{
        return $this->userDetails['email'];
    }

    // Returns User's phoneNumber
    private function getPhoneNumber(): string{
        return $this->userDetails['phoneNumber'];
    }
    // Returns User's Permanent Address
    private function getPAddress(): string{
        return $this->userDetails['pAddress'];
    }
    // Returns User's Contact Address
    private function getCAddress(): string{
        return $this->userDetails['cAddress'];
    }

    // Returns User's Password
    private function getPassword(): string{
        return $this->userDetails['password'];
    }

    // Check if user already exists
    private function existence(){
        $exists = DuplicateExist::exists($this->getEmail(), "user");
        if($exists){
            return true;
        }
        else{

            return false;
        }
    }

    // Register new User
    public function register(){
        if($this->existence()){
            $_SESSION['REG_ERROR'] = "The email: ".$this->OriginalUserDetails['email']." already exists.";
            return false;
        }
        else{

            $register = new InsertData();
            $register->user($this->userDetails);
            return true;

        }

    }
}

?>