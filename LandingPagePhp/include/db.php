<?php
$server = "localhost";
$database = "landingpage_app";
$user = "root"; 
$password = "";

$conn = new mysqli( $server, $user, $password, $database );
$conn->set_charset('utf8');