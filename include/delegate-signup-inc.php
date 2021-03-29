<?php

if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    require_once 'config.php';
    require_once 'functions.php';

    if (invalidEmail($email) !== false) {
        header("location: ../delegate-signup.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($password, $passwordRepeat) !== false) {
        header("location: ../delegate-signup.php?error=unmatchingpasswords");
        exit();
    }
    if (emailExists($sql, $email) !== false) {
        header("location: ../delegate-signup.php?error=emailused");
        exit();
    }

    createUser($sql, $fname, $lname, $email, $password);

}
else {
    header("location: ../delegate-signup.php");
    exit();
}