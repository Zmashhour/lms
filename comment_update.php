<?php
session_start();
if (isset($_POST['submit'])) {
    include "db_connection.php";

    $comm = $_POST['comment'];

    $userID = $_SESSION['comments']['user_id'];

    $query = "UPDATE comments SET title = ? WHERE user_id = '$userID'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s" ,$comm);

    $result = $stmt->execute();

    if ($result) {
        // Update the session data with the new values
        $_SESSION['comments']['title'] = $comm;

        // Redirect to the profile update page
        header("location:comment_existed.php");
    } else {
        echo "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
elseif(isset($_POST['delete'])){
    include "db_connection.php";

    $userID = $_SESSION['comments']['user_id'];

    $query = "DELETE FROM comments WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userID);
    $result = $stmt->execute();

    header("location:comment.php");
    $stmt->close();
    $conn->close();
}
