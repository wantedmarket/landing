<?php
include "../include/functions.php";
$email = $_POST['email'];
$password = $_POST['password'];
if( login( $email, $password ) ){
    echo "success";
} else {
    echo "failed";
}