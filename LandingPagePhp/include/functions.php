<?php
session_start();
include "db.php";

function addUser( $email, $password ) {
    global $conn;
    $stmt = $conn->prepare( "INSERT INTO `users` (`email`, `password`) VALUES(?, ?)" );
    $hash = password_hash( $password, PASSWORD_DEFAULT );
    $stmt->bind_param('ss', $email, $hash );
    $stmt->execute();
}

function addLead( $fullName, $email, $phone, $city, $check1, $check2 ) {
    global $conn;
    $stmt = $conn->prepare( "INSERT INTO `leads` (`full_name`, `email`, `phone_number`, `city`, `check1`, `check2`) VALUES(?, ?, ?, ?, ?, ?)" );
    $stmt->bind_param('ssssii', $fullName, $email, $phone, $city, $check1, $check2);
    if ($stmt->execute()) { 
        return true;
     } else {
        return false;
     }
}
function updateLead( $id, $fullName, $email, $phone, $city ) {
    global $conn;
    $stmt = $conn->prepare( "UPDATE `leads` SET `full_name`=?, `email`=?, `phone_number`=?, `city`=? WHERE id=?" );
    $stmt->bind_param('ssssi', $fullName, $email, $phone, $city, $id );
    if ($stmt->execute()) {
        return true;
     } else {
        return false;
     }
}

function logout() {
    session_destroy();
    return true;
}

function login( $email, $password ) {
    global $conn;
    $stmt = $conn->prepare( "SELECT * FROM `users` WHERE `email`=?" );
    $stmt->bind_param('s', $email );
    $stmt->execute();
    $result = $stmt->get_result();
    if( $result->num_rows === 1 ) {
        $user = $result->fetch_assoc();
        if(password_verify( $password, $user['password'])){
            $_SESSION['is_login'] = true;
            return true;
        }
    }

    return false;
}

function isLogin() {
    if( !empty( $_SESSION['is_login'])) {
        return true;
    }
    return false;
}

function getAllLeads() {
    global $conn;
    $results = $conn->query( "SELECT * FROM `leads`" );
    $leads = $results->fetch_all( MYSQLI_ASSOC );
    return $leads;
}

function deleteLead( $id ) {
    global $conn;
    $stmt = $conn->prepare( "DELETE FROM `leads` WHERE `id`=?" );
    $stmt->bind_param('d', $id );
    $stmt->execute();
}

function getLead( $id ) {
    global $conn;
    $stmt = $conn->prepare( "SELECT * FROM `leads` WHERE `id`=?" );
    $stmt->bind_param('d', $id );
    $stmt->execute();
    $result = $stmt->get_result();
    if( $result->num_rows === 1 ) {
        $lead = $result->fetch_assoc();
        return $lead;
    }
    return false;
}