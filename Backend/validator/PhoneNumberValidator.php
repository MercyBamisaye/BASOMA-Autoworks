<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";

class PhoneNumberValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("phoneNumber",$userDetails )){ // Checking if the name array key exists .
                if(strlen($userDetails['phoneNumber'])==11){ // Name lenght must not be more than 11 character.
                    return parent::validate($userDetails);
                }
                else{
                    return "Please input a valid phone number";
                }
            }
            else{
                return "No phone number input.";
            }
        }
        else{
            return "The input $userDetails is in wrong format";
        }
    }
}
?>