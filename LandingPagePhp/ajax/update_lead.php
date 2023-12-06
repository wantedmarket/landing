<?php
include "../include/functions.php";

$id = $_POST['id'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];


if( updateLead( $id, $fullName, $email, $phone, $city ) ){
    echo "success";
} else {
    echo "failed";
}