<?php

function sanitizeFormUsername($inputText)
{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);

    return $inputText;
}

function sanitizeFormString($inputText)
{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));

    return $inputText;
}

function sanitizeFormPassword($inputText)
{
    $inputText = strip_tags($inputText);

    return $inputText;
}


if (isset($_POST['registerButton'])) {
    // Register button was pressed
    $username = sanitizeFormUsername($_POST['registerUsername']);
    $firstName = sanitizeFormString($_POST['registerFirstName']);
    $lastName = sanitizeFormString($_POST['registerLastName']);
    $email = sanitizeFormString($_POST['registerEmail']);
    $email2 = sanitizeFormString($_POST['registerEmail2']);
    $password = sanitizeFormPassword($_POST['registerPassword']);
    $password2 = sanitizeFormPassword($_POST['registerConfirmPassword']);

    $wasSuccessfull = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    if ($wasSuccessfull) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}
