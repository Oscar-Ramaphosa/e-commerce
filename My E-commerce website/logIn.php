<!DOCTYPE html>
<html lang="en">
    <!--this is the log in page-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <!-- Link to your main CSS file -->
    <link rel="stylesheet" href="main.css"> 
</head>
<body>
 <!-- a class and a form that shows the field were user input their log in details-->
<div class="login">
    <h2>Login</h2>
        <form id="loginForm" action="login_process.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
</div>      
</body>
</html>