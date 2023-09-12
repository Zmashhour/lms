<?php
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "db_connection.php";

    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        $flag = password_verify($password, $hashedPassword);
        if ($flag) {
            $_SESSION['email'] = $email;
            $_SESSION["user"] = [
                "id" => $row["id"],
                "name" => $row["name"],
                "email" => $row["email"],
                "password" => $password,
                "phone" => $row["phone"],
            ];
            echo "pass is correct";
            header("location: update.php");
        } else {
            echo $error = "Invalid password";
        }
    } else {
        echo $error = "Invalid email";
    }
}

$conn->close();
