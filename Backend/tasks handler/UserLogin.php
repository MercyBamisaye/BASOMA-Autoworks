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

            $enc = new Encryption($value);
            if($key == "password"){
                $this->userDetails[$key] = $enc->getBBWiSEEncrypt();
            }
            else{
                $this->userDetails[$key] = $enc->getAESEncrypt();
            }
        }

        $getData = new GetData();
        $userInfo = $getData->user($this->userDetails);

        //var_dump($userInfo);
        if($userInfo != null){
            $enc = new Encryption(" ");
            foreach($userInfo as $key=>$value){

                if($key == "password"){
                    continue;
                }
                elseif($key=="id"){
                    $this->decryptedUserInfo[$key] = $value;
                }
                else{
                    $this->decryptedUserInfo[$key] = $enc->getAESDecrypt($value);
                }
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