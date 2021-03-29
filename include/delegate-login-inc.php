<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'config.php';
    require_once 'functions.php';

    if (invalidEmail($email) !== false) {
        header("location: ../delegate-login.php?error=invalidemail");
        exit();
    }

    loginUser($sql, $email, $password);
}
else {
    header("location: ../delegate-login.php");
    exit();
}