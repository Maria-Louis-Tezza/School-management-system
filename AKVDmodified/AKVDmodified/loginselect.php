<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .login-container {
            width: 400px;
            margin: 50px auto;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .student-button,
        .teacher-button {
            display: block;
            width: 200px;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .student-button:hover,
        .teacher-button:hover {
            background-color: #3e8e41;
        }

        .teacher-button {
            background-color: #008CBA;
        }
        .admin-button {
            background-color:#4CAF50;
        }

        .teacher-button:hover {
            background-color: #006b8f;
        }
    </style>
</head>

<body>
    
    <div class="login-container">
        <h2>Login</h2>
        <div class="button-container">
            <a href="login.php" class="student-button">Student Login</a>
            <a href="logint.php" class="teacher-button">Teacher Login</a>
            <a href="logina.php" class="teacher-button">Admin Login</a>
        </div>
        <div class="pass-txt"><a href="index.php">Go Back to HomePage</a></div>
    </div>
</body>

</html>