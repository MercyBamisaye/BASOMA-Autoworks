<?php
session_start();

//Importing the required PHP Files;
require_once "./db codes/GetData.php";
require_once "./Encryption/Encryption.php";


class UserLogin{
    private array $userDetails = [], $decryptedUserInfo = [];
    /**
     * This method performs the function of
     * login the user in if the supplied details are
     * correct else rejects.
     *
     * @param mixed $userDetails
     * @return void
     */
    public function login($userDetails) {

        foreach($userDetails as $key=>$value){

            $enc = new Encryption();
            $this->userDetails[$key] = $enc->getAESEncrypt($value);

        }

        $getData = new GetData();
        $userInfo1 = $getData->user($this->userDetails);
        $userInfo2 = $getData->user_($this->userDetails);
        $userInfo = [];

        if($userInfo1 != null){
            $userInfo = $userInfo1;
        }
        else{
            $userInfo = $userInfo2;
        }
        if($userInfo != null){
            $enc = new Encryption();
            foreach($userInfo as $key=>$value){
                if($key == 'id'){$this->decryptedUserInfo[$key] =$value;continue;}
                if($value ==null){continue;}

                $this->decryptedUserInfo[$key] = $enc->getAESDecrypt($value);

            }
            return $this->decryptedUserInfo;
        }
        else{

            unset($_POST);
            return null;
        }

    }
}

?>