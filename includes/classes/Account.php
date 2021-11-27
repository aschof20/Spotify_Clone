<?php

class Account {
    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
        // Validation of User input form fields
        $this->validatedUsername($un);
        $this->validatedFirstName($fn);
        $this->validatedLastName($ln);
        $this->validatedEmails($em, $em2);
        $this->validatedPasswords($pw, $pw2);

        // Add registration to database if no errors in array.
        if (empty($this->errorArray)) {
            //Insert into db
            return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
        } else {
            return false;
        }
    }

    public function getError($error) {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error </span>";
    }


    // Function to insert user details into the database
    private function insertUserDetails($un, $fn, $ln, $em, $pw) {
        // Encryption of plaintext password
        $encryptedPw = md5($pw);
        $profilePic = "assets/images/profile-pics/blank_profile.png";
        $date = date("Y-m-d");

        // Query to insert data into the database users table
        $result = mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
        return $result;
    }

    private function validatedUsername($un) {
        // Username length validation
        if (strlen($un) > 25 || strlen($un) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
        // TODO: check if username already exists

    }

    private function validatedFirstName($fn) {
        if (strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }

    private function validatedLastName($ln) {
        if (strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }

    private function validatedEmails($em, $em2) {
        // Check that emails match
        if ($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDoNotMatch);
            return;
        }
        // Check email format
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }
        //TODO: Check email hasn't already been used


    }

    private function validatedPasswords($pw, $pw2) {
        // Check that passwords match
        if ($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDoNotMatch);
            return;
        }
        // Check that password contains special characters
        if (preg_match('/[^A-Za-z0-9]/', $pw)) {
            array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
            return;
        }
        // Check length of password valid
        if (strlen($pw) > 30 || strlen($pw) < 5) {
            array_push($this->errorArray, Constants::$passwordCharacters);
            return;
        }
    }
}

?>