<?php

declare(strict_types=1);

function signup_input(){

            if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])){
                echo '<input type="text" name="username" placeholder ="username" value="'. $_SESSION["signup_data"]["username"] .'"> <br>';
            }else {
                echo '<input type="text" name="username" placeholder ="username"> <br>';
            }

            echo '<input type="password" name="password" placeholder ="password"> <br>';

            if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_taken"]) && !isset($_SESSION["errors_signup"]["invalid_email"]) ){
                echo '<input type="email" name="email" placeholder ="email" value="'. $_SESSION["signup_data"]["email"] .'"><br>';
            }else {
                echo '<input type="email" name="email" placeholder ="email"> <br>';
            }
}

function check_signup_errors(){
     //(isset)checks whether the variable is declared with a value or not
    if(isset($_SESSION["errors_signup"])){
        $errors =$_SESSION["errors_signup"];
        
        echo "<br>";

        foreach($errors as $error){
            echo "<p class='form-error'>" . $error . "</p>";
        }

        unset($_SESSION["errors_signup"]);

    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success") {
        # code... 
        echo "<br>";
        echo "<p class='form-error'>Signup Success!</p>";
    }
}

