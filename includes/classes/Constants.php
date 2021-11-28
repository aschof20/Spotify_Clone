<?php

class Constants {

    //Username validation
    public static $usernameCharacters = "Your username must be between 5 and 25 characters.";
    public static $usernameTaken = "The username already exists in the database.";

    //First name validation
    public static $firstNameCharacters = "Your first name must be between 5 and 25 characters.";

    //Last name validation
    public static $lastNameCharacters = "Your last name must be between 5 and 25 characters.";

    // Email Validation
    public static $emailInvalid = "Email is invalid";
    public static $emailsDoNotMatch = "Emails do not match.";
    public static $emailTaken = "Email already exists in the database.";

    // Password validation
    public static $passwordCharacters = "Your password is not of sufficient length.";
    public static $passwordNotAlphanumeric = "Passwords contains invalid characters.";
    public static $passwordsDoNotMatch = "Passwords do not match.";


    //LOGIN LOGIC
    public static $loginFail = "Login parameters are invalid.";


}