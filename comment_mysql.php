<?php
session_start();


if (isset($_POST['submit'])) {
    include "db_connection.php";
    $comm = $_POST['comment'];
    $userId = $_SESSION['user']['id'];
    $query = "INSERT INTO comments(title, user_id) ";
    $query .= "VALUES (?,?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $comm,$userId);

    $result = $stmt->execute();
    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    

    $_SESSION['comments'] = [
        "id" => $commentId = mysqli_insert_id($conn),
        "title" => $comm,
        "user_id" => $userId,
    ];

    header("location:comment_existed.php");

}
