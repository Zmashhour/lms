<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
    <h2>Welcome, <?php echo $_SESSION["user"]["name"] . "<BR>"; ?>!</h2>
    <a href="logout.php">Logout</a>
</body>

</html>