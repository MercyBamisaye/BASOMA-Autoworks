<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";

class BusinessNameValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("businessName",$userDetails )){ // Checking if the name array key exists .
                if(strlen($userDetails['businessName'])<=60){ // Name lenght must not be more than 60 alphabets.
                    return parent::validate($userDetails);
                }
                else{
                    return "Business name cannot be more than 60 characters";
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