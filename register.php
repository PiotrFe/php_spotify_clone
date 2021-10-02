<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Slotify!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>

<body>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Bart Simpson" required />
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required />
                    </p>
                    <button type="submit" name="loginButton">Log in</button>
                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$userNameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="registerUsername">Username</label>
                        <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. Bart Simpson" value="<?php getInputValue("registerUsername") ?>" required />
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="registerFirstName">First name</label>
                        <input id="registerFirstName" name="registerFirstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue("registerFirstName") ?>" required />
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="registerLastName">Last name</label>
                        <input id="registerLastName" name="registerLastName" type="text" placeholder="e.g.Simpson" value="<?php getInputValue("registerLastName") ?>" required />
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="registerEmail">Email</label>
                        <input id="registerEmail" name="registerEmail" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue("registerEmail") ?>" required />
                    </p>
                    <p>
                        <label for="registerEmail2">Confirm email</label>
                        <input id="registerEmail2" name="registerEmail2" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue("registerEmail2") ?>" required />
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$paswordsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$paswordNotAlphanumeric); ?>
                        <?php echo $account->getError(Constants::$paswordCharacters); ?>
                        <label for="registerPassword">Password</label>
                        <input id="registerPassword" name="registerPassword" type="password" placeholder="Your password" required />
                    </p>
                    <p>
                        <label for="registerConfirmPassword">Confirm Password</label>
                        <input id="registerConfirmPassword" name="registerConfirmPassword" placeholder="Your password" type="password" required />
                    </p>
                    <button type="submit" name="registerButton">Signup</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>