<?php

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $passwordRepeat) {
    $result;
    if ($password !== $passwordRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($sql, $email) {
    $conn = "SELECT * FROM delegatesUsers WHERE delegatesUsersEmail = ?;";
    $stmt = mysqli_stmt_init($sql);
    if (!mysqli_stmt_prepare($stmt, $conn)) {
        header("location: ../delegate-signup.php?error=emailused");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function createUser($sql, $fname, $lname, $email, $password) {
    $conn = "INSERT INTO delegatesUsers (delegatesUsersFname, delegatesUsersLname, delegatesUsersEmail, delegatesUsersPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($sql);
    if (!mysqli_stmt_prepare($stmt, $conn)) {
        header("location: ../delegate-signup.php?error=emailused");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../delegate-signup.php?error=none");
    exit();
}

function loginUser($sql, $email, $password) {
    $emailExists = emailExists($sql, $email);
    
    if ($emailExists === false) {
        header("location: ../delegate-login.php?error=wrongemail");
        exit();
    }

    $passwordHashed = $emailExists["delegatesUsersPassword"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        header("location: ../delegate-login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["delegateUsersID"] = $emailExists["delegatesUsersID"];
        $_SESSION["delegateUsersEmail"] = $emailExists["delegatesUsersEmail"];
        header("location: ../delegate-login.php");
        exit();
    }
}