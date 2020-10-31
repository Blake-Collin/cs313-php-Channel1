<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/07Teach/connections.php";

function signUpUser($username, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $userId = insertNewUser($username, $hashedPassword);
    return $userId;
}

function signInUser($username, $password) {
    $data = getHashedPassword($username);
    $hashedPassword = $data['hashedpassword'];
    $passwordCheck = password_verify($password, $hashedPassword);
    if ($passwordCheck == true) {
    return $data['id'];
    }
    else {
        return false;
    }
}