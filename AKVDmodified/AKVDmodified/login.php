<?php error_reporting(0); ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    
</head>

<body>
    <div class="wrapper">
        <header>Login Form</header>

        <form action="login_check.php" method="POST" class="login_form">
            <div class="field email">
                <div class="input-area">
                    <input type="text" placeholder="Username" name="username">
                    <i class="icon fas fa-envelope"></i>

                </div>

            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="password" placeholder="Password" name="password">
                    <i class="icon fas fa-lock"></i>

                </div>

            </div>

            <input type="submit" type="submit" name="submit" value="Login">

        </form>
        <?php
        // check if error parameter is set
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            // display error message
            echo '<div class="alert alert-danger">';
            echo "<div class='error'>Incorrect username or password</div>";
            echo '</div>';


        }
        ?>
        <div class="pass-txt"><a href="index.php">Go Back to HomePage</a></div>

    </div>
    <script src="script.js"></script>
</body>

</html>