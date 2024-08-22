<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    $query = "SELECT Username FROM users WHERE Username = :username; ";

    //passing a prepare statement for sanitizing the data from MY SQL injection
    $stmt = $pdo -> prepare($query);
    $stmt ->  bindparam(":username", $username);
    $stmt->execute();

    //FETCHING SINGLE DATA
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email){
    $query = "SELECT Email FROM users WHERE Email = :email; ";

    //passing a prepare statement for sanitizing the data from MY SQL injection
    $stmt = $pdo -> prepare($query);
    $stmt ->  bindparam(":email", $email);
    $stmt->execute();

    //FETCHING SINGLE DATA
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_users($pdo, $username, $password, $email){

    $query = "INSERT INTO users (Username, Pwd, Email) VALUES (:username, :pwd, :email);";
    $stmt = $pdo -> prepare($query);
    //passing a prepare statement for sanitizing the data from MY SQL injection
    $options=[
        'cost'=> 12
    ];

    $hashedpwd = password_hash($password, PASSWORD_BCRYPT, $options);
    
    $stmt ->  bindparam(":username", $username);
    $stmt ->  bindparam(":email", $email);
    $stmt ->  bindparam(":pwd", $hashedpwd);
    $stmt->execute();
}