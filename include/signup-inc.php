<?php

//var_dump($_SERVER["REQUEST_METHOD"]);
//if condition to check whether the REQUEST_METHOD is POST ELSE CODE DIE

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	//Grabs data from index PHP using "name" input type	
		
    $username= $_POST["username"];
    $password= $_POST["password"];
    $email= $_POST["email"];
    
	//Used try and catch for error handling
	
    try{
        require_once "dbh-inc.php";
        require_once "signup_model-inc.php";
        require_once "signup_contr-inc.php";
		
        // Error Handlers
        $errors = [];

        if(is_input_empty($username, $password, $email)){
            $errors["empty_input"] = "Fill in all fields!";
        }

        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email is used!";
        }

        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username already taken!";
        }

        if(is_email_registered($pdo, $email)){
            $errors["email_taken"] = "Email already registered!";
        }

        require_once "config_session-inc.php";

        if($errors){
            $_SESSION["errors_signup"] = $errors ;

            //Saves the data which the user enters

            $signupData = [
                "username"=> $username, 
                "email"=> $email
            ];

            $_SESSION["signup_data"] = $signupData ;

            header("Location: ../index.php");
            die();
        }

        create_users($pdo, $username, $password, $email);

        header("Location: ../index.php?signup=success");

        $pdo = NULL;
        $stmt = NULL;

        die();
    } catch (PDOException $e){

        die("Query failed:" . $e->getmessage());
    }
}else {
    header("Location: ../index.php");
    die();
}