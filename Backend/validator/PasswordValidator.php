<?php
/* Importing the ValidatorBlueprint PHP File */
require_once "ValidatorBlueprint.php";


class PasswordValidator extends Validator{
    function validate($userDetails): ?string{
        if(is_array($userDetails)){ // Checking if the input is an array.
            if(array_key_exists("password",$userDetails )){ // Checking if the password array key exists .
                if(strlen($userDetails['password'])<=20){ // Password lenght must not be more than 20 alphabets.
                    return parent::validate($userDetails);
                }
                else{
                    return "Password cannot be more than 20";
                }
            }
            else{
                return "No password input.";
            }
        }
        else{
            return "The input $userDetails is in wrong format";
        }
    }
}
?>