<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";

class NINValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("nin",$userDetails )){ // Checking if the name array key exists .
                if(strlen($userDetails['nin'])==11){ // Name lenght must not be more than 11 character.
                    return parent::validate($userDetails);
                }
                else{
                    return "NIN cannot be ".strlen($userDetails['nin'])." characters.";
                }
            }
            else{
                return "No NIN input.";
            }
        }
        else{
            return "The input $userDetails is in wrong format";
        }
    }
}
?>