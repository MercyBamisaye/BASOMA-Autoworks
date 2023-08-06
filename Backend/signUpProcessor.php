<?php

require_once "tasks handler/RegisterUser.php";
require_once "tasks handler/UserLogin.php";
require_once "tasks handler/ImageSaver.php";
require_once "validator/EmailValidator.php";
require_once "validator/PasswordValidator.php";
require_once "validator/UserNameValidator.php";
require_once "validator/PhoneNumberValidator.php";

if(isset($_POST['username'])){
    // Converting user inputs into an array

    $userDetails = [
        'username' => $_POST['username'],
        'email'=>$_POST['email'],
        'phoneNumber' => $_POST['PhoneNumber'],
        'password'=>$_POST['password'],
    ];

    // Validating user inputs
    if(validator($userDetails) === null){

        $userReg = new RegisterUser($userDetails);
        $reg = $userReg->register();

        if($reg == true){/*
            $imageSaver = new ImageSaver($userDetails);
            $imageSaver->save($_FILES['picture']['tmp_name']);*/
            var_dump($_SESSION['LOGIN_MSSG'] = "Successful! Kindly login with your new email address.");
            //header("location: ../index.php");
        }
        else{

            header("location: ../SignUpPage.php");
        }
        unset($_POST['username']);
    }
    else{
        $_SESSION['REG_ERROR'] = validator($userDetails);
        unset($_POST['username']);
        header("location: ../SignUpPage.php");
    }


}
else{
    if(isset($_POST['emailLogin'])){
        // Converting user inputs into an array
        $userDetails = [
            'email'=>$_POST['emailLogin'],
            'password'=>$_POST['passwordLogin']
        ];
        // Validating user inputs
        if(validator2($userDetails) === null){

            $userLogin = new UserLogin();
            $uLogin = $userLogin->login($userDetails);
            if(is_array($uLogin)){
                $_SESSION['id'] = $uLogin['id'];
                $_SESSION['NAME'] = $uLogin['lname']." ".$uLogin['fname'];

                unset($_POST['emailLogin']);
                unset($_POST['passwordLogin']);
                header("location: ../frontend/market.php");
            }
            else{
                unset($_POST['emailLogin']);
                unset($_POST['passwordLogin']);
                $_SESSION['LOGIN_ERROR'] = "Invalid login details !!";
                header("location: ../frontend/login.php");
            }
        }
        else{
            $_SESSION['LOGIN_ERROR'] = validator2($userDetails);

            header("location: ../frontend/login.php");
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
    $uNameValid = new UserNameValidator();
    $passValid = new PasswordValidator();
    $phoneValid = new PhoneNumberValidator();

    $emailValid->next($uNameValid);
    $uNameValid->next($passValid);
    $passValid->next($phoneValid);

    // Validating user inputs
    return $emailValid->validate($userDetails);

}
function validator2($userDetails): ?string{

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

/* These syntax below helps initialize the function of
 * adding items into the cart.
 */
if(isset($_GET['id'])){
    $carter = new InsertData();
    $carter->cart($_GET['id'],$_SESSION['ID']);
    header("location: ./frontend/index.php");
}
?>