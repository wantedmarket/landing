<?php
include "../include/functions.php";

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$check1 = $_POST['check1'];
$check2 = $_POST['check2'];

if( addLead( $fullName, $email, $phone, $city, $check1, $check2 ) ){
    echo "success";
} else {
    echo "failed";
}