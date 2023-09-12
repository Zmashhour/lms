<?php
session_start();
include "db_connection.php";

if (!isset($_SESSION["user"])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="update_mysql.php" method="post">
        Name: <input name="name" type="text" value="<?php echo $_SESSION["user"]["name"]; ?>"><br>
        Email: <input name="email" type="text" value="<?php echo $_SESSION["user"]["email"]; ?>"><br>
        Password: <input name="password" type="password" value="<?php  echo  $_SESSION["user"]["password"]; ?>"><br>
        Phone: <input name="phone" type="text" value="<?php echo $_SESSION["user"]["phone"]; ?>"><br>
        <input type="submit" name="submit" value="Update Profile"> 
        <input type="submit" name="delete" value="Delete User"><br>
        <a href="logout.php">Logout</a><br>
        <a href="comment.php">Comments</a>
    </form>

</body>

</html>