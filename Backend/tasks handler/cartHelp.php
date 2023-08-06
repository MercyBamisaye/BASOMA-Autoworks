<?php
session_start();

require_once "../db codes/UpdateData.php";


if(isset($_GET)){
    $updateData = new UpdateData();
    $updateData->cart($_POST);
    unset($_POST);
    header("location: ../../cart.php");
}
?>

