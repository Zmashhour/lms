<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form method="post" action="register_mysql.php">
        <input type="text" name="name" placeholder="Name"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="text" name="phone" placeholder="Phone"><br>
        <input type="number" name="age" placeholder="Age"><br>
        <input type="text" name="country" placeholder="Country"><br>
        <input type="text" name="city" placeholder="City"><br>
        <input type="text" name="street" placeholder="Street"><br>

        <input type="submit" name="submit" value="Submit">
        <a href="login.php">Login</a>
    </form>
</body>

</html>