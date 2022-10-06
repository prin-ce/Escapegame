<?php
$userLoggedIn = $_SESSION["userLoggedIn"];

if(isset($_POST["saveDetailsButton"])) {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];

    $email_check = mysqli_query($connexion, "SELECT * FROM users WHERE email='$email'");
    $row = mysqli_fetch_array($email_check);
    $matched_user = $row['username'];

    if($matched_user == "" || $matched_user == $userLoggedIn) {
        $detailsMessage = "<div class='alertSuccess'>
                                Details updated successfully!
                            </div>";

        $query = mysqli_query($connexion, "UPDATE users SET firstname='$firstName', lastname='$lastName', email='$email' WHERE username='$userLoggedIn'");
    }
    else {
        $errorMessage = $account->getFirstError();

        $detailsMessage = "<div class='alertError'>
                                    $errorMessage
                                </div>";
    }
}

//**************************************************

if(isset($_POST["savePasswordButton"])) {

    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $newPassword2 = $_POST["newPassword2"];

    $password_query = mysqli_query($connexion, "SELECT password FROM users WHERE username='$userLoggedIn'");
    $row = mysqli_fetch_array($password_query);
    $db_password = $row['password'];

    if(md5($oldPassword) == $db_password) {

        if($newPassword == $newPassword2) {

            if(strlen($newPassword) <= 4) {
                $passwordMessage = "Le mot de passe doit avoir plus de 4 caractères<br><br>";
            }
            else {
                $newPasswordMd5 = md5($newPassword);
                $password_query = mysqli_query($connexion, "UPDATE users SET password='$newPasswordMd5' WHERE username='$userLoggedIn'");
                $passwordMessage = "<div class='alertSuccess'>
                                        Le mot de passe a été changé avec succès!
                                    </div>";
            }

        }
        else {
            $passwordMessage = "Les mots de passe ne sont pas identiques!<br><br>";
        }
    }
    else {
        $passwordMessage = "L'ancien mot de passe est incorrect! <br><br>";
    }

}
else {
    $passwordMessage = "";
}


// Redirection vers la suppression du profil

if(isset($_POST["closeAccountButton"])) {
    header("Location: close_account.php");
}

// Redirection vers le menu

if(isset($_POST["returnButton"])) {
    header("Location: browse.php");
}


?>