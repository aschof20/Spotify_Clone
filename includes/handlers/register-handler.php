<?php

function sanitizeFormUsername($inputText) {
    // Strips all html elements that may be in string
    $inputText = strip_tags($inputText);
    // Remove all whitespace in username
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    // Make first char of name to uppercase
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}

function sanitizeFormPassword($inputText) {
    // Strips all html elements that may be in string
    $inputText = strip_tags($inputText);
    return $inputText;
}

// Detect when register button pressed
if (isset($_POST['registerButton'])) {
    // Assign and clean user input fields
    $username = sanitizeFormUsername($_POST['registerUsername']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $email2 = sanitizeFormString($_POST['email2']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);
    // If validation successful take user to the index.php page
    if ($wasSuccessful) {
        header('Location: index.php');
    }
}
