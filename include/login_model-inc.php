<?php
//accepts data if it is in a data type
declare(strict_types=1);

function get_user(object $pdo, string $username){
    $query = "SELECT * FROM users WHERE Username = :username; ";

    //passing a prepare statement for sanitizing the data from MY SQL injection
    $stmt = $pdo -> prepare($query);
    $stmt ->  bindparam(":username", $username);
    $stmt->execute();

    //FETCHING SINGLE DATA
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}