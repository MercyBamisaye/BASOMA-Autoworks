<?php
session_start();

require_once "tasks handler/RegisterBusiness.php";
require_once "tasks handler/UpdateUser.php";
require_once "validator/BusinessEmailValidator.php";
require_once "validator/BusinessNameValidator.php";
require_once "validator/BusinessAddressValidator.php";
require_once "validator/LNameValidator.php";
require_once "validator/NameValidator.php";
require_once "validator/PhoneNumberValidator.php";

if(isset($_GET['BusinessName'])){
    // Converting user inputs into an array

    $userDetails = [
        'fName'=>$_GET['firstName'],
        'lName' => $_GET['lastName'],
        'email'=>$_GET['email'],
        'phoneNumber' => $_GET['Phone'],
        'address' => $_GET['address'],
        'businessName'=>$_GET['BusinessName']
    ];

    // Validating user inputs
    if(validator($userDetails) === null){

            $userUpdate = [];
            $userUpdate["firstName"] = $userDetails["fName"];
            $userUpdate["lastName"] = $userDetails["lName"];
            $userUpdate["userId"] = $_SESSION['id'];
            $userUp = new UpdateUser($userUpdate);
            $userUp->update();


            $businessDet = [];
            $businessDet["businessName"] = $userDetails["businessName"];
            $businessDet["email"] = $userDetails["email"];
            $businessDet["phoneNumber"] = $userDetails["phoneNumber"];
            $businessDet["businessAddress"] = $userDetails["address"];
            $businessDet["userId"] = $_SESSION['id'];

            $busReg = new RegisterBusiness($businessDet);
            $reg = $busReg->register();

            /*$imageSaver = new ImageSaver($userDetails);
            $imageSaver->save($_FILES['picture']['tmp_name']);
            $_SESSION['LOGIN_MSSG'] = "Successful! Kindly login with your new email address.";*/
            header("location: ../index.php");

        unset($_POST['BusinessName']);
    }
    else{
        $_SESSION['SELLER_REG_ERROR'] = validator($userDetails);
        unset($_POST['BusinessName']);
        header("location: ../sellerRegistration.php");
    }


}
function validator($userDetails): ?string{

    /**
     * Using the Chain of Responsibility Design Pattern, the required classes
     * are instantiated below and proceeded with the chaining patten.
     *
     */

    $emailValid = new BusinessEmailValidator();
    $fNameValid = new NameValidator();
    $lNameValid = new LNameValidator();
    $busAddValid = new BusinessAddressValidator();
    $busNameValid = new BusinessNameValidator();
    $phoneValid = new PhoneNumberValidator();

    $emailValid->next($fNameValid);
    $fNameValid->next($lNameValid);
    $lNameValid->next($busAddValid);
    $busAddValid->next($busNameValid);
    $busNameValid->next($phoneValid);

    // Validating user inputs
    return $emailValid->validate($userDetails);

}

?>