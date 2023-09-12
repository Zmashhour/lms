<?php
session_start();
include "db_connection.php";

if (!isset($_SESSION["comments"])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comm</title>
</head>

<body>
    <form action="comment_update.php" method="post">
        <!--<input type="hidden" name="comment_id" value="<?php //echo $_SESSION['comments']['id']; ?>">-->
        Your Comment: <input type="text" name="comment" value="<?php echo $_SESSION["comments"]["title"]; ?>"><br>
        <input type="submit" name="submit" value="Update Your Comment">
        <input type="submit" name="delete" value="delete Your Comment">
    </form>
</body>

</html>