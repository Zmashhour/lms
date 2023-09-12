<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: login.php");
    exit();
}

if (isset($_POST['submit'])) {

    include "db_connection.php";

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $phone = $_POST['phone'];

    $npassword = password_hash($password, PASSWORD_DEFAULT);

    if ($_SESSION['user']['email'] !== $email || $_SESSION['user']['phone'] !== $phone) {
        $stm = "SELECT email , phone FROM users WHERE email = ? OR phone = ?";
        $que = $conn->prepare($stm);
        $que->bind_param("ss", $email, $phone);
        $que->execute();
        $data = $que->fetch();
        if ($data) {
            echo "Email or Phone number is already existed <br>";
            echo '<a href="update.php">Try Again</a>';
        }
    } else {

        $query = "UPDATE users SET name = ?, email = ?, password = ?, phone = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $name, $email, $npassword, $phone, $_SESSION['user']['id']);

        $result = $stmt->execute();

        if ($result) {
            // Update the session data with the new values
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['password'] = $password;
            $_SESSION['user']['phone'] = $phone;

            // Redirect to the profile update page
            header("location:update.php");
        } else {
            echo "Error updating profile: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
} elseif (isset($_POST['delete'])) {

    include "db_connection.php";

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['user']['id']);
    $result = $stmt->execute();

    header("location:register.php");
    $stmt->close();
    $conn->close();
}
