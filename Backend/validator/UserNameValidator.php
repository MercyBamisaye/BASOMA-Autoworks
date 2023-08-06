<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";

class UserNameValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("username",$userDetails )){ // Checking if the name array key exists .
                if(strlen($userDetails['username'])<=30){ // Name lenght must not be more than 30 alphabets.
                    return parent::validate($userDetails);
                }
                else{
                    return "Username cannot be more than 30 characters";
                }
            }
            else{
                return "No name input.";
            }
        }
        else{
            return "The input $userDetails is in wrong format";
        }
    }
}
?>