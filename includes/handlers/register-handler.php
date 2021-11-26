<?php

function sanitizeFormUsername($inputText)
{
    // Strips all html elements that may be in string
    $inputText = strip_tags($inputText);
    // Remove all whitespace in username
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function sanitizeFormString($inputText)
{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    // Make first char of name to uppercase
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}

function sanitizeFormPassword($inputText)
{
    // Strips all html elements that may be in string
    $inputText = strip_tags($inputText);
    return $inputText;
}

// Detect when register button pressed
if (isset($_POST['registerButton'])) {
    // echo "register button was pressed";

    // USERNAME
    // Assign username variable to the registration username field
    $username = sanitizeFormUsername($_POST['registerUsername']);

    // FIRST NAME
    $firstName = sanitizeFormString($_POST['firstName']);

    // LAST NAME
    $lastName = sanitizeFormString($_POST['lastName']);

    //EMAILS
    $email = sanitizeFormString($_POST['email']);
    $email2 = sanitizeFormString($_POST['email2']);

    //PASSWORDS
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);

}
?>