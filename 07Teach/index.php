<?php

//Controller
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/07Teach/functions.php";

if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
} else if (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} else {
    $action = '';
}

switch ($action) {
    case 'signInPage':
        include $_SERVER['DOCUMENT_ROOT'] . "/07Teach/views/signIn.php";
    break;
    case 'signUpPage':
        include $_SERVER['DOCUMENT_ROOT'] . "/07Teach/views/signUp.php";
    break;
    case 'signUpUser':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $userId = signUpUser($username, $password);
        if (empty($userId)) {
            $_SESSION['message'] = "Sign Up Failed";
            include $_SERVER['DOCUMENT_ROOT'] . "/07Teach/views/signUp.php";
            exit;
        }
        header("Location: /07Teach/index.php?action=signInPage");
        exit;
    break;
    case 'signInUser':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userId = signInUser($username, $password);
        if ($userId == false) {
            $_SESSION['message'] = "Sign In Failed";
            include $_SERVER['DOCUMENT_ROOT'] . "/07Teach/views/signIn.php";
            exit;
        }
        $_SESSION['username'] = $username;
        $_SESSION['userId'] = $userId;
        $_SESSION['loggedIn'] = true;
        header("Location: /07Teach/index.php");
        exit;
    break;
    default:
        include $_SERVER['DOCUMENT_ROOT'] . "/07Teach/views/welcome.php";
    break;
}