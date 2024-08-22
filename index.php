<?php
require_once "include/config_session-inc.php";
require_once "include/signup_view-inc.php";
require_once "include/login_view-inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/resets.css">
    <link rel="stylesheet" href="css/stylesh.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Devanagari:wght@100..800&family=Edu+VIC+WA+NT+Beginner:wght@400..700&family=New+Amsterdam&display=swap" rel="stylesheet">
    <title>PHP-SIGNUP</title>
</head>
<body>
    <section class="signup">
        <form action="include/signup-inc.php" method ="POST">
            <H1>Signup</H1>
            <?php
            signup_input();
            ?>
            <button>Signup</button>
        </form>
    </section>

    <?php
    check_signup_errors();
    ?>

    <section class="changeacc">
        <form action="include/login-inc.php" method ="POST">
            <H2>Login</H2>
            <input type="text" name="username" placeholder ="username">
            <br>
            <input type="password" name="password" placeholder ="password">
            <br>
            <button>Login</button>
        </form>
    </section>
    <?php
    check_login_errors();
    ?>

</body>
</html> 