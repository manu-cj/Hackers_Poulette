<?php
session_start();




if (isset($_POST['submit'])) {
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
    $gender = htmlentities($_POST['gender']);
    $country = htmlentities($_POST['country']);
    $subject = htmlentities($_POST['subject']);
    $message = htmlentities($_POST['message']);
    $agree = htmlentities($_POST['agree']);
    $mielPops = htmlentities($_POST['mielPops']);
    $alert = 0;

    




    // Firstname validation
    if (empty($firstname) ) {
        $_SESSION["alertFirstname"] = $firstname;
        $alert++;
    } else {
        unset($_SESSION["alertFirstname"]);
    }

    // Lastname validation
    if (empty($lastname) || !preg_match("/^[a-zA-Z-' ]*$/", $lastname) || strlen($lastname) > 50) {
        $_SESSION["alertLastname"] = $lastname;
        $alert++;
    } else {
        unset($_SESSION["alertLastname"]);
    }

    // Email validation
    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["alertmail"] = $mail;
        $alert++;
    } else {
        unset($_SESSION["alertmail"]);
    }

    // Gender validation
    if (empty($gender) || !in_array($gender, ['Male', 'Female', 'Other', 'Hélicoptère de combat AC 130'])) {
        $_SESSION["alertgender"] = $gender;
        $alert++;
    } else {
        unset($_SESSION["alertgender"]);
    }

    // Country validation
    if (empty($country) || strlen($country) > 50) {
        $_SESSION["alertcountry"] = $country;
        $alert++;
    } else {
        unset($_SESSION["alertcountry"]);
    }

    // Subject validation
    if (empty($subject)) {
        $_SESSION["alertsubject"] = $subject;
        $alert++;
    } else {
        unset($_SESSION["alertsubject"]);
    }

    // Message validation
    if (empty($message) || strlen($message) > 500) {
        $_SESSION["alertMessage"] = $message;
        $alert++;
    } else {
        unset($_SESSION["alertMessage"]);
    }

    // Agreement validation
    if (empty($agree) || $agree !== "on") {
        $_SESSION["alertagree"] = $agree;
        $alert++;
    } else {
        unset($_SESSION["alertagree"]);
    }

    // Honeypot (spam protection) validation
    if (!empty($mielPops)) {
        $alert++;
        $errors = "Spam detected.";
        $_SESSION["alertMiel"] = $errors;
    }

    if ($alert > 0) {
        header('Location: http://localhost:5000/');
        exit();
    } else {
        // Unset individual session variables instead of destroying the session
        unset($_SESSION["alertFirstname"]);
        unset($_SESSION["alertLastname"]);
        unset($_SESSION["alertmail"]);
        unset($_SESSION["alertgender"]);
        unset($_SESSION["alertcountry"]);
        unset($_SESSION["alertsubject"]);
        unset($_SESSION["alertMessage"]);
        unset($_SESSION["alertagree"]);
        unset($_SESSION["alertMiel"]);
        $_SESSION['mail'] = $mail;
        $_SESSION['name'] = $lastname . ' ' . $firstname;
        $_SESSION['message'] = $message;
        $_SESSION['subject'] = $subject;


        header('Location: http://localhost:5000/mail.php');
    }
}

