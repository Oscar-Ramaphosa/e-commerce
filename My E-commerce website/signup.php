<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Link to your main CSS file -->
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="main.css"> 
</head>
<body>
<!-- a class that shows the field were user input their sign up details-->
<div class="login">
    <h2>Sign Up</h2>
    <form id="signupForm" action="userSignUp.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="surname">Surname:</label><br>
        <input type="text" id="surname" name="surname"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Submit">
    </form>

    <div id="error-message" style="display: none;"></div>
</div>

</body>
</html>
