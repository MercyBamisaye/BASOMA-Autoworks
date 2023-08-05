<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";


class EmailValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("email",$userDetails )){ // Checking if the email array key exists .
                if(strlen($userDetails['email'])<=50){ // Email lenght must not be more than 50 alphabets.
                    return parent::validate($userDetails);
                }
                else{
                    return "Please input a valid email";
                }
            }
            else{
                return "No email input.";
            }
        }
        else{
            return "The input $userDetails is in wrong format";
        }
    }
}


?>