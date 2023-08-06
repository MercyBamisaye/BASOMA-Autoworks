<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";

class BusinessAddressValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("address",$userDetails )){ // Checking if the name array key exists .
                if(strlen($userDetails['address'])<=70){ // Name lenght must not be more than 70 alphabets.
                    return parent::validate($userDetails);
                }
                else{
                    return "Business address cannot be more than 70 characters";
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