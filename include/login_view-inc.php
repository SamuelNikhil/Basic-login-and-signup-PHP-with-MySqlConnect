<?php
//accepts data if it is in a data type
declare(strict_types=1);

function check_login_errors(){
    //checks whether the variable is declared with a value or not
    if(isset($_SESSION["errors_login"])){
        //if it is declared and not NULL
        $errors = $_SESSION["errors_login"];

        echo "<br>";

        foreach ($errors as $error){
            echo "<p class='form-error'>" . $error . "</p>";
        }
        unset($_SESSION["errors_login"]);
    }elseif(isset($_GET["login"]) && $_GET["login"] === "success"){
        echo "<br>";
        echo "<p class='form-error'>Login Success!</p>";
    }
}