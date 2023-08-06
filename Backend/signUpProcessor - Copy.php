<?php

require_once "tasks handler/RegisterUser.php";
require_once "tasks handler/UserLogin.php";
require_once "tasks handler/ImageSaver.php";
require_once "validator/EmailValidator.php";
require_once "validator/PasswordValidator.php";
require_once "validator/NameValidator.php";
require_once "validator/LNameValidator.php";
require_once "validator/NINValidator.php";
require_once "validator/PhoneNumberValidator.php";

if(isset($_POST['nin'])){
    // Converting user inputs into an array

    $userDetails = [
        'nin' => $_POST['nin'],
        'fName'=>$_POST['fName'],
        'lName' => $_POST['lName'],
        'email'=>$_POST['regEmail'],
        'phoneNumber' => $_POST['phoneNumber'],
        'pAddress' => $_POST['pAddress'],
        'cAddress' => $_POST['cAddress'],
        'password'=>$_POST['password'],
    ];

    // Validating user inputs
    if(validator($userDetails) === null){

        $userReg = new RegisterUser($userDetails);
        $reg = $userReg->register();

        if($reg == true){
            $imageSaver = new ImageSaver($userDetails);
            $imageSaver->save($_FILES['picture']['tmp_name']);
            $_SESSION['LOGIN_MSSG'] = "Successful! Kindly login with your new email address.";
            header("location: ../frontend/login.php");
        }
        else{

            header("location: ../frontend/register.php");
        }
        unset($_POST['nin']);
    }
    else{
        $_SESSION['REG_ERROR'] = validator($userDetails);
        unset($_POST['nin']);
        header("location: ../frontend/register.php");
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
    $fNameValid = new NameValidator();
    $lNameValid = new LNameValidator();
    $passValid = new PasswordValidator();
    $ninValid = new NINValidator();
    $phoneValid = new PhoneNumberValidator();

    $emailValid->next($fNameValid);
    $fNameValid->next($lNameValid);
    $lNameValid->next($passValid);
    $passValid->next($ninValid);
    $ninValid->next($phoneValid);

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