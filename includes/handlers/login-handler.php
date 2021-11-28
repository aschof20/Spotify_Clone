<?php
// Detect when login button pressed
if (isset($_POST['loginButton'])) {
    // "login button was pressed";
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $result = $account->login($username, $password);
    if ($result) {
        // Setup session to maintain logged-in status
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}
