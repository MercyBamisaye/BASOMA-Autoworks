<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";

class BusinessEmailValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("email",$userDetails )){ // Checking if the name array key exists .
                if(strlen($userDetails['email'])<=60){ // Name lenght must not be more than 60 alphabets.
                    return parent::validate($userDetails);
                }
                else{
                    return "Business Email cannot be more than 60 characters";
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