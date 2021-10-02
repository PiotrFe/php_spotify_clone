<?php

if (isset($_POST['loginButton'])) {
    // Login button was pressed
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    var_dump($password);
    var_dump(md5($password));

    // Login function
    $result = $account->login($username, $password);

    if ($result) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}
