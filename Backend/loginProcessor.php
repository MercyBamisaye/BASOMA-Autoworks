<?php

require_once "tasks handler/UserLogin.php";
require_once "validator/EmailValidator.php";
require_once "validator/PasswordValidator.php";
require_once "validator/UserNameValidator.php";

if(isset($_POST['usernameOrEmail'])){
    // Converting user inputs into an array

    if(isset($_POST['usernameOrEmail'])){
        // Converting user inputs into an array
        $userDetails = [
            'email'=>$_POST['usernameOrEmail'],
            'password'=>$_POST['password']
        ];
        // Validating user inputs
        if(validator($userDetails) === null){

            $userLogin = new UserLogin();
            $uLogin = $userLogin->login($userDetails);
            if(is_array($uLogin)){
                $_SESSION['id'] = $uLogin['id'];
                $_SESSION['USERNAME'] = $uLogin['username'];
                if(array_key_exists("firstName", $uLogin)){
                    $_SESSION['UPDATED'] = true;
                }

                unset($_POST['usernameOrEmail']);
                unset($_POST['password']);
                header("location: ../index.php");
            }
            else{
                unset($_POST['usernameOrEmail']);
                unset($_POST['password']);
                $_SESSION['LOGIN_ERROR'] = "Invalid login details !!";
                header("location: ../Login.php");
            }
        }
        else{
            $_SESSION['LOGIN_ERROR'] = validator($userDetails);

            header("location: ../Login.php");
        }

    }
}

function validator($userDetails): ?string{

    /**
     * Using the Chain of Responsibility Design Pattern, the required classes
     * are instantiated below and proceeded with the chaining patten.
     *
     */

    $emailValid = new EmailValidator();
    $passValid = new PasswordValidator();

    $emailValid->next($passValid);

    // Validating user inputs
    return $emailValid->validate($userDetails);

}
?>